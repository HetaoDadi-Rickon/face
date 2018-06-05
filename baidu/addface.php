<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：向百度人脸库中注册人脸
 * Date: 2018/6/4
 * Time: 14:45
 */
require_once 'baiduSDK/AipFace.php';

// 你的 APPID AK SK
const APP_ID = '11333516';
const API_KEY = 'vmPpb2yCKK7hUUEGcjF0dN51';
const SECRET_KEY = 'aCoXdqfdB2F1FxQSOT20iL6PE6dkpztt';
$scr='pic/4e8ee8a10f0f44728ff375a56514d050.jpeg';
$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

$image = base64_encode(file_get_contents('pic/4e8ee8a10f0f44728ff375a56514d050.jpeg'));
$imageType = "BASE64";
$groupId = "group1";
$userId = "obm";
$options=[];
$options["user_info"] = "奥巴马";
// 调用人脸注册
$result=$client->addUser($image, $imageType, $groupId, $userId);
var_dump($result);
