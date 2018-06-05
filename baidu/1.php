<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：
 * Date: 2018/6/4
 * Time: 10:07
 */
require_once 'baiduSDK/AipFace.php';
require_once 'cut/pic.php';
// 你的 APPID AK SK
const APP_ID = '11333516';
const API_KEY = 'vmPpb2yCKK7hUUEGcjF0dN51';
const SECRET_KEY = 'aCoXdqfdB2F1FxQSOT20iL6PE6dkpztt';
$scr='pic/Jim_Webb_Rally.jpg';
//$scr='https://upload.wikimedia.org/wikipedia/commons/thumb/1/17/Jim_Webb_Rally.jpg/300px-Jim_Webb_Rally.jpg';
$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
$img=base64_encode(file_get_contents($scr));
$option=[];
$option['max_face_num']=10;
$result=$client->detect($img,'BASE64',$option);
var_dump($result['result']);
foreach ($result['result']['face_list'] as $k=>$v){
	var_dump($v['location']);
	$x=$v['location']['left'];
	$y=$v['location']['top'];
	$height=$v['location']['height'];
	$width=$v['location']['width'];
	pic_gd($scr,$x,$y,$height,$width,$k);
}
