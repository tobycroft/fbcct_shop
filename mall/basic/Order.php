<?php
// +----------------------------------------------------------------------
// | Fbcct
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------
namespace mall\basic;

use mall\utils\CString;
use think\facade\Db;
use think\facade\Request;
use think\facade\Session;

class Order
{

    public static function create($data = [])
    {
        Db::startTrans();
        try {
            Db::name("order")->insert([
                "activity_id" => isset($data["activity_id"]) ? $data["activity_id"] : 0,
                "shipping_type" => isset($data["shipping_type"]) ? $data["shipping_type"] : 1,
                "store_id" => isset($data["store_id"]) ? $data["store_id"] : 0,
                "type" => $data['type'],
                "user_id" => Users::get("id"),
                "order_no" => self::orderNo(),
                "pay_type" => $data['payment']["id"],
                "distribution_id" => 0,
                "accept_name" => isset($data["address"]["accept_name"]) ? $data["address"]["accept_name"] : "",
                "zip" => isset($data["address"]["zip"]) ? $data["address"]["zip"] : "",
                "mobile" => isset($data["address"]["mobile"]) ? $data["address"]["mobile"] : "",
                "phone" => isset($data["address"]["phone"]) ? $data["address"]["phone"] : "",
                "province" => isset($data["address"]["province"]) ? $data["address"]["province"] : "",
                "city" => isset($data["address"]["city"]) ? $data["address"]["city"] : "",
                "area" => isset($data["address"]["area"]) ? $data["address"]["area"] : "",
                "address" => isset($data["address"]["address"]) ? $data["address"]["address"] : "",
                "message" => $data["remarks"],
                "promotions" => isset($data["promotions"]) ? $data["promotions"] : 0,
                "discount" => isset($data["discount"]) ? $data["discount"] : 0,
                "real_freight" => $data["real_freight"],
                "payable_freight" => $data["payable_freight"],
                "real_amount" => $data["real_amount"],
                "real_point" => isset($data["real_point"]) ? $data["real_point"] : 0,
                "order_amount" => $data["order_amount"],
                "payable_amount" => $data["payable_amount"],
                "shipping_code" => isset($data["shipping_type"]) && $data["shipping_type"] == 2 ? Store::getUniqueCode() : "",
                "exp" => $data["exp"],
                "point" => $data["point"],
                "source" => $data["source"],
                "create_time" => time()
            ]);

            $order_id = Db::name("order")->getLastInsID();
            foreach ($data["item"] as $val) {
                $val["order_id"] = $order_id;
                $val["thumb_image"] = str_replace(Request::domain(), "", $val["thumb_image"]);
                $val["goods_array"] = json_encode([
                    "title" => $val["title"],
                    "spec" => !empty($val["goods_array"]) ? implode(", ", array_map(function ($res) {
                        return $res["name"] . '???' . $res['value'];
                    }, $val["goods_array"])) : ""
                ], JSON_UNESCAPED_UNICODE);
                Db::name("order_goods")->strict(false)->insert($val);
            }

            Db::commit();
        } catch (\Exception $ex) {
            Db::rollback();
            throw new \Exception("????????????????????????????????????" . $ex->getMessage(), 0);
        }

        return $order_id;
    }

