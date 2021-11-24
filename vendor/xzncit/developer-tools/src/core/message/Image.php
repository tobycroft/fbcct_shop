<?php
// +----------------------------------------------------------------------
// | A3Mall
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace xzncit\core\message;


class Image extends Message {

    protected $attribute = [
        "MsgType"      => "image",
        "CreateTime"   => "",
        "ToUserName"   => "",
        "FromUserName" => "",
        "Image"        => [],
    ];

    /**
     * Image constructor.
     * @param string $mediaId
     */
    public function __construct(string $mediaId=""){
        $this->setAttribute([
            "CreateTime"    =>  time(),
            "Image"         =>  ['MediaId' => $mediaId]
        ]);
    }

}