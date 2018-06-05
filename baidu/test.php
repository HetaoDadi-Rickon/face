<?php
/**
 * Created by PhpStorm.
 * User: 23168
 * Date: 2018/6/1
 * Time: 16:50
 * 百度人脸识别测试
 */
require_once 'token.php';
require_once 'inc/function.php';
$token = access_token();
$url = 'https://aip.baidubce.com/rest/2.0/face/v3/detect?access_token=' . $token;
$header=array(
	'1'=>'application/x-www-form-urlencoded'
);
$post_data = array(
	'form_id'=>$form_id
);
$result = httpRequest($url,$header,$post_data);
$result = json_decode($result,true);
var_dump($result);
//echo access_token();

//$bodys = "{\"image\":\"027d8308a2ec665acb1bdf63e513bcb9\",\"image_type\":\"FACE_TOKEN\",\"face_field\":\"faceshape,facetype\"}";
//$res = request_post($url, $bodys);

var_dump($res);