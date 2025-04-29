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
$paymentInfo = $stripe->paymentIntents->retrieve($_POST['paymentId'], []);
header('Content-Type: application/json');

$data = [
    'bankid' => $paymentInfo["metadata"]["bankId"],
    'cid' => $paymentInfo["metadata"]["cid"],
    'trasaction_id' => $paymentInfo["id"],
    'payment_status' => $_POST['payment_status'],
    'amount' => ($paymentInfo["amount"]/100),
    'notiz' => $paymentInfo["metadata"]["bankNotiz"],
    'debit_type' => $paymentInfo["metadata"]["debit_type"]
];

if (isset($paymentInfo["metadata"]["kundenId"])) {
    $data["kundenid"] = $paymentInfo["metadata"]["kundenId"];
}

if (isset($paymentInfo["metadata"]["rowId"])) {
    $data["rowid"] = $paymentInfo["metadata"]["rowId"];
}

$values = array_map(function($item){
    return "'".$item."'";
}, $data);
$sql = "insert into bank_transactions(".implode(',', array_keys($data)).") values(".implode(',', $values).")";

$result = mysqli_query($conn,$sql);
if ($result) {
    $status = [
        'code' => 200,
        'status' => 'success',
        'message' => 'payment success'
    ];
}else{
    $status = [
        'code' => 201,
        'status' => 'danger',
        'message' => 'payment failed'
    ];
}
echo json_encode($status);
$conn->close();
?>
