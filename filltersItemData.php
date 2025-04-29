<?php
require_once("db.php");
if(!empty($_POST)){
    $itemsHtml='';
    $QueryItems = "SELECT _items.* FROM `_items`  WHERE  _items.venderid='".$_POST['venderid']."' AND _items.typeid='".$_POST['typeid']."' AND status=1 Order By id DESC";
    $recordItems = mysqli_query($conn, $QueryItems);
    $x=1;
    while ($rowitems = mysqli_fetch_assoc($recordItems)) { 
            $itemsHtml.=  "<option value='".$rowitems['id']."' data-price='".$rowitems['price']."' data-description='".$rowitems['Description']."'>".$rowitems['itemName']." </option>";    
            $x++;
    }    
    echo $itemsHtml;exit;
}
?>