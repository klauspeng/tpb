<?php

namespace app\index\controller;

use think\Controller;
use think\Db;

class Article extends Controller
{

    // 控制器初始化
    public function _initialize()
    {
    }

    public function view()
    {
        $id = input('id',1,'\intval');
        $article = Db::name('article')->find($id);

        $content = file_get_contents($article['raw']);
        $this->assign('content',$content);
        return view();
    }

}
