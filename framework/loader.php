<?php

class Loader
{
    /* 路径映射 */
    public static $vendorMap = array(
        'App' => BASE_URL . DIRECTORY_SEPARATOR . 'app',
        'Config' => BASE_URL . DIRECTORY_SEPARATOR . 'config',
        'Inc' => BASE_URL . DIRECTORY_SEPARATOR . 'inc'
    );

    /**
     * 自动加载器
     * @param $class
     * @throws Exception
     */
    public static function autoload($class)
    {
        $file = self::findFile($class);
        if (file_exists($file)) {
            self::includeFile($file);
        } else{
            throw new Exception($file . '不存在');
        }
    }

    /**
     * 解析文件路径
     * @param $class
     * @return string
     */
    private static function findFile($class)
    {
        $vendor = substr($class, 0, strpos($class, '\\')); // 顶级命名空间
        $vendorDir = self::$vendorMap[$vendor]; // 文件基目录
        $filePath = substr($class, strlen($vendor)) . '.php'; // 文件相对路径
        return strtr($vendorDir . $filePath, '\\', DIRECTORY_SEPARATOR); // 文件标准路径
    }

    /**
     * 引入文件
     * @param $file
     * @throws Exception
     */
    private static function includeFile($file)
    {
        if (is_file($file)) {
            require_once($file);
        } else{
            throw new Exception($file . '不存在');
        }
    }
}