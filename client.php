<?php

namespace adv;

use core\base;
use of;
use adv\resources\adGroups;
use adv\resources\keywords;
use adv\resources\negativeKeywords;
use adv\resources\campaigns;
use adv\resources\campaignsNegativeKeywords;
use adv\resources\portfolios;
use adv\resources\productAds;
use adv\resources\productTargeting;
use adv\resources\profiles;
use adv\resources\reports;
use adv\resources\snapshots;
use adv\resources\stores;
use Exception;

/**
 * 描述 : 客户端
 * 注明 :
 *       '类目录' : adv\resources\resources
 * 作者 : LiuYun
 */
class client {
    
    /**
     * 沙盒测试环境地址
     */
    const BASE_URL_SANDBOX = 'https://advertising-api-test.amazon.com/v2';
    
    /**
     * 北美地址
     */
    const BASE_URL_NA = 'https://advertising-api.amazon.com/v2';
    
    /**
     * 欧洲，涵盖英国、FR、IT,、ES、DE地址
     */
    const BASE_URL_EU = 'https://advertising-api-eu.amazon.com/v2';
    
    /**
     * 远东地址
     */
    const BASE_URL_FE = 'https://advertising-api-fe.amazon.com/v2';
    
    /**
     * 刷新令牌的地址
     */
    const BASE_REFRESH_TOKEN = 'https://api.amazon.com/auth/o2/token';
    
    /**
     * 基础地址
     */
    public $baseUrl;
    
    /**
     * 请求头
     */
    private $requestHeader;
    
    /**
     * 请求对象
     */
    private $requestQuery;
    
    /**
     * curl客户
     */
    private $curlClient;
    
    /**
     * 客户编号
     */
    private $clientId;
    
    /**
     * 客户密钥
     */
    private $clientSecret;
    
    /**
     * 令牌
     */
    private $accessToken;
    
    /**
     * 刷新令牌
     */
    private $refreshToken;
    
    /**
     * 客户ID
     */
    private $customerId;
    
    /**
     * 用户代理
     */
    private $userAgent;
    
    /**
     * 区域
     */
    private $region;
    
    /**
     * 沙盒测试
     */
    private $sandbox;
    
    /**
     * Client constructor.
     * @param $clientId
     * @param $clientSecret
     * @param $accessToken
     * @param $refreshToken
     * @param null $region
     * @param bool $sandbox
     */
    /**
     * 描述 : 构造函数
     * 参数 :
     *       'clientId' : 客户编号
     *       'clientSecret' : 客户密钥
     *       'accessToken' : 令牌
     *       'refreshToken' : 刷新令牌
     *       'region' : 区域
     *       'sandbox' : 沙盒测试
     * 注明 : 初始化属性及需要用的请求链接、请求头、请求对象
     * 作者 : LiuYun
     */
    public function __construct($clientId, $clientSecret, $accessToken, $refreshToken = null, $region = null, $sandbox = true) {
        // 初始化Curl
        $this->curlClient = curl_init();
        
        // 初始化属性
        $this->clientId = $clientId;
        $this->clientSecret = $clientSecret;
        $this->accessToken = $accessToken;
        $this->refreshToken = $refreshToken;
        $this->region = $region;
        $this->sandbox = $sandbox;
        
        // 请求链接、请求头、请求对象
        $this->initBaseUrl();
        $this->initHeader();
        $this->initQuery();
        
        // 初始化请求资源
        $this->adGroups = new adGroups($this);
        $this->keywords = new keywords($this);
        $this->negativeKeywords = new negativeKeywords($this);
        $this->campaigns = new campaigns($this);
        $this->campaignsNegativeKeywords = new campaignsNegativeKeywords($this);
        $this->portfolios = new portfolios($this);
        $this->productAds = new productAds($this);
        $this->productTargeting = new productTargeting($this);
        $this->profiles = new profiles($this);
        $this->reports = new reports($this);
        $this->snapshots = new snapshots($this);
        $this->stores = new stores($this);
    }
    
    /**
     * 初始化区域并检验
     */
    private function initBaseUrl() {
        if ($this->sandbox == true || empty($this->region)) {
            $this->baseUrl = self::BASE_URL_SANDBOX;
        } else {
            switch (strtoupper($this->region)) {
                case 'NA':
                case 'US':
                case 'CA':
                    $this->baseUrl = self::BASE_URL_NA;
                    break;
                case 'EU':
                case 'UK':
                case 'FR':
                case 'IT':
                case 'ES':
                case 'DE':
                    $this->baseUrl = self::BASE_URL_EU;
                    break;
                case 'FE':
                case 'JP':
                case 'AU':
                    $this->baseUrl = self::BASE_URL_FE;
                    break;
                default:
                    $this->baseUrl = self::BASE_URL_SANDBOX;
                    break;
            }
        }
    }
    
