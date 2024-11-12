<?php

namespace Modules\Sms\Gateways;

use Exception;
use Vonage\Client;
use Vonage\SMS\Message\SMS;
use Modules\Sms\GatewayInterface;
use Vonage\Client\Credentials\Basic;
use Modules\Sms\Exceptions\SmsException;

class Vonage implements GatewayInterface
{
    public function send(string $to, string $type, array $data)
    {
        try {
            $text = new SMS($to, setting('sms_from'), $data['message']);

            $this->client()->sms()->send($text);
        } catch (Exception $e) {
            throw new SmsException('Vonage: ' . $e->getMessage());
        }
    }


    public function client()
    {
        return new Client(
            new Basic(setting('vonage_key'), setting('vonage_secret'))
        );
    }
}
