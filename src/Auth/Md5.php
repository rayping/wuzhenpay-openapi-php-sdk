<?php
/**
 * Md5.phpp
 * 详情
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Auth;

class Md5
{
    private $mchId;
    private $secret;

    public function __construct($mchId, $secret)
    {
        $this->mchId = $mchId;
        $this->secret = $secret;
    }

    /**
     * 创建sign
     * @param $data
     * @return string
     */
    public function sign($data)
    {
        $signPars = "";
        ksort($data);
        foreach($data as $k => $v) {
            if(!empty($v) && "sign" != $k) {
                $signPars .= $k . "=" . $v . "&";
            }
        }
        $signPars .= "secret=" . $this->secret;
        $sign = md5($signPars);
        return $sign;
    }

    /**
     * 验签
     * @param $data
     * @return bool
     */
    public function verify($sign, $data=array()) {
        return ($sign == $this->sign($data));
    }
}