    /**
     * ?????????????????????????????????
     */
    public static function payment($order_no, $admin_id = 0, $note = "", $trade_no = "")
    {
        if (($order = Db::name("order")->where(["order_no" => $order_no])->find()) == false) {
            throw new \Exception("?????????????????????????????????", 0);
        }

        if ($order["pay_status"] == 1) {
            throw new \Exception("??????????????????????????????", 0);
        }

        if (Db::name("order")->where(["order_no" => $order_no])->update([
                "status" => ($order['status'] == 5) ? 5 : 2,
                "pay_time" => time(),
                "pay_status" => 1,
                "note" => $note,
                "trade_no" => $trade_no,
                "admin_id" => $admin_id
            ]) == false) {
            throw new \Exception("?????????????????????????????????", 0);
        }

        //???????????????
        Db::name('order_collection')->insert([
            'order_id' => $order['id'],
            'user_id' => $order['user_id'],
            'amount' => $order['order_amount'],
            'create_time' => time(),
            'payment_id' => $order['pay_type'],
            'pay_status' => 1,
            'is_delete' => 0,
            'note' => $note,
            'admin_id' => $admin_id ? $admin_id : 0
        ]);

        $orderGoodsList = Db::name("order_goods")->where(['order_id' => $order['id']])->select()->toArray();
        //???????????????
        if ($order['pay_type'] != 0) {
            foreach ($orderGoodsList as $val) {
                self::updateStock([
                    "goods_id" => $val["goods_id"],
                    "product_id" => $val["product_id"],
                    "goods_nums" => $val["goods_nums"]
                ], "-");

                Db::name("goods")->where('id', $val["goods_id"])->update([
                    "sale" => Db::raw("sale+1")
                ]);
            }
        }

        // ??????????????????????????????
        if ($order["shipping_type"] == 2) {
            foreach ($orderGoodsList as $val) {
                Db::name("order_goods")->where(["id" => $val["id"]])->update([
                    "is_send" => 1,
                    "distribution_id" => 0
                ]);
            }

            //??????????????????
            Db::name('order')->where(['id' => $order['id']])->update([
                'distribution_status' => 1,
                'send_time' => time()
            ]);

            Db::name("order_log")->insert([
                'order_id' => $order['id'],
                'username' => "system",
                'action' => '??????',
                'result' => '??????',
                'note' => '?????????' . $order["order_no"] . '?????? system ??????',
                'create_time' => time()
            ]);
        }

        $user = Db::name("wechat_users")->where("user_id", $order["user_id"])->find();
        if (!empty($user["mp_openid"])) {
            Subscribe::orderPaySuccess($user["mp_openid"], $order["id"]);
        }

        return true;
    }

    /**
     * ????????????
     */
    public static function complete($order_no, $admin_id = 0)
    {
        if (($order = Db::name("order")->where(["order_no" => $order_no])->find()) == false) {
            throw new \Exception("???????????????????????????????????????????????????", 0);
        }

        $json = \mall\fbcct\Payment::done(Users::info(Users::get("id")), $order_no);
        if ($json["code"] != "0") {
            throw new \Exception($json["echo"], 0);
        }


        if (($users = Db::name("users")->where(array("id" => $order["user_id"]))->find()) != false) {

            if ($order['exp'] > 0) {
                $log = '???????????????????????????' . $order['order_no'] . '????????????,????????????' . $order['exp'];
                Db::name("users")->where(["id" => $order["user_id"]])->inc("exp", $order['exp'])->update();
                Db::name("users_log")->insert([
                    "order_no" => $order_no,
                    "user_id" => $order["user_id"],
                    "admin_id" => $admin_id ? $admin_id : 0,
                    "action" => 2,
                    "operation" => 0,
                    "exp" => $order['exp'],
                    "description" => $log,
                    "create_time" => time()
                ]);
            }

            if ($order['point'] > 0) {
                $log = '???????????????????????????' . $order['order_no'] . '????????????,????????????' . $order['point'];
                Db::name("users")->where(["id" => $order["user_id"]])->inc("point", $order['point'])->update();
                Db::name("users_log")->insert([
                    "order_no" => $order_no,
                    "user_id" => $order["user_id"],
                    "admin_id" => $admin_id ? $admin_id : 0,
                    "action" => 1,
                    "operation" => 0,
                    "point" => $order['point'],
                    "description" => $log,
                    "create_time" => time()
                ]);
            }

        }

        //?????????????????????????????????
        $orderList = Db::name("order_goods")->where(['order_id' => $order["id"]])->group('goods_id')->select()->toArray();

        $orderData = [
            "point" => 0,
            "describes" => 0,
            "service" => 0,
            "logistics" => 0,
        ];

        if ($order["status"] == 5) {
            $orderData["point"] = 5;
            $orderData["describes"] = 5;
            $orderData["service"] = 5;
            $orderData["logistics"] = 5;
            $orderData["comment_time"] = time();
        }

        //?????????????????????????????????
        foreach ($orderList as $val) {
            if (Db::name("goods")->where(['id' => $val['goods_id']])->find()) {
                Db::name("users_comment")->insert(array_merge($orderData, [
                    'goods_id' => $val['goods_id'],
                    'order_no' => $order['order_no'],
                    'user_id' => $order['user_id'],
                    'create_time' => time()
                ]));
            }
        }

        self::updateOrderGroupStatus($order, 2);

        $user = Db::name("wechat_users")->where("user_id", $order["user_id"])->find();
        if (!empty($user["mp_openid"])) {
            Subscribe::orderComplete($user["mp_openid"], $order["id"]);
        }


        return true;
    }

