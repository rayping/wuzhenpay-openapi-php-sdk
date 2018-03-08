<?php
/**
 * Config.php
 * 详情
 *
 * Created by steve on 2018/3/4
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Trade;

final class Config {
    /**
     * 版本号
     */
    const VERSION = '2.0';

    /**
     * 生产环境
     * @var string
     */
    private $apiHost = "openapi.wuzhenpay.com";

    /**
     * 测试环境
     * @var string
     */
    private $devApiHost = "127.0.0.1:8083";

    /**
     * 是否使用https，true为使用
     * @var bool
     */
    private $useHTTPS = true;

    /**
     * 设置是否使用https
     * @param bool $bool
     */
    public function setUseHTTPS($bool=true) {
        $this->useHTTPS = $bool;
    }

    /**
     * 获取api地址
     * @return string
     */
    public function getApiHost($isDev=false) {
        if ($this->useHTTPS === true) {
            $scheme = "https://";
        } else {
            $scheme = "http://";
        }

        return $scheme . ($isDev ? $this->devApiHost : $this->apiHost);
    }
}