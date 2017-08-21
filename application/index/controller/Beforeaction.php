<?php

namespace app\index\controller;

use think\Controller;

class Beforeaction extends Controller
{
    protected $beforeActionList = [
        'first',
        'second' => ['except' => 'hello'],
        'three'  => ['only' => 'hello,data'],
    ];

    protected function first()
    {
        echo 'first<br/>';
    }

    protected function second()
    {
        echo 'second<br/>';
    }

    protected function three()
    {
        echo 'three<br/>';
    }

    public function hello()
    {
        return 'hello';
    }

    public function data()
    {
        $server = $_SERVER;
        var_dump($server);
    }
}