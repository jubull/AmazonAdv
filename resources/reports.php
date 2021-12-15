<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 报表类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/reports
 * 作者 : LiuYun
 */
class reports {
    
    const BASE_URL = 'reports';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    
    /**
     * 描述 : 过滤参数
     * 参数 :
     *       'type' : 类型
     *       'recordType' : 记录类型
     *       'reportDate' : 统计日期
     *       'segment' : 分页
     *       'metrics': 指标
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    private function retrieve($type, $recordType, $reportDate, $segment, $metrics) {
        $params = [];
        if (!empty($reportDate)) $params['reportDate'] = $reportDate;
        if (!empty($metrics)) $params['metrics'] = implode(',', $metrics);
        if (!empty($segment)) $params['segment'] = $segment;
        
        return $this->client->post([$type, $recordType, 'report'], null, $params);
    }
    
    /**
     * 描述 : 下载
     * 参数 :
     *       'id' : 报表ID
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function download($id) {
        $report = $this->client->get([self::BASE_URL, $id]);
        // 如果报表存在，下载、格式化并返回
        if ($report->status == 'SUCCESS') {
            $result = $this->client->download($report->location);
        } else {
            $result = $this->client->download($this->client->baseUrl . '/reports/' . $report->reportId . '/download');
        }
        return $result;
    }
    
    /**
     * 描述 : 获取SP活动报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Campaigns-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getCampaigns($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('sp', 'campaigns', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取HSA活动报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Campaigns-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getCampaignsHSA($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('hsa', 'campaigns', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取SP广告组报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Ad-Group-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getAdGroups($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('sp', 'adGroups', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取HSA广告组报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Ad-Group-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getAdGroupsHSA($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('hsa', 'adGroups', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取SP关键字报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Keyword-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getKeywords($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('sp', 'keywords', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取HSA关键字报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Keyword-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getKeywordsHSA($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('hsa', 'keywords', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取产品广告报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Product-Ads-reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getProductAds($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('sp', 'productAds', $reportDate, $segment, $metrics);
    }
    
    /**
     * 描述 : 获取产品定位报表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/reports#Product-Targeting-Reports
     * 参数 ：
     *       'reportDate' : 报表日期
     *       'segment' : 分段
     *       'metrics' : 指标
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getProductTargeting($reportDate, $segment = null, $metrics = []) {
        return $this->retrieve('sp', 'targets', $reportDate, $segment, $metrics);
    }
}
