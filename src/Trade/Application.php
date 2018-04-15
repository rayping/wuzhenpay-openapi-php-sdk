<?php
/**
 * Application.php
 * 交易支付
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Trade;


use Wuzhenpay\Openapi\Auth;
use Wuzhenpay\Openapi\Trade\Model\TradeClose;
use Wuzhenpay\Openapi\Trade\Model\TradePay;
use Wuzhenpay\Openapi\Http\Client;
use Wuzhenpay\Openapi\Trade\Model\TradeQuery;
use Wuzhenpay\Openapi\Trade\Model\TradeRefund;
use Wuzhenpay\Openapi\Trade\Model\TradeReverse;

final class Application
{
    private $mchId;
    private $secret;

    /**
     * 使用HTTPS
     * @var bool
     */
    private $useHTTPS = true;

    /**
     * 使用测试环境
     * @var bool
     */
    private $useDev = false;

    private $error;

    public function __construct($mchId, $secret, $config=array())
    {
        $this->mchId = $mchId;
        $this->secret = $secret;

        /**
         * 设置使用HTTPS
         */
        if (isset($config['useHTTPS'])) {
            $this->useHTTPS = $config['useHTTPS'];
        }

        /**
         * 设置使用测试环境
         */
        if (isset($config['useDev'])) {
            $this->useDev = $config['useDev'];
        }
    }

    /**
     * 获取错误信息
     * @return mixed
     */
    public function getError() {
        return $this->error;
    }

    /**
     * 统一请求支付
     * @param TradePay $tradePay
     * @return bool|mixed
     */
    public function pay(TradePay $tradePay)
    {
        $params = array();
        $params['pay_type'] = $tradePay->getPayType();
        $params['out_trade_no'] = $tradePay->getOutTradeNo();
        $params['subject'] = $tradePay->getSubject();
        $params['total_fee'] = $tradePay->getTotalFee();
        $params['time_expire'] = $tradePay->getTimeExpire();
        $params['notify_url'] = $tradePay->getNotifyUrl();
        $params['openid'] = $tradePay->getOpenid();
        $params['buyer_id'] = $tradePay->getBuyerId();
        $params['auth_code'] = $tradePay->getAuthCode();
        $params['operator_id'] = $tradePay->getOperatorId();
        $params['terminal_id'] = $tradePay->getTerminalId();
        $params['attach'] = $tradePay->getAttach();
        $params['remarks'] = $tradePay->getRemarks();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/pay", $requestParams);
    }

    /**
     * 统一请求退款
     * @param TradeRefund $tradeRefund
     * @return bool|mixed
     */
    public function refund(TradeRefund $tradeRefund) {
        $params = array();
        $params['out_trade_no'] = $tradeRefund->getOutTradeNo();
        $params['transaction_id'] = $tradeRefund->getTransactionId();
        $params['out_refund_no'] = $tradeRefund->getOutRefundNo();
        $params['refund_fee'] = $tradeRefund->getRefundFee();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/refund", $requestParams);
    }

    /**
     * 统一请求查询
     * @param TradeQuery $tradeQuery
     * @return bool|mixed
     */
    public function query(TradeQuery $tradeQuery) {
        $params = array();
        $params['out_trade_no'] = $tradeQuery->getOutTradeNo();
        $params['transaction_id'] = $tradeQuery->getTransactionId();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/query", $requestParams);
    }

    /**
     * 统一请求关闭订单
     * @param TradeClose $tradeClose
     * @return bool|mixed
     */
    public function close(TradeClose $tradeClose) {
        $params = array();
        $params['out_trade_no'] = $tradeClose->getOutTradeNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/close", $requestParams);
    }

    /**
     * 统一请求撤销订单
     * @param TradeReverse $tradeReverse
     * @return bool|mixed
     */
    public function reverse(TradeReverse $tradeReverse) {
        $params = array();
        $params['out_trade_no'] = $tradeReverse->getOutTradeNo();

        // 获取请求参数
        $requestParams = $this->getRequestParams($params);

        // 请求服务器
        return $this->postRequest("/trade/reverse", $requestParams);
    }

    /**
     * 获取请求参数
     * @param $params
     * @return array
     */
    private function getRequestParams($params)
    {
        // 公共请求参数
        $public = array(
            'mch_id'		=> $this->mchId, // 商户号
            'version'       => Config::VERSION,
            'timestamp'     => date("YmdHis"),
            'sign_type'     => 'md5',
            'charset'       => 'utf-8',
            'format' 	    => 'json',
        );

        // 请求参数为JOSN字符串
        $public['biz_content'] = json_encode($params);

        // 创建sign
        $auth = new Auth\Md5($this->mchId, $this->secret);
        $public['sign'] = $auth->sign($public);
        return $public;
    }

    /**
     * 请求服务器
     * @param $api
     * @param array $params
     * @return bool|mixed
     */
    private function postRequest($api, $params=array())
    {
        // 设置是否使用https
        $config = new Config();
        $config->setUseHTTPS($this->useHTTPS);

        // 拼接接口地址
        $api = $config->getApiHost($this->useDev) . $api;

        // 开始请求
        $result = Client::postCurl($params, $api);

        if ($result->getStatusCode() != 200) {
            $this->error = $result->getError();
            return null;
        }

        // 获取数据
        $jsonData = $result->getJsonData();

        // 验签
        $auth = new Auth\Md5($this->mchId, $this->secret);
        $bool = $auth->verify($jsonData['sign'], $jsonData);
        if (!$bool) {
            $this->error = "Verify signature failure.";
            return null;
        }

        return json_decode($jsonData['biz_content'], true);
    }
}