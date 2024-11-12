<?php

namespace Modules\Payment\Gateways;

use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Modules\Order\Entities\Order;
use Modules\Payment\GatewayInterface;
use Modules\Payment\Responses\ShetabitResponse;
use Shetabit\Multipay\Invoice;
use Shetabit\Multipay\Payment;
use Modules\Payment\Responses\SamplePayResponse;

class Shetabit implements GatewayInterface
{
    public $label;
    public $via;
    public $description;
    protected $paymentConfig;

    public function __construct($via)
    {
        $this->via         = $via;
        $this->label       = setting($via . '_gateway_label');
        $this->description = setting($via . '_gateway_description');
    }

    public function purchase(Order $order, Request $request)
    {
        if (currency() != 'IRR') {
            throw new Exception(trans('payment::messages.currency_not_supported'));
        }

        $payment = new Payment();
        $amount  = $order->total->convertToCurrentCurrency()->amount();

        try {
            $response = $payment->via($this->via)
                ->config($this->getConfigs())
                ->callbackUrl($this->getRedirectUrl($order))
                ->purchase(
                    (new Invoice)->amount($amount),
                    function ($driver, $transactionId) use ($order, $amount) {
                        session()->put('transactionId', (string) $transactionId);
                        session()->put('amount', $amount);
                    }

                )->pay();
        } catch (Exception $e) {
            throw $e;
        }

        return new ShetabitResponse($order, [
            'method' => $response->getMethod(),
            'action' => $response->getAction(),
            'inputs' => $response->getInputs(),
        ]);
    }

    public function complete(Order $order)
    {
        $transactionId = session()->get('transactionId');
        $amount        = $order->total->convertToCurrentCurrency()->amount();

        $payment = new Payment();

        try {
            $receipt = $payment->via($this->via)
                ->config($this->getConfigs())
                ->amount(intval($amount))->transactionId($transactionId)->verify();

            return new ShetabitResponse($order, $receipt);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            die($e->getMessage());
        }
    }

    private function getRedirectUrl($order)
    {
        return route('checkout.complete.store', ['orderId' => $order->id, 'paymentMethod' => $this->via]);
    }

    private function getPaymentFailedUrl($order)
    {
        return route('account.orders.show', ['id' => $order->id]);
    }

    public function getConfigs()
    {
        $configs = [];

        switch ($this->via) {
            case "zarinpal": {
                    $configs['merchantId'] = setting('zarinpal_merchantId');
                    break;
                }

            case "payping": {
                    $configs['merchantId'] = setting('payping_merchantId');
                    break;
                }
            case "irankish": {
                    $configs['terminalId'] = setting('irankish_terminalId');
                    $configs['password']   = setting('irankish_password');
                    $configs['acceptorId'] = setting('irankish_acceptorId');
                    $configs['pubKey']     = setting('irankish_pubKey');
                    break;
                }
            case "pasargad": {
                    $configs['merchantId']      = setting('pasargad_merchantId');
                    $configs['terminalCode']    = setting('pasargad_terminalCode');
                    $configs['certificate']     = setting('pasargad_certificate');
                    $configs['certificateType'] = 'xml_string';
                    break;
                }
            case "idpay": {
                    $configs['merchantId'] = setting('idpay_merchantId');
                    break;
                }
            case "saman": {
                    $configs['merchantId'] = setting('saman_merchantId');
                    break;
                }
            case "behpardakht": {
                    $configs['terminalId'] = setting('behpardakht_terminalId');
                    $configs['username']   = setting('behpardakht_username');
                    $configs['password']   = setting('behpardakht_password');
                    break;
                }
            case "payir": {
                    $configs['merchantId'] = setting('payir_merchantId');
                    break;
                }
            case "sepehr": {
                    $configs['terminalId'] = setting('sepehr_terminalId');
                    break;
                }
            case "sadad": {
                    $configs['key']        = setting('sadad_key');
                    $configs['merchantId'] = setting('sadad_merchantId');
                    $configs['terminalId'] = setting('sadad_terminalId');
                    break;
                }
            case "zibal": {
                    $configs['merchantId'] = setting('zibal_merchantId');
                    break;
                }
        }

        return $configs;
    }
}
