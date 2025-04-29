<?php
require_once("./../../db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['tseid'])){
  $sql = "INSERT INTO `kundenTSE`  
(rowid,
kundenid,
tseId,
description,
status,
date)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['tseid']."',
'".$_POST['tseDescriptions']."',
'".$_POST['tsestatus']."',
'".date('Y-m-d',strtotime($_POST['tseDate']))."')
";
$result = $conn->query($sql);
}
    $Query = "select * from kundenTSE WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
      $status=($row['status']) ? '<span class="label label-success">Activate</span>' : '<span class="label label-danger">Deactivate</span>';
                  echo "<tr id='delrowtse-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                 
                  echo "<td class='text-center'>".$row['description']."</td>"; 
                  echo "<td class='text-center'>".$row['tseId']."</td>"; 
                  echo "<td class='text-center'>".$newDate."</td>";   
                  echo "<td class='text-center'>".$status."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delTse(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>