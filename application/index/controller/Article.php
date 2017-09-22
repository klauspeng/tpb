<?php

namespace app\index\controller;

use think\Cache;
use think\Controller;
use think\Db;

class Article extends Controller
{
    // 文章前缀
    private $prefix = 'article_';
    // 缓存时间 1小时
    private $cachaeTime = 3600 * 1;


    // 控制器初始化
    public function _initialize()
    {
    }

    public function view()
    {
        $id      = input('id', 1, '\intval');
        $article = Db::name('article')->find($id);

        // 文章缓存，不存在获取并缓存
        $content = Cache::get($this->prefix . $id);
        if (!$content)
        {
            $content = file_get_contents($article['raw']);
            Cache::set($this->prefix . $id, $content, $this->cachaeTime);
        }

        $Parsedown = new \Parsedown();
        $html      = $Parsedown->text($content);
        $this->assign('content', $html);
        return view();
    }

}
