<?php
/**
 * TradeReverse.php
 * 详情
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Trade\Model;


class TradeReverse
{
    /**
     * @var 商家订单号
     */
    private $outTradeNo;

    public function setOutTradeNo($outTradeNo) {
        $this->outTradeNo = $outTradeNo;
    }
    public function getOutTradeNo() {
        return $this->outTradeNo;
    }
}