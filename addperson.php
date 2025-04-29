<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['personsName'])){

    $roleseQuery = "select * from roles where id=".$_POST['personRole'];
    $roleRecords = mysqli_query($conn, $roleseQuery);
    $rowrole   = mysqli_fetch_row($roleRecords);
    $personsQuery = "select * from persons where id=".$_POST['personsName'];
    $personsRecords = mysqli_query($conn, $personsQuery);
    $rowperson   = mysqli_fetch_row($personsRecords);

    if(!empty($rowperson)){
  $sql = "INSERT INTO `rechnungenpersons`  
(rowid,
invoiceid,
personid,
roleid,
personName,
roleName,
date)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$rowperson['0']."',
'".$rowrole['0']."',
'".$rowperson['1']."',
'".$rowrole['1']."',
'".$_POST['persondate']."')
";
$result = $conn->query($sql);
 }
}
    $Query = "select * from rechnungenpersons WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
                  echo "<tr id='delrowperson-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  echo "<td class='text-center'>".$row['personName']."</td>";    
                  echo "<td class='text-center'>".$row['roleName']."</td>"; 
                  $originalDate = $row['date'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-primary' onclick='edititem(".$row['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delperson(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>