    public static function updateOrderGroupStatus($order, $status, $refundStatus = 0)
    {
        if ($order["type"] != 5) {
            return false;
        }

        $condition = ["order_id" => $order["id"], "user_id" => $order["user_id"], "status" => 1, "is_refund" => 0];
        if ($order["type"] == 5 && Db::name("order_group")->where($condition)->count()) {
            return Db::name("order_group")->where($condition)->update([
                "is_refund" => $refundStatus, "status" => $status, "complete_time" => time()
            ]);
        }

        return false;
    }

    public static function sendDistributionGoods($order_id, $order_goods_id, $admin_id)
    {
        if ($order_id <= 0) {
            throw new \Exception("???????????????", 0);
        }

        if (empty($order_goods_id)) {
            throw new \Exception("???????????????????????????", 0);
        }

        $distribution_code = Request::post('distribution_code', "", "trim,strip_tags");

        $freight_id = Request::post('freight_id', 0, "intval");
        if (empty($distribution_code)) {
            throw new \Exception("?????????????????????", 0);
        }

        if (empty($freight_id)) {
            throw new \Exception("?????????????????????", 0);
        }

        $refund = Db::name('order_refundment')->where([
            "order_id" => $order_id, "pay_status" => 0, "is_delete" => 0
        ])->find();
        if (!empty($refund)) {
            throw new \Exception("????????????????????????????????????", 0);
        }

        $order = Db::name("order")->where(["id" => $order_id])->find();

        if (empty($order)) {
            throw new \Exception("?????????????????????", 0);
        }

        $data = [
            'order_id' => $order_id,
            'user_id' => $order["user_id"],
            'name' => Request::post('accept_name', '', 'trim,strip_tags'),
            'zip' => Request::post('zip', '', 'intval'),
            'phone' => Request::post('phone', '', 'intval'),
            'province' => Request::post('province', '', 'intval'),
            'city' => Request::post('city', '', 'intval'),
            'area' => Request::post('area', '', 'intval'),
            'address' => Request::post('address', '', 'trim,strip_tags'),
            'mobile' => Request::post('mobile', '', 'trim,strip_tags'),
            'freight' => $order["real_freight"],
            'distribution_code' => $distribution_code,
            'distribution_id' => $order["distribution_id"],
            'note' => Request::post('remarks', '', 'trim,strip_tags'),
            'create_time' => time(),
            'freight_id' => $freight_id
        ];

        $data['admin_id'] = $admin_id;

        $delivery_id = Db::name('order_delivery')->insert($data, true);

        $admin = Db::name("system_users")->where(["id" => $admin_id])->find();

        if ($order['pay_type'] == 0) {
            //???????????????
            $orderGoodsList = Db::name("order_goods")->where("id", "in", $order_goods_id)->select()->toArray();
            foreach ($orderGoodsList as $val) {
                self::updateStock([
                    "goods_id" => $val["goods_id"],
                    "product_id" => $val["product_id"],
                    "goods_nums" => $val["goods_nums"]
                ], "-");
            }
        }

        //??????????????????
        $orderGoods = Db::name("order_goods")->field('count(*) as num')->where([
            "is_send" => 0, "order_id" => $order_id
        ])->find();

        $sendStatus = 2; //????????????
        if (count($order_goods_id) >= $orderGoods['num']) {
            $sendStatus = 1; //????????????
        }

        foreach ($order_goods_id as $val) {
            Db::name("order_goods")->where(["id" => $val])->update([
                "is_send" => 1,
                "distribution_id" => $delivery_id
            ]);
        }

        //??????????????????
        Db::name('order')->where(['id' => $order_id])->update([
            'distribution_status' => $sendStatus,
            'send_time' => time()
        ]);

        Db::name("order_log")->insert([
            'order_id' => $order_id,
            'username' => $admin["username"],
            'action' => '??????',
            'result' => '??????',
            'note' => '?????????' . $order["order_no"] . '?????????????????????' . $admin["username"] . '??????',
            'create_time' => time()
        ]);

        $user = Db::name("wechat_users")->where("user_id", $order["user_id"])->find();
        if (!empty($user["mp_openid"])) {
            Subscribe::deliveryNotice($user["mp_openid"], $delivery_id);
        }

        try {
            Sms::send(
                ["mobile" => $order["mobile"], "order_no" => $order["order_no"]],
                "deliver_goods"
            );
        } catch (\Exception $e) {
        }

        return true;
    }

