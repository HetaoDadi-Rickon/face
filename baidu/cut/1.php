<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：
 * Date: 2018/6/4
 * Time: 10:07
 */
require_once '../baiduSDK/AipFace.php';
require_once 'pic.php';
// 你的 APPID AK SK
const APP_ID = '11333516';
const API_KEY = 'vmPpb2yCKK7hUUEGcjF0dN51';
const SECRET_KEY = 'aCoXdqfdB2F1FxQSOT20iL6PE6dkpztt';



function baidu_detect($scr){
	$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
	$scr=$scr;
	$img=base64_encode(file_get_contents($scr));
	$option=[];
	$option['max_face_num']=10;
	$result=$client->detect($img,'BASE64',$option);
	$de_result=array();
	foreach ($result['result']['face_list'] as $k=>$v){
		$x=$v['location']['left'];
		$y=$v['location']['top'];
		$height=$v['location']['height']*1.1;
		$width=$v['location']['width']*1.1;
		$image1= pic_gd($scr,$x,$y,$height,$width,$k);
//		echo "<img src=".$image1.">";
		$image=base64_encode(file_get_contents($image1));
		$imageType = "BASE64";
		$groupIdList = "group1";
		$result=$client->search($image, $imageType, $groupIdList);
        $user=$result['result']['user_list'][0];
		$de_result[$k]['image']=$image1;
		$de_result[$k]['user']=$user;
	}
    return $de_result;
}
//var_dump(baidu_detect('../pic/1505271003092546-600x400.jpg'));
?>
