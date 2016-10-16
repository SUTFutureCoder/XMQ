<?php
/**
 * Redis相关函数，用到了再添加
 *
 * 10.16更新 Redis基础库在完成XMQ项目后会以基础库的形式开源
 *
 * Created by PhpStorm.
 * User: lin
 * Date: 15-11-10
 * Time: 下午11:47
 */
class RedisLib{
    private static $redis;

    //KEY设计原则
    //topic
    //XMQ:TOPIC:生产线
    public static $prefix = 'XMQ:';

    public static $addr = "127.0.0.1";

    public static $port = 6379;

    public function __construct(){
        //禁止new
    }

    public function changeAddrPort($addr = "127.0.0.1", $port = 6379){
        self::$addr = $addr;
        self::$port = $port;
    }

    //严禁外部调用
    private static function getInstance(){
        if (!self::$redis){
            self::$redis = new Redis();
            self::$redis->connect(self::$addr, self::$port);
        }
        return self::$redis;
    }

    public static function get($strKey){
        self::getInstance();
        return self::$redis->get(self::$prefix . $strKey);
    }

    public static function set($strKey, $strValue){
        self::getInstance();
        return self::$redis->set(self::$prefix . $strKey, $strValue);
    }

    public static function setex($strKey, $intTime, $strValue){
        self::getInstance();
        return self::$redis->setex(self::$prefix . $strKey, $intTime, $strValue);
    }

    public static function setnx($strKey, $strValue){
        self::getInstance();
        return self::$redis->setnx(self::$prefix . $strKey, $strValue);
    }

    public static function hgetall($strKey){
        self::getInstance();
        return self::$redis->hgetall(self::$prefix . $strKey);
    }

    public static function hmset($strKey, $arrValue){
        self::getInstance();
        return self::$redis->hmset(self::$prefix . $strKey);
    }

    public static function delete($arrKeys){
        self::getInstance();
        if (is_array($arrKeys)){
            foreach ($arrKeys as &$strKeys){
                $strKeys = self::$prefix . $strKeys;
            }
        } else {
            $arrKeys = self::$prefix . $arrKeys;
        }

        return self::$redis->delete($arrKeys);
    }

    public static function exists($strKey){
        self::getInstance();
        return self::$redis->exists(self::$prefix . $strKey);
    }

    public static function incr($strKey){
        self::getInstance();
        return self::$redis->incr(self::$prefix . $strKey);
    }

    public static function incrBy($strKey, $intIncr){
        self::getInstance();
        return self::$redis->incrBy(self::$prefix . $strKey, $intIncr);
    }

    public static function decr($strKey){
        self::getInstance();
        return self::$redis->decr(self::$prefix . $strKey);
    }

    public static function decrBy($strKey, $intDecr){
        self::getInstance();
        return self::$redis->decrBy(self::$prefix . $strKey, $intDecr);
    }

    //SET系列
    public static function sAdd($strKey, $strValue){
        self::getInstance();
        return self::$redis->sAdd($strKey, $strValue);
    }

    public static function sRemove($strKey, $strValue){
        self::getInstance();
        return self::$redis->sRemove($strKey, $strValue);
    }

    public static function sIsMember($strKey, $strValue){
        self::getInstance();
        return self::$redis->sContains($strKey, $strValue);
    }

    public static function sSize($strKey){
        self::getInstance();
        return self::$redis->sSize($strKey);
    }

    public static function sMembers($strKey){
        self::getInstance();
        return self::$redis->sMembers($strKey);
    }

    //消息队列扩充系列
    public static function rPush($strKey, $strValue){
        self::getInstance();
        return self::$redis->rPush($strKey, $strValue);
    }
}