<?php

namespace Modules\Checkout\Listeners;

use Modules\Sms\Sms;
use Modules\Order\Entities\Order;
use Modules\Checkout\Events\OrderPlaced;

class SendNewOrderSms
{
    /**
     * Handle the event.
     *
     * @param OrderPlaced $event
     *
     * @return void
     */
    public function handle(OrderPlaced $event)
    {
        $this->sendAdminSms($event->order);
        $this->sendCustomerSms($event->order);
    }


    private function sendAdminSms(Order $order)
    {
        if (!setting('new_order_admin_sms')) {
            return;
        }

        Sms::send(
            setting('store_phone'),
            'new_order_admin_sms',
            ['message' => $this->adminMessage($order), 'order' => $order]
        );
    }


    private function adminMessage(Order $order)
    {
        return trans('sms::messages.new_order', ['order_id' => $order->id]);
    }


    private function sendCustomerSms(Order $order)
    {
        if (!setting('new_order_sms')) {
            return;
        }

        Sms::send(
            $order->customer_phone,
            'new_order_sms',
            ['message' => $this->customerMessage($order), 'order' => $order]
        );
    }


    private function customerMessage(Order $order)
    {
        return trans('sms::messages.order_has_been_placed', [
            'first_name' => $order->customer_first_name,
            'order_id' => $order->id,
        ]);
    }
}
