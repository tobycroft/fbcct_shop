<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\utils;

class Date {

    public static function format($time='',$timestamp="Y-m-d H:i:s",$default="N/A"){
        if(empty($time)) {
            return $default;
        }

        return date($timestamp,$time);
    }

}