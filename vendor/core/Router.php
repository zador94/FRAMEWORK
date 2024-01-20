<?php

namespace core;

class Router
{
    protected static array $routes = [];
    protected static array $currentRoute = [];

    public static function add($regExp, $route = [])
    {
        self::$routes[$regExp] = $route;
    }

    public static function getRoutes() : array
    {
        return self::$routes;
    }

    public static function getRoute()
    {
        return self::$currentRoute;
    }

    public static function dispatch($url)
    {
        $params = [];
        if (str_contains($url , '&') !== false) {
            $params = explode('&', $url);
            $url = $params[0];
        }
        if (self::matchRoutes($url)) {
            if (!empty($params)) {
                for ($i = 1; $i < count($params); $i++) {
                    $params = explode('=', $params[$i]);
                    self::$currentRoute['get_params'][$params[0]] = $params[$i];
                }
            }
            $controller = 'app\controllers\\' . self::$currentRoute['controller'] . 'Controller';
            if (class_exists($controller)) {
                $controllerObject = new $controller(self::$currentRoute);
                $action = self::$currentRoute['action'] . 'Action';
                if (method_exists($controllerObject, $action)) {
                    $controllerObject->getModel();
                    $controllerObject->$action();
                    $controllerObject->getView();
                } else {
                    throw new \Exception("Метод {$controller}::{$action} не найден", 404);
                }
            } else {
                throw new \Exception('Контроллер {$controller} не найден', 404);
            }
        } else {
            throw new \Exception('Страница не найдена', 404);
        }
    }



    public static function matchRoutes($url)
    {
        foreach (self::$routes as $pattern => $route) {
            if (preg_match("#($pattern)#", $url, $matches)) {
                foreach ($matches as $key => $value) {
                    if (is_string($key)) {
                        $route[$key] = $value;
                    }
                }
                if(empty($route['action'])) {
                    $route['action'] = 'index';
                }
                $route['controller'] = self::upperCamelCase($route['controller']);
                $route['action'] = self::lowerCamelCase($route['action']);
                self::$currentRoute = $route;
                return true;
            }

        }
        return false;
    }

    public static function upperCamelCase($name)
    {
        return str_replace(' ', '', ucwords(str_replace('-', ' ', $name)));
    }

    public static function lowerCamelCase($name)
    {
        return lcfirst(self::upperCamelCase($name));
    }
}