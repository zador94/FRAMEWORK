<?php

namespace app\controllers;

use core\Controller;

class MainController extends Controller
{
    public function indexAction()
    {
        $this->setMeta('test', 'test', 'test');
        $this->setData([
            'name' => 'Alex',
            'age' => 31
        ]);
        $this->getView();
    }
}