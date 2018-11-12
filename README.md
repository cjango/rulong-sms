# RuLong/Sms 短信发送扩展

## 安装

```
$ composer require rulong/sms
```

## 短信发送

```
\Sms::send($mobile, $channel = 'DEFAULT');
```


## 短信验证

```
\Sms::check($mobile, $code, $channel = 'DEFAULT');
```


扩展验证规则

```
mobile  验证是否是合法的手机号
sms_check:MOBILEFIELD,CHANNEL  短信验证码验证

MOBILEFIELD：手机号码字段名称
CHANNEL：验证通道
```
