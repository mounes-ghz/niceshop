<?php

return [
    'reports' => 'گزارش‌ها',
    'no_data' => 'اطلاعاتی موجود نیست!',
    'filter' => 'فیلتر',
    'filters' => [
        'report_type' => 'نوع گزارش',
        'report_types' => [
            'coupons_report' => 'گزارش کوپن‌ها',
            'customers_order_report' => 'گزارش سفارش‌های مشتریان',
            'products_purchase_report' => 'گزارش خرید محصولات',
            'products_stock_report' => 'گزارش موجودی محصولات',
            'products_view_report' => 'گزارش بازدید محصولات',
            'branded_products_report' => 'گزارش محصولات برند',
            'categorized_products_report' => 'گزارش محصولات دسته‌بندی‌شده',
            'taxed_products_report' => 'گزارش محصولات مالیات‌دار',
            'tagged_products_report' => 'گزارش محصولات برچسب‌دار',
            'sales_report' => 'گزارش فروش',
            'search_report' => 'گزارش جستجو',
            'shipping_report' => 'گزارش حمل و نقل',
            'tax_report' => 'گزارش مالیات',
        ],
        'date_start' => 'تاریخ شروع',
        'date_end' => 'تاریخ پایان',
        'group_by' => 'گروه‌بندی بر اساس',
        'groups' => [
            'days' => 'روز',
            'weeks' => 'هفته‌',
            'months' => 'ماه‌',
            'years' => 'سال‌',
        ],
        'please_select' => 'لطفا انتخاب کنید',
        'status' => 'وضعیت سفارش',
        'coupon_code' => 'کد کوپن',
        'customer_name' => 'نام مشتری',
        'customer_email' => 'ایمیل مشتری',
        'product' => 'محصول',
        'sku' => 'SKU',
        'brand' => 'برند',
        'category' => 'دسته‌بندی',
        'tax_class' => 'کلاس مالیاتی',
        'tag' => 'برچسب',
        'keyword' => 'کلمه کلیدی',
        'quantity_below' => 'مقدار کمتر از',
        'quantity_above' => 'مقدار بیشتر از',
        'stock_availability' => 'وضعیت موجودی',
        'stock_availability_states' => [
            'in_stock' => 'موجود در انبار',
            'out_of_stock' => 'تمام شده',
        ],
        'shipping_method' => 'روش حمل و نقل',
        'tax_name' => 'نام مالیات',
    ],
    'table' => [
        'date' => 'تاریخ',
        'orders' => 'سفارش‌ها',
        'products' => 'محصولات',
        'product' => 'محصول',
        'products_count' => 'تعداد محصولات',
        'total' => 'کل',

        # coupons_report
        'coupon_name' => 'نام کوپن',
        'coupon_code' => 'کد کوپن',

        # customer orders report
        'customer_name' => 'ایمیل مشتری',
        'customer_email' => 'ایمیل مشتری',
        'customer_group' => 'گروه مشتری',
        'guest' => 'مهمان',
        'registered' => 'ثبت‌نام شده',

        # products purchase report
        'qty' => 'تعداد',

        # products stock report
        'stock_availability' => 'وضعیت موجودی',

        # products view report
        'views' => 'بازدیدها',

        # branded products report
        'brand' => 'برند',

        # category products report
        'category' => 'دسته‌بندی',

        # taxed products report
        'tax_class' => 'کلاس مالیاتی',

        # tagged products report
        'tag' => 'برچسب',

        # sales report
        'subtotal' => 'جمع فرعی',
        'shipping' => 'حمل و نقل',
        'discount' => 'تخفیف',
        'tax' => 'مالیات',

        # search report
        'keyword' => 'کلمه کلیدی',
        'results' => 'نتایج',
        'hits' => 'بازدیدها',

        # shipping report
        'shipping_method' => 'روش حمل و نقل',

        # tax report
        'tax_name' => 'نام مالیات',
    ],
];
