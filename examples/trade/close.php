<?php
/**
 * close.php
 * 统一请求关闭订单
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$tradeClose = new \Wuzhenpay\Openapi\Trade\Model\TradeClose();
$tradeClose->setOutTradeNo("2018002"); // 商户订单号

// 开始请求退款
$response = $trade->close($tradeClose);

if (!$response) {
    // 获取错误信息
    var_dump($trade->getError());
}

// 返回成功信息
var_dump($response);