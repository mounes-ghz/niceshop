<?php

use Modules\Blog\Entities\BlogPost;

return [
    'posts' => [
        'name' => 'پست وبلاگ',
        'groups' => [
            'featured_image' => 'تصویر شاخص',
            'publish' => 'انتشار',
            'categories' => 'دسته‌بندی‌ها',
            'tags' => 'برچسب‌ها',
            'general' => 'عمومی',
            'seo' => 'سئو'
        ],
        'form' => [
            'enable_the_blog_category' => 'فعال کردن دسته‌بندی وبلاگ',
            'publish_status' => [
                BlogPost::PUBLISHED => 'منتشر شده',
                BlogPost::UNPUBLISHED => 'منتشر نشده'
            ],
        ],
    ],
    'categories' => [
        'name' => 'دسته‌بندی وبلاگ'
    ],
    'tags' => [
        'name' => 'برچسب وبلاگ'
    ]
];