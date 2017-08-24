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
        $categorys = Db::name('article_type')->select();
        // $categorys && $categorys = make_tree($categorys);

        $this->assign('categorys', $categorys);
        return view();
    }


    public function add()
    {

    }
}