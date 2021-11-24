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

class GoodsModel extends Fbcct {

    protected $type = [
        "id"=>"integer",
        "goods_id"=>"integer",
        "attribute_id"=>"integer",
        "model_id"=>"integer",
        "sort"=>"integer"
    ];

    public function setAttributeValueAttr($value){
        return strip_tags(trim($value));
    }
}