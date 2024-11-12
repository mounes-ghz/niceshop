<?php

namespace Modules\Checkout\Http\Controllers;

use Exception;
use Illuminate\Http\Response;
use Modules\Order\Entities\Order;
use Modules\Payment\Facades\Gateway;
use Modules\Checkout\Events\OrderPlaced;
use Modules\Checkout\Services\OrderService;
use Modules\Payment\Gateways\Shetabit;
use Shetabit\Multipay\Payment;

class CheckoutCompleteController
{
    /**
     * Store a newly created resource in storage.
     *
     * @param int $orderId
     * @param OrderService $orderService
     *
     * @return Response
     */
    public function store($orderId, OrderService $orderService)
    {
        $order = Order::findOrFail($orderId);

        switch (request()->query('paymentMethod')) {
            case "iyzico": {
                    try {
                        $request = new \Iyzipay\Request\RetrieveCheckoutFormRequest();
                        $request->setLocale(
                            locale() === 'tr'
                                ? \Iyzipay\Model\Locale::TR
                                : \Iyzipay\Model\Locale::EN
                        );
                        $request->setConversationId(request()->query('reference'));
                        $request->setToken($_POST['token']);

                        $options = new \Iyzipay\Options();
                        $options->setApiKey(setting('iyzico_api_key'));
                        $options->setSecretKey(setting('iyzico_api_secret'));
                        $options->setBaseUrl(
                            setting('iyzico_test_mode')
                                ? 'https://sandbox-api.iyzipay.com'
                                : 'https://api.iyzipay.com'
                        );

                        $response = \Iyzipay\Model\CheckoutForm::retrieve($request, $options);

                        if ($response->getPaymentStatus() !== 'SUCCESS') {
                            return redirect()->route('checkout.payment_canceled.store', ['orderId' => $orderId, 'paymentMethod' => request()->query('paymentMethod')]);
                        }
                    } catch (Exception $e) {
                        return redirect()->route('checkout.payment_canceled.store', ['orderId' => $orderId, 'paymentMethod' => request()->query('paymentMethod')]);
                    }

                    break;
                }
            case 'payir':
            case 'zarinpal':
            case 'zibal':
            case 'sadad':
            case 'saman':
            case 'sepehr':
            case 'idpay':
            case 'irankish':
            case 'behpardakht':
            case 'payping': {
                    $transactionId = session()->get('transactionId');
                    $amount        = $order->total->convertToCurrentCurrency()->amount();

                    $payment = new Payment();
                    $shetabit = new Shetabit(request()->query('paymentMethod'));

                    try {
                        $receipt = $payment->via(request()->query('paymentMethod'))
                            ->config($shetabit->getConfigs())
                            ->amount(intval($amount))->transactionId($transactionId)->verify();
                    } catch (Exception $e) {
                        return redirect()->route('checkout.payment_canceled.store', ['orderId' => $orderId, 'paymentMethod' => request()->query('paymentMethod')]);
                    }

                    break;
                }
        }

        $gateway = Gateway::get(request('paymentMethod'));

        try {
            $response = $gateway->complete($order);
        } catch (Exception $e) {
            $orderService->delete($order);

            return response()->json([
                'message' => $e->getMessage(),
            ], 403);
        }

        $order->storeTransaction($response);

        event(new OrderPlaced($order));

        if (!request()->ajax()) {
            return redirect()->route('checkout.complete.show');
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     *
     * @return Response
     */
    public function show()
    {
        $order = session('placed_order');

        if (is_null($order)) {
            return redirect()->route('home');
        }

        return view('storefront::public.checkout.complete.show', compact('order'));
    }
}
