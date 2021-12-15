<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 店铺类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 * 作者 : LiuYun
 */
class stores {
    
    const BASE_URL = 'stores';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : 获取店铺列表
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/stores#listStores
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function list() {
        return $this->client->get(self::BASE_URL);
    }
    
    /**
     * 描述 : 获取店铺
     * 参数 ：'brandEntityId' : 店铺ID
     * 注明 : '接口地址' : https://advertising.amazon.com/API/docs/v2/reference/stores#getStore
     * 返回 : 数组
     * 作者 : LiuYun
     * @throws Exception
     */
    public function get($brandEntityId) {
        return $this->client->get([self::BASE_URL, $brandEntityId]);
    }
}
