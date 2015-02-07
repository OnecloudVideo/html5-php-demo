<?php
/**
 * 亦云视频云平台用来确定账户的参数，请访问 http://video.pispower.com 获取
 *
 * @var string 
 */
define ( 'OC_ACCESS_KEY', '' );
/**
 * 亦云视频签名算法的一个私钥，请确保其私密性，不要泄露。请访问 http://video.pispower.com 获取
 *
 * @var string
 */
define ( 'OC_ACCESS_SECRET', '' );

/**
 * 计算亦云视频云平台所需要的额外的签名参数
 *
 * @param array $params        	
 * @return string
 */
function cal_sign($params) {
	/*
	 * 对所有的参数进行排序，前后增加accessSecret获得原始字符串
	 */
	ksort ( $params );
	$oriString = OC_ACCESS_SECRET;
	foreach ( $params as $name => $val ) {
		$oriString .= ($name . $val);
	}
	$oriString .= OC_ACCESS_SECRET;
	
	/*
	 * 对原始的字符串进行加密获得签名
	 */
	return md5 ( $oriString );
}
?>