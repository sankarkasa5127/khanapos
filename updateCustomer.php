<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  
 $sql = "UPDATE `restaurants` SET 
restaurant_str= '".$_POST['restaurant_str']."',
restaurant_str_nr= '".$_POST['restaurant_str_nr']."',
restaurant_id= '".$_POST['restaurant_id']."',
restaurant_name= '".addslashes($_POST['restaurant_name'])."',
restaurant_inhaber= '".$_POST['restaurant_inhaber']."',
restaurant_plz= '".$_POST['restaurant_plz']."',
status= '".$_POST['status']."',
resttype= '".$_POST['resttype']."',
notiz= '".$_POST['Notiz']."',
restaurant_ort= '".$_POST['restaurant_ort']."'
 WHERE id='".$_POST['rowid']."'";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>