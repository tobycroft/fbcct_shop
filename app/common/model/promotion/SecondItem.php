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

class SecondItem extends Fbcct {

    protected $name = "promotion_second_item";
    
    protected $type = [
        "id"=>"integer",
        "pid"=>"integer",
        "store_nums"=>"integer",
        "market_price"=>"float",
        "sell_price"=>"float",
        "cost_price"=>"float",
    ];

    public function setSpecKeyAttr($value){
        return strip_tags($value);
    }

}