<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://www.a3-mall.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\custom;

use app\common\model\base\Fbcct;

class PagesRelation extends Fbcct {

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