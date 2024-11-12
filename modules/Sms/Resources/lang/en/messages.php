<?php

return [
    'welcome' => "Welcome :first_name,\nYour account has been created successfully",
    'new_order' => 'A new order has been placed. The order id is #:order_id',
    'order_has_been_placed' => "Hi :first_name,\nYour order #:order_id has been placed. Thanks for shopping with us",
    'order_status_changed' => "Hi :first_name,\nYour order #:order_id status is changed to :status",

    'ippanel_welcome_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br> Welcome :%first_name% %last_name%,<br>Your account has been successfully created<br>:store_name</div>',
    'ippanel_new_order_admin_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text:<br>A new order has been placed. The order number is %order_id%<br>:store_name</div>',
    'ippanel_new_order_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text:<br>Hello %first_name% %last_name%,<br>Your order with number %order_id% has been registered. Thank you for your purchase<br>:store_name</div>',
    'ippanel_sms_order_statuses_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text:<br>Hello %first_name% %last_name%,<br>The status of your order with number %order_id% has changed to %status%<br>:store_name</div>',

    'kavenegar_welcome_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br> Welcome %token20, your account has been created with mobile number %token<br>:store_name</div>',
    'kavenegar_new_order_admin_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text:<br>A new order has been placed. The order number is %token<br>:store_name</div>',
    'kavenegar_new_order_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br>Hello %token20,<br>Your order with order number %token has been placed. Thank you for your purchase<br>:store_name</div>',
    'kavenegar_sms_order_statuses_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br>The status of your order with order number %token has been updated to %token20<br>:store_name</div>',

    'melipayamak_welcome_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br> Welcome: {0},<br>Your account has been successfully created <br>:store_name</div>',
    'melipayamak_new_order_admin_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text:<br>A new order has been placed. The order number is {0}<br>:store_name</div>',
    'melipayamak_new_order_sms_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br>Hello {0},<br>Your order with order number {1} has been placed. Thank you for your purchase<br>:store_name</div>',
    'melipayamak_sms_order_statuses_sample' => '<div class="alert alert-warning p-0 mb-0">Sample text: <br>Hello {0},<br>The status of your order with order number {1} has been updated to {2}<br>:store_name</div>',

];
