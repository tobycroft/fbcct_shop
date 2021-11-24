<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\base;

class DataType extends Fbcct{

    protected $type = [
        "id"=>"integer",
        "type"=>"integer",
        "create_time"=>"integer"
    ];

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

    public function setSignAttr($value){
        return strip_tags(trim($value));
    }

    public function setDescriptionAttr($value){
        return strip_tags(trim($value));
    }

}