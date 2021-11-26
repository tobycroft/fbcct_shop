<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\order;

use app\common\model\base\A3Mall;

class Goods extends Fbcct {

    protected $name = "order_goods";

    protected $type = [
        "id"=>"integer",
        "order_id"=>"integer",
        "goods_id"=>"integer",
        "product_id"=>"integer",
        "real_price"=>"float",
        "goods_nums"=>"integer",
        "goods_weight"=>"float",
        "market_price"=>"float",
        "sell_price"=>"float",
        "cost_price"=>"float",
        "is_send"=>"int",
        "distribution_id"=>"int"
    ];

    public function setSpecKeyAttr($value){
        return strip_tags(trim($value));
    }

    public function setGoodsNoAttr($value){
        return strip_tags(trim($value));
    }

    public function setThumbImageAttr($value){
        return strip_tags(trim($value));
    }

    public function setGoodsArrayAttr($value){
        return strip_tags(trim($value));
    }

}