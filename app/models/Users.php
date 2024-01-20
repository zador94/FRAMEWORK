<?php

namespace app\models;

use core\Model;
use RedBeanPHP\R;

class Users extends Model
{
    public function getAllUsers()
    {
        $res = R::findAll('users');
        $data = [];
        foreach ($res as $user) {
            $data[$user->id]['login'] = $user->login;
            $data[$user->id]['password'] = $user->password;
        }
        return $data;
    }
}