<?php
/**
 * 配置装载
 * 
 * Created by PhpStorm.
 * User: lin
 * Date: 16-10-19
 * Time: 下午11:53
 */
class ConfigLoader {

    public static function getTopics(){
        if (!APPPATH){
            return false;
        }
        $arrIncludeFileList = self::getIncludeList();
        $arrTopics          = array();
        foreach ($arrIncludeFileList as $strIncludeFile){
            $arrTempTopicList = parse_ini_file(APPPATH . '/config/' . $strIncludeFile);
            //这里的topic_config主要存放该文件中的配置
            $arrTopics['topic_config'][$strIncludeFile] = $arrTempTopicList;
            if (!empty($arrTempTopicList['topic'])){
                //这里的topic主要以topic为key，value为文件名，直接能够和上面的topic_config关联
                foreach ($arrTempTopicList['topic'] as $strTempTopic) {
                    $arrTopics['topic'][$strTempTopic] = $strIncludeFile;
                }
            }
        }

        return $arrTopics;
    }
    
    /**
     * 获取pusher_client引入配置文件列表
     *
     * @return array|bool
     */
    public static function getIncludeList(){
        if (!APPPATH){
            return false;
        }
        $arrPusherClient = parse_ini_file(APPPATH . '/config/pusher_client.conf');
        return empty($arrPusherClient['include']) ? array() : $arrPusherClient['include'];
    }
    
}