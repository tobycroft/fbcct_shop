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