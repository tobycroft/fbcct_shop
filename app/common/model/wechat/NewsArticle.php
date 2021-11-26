<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\wechat;

use app\common\model\base\A3Mall;
use mall\utils\Tool;

class NewsArticle extends Fbcct {

    protected $name = "wechat_news_article";

    protected $type = [
        "id"=>"integer",
        "show_cover_pic"=>"integer",
        "visit"=>"integer",
        "create_time"=>"integer"
    ];

    public function setTitleAttr($value){
        return strip_tags(trim($value));
    }

    public function setLocalUrlAttr($value){
        return strip_tags(trim($value));
    }

    public function setAuthorAttr($value){
        return strip_tags(trim($value));
    }

    public function setDigestAttr($value){
        return strip_tags(trim($value));
    }

    public function setContentAttr($value){
        return Tool::editor($value);
    }

    public function setContentSourceUrlAttr($value){
        return strip_tags(trim($value));
    }

}