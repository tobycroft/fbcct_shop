<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\order;

use app\common\model\base\Fbcct;

class Log extends Fbcct{

    protected $name = "order_log";

    protected $type = [
        "id"=>"integer",
        "order_id"=>"integer",
        "create_time"=>"integer"
    ];

    public function setUsernameAttr($value){
        return strip_tags(trim($value));
    }

    public function setActionAttr($value){
        return strip_tags(trim($value));
    }

    public function setResultAttr($value){
        return strip_tags(trim($value));
    }

    public function setNoteAttr($value){
        return strip_tags(trim($value));
    }

    public function getCreateTime($value){
        return date("Y-m-d H:i:s",$value);
    }
}