<?php
require_once("./../../db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['contactname'])){
  $sql = "INSERT INTO `Kundencontacts`  
(rowid,
kundenId,
name,
phoneNumber,
note,
date)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['contactname']."',
'".$_POST['contactNumber']."',
'".$_POST['contactNote']."',
'".$_POST['contactdate']."')
";
$result = $conn->query($sql);
}
    $Query = "select * from Kundencontacts WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
                  echo "<tr id='delrowcontact-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>";   
                  echo "<td class='text-center'>".$row['name']."</td>"; 
                  echo "<td class='text-center'>".$row['phoneNumber']."</td>"; 
                  echo "<td class='text-center'>".$row['note']."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delcontact(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>