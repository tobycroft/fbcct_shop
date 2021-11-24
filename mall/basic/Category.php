<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\basic;

use think\facade\Db;

class Category {

    public static function getCategoryChildren($id,$table="category",$res=[]){
        $row = Db::name($table)->where(array("pid"=>$id))->select()->toArray();
        foreach($row as $val){
            $res[] = $val;
            $res = array_merge($res,self::getCategoryChildren($val["id"],$table));
        }

        return $res;
    }

}