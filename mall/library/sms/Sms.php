<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\library\sms;

use mall\library\sms\alibaba\Alibaba;
use think\facade\Db;

class Sms {

    public static function send($data = []){
        $content = Db::name("setting")->where(["name"=>"sms"])->value("value");
        $setting = json_decode($content,true);
        $Alibaba = new Alibaba($setting);
        return $Alibaba->send($data);
    }



}