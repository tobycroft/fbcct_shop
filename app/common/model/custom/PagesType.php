<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\custom;

use app\common\model\base\Fbcct;

class PagesType extends Fbcct{

    protected $type = [
        "id"=>"integer",
        "status"=>"integer"
    ];

    public function setTypeAttr($value){
        return strip_tags(trim($value));
    }

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

}