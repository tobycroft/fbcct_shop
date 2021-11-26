<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\system;

use app\common\model\base\A3Mall;

class Purview extends Fbcct {

    protected $name = "system_purview";

    protected $type = [
        "id"=>"integer",
        "pid"=>"integer",
        "status"=>"integer"
    ];

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

    public function setModuleAttr($value){
        return strip_tags(trim($value));
    }

    public function setControllerAttr($value){
        return strip_tags(trim($value));
    }

    public function setMethodAttr($value){
        return strip_tags(trim($value));
    }

    public function setParamAttr($value){
        return strip_tags(trim($value));
    }

}