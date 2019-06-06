<?php

namespace App\Helpers;

function config($key = null)
{
    if (is_null($key)) {
        return [];
    }
    $keys = explode('.', $key);
    $file = CONFIG_URL . DIRECTORY_SEPARATOR . $keys[0] . '.php';
    if (!file_exists($file)) {
        throw new Exception($file . '不存在');
    }
    $config =include($file);
    if (count($keys) != 1) {
        unset($keys[0]);
        foreach ($keys as $key) {
            if (!is_array($key, $config)) {
                throw new Exception($key . '不存在');
            }
            $config = $config[$key];
        }
    }
    return $config;
}
