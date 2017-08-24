<?php

namespace app\index\controller;

use think\Controller;

class Index extends Controller
{

    // 控制器初始化
    public function _initialize()
    {
    }

    public function index()
    {
        dump(config('view_replace_str'));
        $this->assign('script', '111111');
        $this->assign('title', 'blog');
        return view();
    }

}
