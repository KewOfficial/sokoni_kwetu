<?php

namespace App\Services;

use MpesaSdk; // Replace with the actual Mpesa SDK

class MpesaService
{
    public function processPayment($orderId)
    {
        // Obtain the access token
        $accessToken = $this->getAccessToken();

        // Initialize Mpesa SDK with your credentials and access token
        $mpesaSdk = new MpesaSdk('SJCsbfcgDkPjYJpg25vGdDW1Dl3UQnFp', 'oUKgSfGypMqtN4uu', 'your_mpesa_short_code', $accessToken);

        // Generate a payment request and obtain the payment result
        $paymentResult = $mpesaSdk->initiatePayment($orderId);

        // Check for payment success or failure and return appropriate response
        if ($paymentResult->wasSuccessful()) {
            return ['success' => true, 'message' => 'Mpesa payment successful'];
        } else {
            return ['success' => false, 'message' => 'Mpesa payment failed: ' . $paymentResult->getError()];
        }
    }

    private function getAccessToken()
    {
        // Make the cURL request to obtain the access token
        $ch = curl_init('https://sandbox.safaricom.co.ke/oauth/v1/generate?grant_type=client_credentials');
        curl_setopt($ch, CURLOPT_HTTPHEADER, ['Authorization: Basic U0pDc2JmY2dEa1BqWUpwZzI1dkdkRFcxRGwzVVFuRnA6b1VLZ1NmR3lwTXF0TjR1dQ==']);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($ch);
        curl_close($ch);

        // Decode the JSON response and return the access token
        $responseData = json_decode($response, true);
        return $responseData['access_token'];
    }
}
