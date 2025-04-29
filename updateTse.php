<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  
$end_date = empty($_POST['end_date']) ? 'null' : "'".$_POST['end_date']."'";

 $sql = "UPDATE `kundenTSE` SET 
kundenid= '".$_POST['kundenid']."',
description= '".$_POST['description']."',
tseId= '".$_POST['tseId']."',
end_date= $end_date
 WHERE id='".$_POST['tse_id']."'";


// print_r($sql); die();
$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>