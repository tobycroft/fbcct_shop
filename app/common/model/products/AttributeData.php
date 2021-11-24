<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://www.a3-mall.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\products;

use app\common\model\base\Fbcct;


class AttributeData extends Fbcct {

    protected $name = "products_attribute_data";

    protected $type = [
        "id"=>"integer",
        "pid"=>"integer",
        "sort"=>"integer"
    ];

    public function setValueAttr($value){
        return strip_tags(trim($value));
    }
}