    /**
     * 初始化请求头信息
     */
    private function initHeader() {
        $this->requestHeader = [
            'Content-Type: application/json',
            'User-Agent: ' . $this->userAgent,
            'Authorization: Bearer ' . $this->accessToken,
            'Amazon-Advertising-API-ClientId: ' . $this->clientId
        ];
    }
    
    /**
     * 初始化请求对象
     */
    private function initQuery() {
        $this->requestQuery = [];
    }
    
    /**
     * 追加请求对象
     */
    protected function appendQuery($query = []) {
        $this->requestQuery += $this->wrap($query);
    }
    
    /**
     * 追加请求头
     */
    protected function appendHeader($header = []) {
        $this->requestHeader = array_merge($this->requestHeader, $this->wrap($header));
    }
    
    /**
     * 描述 : 将客户ID添加到请求头中
     * 参数 : 'customerId' ： 客户ID
     * 作者 : LiuYun
     */
    public function setCustomerId($customerId) {
        $this->customerId = $customerId;
        // 添加到请求头中
        $this->initHeader();
        $this->appendHeader(['Amazon-Advertising-API-Scope:' . $customerId]);
    }
    
    public function setUserAgent($userAgent) {
        $this->userAgent = $userAgent;
    }
    
    /**
     * 描述 : 获取客户ID
     * 返回 : mixed
     * 作者 : LiuYun
     */
    public function getCustomerId() {
        return $this->getCustomerId();
    }
    
    /**
     * 描述 : 检测是否沙盒环境
     * 返回 : bool
     * 作者 : LiuYun
     */
    public function isSandbox() {
        return $this->sandbox;
    }
    
