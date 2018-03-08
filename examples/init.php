<?php
/**
 * init.php
 * init
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

use Wuzhenpay\Openapi\Trade\Application;

// 定义项目路径
defined('API_ROOT') || define('API_ROOT', dirname(__FILE__) . '/..');

// 引入composer
require_once API_ROOT . '/vendor/autoload.php';

// 时区设置
date_default_timezone_set('Asia/Shanghai');

// 初始化支付
$trade = new Application(1000030010,"c499ccc18db87d2d2e2ebdb1831b486d", array(
    "useHTTPS" => false, // 是否使用https，true为使用，默认使用https
    "useDev" => true, // 是否使用测试环境，true为使用
));