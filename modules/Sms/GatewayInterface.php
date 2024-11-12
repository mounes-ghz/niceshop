<?php

namespace Modules\Sms;

interface GatewayInterface
{
    public function client();

    public function send(string $to, string $type, array $data);
}
