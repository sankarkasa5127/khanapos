<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$restaurant_name=mysqli_real_escape_string($conn,$_POST["restaurant_name"]);
$restaurant_ort=mysqli_real_escape_string($conn,$_POST["restaurant_ort"]);
 $sql = "INSERT INTO `restaurants`  
(restaurant_str,restaurant_str_nr,restaurant_id,restaurant_name,restaurant_inhaber,restaurant_plz,status,resttype,restaurant_ort) VALUES ('".$_POST['restaurant_str']."','".$_POST['restaurant_str_nr']."','".$_POST['restaurant_id']."','".$restaurant_name."','".$_POST['restaurant_inhaber']."','".$_POST['restaurant_plz']."','".$_POST['status']."','".$_POST['resttype']."','".$restaurant_ort."')";

$result = $conn->query($sql);

if ($result > 0) {
    echo "Insert successfully";
    }
 else {
    echo "Error";
}
$conn->close();
?>