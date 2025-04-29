<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['invoiceType'])){
    $sqldel = "DELETE from `rechnungenTypes` WHERE rowid='".$invoiceid."'";
    $conn->query($sqldel);
    foreach ($_POST['invoiceType'] as $value) {
if($value=='Duration'){
    $sql = "INSERT INTO `rechnungenTypes`  
    (rowid,
    invoiceid,
    invoiceType,
    startdate,
    expiredate
    )
    VALUES
    ('".$invoiceid."',
    '".$_POST['invoiceRealId']."',
    '".$value."',
    '".$_POST['durationstart']."',
    '".$_POST['expireDate']."')
    ";
        
}else{
    $sql = "INSERT INTO `rechnungenTypes`  
    (rowid,
    invoiceid,
    invoiceType,
    startdate,
    expiredate
    )
    VALUES
    ('".$invoiceid."',
    '".$_POST['invoiceRealId']."',
    '".$value."',
    '',
    '')
    ";
        
}

    
   
  
$result = $conn->query($sql);
 }
//  echo $sql;die;
//   $conn->multi_query($sql) ;
}
   

$conn->close();
?>