    public static function refund($refunds_id, $admin_id = 0)
    {
        $refunds = Db::name("order_refundment")->where(["id" => $refunds_id])->find();

        $orderGoodsList = Db::name("order_goods")->where("id", "in", $refunds['order_goods_id'])->where("is_send", "<>", "2")->select()->toArray();
        if (!$orderGoodsList) {
            throw new \Exception("?????????????????????????????????????????????", 0);
        }

        //???????????????????????????
        $autoMount = 0;
        $orderRow = [
            'exp' => 0,
            'point' => 0,
            'order_no' => $refunds['order_no']
        ];

        foreach ($orderGoodsList as $val) {
            $autoMount += $val['goods_nums'] * $val['real_price'];

            //????????????
            self::updateStock(["goods_id" => $val["goods_id"], "product_id" => $val["product_id"], "goods_nums" => $val["goods_nums"]], '+');

            //??????????????????
            Db::name("order_goods")->where('id', $val['id'])->update(['is_send' => 2]);

            //????????????,??????
            $goodsRow = Db::name("goods")->where('id', $val['goods_id'])->find();
            $orderRow['exp'] += $goodsRow['exp'] * $val['goods_nums'];
            $orderRow['point'] += $goodsRow['point'] * $val['goods_nums'];
        }

        //????????????????????????????????????????????????????????????????????????????????????
        $amount = $refunds['amount'] > 0 ? $refunds['amount'] : $autoMount;

        //??????order?????????,?????????????????????????????????????????????????????????????????????????????????????????????????????????
        $isSendData = Db::name("order_goods")->where('order_id', $refunds['order_id'])->where('is_send', '<>', '2')->find();
        $orderStatus = 6; //????????????
        if ($isSendData) {
            $orderStatus = 7; //????????????
        }

        Db::name("order")->where(["id" => $refunds['order_id']])->update(['status' => $orderStatus]);

        $order = Db::name("order")->where('id', $refunds['order_id'])->find();
        if ($orderStatus == 6) {
            //?????????????????????????????????????????????????????????????????????
            $isDeliveryData = Db::name("order_goods")->where('order_id', $refunds['order_id'])->where('distribution_id', '>', '0')->find();
            if (!$isDeliveryData) {
                $amount += $order['real_freight'] + $order['insured'] + $order['taxes'];
            }
        }

        $out_refund_no = self::orderNo();
        //???????????????
        Db::name("order_refundment")->where(["id" => $refunds_id])->update([
            'out_refund_no' => $out_refund_no,
            'amount' => $amount,
            'pay_status' => 2,
            'dispose_time' => time()
        ]);

        $admin = Db::name("system_users")->where(["id" => $refunds["admin_id"]])->find();

        if ($refunds["type"] == 0) {
            Db::name("users")->where(["id" => $order["user_id"]])->inc("amount", $amount)->update();
            Db::name("users_log")->insert([
                "order_no" => $order["order_no"],
                "user_id" => $order["user_id"],
                "admin_id" => Session::get("system_user_id"),
                "action" => 3,
                "operation" => 1,
                "amount" => $amount,
                "description" => '??????????????????' . $refunds['order_no'] . '????????????,???????????? -???' . $amount,
                "create_time" => time()
            ]);
        } else if ($refunds["type"] == 1) {
            $payment = Db::name("payment")->where("id", $order["pay_type"])->find();
            switch ($payment["code"]) {
                case "wechat":
                case "wechat-h5":
                case "wechat-app":
                case "wechat-qrcode":
                    $refund = new \mall\library\wechat\chat\payment\Refund();
                    $refund->create([
                        "transaction_id" => $order['trade_no'],
                        "out_trade_no" => $order["order_no"],
                        "out_refund_no" => $out_refund_no,
                        "total_fee" => $order["order_amount"] * 100,
                        "refund_fee" => $amount * 100
                    ]);
                    break;
            }
        }

        if ($orderRow['exp'] > 0) {
            //?????????????????????
            $users = Db::name("users")->where(["id" => $refunds["user_id"]])->find();

            $exp = $users['exp'] - $orderRow['exp'];
            if ($exp > 0) {
                Db::name("users")->where(["id" => $refunds["user_id"]])->update([
                    'exp' => $exp <= 0 ? 0 : $exp
                ]);
            }

            $log = '??????????????????' . $refunds['order_no'] . '????????????,???????????? -' . $orderRow['exp'];
            Db::name("users_log")->insert([
                "order_no" => $order["order_no"],
                "user_id" => $refunds["user_id"],
                "admin_id" => $admin_id ? $admin_id : "-1",
                "action" => 2,
                "operation" => 1,
                "point" => $orderRow['exp'],
                "description" => $log,
                "create_time" => time()
            ]);
        }

        if ($orderRow['point'] > 0) {
            $log = '??????????????????' . $refunds['order_no'] . '????????????,???????????? -' . $orderRow['point'];
            Db::name("users")->where(["id" => $order["user_id"]])->dec("point", $orderRow['point'])->update();
            Db::name("users_log")->insert([
                "order_no" => $order["order_no"],
                "user_id" => $refunds["user_id"],
                "admin_id" => $admin_id ? $admin_id : "-1",
                "action" => 1,
                "operation" => 1,
                "point" => $orderRow['point'],
                "description" => $log,
                "create_time" => time()
            ]);

        }

        Db::name("order_log")->insert([
            'order_id' => $refunds["order_id"],
            'username' => $admin["username"],
            'action' => '??????',
            'result' => '??????',
            'note' => '?????????' . $refunds["order_no"] . '???????????????????????????' . $amount,
            'create_time' => time()
        ]);

        self::updateOrderGroupStatus($order, 3, 1);
        return true;
    }


