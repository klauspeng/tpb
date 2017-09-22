<?php

namespace app\index\controller;

use think\Cache;
use think\Controller;
use think\Session;


class Index extends Controller
{

    // 控制器初始化
    public function _initialize()
    {
    }

    public function index()
    {
        Session::set('name','lp');
        echo Session::get('name');
        // return view();

        // 赋值think作用域
        session('name', 'thinkphp', 'think');

    }

}
