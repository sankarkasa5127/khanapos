<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
$where='';
 $sql = "UPDATE `rechnungen` SET ";
if(isset($_POST['paymentStatus'])){
    $where.="payStatus= ".$_POST['paymentStatus'].",";
}
if(isset($_POST['install'])){
    $where.="installStatus= ".$_POST['install'].",";
}
if(isset($_POST['services'])){
    $where.="serviceStatus= ".$_POST['services'].",";
}
$sql.=rtrim($where, ',');
$sql.="  WHERE id='".$invoiceid."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>