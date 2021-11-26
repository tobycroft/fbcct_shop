<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace app\common\model\users;

use app\common\model\base\Fbcct;

class Group extends Fbcct{

    protected $name = "users_group";

    protected $type = [
        "id"=>"integer",
        "discount"=>"float",
        "minexp"=>"integer",
        "maxexp"=>"integer"
    ];

    public function getList($condition=[],$size=10){
        $count = $this->where($condition)->count();
        $data = $this->where($condition)->paginate($size);

        return [
            "count"=>$count,
            "data"=>$data->items()
        ];
    }

    public function setNameAttr($value){
        return strip_tags(trim($value));
    }

}