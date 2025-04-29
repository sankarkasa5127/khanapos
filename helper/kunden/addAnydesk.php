<?php
require_once("./../../db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['anydeskid'])){
  $sql = "INSERT INTO `kundenAnydesk`  
(rowid,
kundenid,
anydeskid,
description,
status,
date)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['anydeskid']."',
'".$_POST['anydeskDescriptions']."',
'".$_POST['anydeskStatus']."',
'".date('Y-m-d',strtotime($_POST['anydeskdate']))."')
";
$result = $conn->query($sql);
}
    $Query = "select * from kundenAnydesk WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
      $status=($row['status']) ? '<span class="label label-success">Activate</span>' : '<span class="label label-danger">Deactivate</span>';
                  echo "<tr id='delrowanydesk-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                 
                  echo "<td class='text-center'>".$row['description']."</td>"; 
                  echo "<td class='text-center'>".$row['anydeskid']."</td>"; 
                  echo "<td class='text-center'>".$newDate."</td>";   
                  echo "<td class='text-center'>".$status."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delAnydesk(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>