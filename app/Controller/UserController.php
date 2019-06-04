<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2019/6/4
 * Time: 17:49
 */

namespace App\Controller;

use App\Service\UserService;

class UserController
{
    public function login($request = '')
    {
        $service = new UserService();
        return $service->login();
    }
}