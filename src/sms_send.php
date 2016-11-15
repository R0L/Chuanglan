<?php

namespace ROL\Chuanglan;
use ROL\Chuanglan\ChuanglanSmsHelper\ChuanglanSmsApi;
use ROL\Chuanglan\ChuanglanSmsHelper\ChuanglanVoiceApi;
Class ChuanglanSMS{

  private $appName = null;

  function __construct( $appName = null ){
      $this->appName = $appName;
  }

  function send_sms($phone,$code){
    $clapi  = new ChuanglanSmsApi();
    $result = $clapi->sendSMS("{$phone}", "【{$this->appName}】您好，您的验证码是{$code}","false");
    $result = $clapi->execResult($result);
    if(isset($result[1]) && $result[1]==0){
      echo '{"status":true,"info":"发送成功"}';
    }else{
      echo '{"status":false,"info":"发送失败'.$result[1].'"}';
    }
  }


  function send_voice($phone,$code){
    $clapi  = new ChuanglanVoiceApi();
    $result = $clapi->sendSMS("{$phone}", "【{$this->appName}】您好，您的验证码是{$code}","false");
    $result = $clapi->execResult($result);
    if(isset($result[1]) && $result[1]==0){
      echo '{"status":true,"info":"发送成功"}';
    }else{
      echo '{"status":false,"info":"发送失败'.$result[1].'"}';
    }
  }

}



