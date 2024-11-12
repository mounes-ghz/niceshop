<?php

return [
    'attributes' => [
        'attribute_set_id' => 'مجموعه ویژگی',
        'name' => 'نام',
        'categories' => 'دسته‌بندی‌ها',
        'slug' => 'آدرس اینترنتی',
        'is_filterable' => 'قابل فیلتر',
    ],
    'attribute_sets' => [
        'name' => 'نام',
    ],
    'product_attributes' => [
        'attributes.*.attribute_id' => 'ویژگی',
        'attributes.*.values' => 'مقادیر',
    ],
];
