<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $id=$_POST['rowId'];
$vendersql = "select kassen_protokoll.*,restaurants.restaurant_name,restaurants.restaurant_str,restaurants.restaurant_str_nr,restaurants.restaurant_plz,restaurants.restaurant_ort from kassen_protokoll LEFT JOIN restaurants ON restaurants.`restaurant_id`=kassen_protokoll.kundenNr   WHERE kassen_protokoll.id=".$id;
$venderrecord = mysqli_query($conn, $vendersql);
$data = array();
$row = mysqli_fetch_assoc($venderrecord);
$data['kassen']=$row;


echo  json_encode($data);exit;
?>