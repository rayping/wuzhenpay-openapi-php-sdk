<?php
/**
 * TradePay.php
 * 支付请求参数实体类
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Trade\Model;


final class TradePay
{
    /**
     * @var 支付方式
     */
    private $payType;

    /**
     * @var 商家订单号
     */
    private $outTradeNo;

    /**
     * @var 订单标题
     */
    private $subject;

    /**
     * @var 订单总金额
     */
    private $totalFee;

    /**
     * @var 交易超时时间
     */
    private $timeExpire;

    /**
     * @var 异步请求地址
     */
    private $notifyUrl;

    /**
     * @var 商户微信公众号对应的openid，微信公众号支付时必选
     */
    private $openid;

    /**
     * @var 买家的支付宝用户id，支付宝扫码支付时必选，买家支付宝用户ID
     */
    private $buyerId;

    /**
     * @var 支付授权码，条码支付时必选
     */
    private $authCode;

    /**
     * @var 商户操作员编号
     */
    private $operatorId;

    /**
     * @var 商户机具终端编号
     */
    private $terminalId;

    /**
     * @var 业务扩展参数
     */
    private $attach;

    public function setPayType($payType=null) {
        $this->payType = $payType;
    }
    public function getPayType() {
        return $this->payType;
    }

    public function setOutTradeNo($outTradeNo=null) {
        $this->outTradeNo = $outTradeNo;
    }
    public function getOutTradeNo() {
        return $this->outTradeNo;
    }

    public function setSubject($subject=null) {
        $this->subject = $subject;
    }
    public function getSubject() {
        return $this->subject;
    }

    public function setTotalFee($totalFee=null) {
        $this->totalFee = $totalFee;
    }
    public function getTotalFee() {
        return $this->totalFee;
    }

    public function setTimeExpire($timeExpire=null) {
        $this->timeExpire = $timeExpire;
    }
    public function getTimeExpire() {
        return $this->timeExpire;
    }

    public function setNotifyUrl($notifyUrl=null) {
        $this->notifyUrl = $notifyUrl;
    }
    public function getNotifyUrl() {
        return $this->notifyUrl;
    }

    public function setOpenid($openid=null) {
        $this->openid = $openid;
    }
    public function getOpenid() {
        return $this->openid;
    }

    public function setBuyerId($buyerId=null) {
        $this->buyerId = $buyerId;
    }
    public function getBuyerId() {
        return $this->buyerId;
    }

    public function setAuthCode($authCode=null) {
        $this->authCode = $authCode;
    }
    public function getAuthCode() {
        return $this->authCode;
    }

    public function setOperatorId($operatorId=null) {
        $this->operatorId = $operatorId;
    }
    public function getOperatorId() {
        return $this->operatorId;
    }

    public function setTerminalId($terminalId=null) {
        $this->openid = $terminalId;
    }
    public function getTerminalId() {
        return $this->terminalId;
    }

    public function setAttach($attach=null) {
        $this->openid = $attach;
    }
    public function getAttach() {
        return $this->attach;
    }
}