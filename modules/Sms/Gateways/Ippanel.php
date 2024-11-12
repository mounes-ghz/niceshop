<?php

namespace Modules\Sms\Gateways;

use Exception;
use Illuminate\Support\Facades\Http;
use Modules\Sms\GatewayInterface;
use Modules\Sms\Exceptions\SmsException;

class Ippanel implements GatewayInterface
{
    /**
     * @throws SmsException
     */
    public function send(string $to, string $type, array $data)
    {
        try {
            $api_key    = setting('ippanel_api_key');
            $fromNum    = setting('sms_from');
            $varriables = $this->getDataString($type, $data);
            $pid        = $this->getPatternCode($type);

            $this->client()::withHeaders([
                'apikey' => $api_key,
            ])->post("https://api2.ippanel.com/api/v1/sms/pattern/normal/send", [
                'code'      => $pid,
                'sender'    => $fromNum,
                'recipient' => $to,
                'variable'  => $varriables
            ]);

        } catch (Exception $e) {
            throw new SmsException('Ippanel: ' . $e->getMessage());
        }
    }

    public function client()
    {
        return Http::class;
    }

    private function getDataString($type, $data)
    {
        $varriables = [];

        switch ($type) {
            case "welcome_sms": {
                    $varriables = [
                        'first_name' => $data['user']->first_name,
                        'last_name'  => $data['user']->last_name
                    ];
                    break;
                }
            case "new_order_admin_sms": {
                    $varriables = [
                        'order_id' => $data['order']->id
                    ];
                    break;
                }
            case "new_order_sms": {
                    $varriables = [
                        'first_name' => $data['order']->customer_first_name,
                        'last_name'  => $data['order']->customer_last_name,
                        'order_id'   => $data['order']->id,
                    ];
                    break;
                }
            case "sms_order_statuses": {
                    $varriables = [
                        'first_name' => $data['order']->customer_first_name,
                        'last_name'  => $data['order']->customer_last_name,
                        'order_id'   => $data['order']->id,
                        'status'     => mb_strtolower($data['order']->status())
                    ];
                    break;
                }
        }

        return $varriables;
    }

    private function getPatternCode($type)
    {
        switch ($type) {
            case "welcome_sms": {
                    return setting('ippanel_welcome_sms_pattern');
                }
            case "new_order_admin_sms": {
                    return setting('ippanel_new_order_admin_sms_pattern');
                }
            case "new_order_sms": {
                    return setting('ippanel_new_order_sms_pattern');
                }
            case "sms_order_statuses": {
                    return setting('ippanel_sms_order_statuses_pattern');
                }
        }
    }
}
