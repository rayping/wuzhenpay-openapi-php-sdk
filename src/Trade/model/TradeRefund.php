<?php
/**
 * TradeRefund.php
 * 详情
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Trade\Model;


class TradeRefund
{
    /**
     * 平台流水号
     * @var
     */
    private $transactionId;

    /**
     * 商户订单号
     * @var
     */
    private $outTradeNo;

    /**
     * 退款单号，每单退款必须保持唯一
     * @var
     */
    private $outRefundNo;

    /**
     * 退款金额
     * @var
     */
    private $refundFee;

    public function setTransactionId($transactionId) {
        $this->transactionId = $transactionId;
    }
    public function getTransactionId() {
        return $this->transactionId;
    }

    public function setOutTradeNo($outTradeNo) {
        $this->outTradeNo = $outTradeNo;
    }
    public function getOutTradeNo() {
        return $this->outTradeNo;
    }

    public function setOutRefundNo($outRefundNo) {
        $this->outRefundNo = $outRefundNo;
    }
    public function getOutRefundNo() {
        return $this->outRefundNo;
    }

    public function setRefundFee($refundFee) {
        $this->refundFee = $refundFee;
    }
    public function getRefundFee() {
        return $this->refundFee;
    }
}