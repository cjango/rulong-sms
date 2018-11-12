<?php

namespace RuLong\Sms;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider as LaravelServiceProvider;

class ServiceProvider extends LaravelServiceProvider
{

    /**
     * 部署时加载
     * @Author:<C.Jason>
     * @Date:2018-06-22T16:01:20+0800
     * @return [type] [description]
     */
    public function boot()
    {
        if ($this->app->runningInConsole()) {
            $this->publishes([__DIR__ . '/../config/rulong_sms.php' => config_path('rulong_sms.php')]);
            $this->loadMigrationsFrom(__DIR__ . '/../database/migrations/');
        }

        /**
         * 短信验证码验证
         */
        Validator::extend('sms_check', function ($attribute, $code, $parameters) {
            if (empty($code)) {
                return false;
            }
            $mobileFiled = $parameters[0] ?? 'mobile';
            $channel     = $parameters[1] ?? 'DEFAULT';
            $mobile      = request()->input($mobileFiled);
            return \Sms::check($mobile, $code, $channel);
        });

        /**
         * 手机号验证
         */
        Validator::extend('mobile', function ($attribute, $mobile, $parameters) {
            if (preg_match("/^1[3578]{1}[0-9]{9}$|14[57]{1}[0-9]{8}$|^[0][9]\d{8}$/", $mobile)) {
                return true;
            } else {
                return false;
            }
        });
    }

    /**
     * 注册服务提供者
     * @Author:<C.Jason>
     * @Date:2018-06-22T16:01:12+0800
     * @return [type] [description]
     */
    public function register()
    {
        $this->mergeConfigFrom(__DIR__ . '/../config/rulong_sms.php', 'rulong_sms');
    }
}
