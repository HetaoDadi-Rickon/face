<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：百度人脸识别多对多接口,因为百度人脸识别应用现在已经改成v3接口，v3接口不支持多对多接口，所以暂时无法实现
 * Date: 2018/6/4
 * Time: 15:30
 */
require_once 'v2/AipFace.php';
require_once 'pic.php';
// 你的 APPID AK SK

const APP_ID = '11333516';
const API_KEY = 'vmPpb2yCKK7hUUEGcjF0dN51';
const SECRET_KEY = 'aCoXdqfdB2F1FxQSOT20iL6PE6dkpztt';

$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);

$groupId = "group1";

$image = file_get_contents('1505271003092546-600x400.jpg');

// 调用M:N 识别
$result=$client->multiIdentify($groupId, $image);
var_dump($result);
// 如果有可选参数
