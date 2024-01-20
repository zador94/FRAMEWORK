<?php

namespace app\controllers;

use core\Controller;

class UsersController extends Controller
{
    public function showAllAction()
    {
        $this->setData([
            'users' => $this->model->getAllUsers()
        ]);
        $this->setMeta('test', 'test', 'test');
    }
}