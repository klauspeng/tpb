<?php

return [
    '__pattern__'                  => [
        'name' => '\w+',
        'id'   => '\d+',
    ],
    // 文章分类列表
    'article/category/index' => ['admin/article.category/index', ['method' => 'get|post']],
    'article/category/add'   => ['admin/article.category/add', ['method' => 'get|post']],
    'article/category/del'   => ['admin/article.category/del', ['method' => 'get|post']],
    // 文章
    'article/article/index'  => ['admin/article.article/index', ['method' => 'get|post']],
    'article/article/add'    => ['admin/article.article/add', ['method' => 'get|post']],
    'article/article/del'    => ['admin/article.article/del', ['method' => 'get|post']],
];
