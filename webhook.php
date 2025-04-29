<?php
require 'pusher/vendor/autoload.php';

\Stripe\Stripe::setApiKey("sk_live_qe185fheuHfYCeFrWHB20387");

$endpoint_secret = "we_1R8c8gB4b1yhapYU6Y1fitk4";

$payload = file_get_contents("php://input");
$sig_header = $_SERVER["HTTP_STRIPE_SIGNATURE"];
$event = null;

try {
    $event = \Stripe\Webhook::constructEvent($payload, $sig_header, $endpoint_secret);
} catch (\Exception $e) {
    http_response_code(400);
    exit();
}

// Handle the event
if ($event->type == "payment_intent.succeeded") {
    $paymentIntent = $event->data->object;
    file_put_contents("logs.txt", "Payment succeeded: " . $paymentIntent->id . "\n", FILE_APPEND);
}
    file_put_contents("logss.txt", $paymentIntent->id, FILE_APPEND);

http_response_code(200);
?>
