<?php

return [
    '__pattern__'                  => [
        'name' => '\w+',
        'id'   => '\d+',
    ],
    // 文章分类列表
    'admin/article/category/index' => ['admin/article.category/index', ['method' => 'get|post']],
];
