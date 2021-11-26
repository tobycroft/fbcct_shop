<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\promotion;

use app\common\model\base\Fbcct;
use mall\utils\Tool;

class Second extends Fbcct {

    protected $name = "promotion_second";

    protected $type = [
        "id"=>"integer",
        "goods_id"=>"integer",
        "sell_price"=>"float",
        "store_nums"=>"integer",
        "sum_count"=>"integer",
        "status"=>"integer",
        "sort"=>"integer",
        "start_time"=>"integer",
        "end_time"=>"integer",
        "create_time"=>"integer"
    ];

    public function setTitleAttr($value){
        return strip_tags(trim($value));
    }

    public function setContentAttr($value){
        return Tool::editor($value);
    }

    public function setThumbImageAttr($value){
        return strip_tags(trim($value));
    }

}