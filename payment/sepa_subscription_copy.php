<?php
require '../pusher/vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_test_51R6RrKBU6QReLcf7tlvZLrb7XDPd1n662P6IYK0qNDiKtUtcEbhTWnIJ4tGivNBpHpZQtRKfKOFuMk0N6Gov0ZEW00iTGesMC6");

header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);

try {
    // Create a new customer
    $customer = \Stripe\Customer::create([
        // 'email' => $input['email'],
        'payment_method' => $input['payment_method'],
        'invoice_settings' => ['default_payment_method' => $input['payment_method']],
    ]);

    // Create a subscription for the customer
    $subscription = \Stripe\Subscription::create([
        'customer' => $customer->id,
        'items' => [['price' => 'price_1R6XUdBU6QReLcf7QscccMXf']], // Replace with your Stripe Price ID
        'expand' => ['latest_invoice.payment_intent'],
    ]);

    echo json_encode(['message' => 'Subscription created successfully!', 'subscription' => $subscription]);
} catch (Exception $e) {
    echo json_encode(['message' => 'Subscription failed!', 'error' => $e->getMessage()]);
}
?>
