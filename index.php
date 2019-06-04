<?php
/**
 * Created by PhpStorm.
 * User: XueFeng
 * Date: 2019/6/4
 * Time: 11:53
 */

require_once __DIR__ . '/vendor/autoload.php';
require_once __DIR__ . '/framework/Framework.php';

define('BASE_URL', __DIR__);
use Hprose\Http\Server;

//todo 调用各种配置文件

class Index
{
    public function run($routeUrl, $param = [])
    {
        return Framework::run($routeUrl, $param);
    }
}

$server = new Server();
$server->setDebugEnabled(TRUE);
$server->setCrossDomainEnabled();
$server->setP3PEnabled();
$inst = new Index();
$server->add($inst);
$server->start();