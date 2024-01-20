<?php

namespace app\controllers;

use core\Controller;

class FormRegistrationController extends Controller
{
    public function registrationAction()
    {
        $this->setMeta('test', 'test', 'test');
        $this->setData([
            'name' => 'Alex',
            'age' => 31
        ]);
        $this->getView();
    }
}