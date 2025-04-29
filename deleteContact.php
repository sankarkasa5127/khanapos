<?php
require_once("db.php");
   
$id = htmlentities($_POST['id']);	  
$sql = "DELETE from `contacts` WHERE id='".$id."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Record Deleted successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>