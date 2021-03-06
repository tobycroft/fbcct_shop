<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace mall\library\wechat\mini;

use mall\library\wechat\chat\CommonWeChat;
use mall\library\wechat\chat\WeConfig;

class BasicWeMini extends CommonWeChat {

    public function __construct(){
        $this->config = WeConfig::get("wemini");
        $this->request = $_REQUEST;

        if(empty($this->config["appid"])){
            throw new \Exception("小程序 AppId 为空",0);
        }

        if(empty($this->config["appsecret"])){
            throw new \Exception("小程序 AppSecret 为空",0);
        }
    }

}