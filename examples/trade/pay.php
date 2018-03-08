<?php
/**
 * pay.php
 * 统一请求支付
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

// 支付请求参数实体类
$tradePay = new \Wuzhenpay\Openapi\Trade\Model\TradePay();
$tradePay->setSubject("收单");
$tradePay->setPayType("pay.alipay.qrcode"); // 支付方式请参考支付文档
$tradePay->setOutTradeNo(date("YmdHisu"));
$tradePay->setTotalFee("0.03");
$tradePay->setNotifyUrl("https://60f666fd.ngrok.io/trade/notify.php");

// 开始请求支付
$response = $trade->pay($tradePay);
if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);