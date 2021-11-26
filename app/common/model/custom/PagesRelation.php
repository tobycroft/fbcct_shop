<?php
// +----------------------------------------------------------------------
// | A3Mall
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\custom;

use app\common\model\base\A3Mall;

class PagesRelation extends A3Mall {

    protected $type = [
        "id"=>"integer"
    ];

    public function setTypeAttr($value){
        return strip_tags(trim($value));
    }

    public function setCodeAttr($value){
        return strip_tags(trim($value));
    }

    public function setRelationIdAttr($value){
        return array_map("intval",explode(",",$value));
    }

}