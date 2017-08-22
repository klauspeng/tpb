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
        $this->assign('script','111111');
        return view();
    }

    public function test()
    {
        return view('test');
    }
}
