<?php

namespace Modules\Sms;

use Modules\Sms\Facades\Gateway;

class Sms
{
    public static function send($to, $type, $data)
    {
        if (!setting('sms_service')) {
            return;
        }

        $gateway = Gateway::get(setting('sms_service'));

        $gateway->send($to, $type, $data);
    }
}
