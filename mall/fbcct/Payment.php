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

    public static function pay($info, $amount, $order_id, $remark)
    {
        $post = [
            "uid" => $info["email"],
            "token" => $info["password"],
            "amount" => $amount,
            "order_id" => $order_id,
            "remark" => $remark,
        ];
        $data = Acurl::post("http://api.fbcct.cc:81/v1/store/payment/buy", $post);
        $json = json_decode($data, 1);
        return $json;
    }

    public static function refund($info, $order_id)
    {
        $post = [
            "uid" => $info["email"],
            "token" => $info["password"],
            "order_id" => $order_id,
        ];
        $data = Acurl::post("http://api.fbcct.cc:81/v1/store/payment/refund", $post);
        $json = json_decode($data, 1);
        return $json;
    }
}