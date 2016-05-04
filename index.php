<?php
/**
 * 因为项目支持的是个人站长，而不是面向公司，所以请在php7下运行这份代码
 * @author Lubin Chen <newlubin@163.com>
 */

define('BASE_PATH', __DIR__.'/');

function auto_load_function($className){
    include_once BASE_PATH. $className.'.php';
}
spl_autoload_register("auto_load_function");

include_once BASE_PATH.'config.php';

(new \lib\Process())->run();