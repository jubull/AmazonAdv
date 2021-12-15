<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 活动否定关键字类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' ： https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords
 * 作者 : LiuYun
 */
class campaignsNegativeKeywords {
    
    const BASE_URL_SP = 'sp/campaignNegativeKeywords';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取活动否定关键字列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#listCampaignNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取活动否定关键字属性列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#listCampaignNegativeKeywordsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取活动否定关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#getCampaignNegativeKeyword
     * 参数 ： ‘keywordId‘ ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($keywordId) {
        return $this->client->get([self::BASE_URL_SP, $keywordId]);
    }
    
    /**
     * 描述 : 获取活动否定关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#getCampaignNegativeKeywordEx
     * 参数 ： ‘keywordId‘ ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($keywordId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $keywordId]);
    }
    
    /**
     * 描述 : 创建活动否定关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#createCampaignNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新活动否定关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#updateCampaignNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档活动否定关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#archiveCampaignNegativeKeyword
     * 参数 ： ‘keywordId‘ ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($keywordId) {
        return $this->client->delete([self::BASE_URL_SP, $keywordId]);
    }
}
