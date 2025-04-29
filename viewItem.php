
<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $id=$_POST['rowId'];
$vendersql = "select * from _items WHERE id=".$id;
$venderrecord = mysqli_query($conn, $vendersql);
$data = array();
$row = mysqli_fetch_assoc($venderrecord);
$row['price']=formatPrice($row['price']);
$data['item']=$row;


echo  json_encode($data);exit;
?>