    /**
     * 描述 : 刷新令牌并存储新的访问令牌，返回信息以便将其存储在accessToken属性中
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function refreshToken() {
        
        // 重置请求头内容类型为JSON格式
        $this->requestHeader = [
            'Content-Type: application/json',
        ];
        
        // 请求刷新访问令牌
        $this->baseUrl = self::BASE_REFRESH_TOKEN;
        $responseToken = $this->post([self::BASE_REFRESH_TOKEN], null, [
            'grant_type' => 'refresh_token',
            'client_id' => $this->clientId,
            'refresh_token' => $this->refreshToken,
            'client_secret' => $this->clientSecret
        ]);
        
        // 存储新令牌
        $this->accessToken = $responseToken->access_token;
        $this->refreshToken = $responseToken->refresh_token;
        
        //初始化Url、请求头、请求对象
        $this->initBaseUrl();
        $this->initHeader();
        $this->initQuery();
        
        // 返回新创建的令牌
        return $responseToken;
    }
    
    /**
     * @param $method
     * @param $path
     * @param array $query
     * @param array $params
     * @return array|mixed|object
     * @throws Exception
     */
    /**
     * 描述 : Curl请求
     * 参数 :
     *       'method' : 参数
     *       'path' : 地址
     *       'query' : 请求对象
     *       'params' : 请求参数
     * 返回 :
     * 注明 :
     * 作者 : LiuYun
     * @throws Exception
     */
    protected function request($method, $path, $query = [], $params = []) {
        
        // 初始化的请求
        $this->curlClient = curl_init();
        
        // 拼接请求地址
        if (is_array($path)) {
            $path = implode('/', $path);
        }
        
        // 如果是地址栏的参数合并到参数中
        $query = array_merge($this->requestQuery, $query);
        
        // 路劲拼参数
        if (!empty(array_filter($query))) {
            $path .= '?' . http_build_query($query);
        }
        
        // 设置用于请求的url
        $requestUrl = $this->baseUrl == self::BASE_REFRESH_TOKEN ? $this->baseUrl : $this->baseUrl . '/' . $path;
        
        // 设置请求参数
        curl_setopt($this->curlClient, CURLOPT_URL, $requestUrl);
        curl_setopt($this->curlClient, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($this->curlClient, CURLOPT_MAXREDIRS, 10);
        curl_setopt($this->curlClient, CURLOPT_TIMEOUT, 0);
        curl_setopt($this->curlClient, CURLOPT_ENCODING, false);
        curl_setopt($this->curlClient, CURLOPT_POSTFIELDS, false);
        curl_setopt($this->curlClient, CURLOPT_HEADER, true);
        curl_setopt($this->curlClient, CURLOPT_NOBODY, false);
        curl_setopt($this->curlClient, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($this->curlClient, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($this->curlClient, CURLOPT_CUSTOMREQUEST, $method);
        curl_setopt($this->curlClient, CURLOPT_USERAGENT, $this->userAgent);
        curl_setopt($this->curlClient, CURLOPT_HTTPHEADER, $this->requestHeader);
        // 如果有参数，添加参数
        if (!empty($params)) {
            curl_setopt($this->curlClient, CURLOPT_POST, true);
            curl_setopt($this->curlClient, CURLOPT_POSTFIELDS, json_encode($params));
        }
        // 从响应体中分别返回请求头
        $response = curl_exec($this->curlClient);
        $headerSize = curl_getinfo($this->curlClient, CURLINFO_HEADER_SIZE);
        $httpCode = curl_getinfo($this->curlClient, CURLINFO_HTTP_CODE);
        $headers = $this->formatHeader(substr($response, 0, $headerSize));
        
        $body = json_decode(substr($response, $headerSize), false, 512, JSON_BIGINT_AS_STRING);
        
        $responseInfo = curl_getinfo($this->curlClient);
        // 关闭连接
        curl_close($this->curlClient);
        
        //如果是307 HTTP状态，重定向到下载
        if ($httpCode == 307) {
            return $this->download($responseInfo["redirect_url"], true);
        }
        
        // 如果是429 HTTP状态，等待所需的时间，然后重试
        if ($httpCode == '429') {
            sleep($headers['Retry-After']);
            return $this->request($method, $path, $query, $params);
        }
        
        // 返回的响应
        if (in_array($httpCode, [200, 201, 202, 203, 204, 205, 206, 207, 208, 210, 226])) {
            if (isset($body->code) && !empty($body->code)) {
                if (of::config("env.advertising.errInfo.{$body->code}")) {
                    $body->details = of::config("env.advertising.errInfo.{$body->code}");
                }
            }
            return $body;
        } else {
            throw new Exception('网络请求异常获取AWS服务异常！', $httpCode);
        }
    }
    
    /**
     * 描述 : GET方法
     * 参数 :
     *       'path' ： 路劲
     *       'path' ： 地址栏参数
     *       'params' ： 提交参数
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($path, $query = [], $params = []) {
        return $this->request('GET', $path, $this->wrap($query), $this->wrap($params));
    }
    
    /**
     * 描述 : POST方法
     * 参数 :
     *       'path' ： 路劲
     *       'path' ： 地址栏参数
     *       'params' ： 提交参数
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function post($path, $query = [], $params = []) {
        return $this->request('POST', $path, $this->wrap($query), $this->wrap($params));
    }
    
    /**
     * 描述 : PUT方法
     * 参数 :
     *       'path' ： 路劲
     *       'path' ： 地址栏参数
     *       'params' ： 提交参数
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function put($path, $query = [], $params = []) {
        return $this->request('PUT', $path, $this->wrap($query), $this->wrap($params));
    }
    
    /**
     * 描述 : DELETE方法
     * 参数 :
     *       'path' ： 路劲
     *       'path' ： 地址栏参数
     *       'params' ： 提交参数
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function delete($path, $query = [], $params = []) {
        return $this->request('DELETE', $path, $this->wrap($query), $this->wrap($params));
    }
    
    /**
     * 描述 : 请求下载文件并下载它的过程主要用于报表
     * 参数 :
     *       'url' : 地址
     *       'gunZip' : 下载类型
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function download($url, $gunZip = false) {
        if (!$gunZip) {
            $this->baseUrl = $url;
            return $this->get([]);
        } else {
            // 下载初始CURL
            $this->curlClient = curl_init();
            curl_setopt($this->curlClient, CURLOPT_URL, $this->baseUrl);
            curl_setopt($this->curlClient, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($this->curlClient, CURLOPT_ENCODING, "gzip,deflate");
            curl_setopt($this->curlClient, CURLOPT_MAXREDIRS, 10);
            curl_setopt($this->curlClient, CURLOPT_TIMEOUT, 0);
            curl_setopt($this->curlClient, CURLOPT_SSL_VERIFYPEER, false);
            curl_setopt($this->curlClient, CURLOPT_SSL_VERIFYHOST, false);
            curl_setopt($this->curlClient, CURLOPT_FOLLOWLOCATION, true);
            curl_setopt($this->curlClient, CURLOPT_HTTP_VERSION, CURL_HTTP_VERSION_1_1);
            curl_setopt($this->curlClient, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($this->curlClient, CURLOPT_HTTPHEADER, $this->requestHeader);
            // 执行请求并关闭它
            $response = curl_exec($this->curlClient);
            curl_close($this->curlClient);
            $this->initBaseUrl();
            // 解码gunZip响应并将其作为json返回
            return !empty($response) ? json_decode(gzdecode($response)) : [];
        }
    }
    
    /**
     * 描述 : 如果给定的值不是一个数组，则将其封装在一个数组中
     * 参数 :
     *       'value' : mixed
     * 返回 : array
     * 作者 : LiuYun
     */
    private function wrap($value) {
        return !is_array($value) ? [$value] : $value;
    }
    
    /**
     * 描述 : 将请求头转化key => value 键值对形式
     * 参数 :
     *       'headers' : 请求头数据
     * 返回 : array
     * 作者 : LiuYun
     *
     */
    private function formatHeader($headers = null) {
        $arrHeader = [];
        foreach (explode("\r\n", trim($headers)) as $header) {
            if (preg_match('/(.*?): (.*)/', $header, $matches)) {
                $arrHeader[$matches[1]] = $matches[2];
            } else {
                $arrHeader['Http-Code'] = $header;
            }
        }
        // 返回转换为数组的标头
        return $arrHeader;
    }
}
