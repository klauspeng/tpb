<?php

namespace app\admin\controller\article;

use app\admin\controller\Admin;
use think\Db;

class Category extends Admin
{
    /**
     * 分类列表
     */
    public function index()
    {
        $result = Db::name('article_type')->where('id',2)->find();
        dump($result);
    }
}