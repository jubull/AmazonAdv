<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 产品定位类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting
 * 作者 : LiuYun
 */
class productTargeting {
    
    const BASE_URL_SP = 'sp/targets';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取产品定位列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#listTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取产品定位属性列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#listTargetingClausesEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取产品定位
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getTargetingClause
     * 参数 ： 'targetId' : 产品定位ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($targetId) {
        return $this->client->get(self::BASE_URL_SP, $targetId);
    }
    
    /**
     * 描述 : 获取产品定位属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getTargetingClauseEx
     * 参数 ： 'targetId' : 产品定位ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($targetId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $targetId]);
    }
    
    /**
     * 描述 : 创建产品定位
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#createTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新产品定位
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#updateTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档产品定位
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#archiveTargetingClause
     * 参数 ： 'targetId' : 产品定位ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($targetId) {
        return $this->client->delete(self::BASE_URL_SP, $targetId);
    }
    
    /**
     * 描述 : 创建存档产品建议价
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#createTargetRecommendations
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function createRecommendations($params = []) {
        return $this->client->post([self::BASE_URL_SP, 'productRecommendations'], null, $params);
    }
    
    /**
     * 描述 : 获取存档产品类别
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getTargetingCategories
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getCategories($asins = []) {
        return $this->client->get([self::BASE_URL_SP, 'categories'], ['asins' => implode(',', $asins)]);
    }
    
    /**
     * 描述 : 获取品牌建议价
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getBrandRecommendations
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getBrandRecommendations($params = []) {
        return $this->client->get([self::BASE_URL_SP, 'brands'], null, $params);
    }
    
    /**
     * 描述 : 获取报价建议
     * 注明 : '接口地址' :https://advertising.amazon.com/API/docs/v2/reference/bidding/bid_recommendations#getBidRecommendations
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getBidRecommendations($params = []) {
        return $this->client->post([self::BASE_URL_SP, 'bidRecommendations'], null, $params);
    }
}
