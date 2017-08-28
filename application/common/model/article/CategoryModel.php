<?php

namespace app\common\model\article;

use think\Model;
use think\Db;
use think\Cache;

class CategoryModel extends Model
{
    // 分类树缓存名称
    private static $treeName = 'category_tree';

    /**
     * 获取分类树
     */
    public static function getTree()
    {
        $cache = Cache::get(self::$treeName);

        if ($cache)
        {
            return $cache;
        }

        $categorys = Db::name('article_type')->select();
        $categorys && $categorys = make_tree($categorys);

        // 缓存1小时
        Cache::set(self::$treeName, $categorys, 3600);
        return $categorys;
    }
}