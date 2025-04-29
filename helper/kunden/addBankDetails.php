<?php
require_once("./../../db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];


if(isset($_POST['bankId']) && !empty( $_POST['bankId'] )){
  $sql = "update `kundenBankInfo` set rowid = '".$_POST['invoiceid']."', kundenid = '".$_POST['invoiceRealId']."', holder_name = '".$_POST['account_holder']."', email = '".$_POST['email']."', iban = '".$_POST['iban']."', bic ='".$_POST['bic']."',notiz = '".$_POST['notiz']."' where id = ".$_POST['bankId'];
  
}else{
  $sql = "INSERT INTO `kundenBankInfo`  
  (rowid,
  kundenid,
  holder_name,
  email,
  iban,
  bic,
  notiz)
  VALUES
  ('".$_POST['invoiceid']."',
  '".$_POST['invoiceRealId']."',
  '".$_POST['account_holder']."',
  '".$_POST['email']."',
  '".$_POST['iban']."',
  '".$_POST['bic']."',
  '".$_POST['notiz']."')
  ";
}
$result = $conn->query($sql);
if ($result) {
  $status["code"] = 200;
  $status["message"] = isset($_POST['bankId']) ? 'Bank details updated' : 'Bank details created';
}else{
  $status["code"] = 201;
  $status["message"] = 'Oops..! something went wrong.';
}
echo json_encode($status);
$conn->close();
?>