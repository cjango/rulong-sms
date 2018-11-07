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
