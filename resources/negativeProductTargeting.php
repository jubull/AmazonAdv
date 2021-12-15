<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 否定产品定位类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords
 * 作者 : LiuYun
 */
class negativeProductTargeting {
    
    const BASE_URL_SP = 'sp/negativeTargets';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取用于定位的推荐产品列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#listNegativeTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取用于定位的推荐类别列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#listNegativeTargetingClausesEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取用于定位的推荐产品
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getNegativeTargetingClause
     * 参数 ： 'targetId' : 定位产品ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($targetId) {
        return $this->client->get(self::BASE_URL_SP, $targetId);
    }
    
    /**
     * 描述 : 获取用于定位的推荐类别产品
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#getNegativeTargetingClauseEx
     * 参数 ： 'targetId' : 定位产品ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($targetId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $targetId]);
    }
    
    /**
     * 描述 : 创建用于定位的推荐产品
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#createNegativeTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新用于定位的推荐产品
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#updateNegativeTargetingClauses
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档用于定位的推荐产品
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/product_attribute_targeting#archiveNegativeTargetingClause
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($targetId) {
        return $this->client->delete(self::BASE_URL_SP, $targetId);
    }
}
