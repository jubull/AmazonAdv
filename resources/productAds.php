<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 产品广告类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads
 * 作者 : LiuYun
 */
class productAds {
    
    const BASE_URL_SP = 'sp/productAds';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取产品广告列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#listProductAds
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取产品广告属性列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#listProductAdsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取产品广告
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#getProductAd
     * 参数 ：'adId' : 产品广告ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($adId) {
        return $this->client->get(self::BASE_URL_SP, $adId);
    }
    
    /**
     * 描述 : 获取产品广告属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#getProductAdEx
     * 参数 ：'adId' : 产品广告ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($adId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $adId]);
    }
    
    /**
     * 描述 : 创建产品广告
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#createProductAds
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新产品广告
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#updateProductAds
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档产品广告
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_ads#archiveProductAd
     * 参数 ：'adId' : 产品广告ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($adId) {
        return $this->client->delete(self::BASE_URL_SP, $adId);
    }
}
