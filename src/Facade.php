<?php

namespace RuLong\Sms;

use Overtrue\EasySms\EasySms;
use RuLong\Sms\Models\Sms;

class Facades
{

    /**
     * 发送短信
     * @Author:<C.Jason>
     * @Date:2018-11-07T14:25:37+0800
     * @param string $mobile 手机号码
     * @param string $channel 验证通道
     * @return [type] [description]
     */
    public function send(string $mobile, string $channel = 'DEFAULT')
    {
        try {
            $code = rand(1, 9999999);

            $easySms = new EasySms($config);
            $easySms->send($mobile, [
                'template' => '',
                'data'     => [
                    'code' => $code,
                ],
            ]);

            Sms::create([
                'mobile'  => $mobile,
                'channel' => $channel,
                'code'    => $code,
            ]);
            return true;
        } catch (\Exception $e) {
            throw new \Exception($e->getMessage());
        }
    }

    /**
     * 验证短信
     * @Author:<C.Jason>
     * @Date:2018-11-07T14:26:38+0800
     * @param string $mobile [description]
     * @param string $code [description]
     * @param string $channel [description]
     * @return
     */
    public function check(string $mobile, string $code, string $channel = 'DEFAULT')
    {

    }
}
