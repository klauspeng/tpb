<?php

return [
    '__pattern__'                  => [
        'name' => '\w+',
        'id'   => '\d+',
    ],
    // 文章分类列表
    'admin/article/category/index' => ['admin/article.category/index', ['method' => 'get|post']],
    'admin/article/category/add'   => ['admin/article.category/add', ['method' => 'get|post']],
    'admin/article/category/del'   => ['admin/article.category/del', ['method' => 'get|post']],
    // 文章
    'admin/article/article/index'  => ['admin/article.article/index', ['method' => 'get|post']],
    'admin/article/article/add'    => ['admin/article.article/add', ['method' => 'get|post']],
    'admin/article/article/del'    => ['admin/article.article/del', ['method' => 'get|post']],
];
