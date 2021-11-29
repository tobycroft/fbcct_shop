<?php

namespace mall\Aoss;

class Aoss
{
    public static $send_url = "http://upload.tuuz.cc:81/upfull?token=fbcct";

    public function send($real_path, $mime_type)
    {
        return self::send_file($real_path, $mime_type);
    }

    public static function send_file($real_path, $mime_type)
    {
        $postData = [
            'file' => new \CURLFile(realpath($real_path), $mime_type)
        ];
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, self::$send_url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);
        $response = curl_exec($ch);
        curl_close($ch);
        $json = json_decode($response, true);
        if ($json["code"] == "0") {
            return $json["data"];
        } else {
            return false;
        }
    }
}