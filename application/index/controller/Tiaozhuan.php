<?php

namespace app\index\controller;

use think\Controller;

class Tiaozhuan extends Controller
{
    public function index()
    {
        $this->success('ssssss', 'Index/index');
    }

    public function errortest()
    {
        $this->error('错误页面');
    }


}