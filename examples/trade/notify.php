<?php
/**
 * notify.php
 * 异步回调
 *
 * Created by steve on 2018/3/6
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

require_once dirname(dirname(__FILE__)) . '/init.php';

$data = file_get_contents('php://input');

$setFile = fopen("./notify.txt", "a") or die("Unable to open file!");
fwrite($setFile, $data);
fclose($setFile);

if ($data) {
    /**
     * 数据接收成功后返回字符串success
     */
    exit("success");
} else {
    exit("fail");
}