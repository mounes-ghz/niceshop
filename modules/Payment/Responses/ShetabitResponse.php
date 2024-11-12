<?php

namespace Modules\Payment\Responses;

use Modules\Order\Entities\Order;
use Modules\Payment\GatewayResponse;
use Modules\Payment\HasTransactionReference;
use Modules\Payment\ShouldRedirect;

class ShetabitResponse extends GatewayResponse implements HasTransactionReference
{
    private $order;
    private $clientResponse;

    public function __construct(Order $order, array|object $clientResponse)
    {
        $this->order = $order;
        $this->clientResponse = $clientResponse;
    }


    public function getOrderId()
    {
        return $this->order->id;
    }


    public function getTransactionReference()
    {
        return $this->clientResponse->getReferenceId();
    }


    public function toArray()
    {
        return (array)$this->clientResponse;
    }
}
