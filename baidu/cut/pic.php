
<?php
/**
 * Created by PhpStorm.
 * Author: xiaoxiaonan
 * description：
 * Date: 2018/6/4
 * Time: 10:19
 */

function pic_gd($src,$x,$y,$height,$width,$n){
//	echo "test";
	$src_path=$src;
	$save_path="cut_".$n.".jpg";//裁剪后新图象的路径
	$y=$y;
	$x=$x;
	$width=$width;
	$height=$height;
	$final_width=$width;
	$final_height = round($final_width * $height / $width);
	$src_img=imagecreatefromstring(file_get_contents($src_path));
	$new_img=imagecreatetruecolor($width,$height);
	imagecopyresampled($new_img, $src_img, 0, 0, $x, $y, $final_width, $final_height, $width, $height);
//	header('Content-Type: image/jpeg');//设置输出内容类型格式
	imagejpeg($new_img,$save_path);
	imagedestroy($src_img);
	imagedestroy($new_img);
	return $save_path;

}

