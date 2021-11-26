<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\promotion;

use app\common\model\base\A3Mall;

class PriceItem extends Fbcct {

    protected $name = "promotion_price_item";

    protected $type = [
        "id"=>"integer",
        "pid"=>"integer",
        "group_id"=>"integer",
        "price"=>"float",
    ];
}