<?php

namespace Modules\Sms\Gateways;

use Exception;
use Illuminate\Support\Facades\Http;
use Modules\Sms\GatewayInterface;
use Modules\Sms\Exceptions\SmsException;
use Illuminate\Support\Facades\Config;
use Kavenegar as KavenegarService;

class Kavenegar implements GatewayInterface
{
    /**
     * @throws SmsException
     */
    public function send(string $to, string $type, array $data)
    {
        Config::set('kavenegar.apikey', setting('kavenegar_api_key'));

        try {
            $input_data = $this->getDataString($type, $data);

            $template     = $this->getPatternCode($type);

            $token   = $input_data['token'] ?? null;
            $token2  = $input_data['token2'] ?? null;
            $token3  = $input_data['token3'] ?? null;
            $token10 = $input_data['token10'] ?? null;
            $token20 = $input_data['token20'] ?? null;

            $result = KavenegarService::VerifyLookup($to, $token, $token2, $token3, $template, $type = null, $token10, $token20);

            // $response = json_encode($result);
        } catch (\Kavenegar\Exceptions\ApiException $e) {
            // در صورتی که خروجی وب سرویس 200 نباشد این خطا رخ می دهد
            throw new SmsException('Kavenegar: ' . $e->getMessage());
        } catch (\Kavenegar\Exceptions\HttpException $e) {
            // در زمانی که مشکلی در برقرای ارتباط با وب سرویس وجود داشته باشد این خطا رخ می دهد
            throw new SmsException('Kavenegar: ' . $e->getMessage());
        } catch (Exception $e) {
            throw new SmsException('Kavenegar: ' . $e->getMessage());
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
                        'token20' => $data['user']->first_name . ' ' . $data['user']->last_name,
                        'token'   => $data['user']->phone,
                    ];
                    break;
                }
            case "new_order_admin_sms": {
                    $varriables = [
                        'token' => $data['order']->id
                    ];
                    break;
                }
            case "new_order_sms": {
                    $varriables = [
                        'token20' => $data['order']->customer_first_name . ' ' . $data['order']->customer_last_name,
                        'token'   => $data['order']->id,
                    ];
                    break;
                }
            case "sms_order_statuses": {
                    $varriables = [
                        'token20' => mb_strtolower($data['order']->status()),
                        'token'   => $data['order']->id,
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
                    return setting('kavenegar_welcome_sms_pattern');
                }
            case "new_order_admin_sms": {
                    return setting('kavenegar_new_order_admin_sms_pattern');
                }
            case "new_order_sms": {
                    return setting('kavenegar_new_order_sms_pattern');
                }
            case "sms_order_statuses": {
                    return setting('kavenegar_sms_order_statuses_pattern');
                }
        }
    }
}
