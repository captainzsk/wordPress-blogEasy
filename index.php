<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 * @version 2016-05-04
 */

ini_set("error_reporting",E_ALL ^ E_NOTICE);

define('BASE_PATH', __DIR__.'/');

function auto_load_function($className){
    include_once BASE_PATH. str_replace('\\', '/', $className).'.php';
}

spl_autoload_register("auto_load_function");

include_once BASE_PATH.'config.php';

(new \lib\Process())->run();
