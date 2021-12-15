<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 广告组关键字类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords
 * 作者 : LiuYun
 */
class keywords {
    
    const BASE_URL_SP = 'sp/keywords';
    const BASE_URL_HSA = 'hsa/keywords';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取广告组关键字列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#listBiddableKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取广告组关键字属性列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#listBiddableKeywordsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取SP广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#getBiddableKeyword
     * 参数 ：'keywordId' : '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($keywordId) {
        return $this->client->get([self::BASE_URL_SP, $keywordId]);
    }
    
    /**
     * 描述 : 获取HSA广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#getBiddableKeyword
     * 参数 ：'keywordId' : '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getHSA($keywordId) {
        return $this->client->get([self::BASE_URL_HSA, $keywordId]);
    }
    
    /**
     * 描述 : 获取广告组关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#getBiddableKeywordEx
     * 参数 ：'keywordId' : '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($keywordId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $keywordId]);
    }
    
    /**
     * 描述 : 创建SP广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#createBiddableKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 创建HSA广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#createBiddableKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function createHSA($params = []) {
        return $this->client->post(self::BASE_URL_HSA, null, $params);
    }
    
    /**
     * 描述 : 更新SP广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#updateBiddableKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新HSA广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#updateBiddableKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function updateHSA($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档SP广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#archiveBiddableKeyword
     * 参数 ：'keywordId' ： '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($keywordId) {
        return $this->client->delete([self::BASE_URL_SP, $keywordId]);
    }
    
    /**
     * 描述 : 存档HSA广告组关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_biddable_keywords#archiveBiddableKeyword
     * 参数 ：'keywordId' ： '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archiveHSA($keywordId) {
        return $this->client->delete([self::BASE_URL_SP, $keywordId]);
    }
    
    /**
     * 描述 : 获取广告组关键字竞价建议
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/bidding/bid_recommendations#KeywordBidRecommendations
     * 参数 ：'keywordId' ： '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getBidRecommendations($keywordId) {
        return $this->client->get([self::BASE_URL_SP, $keywordId, 'bidRecommendations']);
    }
    
    /**
     * 描述 : 创建广告组关键字竞价建议
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/bidding/bid_recommendations#createKeywordBidRecommendations
     * 参数 ：'keywordId' ： '关键字ID'
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function createBidRecommendations($params = []) {
        return $this->client->post(['ksponsoredeywords', 'bidRecommendations'], null, $params);
    }
}
