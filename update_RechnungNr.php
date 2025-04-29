<?php
require_once("db.php");
$rechnung_nr = htmlentities($_POST['update_val']);	  
$id = htmlentities($_POST['id']);	  
$sql = "UPDATE `restaurants` SET `rechnung_nr`='".$rechnung_nr."' WHERE id='".$id."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>