    /**
     *  ?????????????????????
     * @param array $data
     * @return float|int
     */
    public static function getRefundAmount($data)
    {
        $list = Db::name("order_refundment")->where([
            "order_id" => $data["id"], "pay_status" => 2
        ])->select()->toArray();
        $refundFee = 0.00;
        foreach ($list as $val) {
            $refundFee += $val['amount'];
        }

        return number_format($refundFee, 2);
    }

    /**
     * ????????????????????????
     * @param $order
     * @param $message
     * @return bool
     */
    public static function refundmentApply($order, $message)
    {
        if (!in_array($order["status"], [2, 7])) {
            throw new \Exception("????????????????????????????????????", 0);
        }

        $orderGoods = Db::name("order_goods")->where([
            "order_id" => $order["id"]
        ])->select()->toArray();

        $arr = [];
        foreach ($orderGoods as $val) {
            if ($val['is_send'] == 2) {
                throw new \Exception("??????????????????????????????????????????", 0);
            }

            if (Db::name("order_refundment")
                ->where("is_delete", 0)->where("pay_status", 0)
                ->where('FIND_IN_SET(' . $val["id"] . ',order_goods_id)')->count()) {
                throw new \Exception("????????????????????????????????????????????????????????????", 0);
            }
            $arr[] = $val["id"];
        }

        Db::startTrans();
        try {
            Db::name("order_refundment")->insert([
                "order_no" => $order["order_no"],
                "order_id" => $order["id"],
                "user_id" => $order["user_id"],
                "pay_status" => 0,
                "content" => $message,
                "amount" => $order['order_amount'],
                "order_goods_id" => implode(',', $arr),
                "create_time" => time(),
            ]);

            self::updateOrderGroupStatus($order, 3, 1);
            Db::commit();
        } catch (\Exception $e) {
            Db::rollback();
            throw new \Exception("?????????????????????????????????????????????", 0);
            //throw new \Exception($e->getMessage(),0);
        }

        return true;
    }

    public static function getOrderType($type = "")
    {
        $arr = ["point" => 1, "regiment" => 2, "second" => 3, "special" => 4, "group" => 5, "buy" => 0, "cart" => 0];
        return isset($arr[$type]) ? $arr[$type] : 0;
    }

    public static function getOrderTypeText($type, $length = -1)
    {
        switch ($type) {
            case "1":
                $string = '????????????';
                break;
            case "2":
                $string = '????????????';
                break;
            case "3":
                $string = "????????????";
                break;
            case "5":
                $string = "????????????";
                break;
            case '4':
            default:
                $string = '????????????';
        }

        return $length == -1 ? $string : CString::msubstr($string, $length, false);
    }

    public static function getRefundmentText($code)
    {
        $result = ['0' => '????????????', '1' => '????????????', '2' => '????????????'];
        return isset($result[$code]) ? $result[$code] : '';
    }

    public static function getSendStatus($code)
    {
        $data = [0 => '????????????', 1 => '?????????', 2 => "????????????", 3 => '?????????'];
        return isset($data[$code]) ? $data[$code] : '?????????';
    }

