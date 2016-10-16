<?php
/**
 * Created by PhpStorm.
 * User: lin
 * Date: 15-12-5
 * Time: 下午3:40
 */
//常量、全局变量存储库
class CoreConst{
    //UUID
    const LOG_UUID     = 'uuid:log';
    const TOPIC_UUID   = 'uuid:topic';
    const MESSAGE_UUID = 'uuid:message';
    public static $uuid = array(
        self::LOG_UUID,
        self::TOPIC_UUID,
        self::MESSAGE_UUID,
    );

    //模块列表，用于打LOG等
    const MODULE_KERNEL  = 'kernel';
    const MODULE_PUSHER  = 'pusher';
    const MODULE_PROXY   = 'proxy';
    const MODULE_REDIS   = 'redis';
    const MODULE_DATABASE  = 'database';
    const MODULE_WEBSOCKET = 'websocket';
    const MODULE_SAL     = 'SAL';
    const MODULE_EMAIL   = 'EMAIL';
    const MODULE_BOS     = 'BOS';
    conSt MODULE_MESSAGE = 'message';

    public static $moduleList = array(
        self::MODULE_PUSHER,
        self::MODULE_PROXY,
        self::MODULE_KERNEL,
        self::MODULE_DATABASE,
        self::MODULE_WEBSOCKET,
        self::MODULE_SAL,
        self::MODULE_EMAIL,
        self::MODULE_BOS,
        self::MODULE_REDIS,
        self::MODULE_MESSAGE,
    );

    //log是否打开
    const MNEMOSYNE_LOG = 1;
}
