<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\basic;

class Goods {

    public static function goods_number($number = '', $date = 'YmdHis') {
        $arr = explode(" ", microtime());
        $usec = substr(str_replace('0.', '', $arr[0]), 0, 2) . rand(10, 99);
        return $number . date($date) . $usec;
    }

}