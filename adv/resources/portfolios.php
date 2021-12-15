<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 投资组合类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios
 * 作者 : LiuYun
 */
class portfolios {
    
    const BASE_URL = 'portfolios';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取投资组合列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#listPortfolios
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list($query = []) {
        return $this->client->get(self::BASE_URL, $query);
    }
    
    /**
     * 描述 : 获取投资组合列表属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#listPortfoliosEx
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function listExtended($query = []) {
        return $this->client->get([self::BASE_URL, 'extended'], $query);
    }
    
    /**
     * 描述 : 获取投资组合
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#getPortfolio
     * 参数 ： 'portfolioId' : 投资组合ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($portfolioId) {
        return $this->client->get([self::BASE_URL, $portfolioId]);
    }
    
    /**
     * 描述 : 获取投资组合属性
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#getPortfolioEx
     * 参数 ： 'portfolioId' : 投资组合ID
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function getExtended($portfolioId) {
        return $this->client->get([self::BASE_URL, 'extended', $portfolioId]);
    }
    
    /**
     * 描述 : 创建投资组合
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#createPortfolios
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function create($params = []) {
        return $this->client->post(self::BASE_URL, null, $params);
    }
    
    /**
     * 描述 : 更新投资组合
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/portfolios#updatePortfolios
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function update($params = []) {
        return $this->client->put(self::BASE_URL, null, $params);
    }
}
