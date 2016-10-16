<?php
/**
 * pusher入口文件
 *
 * 后台跑吧
 *
 * Created by PhpStorm.
 * User: lin
 * Date: 16-10-16
 * Time: 下午9:58
 */
define('APPPATH', __DIR__);
define('CLIFILE', __FILE__);
spl_autoload_register(function ($class){
    require  '../util/' . $class . '.php';
});

while (true){
    try {
        throw new Exception('fatal', 404);
    } catch (Exception $e){
        MLog::fatal(CoreConst::MODULE_PUSHER, 'PUSHER FATAL ERROR [code]' . $e->getCode() . ' [exception]' . json_encode($e->getMessage()));
    }
}