<?php
// +----------------------------------------------------------------------
// | A3Mall
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace app\common\model\statistics;

use app\common\model\base\A3Mall;

class Search extends A3Mall {

    protected $name = "statistics_search";

    protected $type = [
        "id"=>"integer",
        "num"=>"integer"
    ];

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

}