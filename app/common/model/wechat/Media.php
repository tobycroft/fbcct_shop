<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\wechat;

use app\common\model\base\Fbcct;

class Media extends Fbcct {

    protected $name = "wechat_media";

    protected $type = [
        "id"=>"integer",
        "create_time"=>"integer",
    ];

    public function setAppidAttr($value){
        return strip_tags(trim($value));
    }

    public function setMd5Attr($value){
        return strip_tags(trim($value));
    }

    public function setTypeAttr($value){
        return strip_tags(trim($value));
    }

    public function setMediaIdAttr($value){
        return strip_tags(trim($value));
    }

    public function setLocalUrlAttr($value){
        return strip_tags(trim($value));
    }

    public function setMediaUrlAttr($value){
        return strip_tags(trim($value));
    }

}