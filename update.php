<?php
require_once("db.php");
$foodId = htmlentities($_POST['update_val']);	  
$id = htmlentities($_POST['id']);	  
$sql = "UPDATE `restaurants` SET `send`='".$foodId."' WHERE id='".$id."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>