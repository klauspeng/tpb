<?php

namespace app\index\controller;

use think\Controller;


class Redis extends Controller
{

    private $redis = null;

    // 控制器初始化
    public function _initialize()
    {
        try
        {
            // 实例化Redis,并连接
            $this->redis = new \Redis();
            $this->redis->connect('192.168.100.77', 6379);

        } catch (\RedisException $e)
        {
            dump($e);
        }
    }

    public function index()
    {
        // 查看连接状态
        $ping = $this->redis->ping();
        echo $ping, '<br />';

        // 获取配置
        $option = $this->redis->getOption(\Redis::OPT_SERIALIZER);
        echo $option,'<br />';

        // 查看连接状态
        $ping = $this->redis->slowLog('get');;
        dump($ping);
    }

    public function hash()
    {
        // 实例化Redis,并连接
        $redis = new \Redis();
        $redis->connect('192.168.100.77', 6379);

        $hashName = 'hash';

        // 创建hash
        $redis->hset($hashName,'a',1);
        $redis->hSetNx($hashName,'b',2);
        $redis->hSetNx($hashName,'c',3);
        $redis->hSetNx($hashName,'d',4);

        // 获取所有
        dump($redis->hGetAll($hashName));

        // 获取值
        dump('hash中b的值：'.$redis->hget($hashName,'b'));

        // 获取长度
        dump('hash长度：'.$redis->hLen($hashName));

        // 删除
        $redis->hDel($hashName,'a');
        echo('删除a后：');
        dump($redis->hGetAll($hashName));

        // e是否存在
        echo 'e是否存在';
        dump($redis->hExists($hashName,'e'));
        echo 'b是否存在';
        dump($redis->hExists($hashName,'b'));

        // 批量添加
        $redis->hMset($hashName,['e'=>5,'f'=>6,'g'=>7]);
        dump($redis->hGetAll($hashName));

        // 批量获取
        dump($redis->hMGet($hashName,['b','d','g']));

    }

    public function list()
    {
        // 实例化Redis,并连接
        $redis = new \Redis();
        $redis->connect('192.168.100.77', 6379);

        $listName = 'list';
        $listName2 = 'list2';

        $redis->del($listName);
        $redis->lPush($listName,0);
        $redis->lPush($listName,1);
        $redis->lPush($listName,2);

        // 列表所有值
        echo '列表值：';
        dump($redis->lRange($listName, 0, -1));

        echo 'list长度：';
        dump($redis->lSize($listName));

        $result = $redis->blPop($listName,10);
        dump($result);

        // 列表所有值
        echo '列表值：';
        dump($redis->lRange($listName, 0, -1));

        // 增加
        $redis->lPushx($listName,2);

        // 弹出
        dump($redis->rPop($listName));

        // 列表所有值
        echo '列表值：';
        dump($redis->lRange($listName, 0, -1));

    }

}