    public static function getPaymentStatusText($status)
    {
        return $status == 0 ? "?????????" : "?????????";
    }

    public static function getDeliveryStatus($status)
    {
        return $status == 0 ? "?????????" : "?????????";
    }

    public static function getEvaluateStatus($status)
    {
        switch ($status) {
            case 0:
                return '?????????';
            case 1:
                return '?????????';
            case 2:
                return '????????????';
            default:
                return '';
        }
    }

    public static function getOrderActive($order)
    {
        if ($order["pay_status"] == 0) {
            return 0;
        }

        if ($order["status"] == 2 && $order["distribution_status"] == 0) {
            return 1;
        } else if ($order["status"] == 2 && $order["distribution_status"]) {
            return 2;
        }

        if ($order["status"] == 5 && in_array($order["evaluate_status"], [0, 2])) {
            return 3;
        }

        if ($order["status"] == 5 && $order["evaluate_status"] == 1) {
            return 4;
        }

        return -1;
    }

    public static function getStatusText($code)
    {
        $result = [
            0 => '??????', 1 => '????????????', 2 => '????????????', 3 => '?????????', 4 => '????????????',
            5 => '?????????', 6 => '?????????', 7 => '?????????', 8 => '????????????', 9 => '?????????',
            10 => '????????????', 11 => '????????????', 12 => '????????????'
        ];

        return isset($result[$code]) ? $result[$code] : '';
    }

    public static function getStatus($order)
    {
        if (empty($order)) {
            return 0;
        }

        if ($order["status"] == 1 && $order["pay_status"] == 0) { // ?????????
            return 1;
        } else if ($order["status"] == 2) {
            // ?????????????????????
            $refund = Db::name('order_refundment')->where([
                "order_id" => $order['id'], "is_delete" => 0
            ])->find();
            if (!empty($refund)) {
                if ($refund["pay_status"] == 0) {
                    return 11;
                }

                if ($refund["pay_status"] == 1) {
                    return 12;
                }
            }

            if ($order["distribution_status"] == 0) { // ?????????
                return 2;
            } else if ($order["distribution_status"] == 1) { // ?????????
                return 3;
            } else if ($order["distribution_status"] == 2) { // ????????????
                return 4;
            }
        }

        if ($order["status"] == 5) {
            if (in_array($order["evaluate_status"], [0, 2])) { // ?????????
                return 5;
            } else if ($order["evaluate_status"] == 1) { // ?????????
                return 6;
            }
        } else if ($order['status'] == 3 || $order['status'] == 4) { //3,????????????????????????
            return 7;
        } else if ($order['status'] == 6) { // 5,??????
            return 8;
        } else if ($order['status'] == 7) { // 6,????????????
            if ($order['distribution_status'] == 1) { // ??????
                return 10;
            } else { // ?????????
                return 9;
            }
        }

        return 0;
    }

    public static function orderNo($number = '', $date = 'YmdHis')
    {
        $arr = explode(" ", microtime());
        $usec = substr(str_replace('0.', '', $arr[0]), 0, 2) . rand(100, 999);
        return $number . date($date) . $usec;
    }

    /**
     * ????????????
     * @return boolean
     */
    public static function updateStock($data, $type = "-")
    {
        if ($data["product_id"] > 0) {
            $product = Db::name("goods_item")->where([
                "goods_id" => $data["goods_id"], "id" => $data["product_id"]
            ])->find();
        }

        $product_store = 0;
        $goods = Db::name("goods")->where(["id" => $data["goods_id"]])->find();
        switch ($type) {
            case "-":
                if (!empty($product)) {
                    $product_store = $product["store_nums"] - $data["goods_nums"];
                }
                $goods_store = $goods["store_nums"] - $data["goods_nums"];
                break;
            case "+":
                if (!empty($product)) {
                    $product_store = $product["store_nums"] + $data["goods_nums"];
                }
                $goods_store = $goods["store_nums"] + $data["goods_nums"];
                break;
        }

        if ($data["product_id"] > 0) {
            Db::name("goods_item")->where([
                "goods_id" => $data["goods_id"], "id" => $data["product_id"]
            ])->update(["store_nums" => $product_store]);
        }

        Db::name("goods")->where(["id" => $data["goods_id"]])->update(["store_nums" => $goods_store]);

        return true;
    }

}