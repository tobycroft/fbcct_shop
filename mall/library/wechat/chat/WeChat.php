<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\library\wechat\chat;

use think\Container;

class WeChat {

    public static function __callStatic($method, $params = []){
        $class = __NAMESPACE__ . '\\module\\' . $method;
        return Container::getInstance()->make($class, $params, true);
    }

}