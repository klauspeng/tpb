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

        $this->assign('article',$article);
        return view();
    }

}
