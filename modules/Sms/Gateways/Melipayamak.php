<?php

namespace Modules\Sms\Gateways;

use Exception;
use Illuminate\Support\Facades\Http;
use Modules\Sms\GatewayInterface;
use Modules\Sms\Exceptions\SmsException;
use Melipayamak\MelipayamakApi;

class Melipayamak implements GatewayInterface
{
    /**
     * @throws SmsException
     */
    public function send(string $to, string $type, array $data)
    {

        try {
            $username   = setting('melipayamak_username');
            $password   = setting('melipayamak_password');
            $api        = new MelipayamakApi($username, $password);
            $sms        = $api->sms('soap');
            $to         = $to;
            $template   = $this->getPatternCode($type);
            $input_data = $this->getDataString($type, $data);
            $text       = implode(';', $input_data);

            $response = $sms->sendByBaseNumber($text, $to, $template);

            $message = json_encode($response);
        } catch (Exception $e) {
            throw new SmsException('Melipayamak: ' . $e->getMessage());
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
                        '0' => $data['user']->first_name . ' ' . $data['user']->last_name,
                    ];
                    break;
                }
            case "new_order_admin_sms": {
                    $varriables = [
                        '0' => $data['order']->id
                    ];
                    break;
                }
            case "new_order_sms": {
                    $varriables = [
                        '0' => $data['order']->customer_first_name . ' ' . $data['order']->customer_last_name,
                        '1' => $data['order']->id,
                    ];
                    break;
                }
            case "sms_order_statuses": {
                    $varriables = [
                        '0' => $data['order']->customer_first_name . ' ' . $data['order']->customer_last_name,
                        '1' => $data['order']->id,
                        '2' => mb_strtolower($data['order']->status()),
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
                    return setting('melipayamak_welcome_sms_pattern');
                }
            case "new_order_admin_sms": {
                    return setting('melipayamak_new_order_admin_sms_pattern');
                }
            case "new_order_sms": {
                    return setting('melipayamak_new_order_sms_pattern');
                }
            case "sms_order_statuses": {
                    return setting('melipayamak_sms_order_statuses_pattern');
                }
        }
    }
}
