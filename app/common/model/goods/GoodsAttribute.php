<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://www.a3-mall.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\goods;

use app\common\model\base\Fbcct;

class GoodsAttribute extends Fbcct {

    protected $type = [
        "id"=>"integer",
        "goods_id"=>"integer",
        "attr_id"=>"integer",
        "attr_data_id"=>"integer",
    ];

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

    public function setValueAttr($value){
        return strip_tags(trim($value));
    }

    public function setThumbImageAttr($value){
        return strip_tags(trim($value));
    }

}