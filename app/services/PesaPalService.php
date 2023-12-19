<?php
namespace App\Services;

use PesaPalSdk; // Replace with the actual PesaPal SDK

class PesaPalService
{
    public function processPayment($orderId)
    {
        // Initialize PesaPal SDK with your credentials
        $pesaPalSdk = new PesaPalSdk('your_pesapal_consumer_key', 'your_pesapal_consumer_secret', 'your_pesapal_env');

        // Generate a payment request and obtain the payment result
        $paymentResult = $pesaPalSdk->initiatePayment($orderId);

        // Check for payment success or failure and return appropriate response
        if ($paymentResult->isProcessed()) {
            return ['success' => true, 'message' => 'PesaPal payment successful'];
        } else {
            return ['success' => false, 'message' => 'PesaPal payment failed: ' . $paymentResult->getError()];
        }
    }
}
