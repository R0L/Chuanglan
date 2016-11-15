<?php

namespace ROL\Chuanglan;
use ROL\Chuanglan\ChuanglanSmsHelper\ChuanglanSmsApi.php;

/* *
 * 功能：创蓝查询余额DEMO
 * 版本：1.3
 * 日期：2014-07-16
 * 说明：
 */
$clapi  = new ChuanglanSmsApi();
$result = $clapi->queryBalance();
$result = $clapi->execResult($result);
if(isset($result[1]) && $result[1]){
	switch($result[1]){
		case 0:
			echo "剩余{$result[3]}条";
			break;
		case 101:
			echo '无此用户';
			break;
		case 102:
			echo '密码错';
			break;
		case 103:
			echo '查询过快';
			break;
	}
}else{
	echo "查询失败";
}