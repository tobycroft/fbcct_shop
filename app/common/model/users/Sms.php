<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\users;

use app\common\model\base\Fbcct;

class Sms extends Fbcct{

    protected $name = "users_sms";

    protected $type = [
        "id"=>"integer",
        "user_id"=>"integer",
        "status"=>"integer",
        "create_time"=>"integer"
    ];

    public function setMobileAttr($value){
        return strip_tags(trim($value));
    }

    public function setCodeAttr($value){
        return strip_tags(trim($value));
    }

}