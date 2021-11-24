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

class Price extends Fbcct {

    protected $name = "promotion_price";

    protected $type = [
        "id"=>"integer",
        "goods_id"=>"integer",
        "product_id"=>"integer",
        "create_time"=>"integer"
    ];

}