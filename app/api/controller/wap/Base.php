<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace app\api\controller\wap;

class Base {

    public function returnAjax($msg = "", $code = 1, $data = []){
        return json(["status" => $code, "info" => $msg, "data" => $data]);
    }

}