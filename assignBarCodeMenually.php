<?php
require_once("db.php");
// require_once("function.php");
mysqli_set_charset($conn,'utf8');
$requestDate['assignBy']=$_POST['assignBy'];
$requestDate['assignDate']=$_POST['assignDate'];
$requestDate['invoicerowid']=$_POST['invoicerowid'];
$id=$_POST['barCodesbarCodes'];
$updates=array();
if (count($requestDate) > 0) {
      foreach ($requestDate as $key => $value) {
      $value = "'$value'";
      $updates[] = "$key = $value";
      }
}
$implodeArray = implode(', ', $updates);
      $sql = "UPDATE _itemStock  SET ".$implodeArray." WHERE id=".$id;

 $result = $conn->query($sql);

if ($result > 0) {
    echo "assign  successfully";
    }
 else {
    echo "Error";
}
$conn->close();

?>