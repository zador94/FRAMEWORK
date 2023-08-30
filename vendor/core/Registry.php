<?php

namespace core;

class Registry
{
    use \core\TSingleton;
    private static array $settings = [];
    public function setSetting($name, $value): void
    {
        self::$settings[$name] = $value;
    }

    public function getSetting($name) : mixed
    {
        return self::$settings[$name];
    }

    public function getAllSettings() : array
    {
        return self::$settings;
    }

}