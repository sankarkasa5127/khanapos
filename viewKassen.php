
<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $id=$_POST['rowId'];
$vendersql = "select * from kassen_protokoll WHERE id=".$id;
$venderrecord = mysqli_query($conn, $vendersql);
$data = array();
$row = mysqli_fetch_assoc($venderrecord);
$data['kassen']=$row;


echo  json_encode($data);exit;
?>