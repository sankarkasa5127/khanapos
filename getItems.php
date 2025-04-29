<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');

$typeSql="SELECT * FROM _items WHERE _items.status=1 and _items.venderid=".$_POST['vender']." and _items.typeid=".$_POST['type'];
$typerecord = mysqli_query($conn, $typeSql);
$rowType=array();
$htmlitem='';
while($typeRow = mysqli_fetch_assoc($typerecord)){
    // $rowType[]=$typeRow;
    $htmlitem.="<option  data-price='".formatPrice($typeRow['price'])."' data-description='".$typeRow['Description']."'value='".$typeRow['id']."'>".$typeRow['itemName']."</option>";

}
$data['itemList']=$htmlitem;
echo json_encode($data);

?>