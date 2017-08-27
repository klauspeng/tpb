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
        // 显示增加页面
        if ($this->request->isGet()) {
            return view();
        }

        // 增加分类
        if ($this->request->isPost()) {
            $name = $this->request->param('name', '');
            $pid  = $this->request->param('pid', 0, '\intval');

            if (!$name) {
                return json_encode(
                    [
                        'status' => 400,
                        'info'   => '名称不能为空'
                    ]
                );
            }

            $categoryAdd = Db::name('article_type')->insert(
                [
                    'name'     => $name,
                    'pid'      => $pid,
                    'add_time' => date('Y-m-d H:i:s'),
                ]
            );
            dump($categoryAdd);
        }

    }
}