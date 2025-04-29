<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['description'])){
  $sql = "INSERT INTO `Versand`  
(rowid,
invoiceid,
date,
description,
method)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['date']."',
'".$_POST['description']."',
'".$_POST['method']."')
";
$result = $conn->query($sql);
}
    $Query = "select * from Versand WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $data = array();
    $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
                  echo "<tr id='delrowversand-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  echo "<td class='text-center'>".$row['description']."</td>";    
                  echo "<td class='text-center'>".$row['method']."</td>"; 
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-primary' onclick='editversand(".$row['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delversand(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>