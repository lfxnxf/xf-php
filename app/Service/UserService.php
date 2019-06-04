<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2019/6/4
 * Time: 17:51
 */

namespace App\Service;

use App\Model\UserModel;

class UserService
{
    private $userModel = null;
    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function login()
    {
        $user = $this->userModel->find(1)->toArray();
        return $user;
    }
}