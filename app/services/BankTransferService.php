<?php
namespace App\Services;

use App\Models\Order;
use Illuminate\Support\Facades\Mail;
use App\Mail\PaymentConfirmationMail;

class BankTransferService
{
    public function processPayment($orderId)
    {
        $order = Order::find($orderId);
        $order->update(['status' => 'paid']);

        // Send email notification
        Mail::to($order->user->email)->send(new PaymentConfirmationMail($order));

        return ['success' => true, 'message' => 'Bank transfer successful'];
    }
}
