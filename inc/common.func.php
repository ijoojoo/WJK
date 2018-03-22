<?php
    /*判断脚本名字*/
    if(!defined('SCRIPT')){
        exit();
    }

    /**
     * 设置时区
     */
     date_default_timezone_set('Asia/Shanghai');
    /**
     * 引入数据库操作函数
     */
     require 'db.php';
    /**
     * 
     * @param unknown $str
     */
    function alert_back($str){
        echo('<script>alert("'.$str.'");history.back();</script>');
        exit();
    }
    
    function alert($str){
        echo('<script>alert("'.$str.'");</script>');
    }
    
    /**e
     * 将GB2312转换成UTF-8
     * */
    function GB2312_to_UTF8($array){
        if(is_array($array)){
            $ret_array=Array();
            foreach ($array as $index=>$str){
                $ret_str=GB2312_to_UTF8($str);
                $ret_array[$index]=$ret_str;
            }
            return $ret_array;
        }else{
            $ret_str=iconv("gb2312","utf-8//IGNORE",(string)$array);
            return $ret_str;
        }
        
    }
    
    function UTF8_to_GB2312($array){
        if(is_array($array)){
            $ret_array=Array();
            foreach ($array as $index=> $str){
                $ret_str=GB2312_to_UTF8($str);
                $ret_array[$index]=$ret_str;
            }
            return $ret_array;
        }else{
            $ret_str=iconv("utf-8","gb2312//IGNORE",(String)$array);
            return $ret_str;
        }
    
    }
    /*判断用户名密码是否正确*/
    /*
    function login($yonghuming,$mima){
        
        $return=false;
        $query_yonghuming="select count(*) num from users where yonghuming='".$yonghuming."'";
        $num_yonghuming=0;$num_mima=0;
        if(query_value($query_yonghuming,'num')>0){
            $query_mima="select count(*) num from users where yonghuming='".$yonghuming."' and mima='".$mima."'";
            if(query_value($query_mima, 'num')>0){
                $return=true;
            }else{
                alert_back('密码错误！');
            }
        }else{
            alert_back('用户名不存在！');
        }
        return $return;
    }
    */
    function is_login(){
        /*1、cookie*/
        if(isset($_COOKIE['yonghuming'])&&mb_strlen($_COOKIE['yonghuming'])!=0){
            return true;
        }
        /*2、标识码*/
        return false;
    } 
?>