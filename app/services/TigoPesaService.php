<?php
namespace App\Services;

use TigoPesaSdk; // Replace with the actual TigoPesa SDK

class TigoPesaService
{
    public function processPayment($orderId)
    {
        // Initialize TigoPesa SDK with your credentials
        $tigoPesaSdk = new TigoPesaSdk('your_tigo_api_key', 'your_tigo_api_secret');

        // Generate a payment request and obtain the payment result
        $paymentResult = $tigoPesaSdk->initiatePayment($orderId);

        // Check for payment success or failure and return appropriate response
        if ($paymentResult->isSuccessful()) {
            return ['success' => true, 'message' => 'Tigo Pesa payment successful'];
        } else {
            return ['success' => false, 'message' => 'Tigo Pesa payment failed: ' . $paymentResult->getError()];
        }
    }
}
