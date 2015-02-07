<?php header ( "Content-Type: application/json; charset=utf8" );?>
<?php include_once 'utils/cal_sign.php';?>
<?php

$params = $_REQUEST;

/*
 * 按照亦云视频平台的需求，增加必要的参数。
 */
$time = time () * 1000; // 亦云视频平台需要的是毫秒，time()函数返回的是秒
$params ["time"] = $time;
$params ["accessKey"] = OC_ACCESS_KEY;

$sign = cal_sign ( $params );

$result = array (
		"sign" => $sign,
		"accessKey" => OC_ACCESS_KEY,
		"time" => $time 
);

echo json_encode ( $result );
?>