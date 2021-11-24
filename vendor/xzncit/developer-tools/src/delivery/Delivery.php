<?php
// +----------------------------------------------------------------------
// | A3Mall
// +----------------------------------------------------------------------
// | Copyright (c) 2020 http://shop.fbcct.cc:82 All rights reserved.
// +----------------------------------------------------------------------
// | Author: xzncit <158373108@qq.com>
// +----------------------------------------------------------------------

namespace xzncit\delivery;

use xzncit\core\Service;

/**
 * class Payment
 *
 * @property \xzncit\delivery\Aliyun\Aliyun                                         $aliyun
 */
class Delivery extends Service {

    /**
     * @var string[]
     */
    protected $providers = [
        "aliyun"    => Aliyun\ProviderService::class
    ];

    /**
     * Wechat constructor.
     * @param array $config
     */
    public function __construct(array $config){
        parent::__construct($config);
    }

}