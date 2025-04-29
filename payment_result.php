<?php
require 'pusher/vendor/autoload.php';
require 'db.php';
error_reporting(E_ALL);
ini_set('display_errors', '1');
// \Stripe\Stripe::setApiKey("sk_test_51R6RrKBU6QReLcf7tlvZLrb7XDPd1n662P6IYK0qNDiKtUtcEbhTWnIJ4tGivNBpHpZQtRKfKOFuMk0N6Gov0ZEW00iTGesMC6");
// \Stripe\Stripe::setApiKey("sk_live_qe185fheuHfYCeFrWHB20387");
// $stripe = new \Stripe\StripeClient('sk_test_51R6RrKBU6QReLcf7tlvZLrb7XDPd1n662P6IYK0qNDiKtUtcEbhTWnIJ4tGivNBpHpZQtRKfKOFuMk0N6Gov0ZEW00iTGesMC6');

// $stripe->issuing->transactions->retrieve('py_3RCF5sBU6QReLcf71BWg0CYP', []);

$stripe = new \Stripe\StripeClient('sk_test_51R6RrKBU6QReLcf7tlvZLrb7XDPd1n662P6IYK0qNDiKtUtcEbhTWnIJ4tGivNBpHpZQtRKfKOFuMk0N6Gov0ZEW00iTGesMC6');
$paymentInfo = $stripe->paymentIntents->retrieve($_GET['payment_intent'], []);
header('Content-Type: application/json');

/*
if ($intent->status == 'succeeded') {
    echo "Payment successful!";
} elseif ($intent->status == 'processing') {
    echo "Payment is still processing. Please wait.";
} else {
    echo "Payment failed or requires additional action.";
}
*/

$sql = "update bank_transactions set bank_payment_status = '".$paymentInfo["status"]."' bank_payment_status_at = '".date('Y-m-d H:i:s')."'";
$result = mysqli_query($conn,$sql);

$conn->close();
?>
