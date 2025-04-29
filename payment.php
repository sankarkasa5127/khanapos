<?php
require 'pusher/vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_live_qe185fheuHfYCeFrWHB20387");

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
try {
    $charge = \Stripe\Charge::create([
        'amount' => 1000, // Amount in cents (e.g., 10.00 USD)
        'currency' => 'usd',
        'source' => $input['token'],
        'description' => 'Test Payment',
        'receipt_email' => $input['email'],
        'metadata' => ['name' => $input['name']]
    ]);

    echo json_encode(['message' => 'Payment successful!', 'charge' => $charge]);
} catch (Exception $e) {
    echo json_encode(['message' => 'Payment failed!', 'error' => $e->getMessage()]);
}
?>
