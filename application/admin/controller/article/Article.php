<?php

namespace app\admin\controller\article;

use app\admin\controller\Admin;
use think\Db;

class Article extends Admin
{
    /**
     * 分类列表
     */
    public function index()
    {
        $categorys = Db::name('article')->select();

        $this->assign('categorys', $categorys);
        return view();
    }


    /**
     * 增加分类
     */
    public function add()
    {
        // 显示增加页面
        if ($this->request->isGet())
        {
            return view();
        }

        // 增加分类
        if ($this->request->isPost())
        {
            $title  = input('title', '');
            $type  = input('type', 0, '\intval');
            $intro = input('intro', '');
            $raw = input('raw', '');
            $is_raw = input('is_raw',  0, '\intval');



            if (!$title || !$type || !$raw || !$is_raw)
            {
                $this->error('名称不能为空');
            }

            $categoryAdd = Db::name('article')->insert(
                [
                    'title'    => $title,
                    'type'     => $type,
                    'intro'    => $intro,
                    'raw'      => $raw,
                    'is_raw'  => $is_raw,
                    'add_time' => date('Y-m-d H:i:s'),
                ]
            );

            if ($categoryAdd)
            {
                $this->success('分类增加成功！',url('@admin/article/article/index'));
            }
            else
            {
                $this->error('分类增加失败');
            }
        }

    }


    /**
     * 删除分类
     */
    public function del()
    {
        $cid = input('id',0,'\intval');

        if ($cid)
        {
            $categoryDel = Db::name('article')->delete($cid);
            if ($categoryDel)
            {
                $this->success('删除成功！');
            }
        }

        $this->error('删除失败，请重试！');

    }
}