<?php

namespace mall\fbcct;

use mall\Acurl\Acurl;


class Payment
{
    public static function balance($info): string
    {
        $post = [
            "address" => $info["username"],
        ];
        $data = Acurl::post("http://api.fbcct.cc:81/v1/store/user/aft_balance", $post);
        $json = json_decode($data, 1);
        if ($json["code"] == "0") {
            return $json["data"];
        } else {
            return "0";
        }
    }

    public static function pay($info, $amount)
    {
        $post = [
            "uid" => $info["email"],
            "token" => $info["password"],
            "amount" => $amount,
        ];
        $data = Acurl::post("http://api.fbcct.cc:81/v1/store/payment/buy", $post);
        $json = json_decode($data, 1);
        if ($json["code"] == "0") {
            return $json["data"];
        } else {
            return "0";
        }
    }
}