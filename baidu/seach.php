<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：人脸检测一对一
 * Date: 2018/6/4
 * Time: 16:25
 */

require_once 'baiduSDK/AipFace.php';
// 你的 APPID AK SK
const APP_ID = '11333516';
const API_KEY = 'vmPpb2yCKK7hUUEGcjF0dN51';
const SECRET_KEY = 'aCoXdqfdB2F1FxQSOT20iL6PE6dkpztt';
$scr='cut/cut_3.jpg';
$client = new AipFace(APP_ID, API_KEY, SECRET_KEY);
$image=base64_encode(file_get_contents($scr));

$imageType = "BASE64";

$groupIdList = "group1";

// 调用人脸搜索
$result=$client->search($image, $imageType, $groupIdList);
var_dump($result);
?>
<html>

<body>
<?php
	echo "<img src=".$scr.">"
?>
</body>
</html>
