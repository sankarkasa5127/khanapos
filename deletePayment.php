<?php
require_once("db.php");
require_once("function.php");
 $Query = "select * from rechnungenpayment WHERE  id= '".$_POST['id']."' Limit 1";
$Records = mysqli_query($conn, $Query);
$row = mysqli_fetch_assoc($Records);
if(!empty($row)){
    // echo "<pre>";
    // print_r($row);die;
    if($row['bankstatementid']!=0){
        $requestDate=array('status'=>0);
        updateQuery('bankstatement',$requestDate,'id',$row['bankstatementid'],$conn);
    }
  
}
$id = htmlentities($_POST['id']);	  
$sql = "DELETE from `rechnungenpayment` WHERE id='".$id."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Record Deleted successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>