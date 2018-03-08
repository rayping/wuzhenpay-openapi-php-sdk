<?php
/**
 * Response.phpp
 * HTTP response Object
 *
 * Created by steve on 2018/3/5
 * Created by (c) 2018. All rights reserved.
 * Contact email aer_c@qq.com
 * GitHub address https://github.com/xubing6243
 */

namespace Wuzhenpay\Openapi\Http;


final class Response
{
    private $statusCode;
    private $error;
    private $body;
    private $jsonData;
    private $subCode;

    private static $statusTexts = array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        404 => 'Not Found',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway',
        503 => 'Service Unavailable',
        504 => 'Gateway Timeout'
    );

    public function setStatusCode($statusCode) {
        $this->statusCode = $statusCode;
    }
    public function getStatusCode() {
        return $this->statusCode;
    }

    public function setSubCode($subCode) {
        $this->subCode = $subCode;
    }
    public function getSubCode() {
        return $this->subCode;
    }

    public function setError($error) {
        $this->error = $error;
    }
    public function getError() {
        return $this->error;
    }

    public function setBody($body) {
        $this->body = $body;
    }
    public function getBody() {
        return $this->body;
    }

    public function setJsonData($jsonData) {
        $this->jsonData = $jsonData;
    }
    public function getJsonData() {
        return $this->jsonData;
    }
}