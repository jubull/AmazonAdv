<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 否定关键字类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords
 * 作者 : LiuYun
 */
class negativeKeywords {
    
    const BASE_URL_SP = 'sp/negativeKeywords';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取否定关键字列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#listNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取否定关键字属性列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/campaign_negative_keywords#listCampaignNegativeKeywordsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取否定关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#getNegativeKeyword
     * 参数 ： ‘keywordId‘ ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($keywordId) {
        return $this->client->get([self::BASE_URL_SP, $keywordId]);
    }
    
    /**
     * 描述 : 获取否定关键字属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#getNegativeKeywordEx
     * 参数 ： ‘keywordId‘ ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($keywordId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $keywordId]);
    }
    
    /**
     * 描述 : 创建否定关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#createNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新否定关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#updateNegativeKeywords
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 存档否定关键字
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/keywords/ad_group_negative_keywords#archiveNegativeKeyword
     * 参数 ： 'keywordId' ：关键字ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($keywordId) {
        return $this->client->delete([self::BASE_URL_SP, $keywordId]);
    }
}
