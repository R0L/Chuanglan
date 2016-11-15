<?php
namespace ROL\Chuanglan;

use ROL\Chuanglan\ChuanglanSmsHelper\ChuanglanSmsApi;
use ROL\Chuanglan\ChuanglanSmsHelper\ChuanglanVoiceApi;

/**
 * 创蓝短信接口
 * @author ROL <2080775740@qq.com>
 */
Class ChuanglanSMS {

    //签名
    private $appName = null;

    /**
     * 初始化
     * @param type $appName
     */
    function __construct($appName = null) {
        $this->appName = $appName;
    }

    /**
     * 设置签名
     * @param type $appName
     */
    public function setAppName($appName) {
        $this->appName = $appName;
    }

    /**
     * 发送文本短信消息
     * @param type $phone 电话号码
     * @param type $code 短信验证码
     */
    public function sendSms($phone, $code) {
        $clapi = new ChuanglanSmsApi();
        $result = $clapi->sendSMS("{$phone}", "【{$this->appName}】您好，您的验证码是{$code}", "false");
        $result = $clapi->execResult($result);
        if (isset($result[1]) && $result[1] == 0) {
            echo '{"status":true,"info":"发送成功"}';
        } else {
            echo '{"status":false,"info":"发送失败' . $result[1] . '"}';
        }
    }

    /**
     * 发送语音短信消息
     * @param type $phone 电话号码
     * @param type $code 短信验证码
     */
    public function sendVoice($phone, $code) {
        $clapi = new ChuanglanVoiceApi();
        $result = $clapi->sendSMS("{$phone}", "【{$this->appName}】您好，您的验证码是{$code}", "false");
        $result = $clapi->execResult($result);
        if (isset($result[1]) && $result[1] == 0) {
            echo '{"status":true,"info":"发送成功"}';
        } else {
            echo '{"status":false,"info":"发送失败' . $result[1] . '"}';
        }
    }

    /**
     * 文本短信消息查询
     */
    public function querySms() {
        $clapi = new ChuanglanSmsApi();
        $result = $clapi->execResult($clapi->queryBalance());
        if (isset($result[1]) && $result[1]) {
            switch ($result[1]) {
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
        } else {
            echo "查询失败";
        }
    }

    /**
     * 语音短信消息查询
     */
    public function queryVoice() {
        $clapi = new ChuanglanVoiceApi();
        $result = $clapi->execResult($clapi->queryBalance());
        if (isset($result[1]) && $result[1]) {
            switch ($result[1]) {
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
        } else {
            echo "查询失败";
        }
    }

}
