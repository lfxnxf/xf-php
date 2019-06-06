<?php

use Illuminate\Database\Capsule\Manager;
class Db
{
    private function __construct()
    {//声明私有构造方法为了防止外部代码使用new来创建对象。

    }

    static public $instance;//声明一个静态变量（保存在类中唯一的一个实例）

    static public function getInstance()
    {
        if (!self::$instance) {
            self::$instance = new Manager();
        }
        return self::$instance;
    }
}