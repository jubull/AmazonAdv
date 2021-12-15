<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 活动类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' ： https://advertising.amazon.com/API/docs/v2/reference/ad_groups
 * 作者 : LiuYun
 */
class campaigns {
    
    const BASE_URL_SP = 'sp/campaigns';
    const BASE_URL_HSA = 'hsa/campaigns';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取SP活动系列列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/ad_groups#listAdGroups
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL_SP, $query);
    }
    
    /**
     * 描述 : 获取HSA活动系列列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#listCampaigns
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listHSA($query = []) {
        return $this->client->get(self::BASE_URL_HSA, $query);
    }
    
    /**
     * 描述 : 获取SP活动属性系列列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#listCampaignsEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL_SP, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取单个SP活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#getCampaign
     * 参数 ： campaignId ： 活动ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($campaignId) {
        return $this->client->get([self::BASE_URL_SP, $campaignId]);
    }
    
    /**
     * 描述 : 获取单个HSA活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#getCampaign
     * 参数 ： campaignId ： 活动ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getHSA($campaignId) {
        return $this->client->get(self::BASE_URL_HSA, $campaignId);
    }
    
    /**
     * 描述 : 获取活动属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#getCampaignEx
     * 参数 ： campaignId ： 活动ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($campaignId) {
        return $this->client->get([self::BASE_URL_SP, 'extended', $campaignId]);
    }
    
    /**
     * 描述 : 创建活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#createCampaigns
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新sp活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#updateCampaigns
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL_SP, null, $params);
    }
    
    /**
     * 描述 : 更新HSA活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#updateCampaigns
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function updateHSA($params = []) {
        return $this->client->put(self::BASE_URL_HSA, null, $params);
    }
    
    /**
     * 描述 : 存档SP活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#archiveCampaign
     * 参数 ： campaignId ： 活动ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archive($campaignId) {
        return $this->client->delete(self::BASE_URL_SP, $campaignId);
    }
    
    /**
     * 描述 : 存档HSA活动
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/campaigns#archiveCampaign
     * 参数 ： campaignId ： 活动ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function archiveHSA($campaignId) {
        return $this->client->delete(self::BASE_URL_HSA, $campaignId);
    }
    
    /**
     * 返回 : 活动否定关键字
     * 作者 : LiuYun
     */
    public function negativeKeywords() {
        return new campaignsNegativeKeywords($this->client);
    }
}
