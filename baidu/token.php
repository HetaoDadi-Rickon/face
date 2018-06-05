<?php
/**
 * Created by PhpStorm.
 * User: xiaoxiaonan
 * Date: 2018/6/1
 * Time: 16:07
 * 获取百度云token
 */
function token_post($url = '', $param = '') {
	if (empty($url) || empty($param)) {
		return false;
	}

	$postUrl = $url;
	$curlPost = $param;
	$curl = curl_init();//初始化curl
	curl_setopt($curl, CURLOPT_URL,$postUrl);//抓取指定网页
	curl_setopt($curl, CURLOPT_HEADER, 0);//设置header
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);//要求结果为字符串且输出到屏幕上
	curl_setopt($curl, CURLOPT_POST, 1);//post提交方式
	curl_setopt($curl, CURLOPT_POSTFIELDS, $curlPost);
	curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, FALSE);
	curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, FALSE);
	curl_setopt($curl, CURLOPT_SSLVERSION, 1);

	$data = curl_exec($curl);//运行curl
	curl_close($curl);
	return $data;
}

function access_token(){



	$apikey="xhKkGIjkAM5HDSGVOGIMd52M";
	$secretkey="xrcbNvRSQkIcGNG2E7vzfYRKy2TClw63";

	$url = 'https://aip.baidubce.com/oauth/2.0/token';
	$post_data['grant_type']       = 'client_credentials';
	$post_data['client_id']      = $apikey;
	$post_data['client_secret'] = $secretkey;
	$o = "";
	foreach ( $post_data as $k => $v )
	{
		$o.= "$k=" . urlencode( $v ). "&" ;
	}
	$post_data = substr($o,0,-1);

	$res = token_post($url, $post_data);

	$arr=json_decode($res,true);
	if (isset($arr['access_token']) && isset($arr['expires_in'])) {
		$data['access_token']=$arr['access_token'];
		$data['totime']=time()+$arr['expires_in']-3600;

//		file_put_contents($file, json_encode($data));
		return $arr['access_token'];
	}else{
		return false;
	}

//	var_dump($res);
}
