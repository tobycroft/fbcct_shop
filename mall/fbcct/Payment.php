<?php

namespace mall\fbcct;


class Payment
{
    public static function balance($info)
    {
        $post = [
            "address" => $info["username"],
        ];
        $data = \mall\Acurl\Acurl::post("http://api.fbcct.cc:81/v1/store/user/aft_balance", $post);
        $json = json_decode($data, 1);
        if ($json["code"] == "0") {
            return $json["data"];
        } else {
            return "0";
        }
    }
}