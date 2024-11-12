<?php

return [
    'name' => 'نام',
    'slug' => 'آدرس اینترنتی',
    'description' => 'توضیحات',
    'short_description' => 'توضیحات کوتاه',
    'brand_id' => 'برند',
    'categories' => 'دسته‌بندی‌ها',
    'tax_class_id' => 'کلاس مالیاتی',
    'tags' => 'برچسب‌ها',
    'is_virtual' => 'مجازی',
    'is_active' => 'وضعیت',
    'price' => 'قیمت',
    'special_price' => 'قیمت ویژه',
    'special_price_type' => 'نوع قیمت ویژه',
    'special_price_start' => 'شروع قیمت ویژه',
    'special_price_end' => 'پایان قیمت ویژه',
    'sku' => 'SKU',
    'manage_stock' => 'مدیریت موجودی',
    'qty' => 'تعداد',
    'in_stock' => 'موجودی انبار',
    'new_from' => 'جدید از',
    'new_to' => 'جدید تا',
    'up_sells' => 'فروش‌های تکمیلی',
    'cross_sells' => 'فروش‌های متقاطع',
    'related_products' => 'محصولات مرتبط',

    # product attributes
    'attributes' => [
        '*.attribute_id' => 'ویژگی',
        '*.values' => 'مقادیر',
    ],

    # product options
    'options' => [
        '*.name' => 'نام',
        '*.type' => 'نوع',
        '*.values.*.label' => 'برچسب',
        '*.values.*.price' => 'قیمت',
        '*.values.*.price_type' => 'نوع قیمت',
    ],

    # product variations
    'variations' => [
        '*.name' => 'نام',
        '*.type' => 'نوع',
        '*.values' => 'مقادیر',
        '*.values.*.label' => 'برچسب',
        '*.values.*.color' => 'رنگ',
        '*.values.*.image' => 'تصویر',
    ],

    # product variants
    'variants' => [
        '*.name' => 'نام',
        '*.sku' => 'SKU',
        '*.is_active' => 'وضعیت',
        '*.is_default' => 'پیش فرض',
        '*.price' => 'قیمت',
        '*.special_price' => 'قیمت ویژه',
        '*.special_price_type' => 'نوع قیمت ویژه',
        '*.special_price_start' => 'شروع قیمت ویژه',
        '*.special_price_end' => 'پایان قیمت ویژه',
        '*.manage_stock' => 'مدیریت موجودی',
        '*.qty' => 'تعداد',
        '*.in_stock' => 'موجودی انبار',
    ],
];
