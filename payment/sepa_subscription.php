<?php
require '../pusher/vendor/autoload.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
\Stripe\Stripe::setApiKey("sk_test_51R6RrKBU6QReLcf7tlvZLrb7XDPd1n662P6IYK0qNDiKtUtcEbhTWnIJ4tGivNBpHpZQtRKfKOFuMk0N6Gov0ZEW00iTGesMC6");
// \Stripe\Stripe::setApiKey("sk_live_qe185fheuHfYCeFrWHB20387");

header('Content-Type: application/json');

$input = $_POST;
// $input = file_get_contents('php://input');
// $input = json_decode(file_get_contents('php://input'), true);
// echo "<pre>"; print_r($input); die();
$paymentMethod = \Stripe\PaymentMethod::create([
    'type' => 'sepa_debit',
    'sepa_debit' => ['iban' => $input['iban']],
    'billing_details' => ['email' => $input['email'],'name'=>$input['account_holder']],
]);
try {
    // Create a PaymentIntent for SEPA Direct Debit
    $paymentIntent = \Stripe\PaymentIntent::create([
        "amount" => (float)($input['amount']*100), // Amount in cents (€2)
        "currency" => "eur",
        "payment_method" => $paymentMethod->id,
        "confirmation_method" => "automatic",
        "confirm" => true,
        "return_url" => "https://khanapos.de/payment_result.php",
        "mandate_data" => [
            "customer_acceptance" => [
                "type" => "online",
                "online" => ["ip_address" => $_SERVER["REMOTE_ADDR"], 
                                "user_agent" => $_SERVER["HTTP_USER_AGENT"],
                            ]
            ]
        ],
        "metadata" => $input
    ]);


    echo json_encode(["status" => 200,"message" => "Payment successful!", "paymentIntent" => $paymentIntent->id, "metaInfo" => $paymentIntent->metadata, "amount" => $paymentIntent->amount, "payment_status" => $paymentIntent->status]);

} catch (\Stripe\Exception\ApiErrorException $e) {
    echo json_encode(["error" => $e->getMessage()]);
}
?>
