<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['itemName'])){
  $sql = "INSERT INTO `items`  
(rowid,
invoiceid,
name,
itemTypename,
modelNumber,
serialNumber,
date)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['itemName']."',
'".$_POST['itemType']."',
'".$_POST['modelNumber']."',
'".$_POST['serialNumber']."',
'".$_POST['itemdate']."')
";
$result = $conn->query($sql);
}
    $Query = "select * from items WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
                  echo "<tr id='delrowitem-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  echo "<td class='text-center'>".$row['name']."</td>";    
                  echo "<td class='text-center'>".$row['itemTypename']."</td>"; 
                  echo "<td class='text-center'>".$row['modelNumber']."</td>"; 
                  echo "<td class='text-center'>".$row['serialNumber']."</td>"; 
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-primary' onclick='edititem(".$row['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delitems(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>