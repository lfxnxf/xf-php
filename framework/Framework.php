<?php
/**
 * Created by PhpStorm.
 * User: ThinkPad
 * Date: 2019/6/4
 * Time: 16:23
 */

//require_once 'loader.php';
use Illuminate\Database\Capsule\Manager;

class Framework
{

    public static function run($routeUrl, $param)
    {
        // 数据库配置
        $capsule = new Manager();
        $capsule->addConnection(require BASE_URL . '/config/database.php');
        $capsule->bootEloquent();
        return self::execute($routeUrl, $param);
    }

    public static function execute($routeUrl, $param)
    {
        $url = explode('/', $routeUrl);
        if (count($url) == 1){
            $controller = 'App\\Controller\\' . ucfirst($url[0] . 'Controller');
            $action = 'index';
        }else {
            $action = array_pop($url);
            foreach($url as $key => $item) {
                $url[$key] = ucfirst($item);
            }
            $controller = 'App\\Controller\\' . implode('\\', $url) . 'Controller';
        }
        $controllerObj = new $controller();
        return $controllerObj->$action($param);
    }
}