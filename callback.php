<?php header("Content-Type:text/html; charset=utf8")?>
<?php include_once 'utils/cal_sign.php';?>
<?php

/**
 * TODO 接受回调的页面应该同时处理转码失败时的回调，以下代码只处理了转码成功时的回调。
 */
/*
 * 计算判断是否是鸿瑞云视频回调的地址，如果没有 sign 或者 sign 不对，则认为不是，返回 "error"
 */
$signInUrl = $_REQUEST ["sign"];
if (! isset ( $signInUrl )) {
	echo "error";
	return;
}

$params = $_REQUEST;
unset ( $params ["sign"] );

$sign = cal_sign ( $params );
if ($signInUrl != $sign) {
	echo "error";
	return;
}

$videoId = $params ["videoId"];
$videoName = $params ["videoName"];
$embedCode = $params ["embedCodes"];

if ($embedCode) {
	$embedCodes = json_decode ( $embedCode, true );
}
foreach ( $embedCodes as $code ) {
	$clarity = $code ["clarity"];
	$autoScript = $code ["adaptionCode"];
	
	// write to a new php file for play.
	$fp = @fopen ( "video-$videoId-$clarity.php", "w" );
	$html = "<?php header('Content-Type:text/html; charset=utf8') ?>";
	$html .= "<!DOCTYPE html>";
	$html .= "<html>";
	$html .= "<head><title>$videoName-$clarity</title></head>";
	$html .= "<body>$autoScript</body>";
	$html .= "</html>";
	@fwrite ( $fp, $html );
	@fclose ( $fp );
}

/*
 * 按照亦云视频的要求，返回yes表明已经收到回调。
 */
echo "yes";
?>
