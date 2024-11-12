<?php

use Modules\Tax\Entities\TaxClass;

return [
    'tax' => 'مالیات',
    'taxes' => 'مالیات‌ها',

    'table' => [
        'tax_class' => 'کلاس مالیاتی',
    ],

    'tabs' => [
        'group' => [
            'tax_information' => 'اطلاعات مالیاتی',
        ],
        'general' => 'عمومی',
        'rates' => 'نرخ‌ها',
    ],

    'form' => [
        'add_new_rate' => 'افزودن نرخ جدید',
        'delete_rate' => 'حذف نرخ',

        'based_on' => [
            TaxClass::SHIPPING_ADDRESS => 'آدرس ارسال',
            TaxClass::BILLING_ADDRESS => 'آدرس صورت‌حساب',
            TaxClass::STORE_ADDRESS => 'آدرس فروشگاه',
        ],
    ],
];
