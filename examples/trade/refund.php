<?php
/**
 * refund.php
 * 统一请求退款
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeRefund = new \Wuzhenpay\Openapi\Trade\Model\TradeRefund();
$tradeRefund->setOutTradeNo("20180306213838000000"); // 商户订单号
//$tradeRefund->setTransactionId(""); // 平台流水号
$tradeRefund->setOutRefundNo("R" . date("YmdHisu")); // 退款单号
$tradeRefund->setRefundFee(0.01); // 退款金额

// 开始请求退款
$response = $trade->refund($tradeRefund);

if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);