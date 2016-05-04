<?php
/**
 * 建议在PHP5.6以上版本运行
 * @author Lubin Chen <newlubin@163.com>
 */

define('BASE_PATH', __DIR__.'/');

function auto_load_function($className){
    include_once BASE_PATH. $className.'.php';
}

spl_autoload_register("auto_load_function");

include_once BASE_PATH.'config.php';

(new \lib\Process())->run();
