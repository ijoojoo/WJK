<?php
	/*define('ROOT_PATH',substr(dirname(__DIR__),0,strlen(dirname(__DIR__))-3));*/
	
	/**
	 * 设置时区
	 */
	date_default_timezone_set('Asia/Shanghai');
	/**
	 * 引入核心函数
	 */
	require 'common.func.php';

	/*设置全局变量*/
	global $xitongmingcheng;
	$xitongmingcheng="会员管理系统";
	global $gongsiquancheng;
	$gongsiquancheng="洛阳万家康大药房连锁有限公司";
	global $gongsijiancheng;
	$gongsijiancheng="万家康大药房";
	global $gongsidianhua;
	$gongsidianhua="0379-88888888";
	global $gongsiwangzhi;
	$gongsiwangzhi="http://www.wjkdyf.com";
	global $xitongjieshao;
	$xitongjieshao="本系统是由万家康大药房自主开发的营业助手系统，旨在帮助店员方便、快捷的管理会员；系统采用PHP+Java一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十一二三四五六七八九十";
?>