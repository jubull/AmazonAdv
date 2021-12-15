<?php


namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 广告群组类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' ： https://advertising.amazon.com/API/docs/v2/reference/ad_groups
 * 作者 : LiuYun
 */
class adGroups {
    
    const BASE_URL_SP = 'sp/adGroups';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取广告群组列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#listAdGroups
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取具有扩展字段的广告组列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#listAdGroupsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取广告群组
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#getAdGroup
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($adGroupId) {
        return $this->client->get(self::BASE_URL_SP, $adGroupId);
    }
    
    /**
     * 描述 : 获取广告组的扩展信息
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#getAdGroupEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($adGroupId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $adGroupId]);
    }
    
    /**
     * 描述 : 创建一个或多个广告组
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#createAdGroups
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新一个或多个广告组
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#updateAdGroups
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 将广告组状态设置为已存档
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#archiveAdGroup
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($adGroupId) {
        return $this->client->delete(self::BASE_URL_SP, $adGroupId);
    }
    
    /**
     * 描述 : 获取建议关键字
     * 参数 ： adGroupId ： 广告组ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/suggested_keywords#getAdGroupSuggestedKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getSuggestedKeywords($adGroupId, $params = []) {
        return $this->client->get([self::BASE_URL_SP, $adGroupId, 'suggested', 'keywords'], null, $params);
    }
    
    /**
     * 描述 : 获取建议关键字的扩展
     * 参数 ： adGroupId ： 广告组ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/suggested_keywords#getAdGroupSuggestedKeywordsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getSuggestedKeywordsExtended($adGroupId, $params = []) {
        return $this->client->get([self::BASE_URL_SP, $adGroupId, 'suggested', 'keywords', 'extended'], null, $params);
    }
    
    /**
     * 描述 : 获取asins建议关键字
     * 参数 ： adGroupId ： 广告组ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/suggested_keywords#getAsinSuggestedKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getAsinSuggestedKeywords($asinValue, $params = []) {
        return $this->client->get(['asins', $asinValue, 'suggested', 'keywords'], null, $params);
    }
    
    /**
     * 描述 : 分别获取建议关键字
     * 参数 ： adGroupId ： 广告组ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/suggested_keywords#bulkGetAsinSuggestedKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function bulkGetAsinSuggestedKeywords($params = []) {
        return $this->client->post(['asins', 'suggested', 'keywords'], null, $params);
    }
    
    /**
     * 描述 : 广告组获取竞价建议
     * 参数 ： adGroupId ： 广告组ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/bidding/bid_recommendations#getAdGroupBidRecommendations
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getBidRecommendations($adGroupId) {
        return $this->client->get([self::BASE_URL_SP, $adGroupId, 'bidRecommendations']);
    }
    
    /**
     * 返回 : 广告组确定关键字
     * 作者 : LiuYun
     */
    public function biddableKeywords() {
        return new keywords($this->client);
    }
    
    /**
     * 返回 : 广告组否定关键字
     * 作者 : LiuYun
     */
    public function negativeKeywords() {
        return new negativeKeywords($this->client);
    }
}
