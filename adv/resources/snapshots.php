<?php

namespace adv\resources;

use adv\client;
use Exception;

/**
 * 描述 : 快照类
 * 注明 :
 *       '类目录' : adv\resources;
 *       'Client' : 客户配置信息
 *       '地址' : https://advertising.amazon.com/API/docs/v2/reference/snapshots
 * 作者 : LiuYun
 */
class snapshots {
    
    const BASE_URL = 'snapshot';
    
    /**
     * 描述 : 初始化配置
     * 作者 : LiuYun
     */
    public function __construct(client $client) {
        $this->client = $client;
    }
    
    /**
     * 描述 : SP请求
     * 参数 :
     *       'recordTyp' : 记录类型
     *       'stateFilter' : 状态过滤
     * 注明 ：
     *       '地址'：https://advertising.amazon.com/API/docs/v2/reference/snapshots#requestSnapshot
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function request($recordType, $stateFilter) {
        return $this->client->post(['sp', $recordType, self::BASE_URL], null, [
            'stateFilter' => $stateFilter
        ]);
    }
    
    /**
     * 描述 : HSA请求
     * 参数 :
     *       'recordTyp' : 记录类型
     *       'stateFilter' : 状态过滤
     * 注明 ：
     *       '地址'：https://advertising.amazon.com/API/docs/v2/reference/snapshots#requestSnapshot
     * 返回 : mixed
     * 作者 : LiuYun
     * @throws Exception
     */
    public function requestHSA($recordType, $stateFilter) {
        return $this->client->post(['hsa', $recordType, self::BASE_URL], null, [
            'stateFilter' => $stateFilter
        ]);
    }
}
