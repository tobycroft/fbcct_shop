<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\products;

use app\common\model\base\A3Mall;


class ModelData extends Fbcct {

    protected $name = "products_model_data";

    protected $type = [
        "id"=>"integer",
        "pid"=>"integer",
        "type"=>"integer",
        "sort"=>"integer"
    ];

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

    public function setValueAttr($value){
        return strip_tags(trim($value));
    }

}