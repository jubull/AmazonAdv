<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 个人配置文件资料类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles
 * 作者 : LiuYun
 */
class profiles {
    
    const BASE_URL = 'profiles';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取个人资料列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles#listProfiles
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list() {
        return $this->client->get([self::BASE_URL]);
    }
    
    /**
     * 描述 : 获取个人资料
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles#getProfile
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($profileId) {
        return $this->client->get([self::BASE_URL, $profileId]);
    }
    
    /**
     * 描述 : 更新个人资料
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles#updateProfiles
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL, null, $params);
    }
    
    /**
     * 描述 : 注册个人资料
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles#registerProfile
     * 参数 ： 'countryCode' : 区域
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function register($countryCode) {
        return $this->client->put([self::BASE_URL, 'register'], null, [
            'countryCode' => $countryCode
        ]);
    }
    
    /**
     * 描述 : 注册品牌
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/profiles#registerBrand
     * 参数 ：
     *       'countryCode' : 区域
     *       'brand' : 品牌
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function registerBrand($countryCode, $brand) {
        return $this->client->put([self::BASE_URL, 'registerBrand'], null, [
            'countryCode' => $countryCode,
            'brand' => $brand
        ]);
    }
}
