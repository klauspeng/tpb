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


    /**
     * 增加分类
     */
    public function add()
    {
        $request = request();
        url();

        // 显示增加页面
        if ($request->isGet())
        {
            return view();
        }

        // 增加分类
        if ($request->isAjax() && $request->isPost())
        {

        }

    }
}