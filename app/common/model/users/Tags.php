<?php
// +----------------------------------------------------------------------
// | A3Mall
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\users;

use app\common\model\base\A3Mall;

class Tags extends A3Mall {

    protected $name = "users_tags";

    protected $type = [
        "id"=>"integer",
        "create_time"=>"integer"
    ];

    public function getList($condition=[],$size=10){
        $count = $this->where($condition)->count();
        $list = $this->where($condition)->order("id","DESC")->paginate($size);

        return [
            "count"=>$count,
            "data"=>$list->items()
        ];
    }

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

    public function setIntroAttr($value){
        return strip_tags(trim($value));
    }

}