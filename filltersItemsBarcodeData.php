<?php
require_once("db.php");
if(!empty($_POST)){
    $itemsHtml='';
    $QueryItems = "SELECT _itemStock.* FROM `_itemStock`  LEFT JOIN persons on persons.id=_itemStock.assignBy  WHERE  _itemStock.itemid='".$_POST['itemsMenaully']."'  Order By id DESC";
    $recordItems = mysqli_query($conn, $QueryItems);
    $x=1;
    while ($rowitems = mysqli_fetch_assoc($recordItems)) { 
            $itemsHtml.=  "<option value='".$rowitems['id']."' data-assignName='".$rowitems['name']."'   data-assignDate='".$rowitems['assignDate']."'   data-assignInvoiceNumber='".$rowitems['assignInvoiceNumber']."' data-serialNumber='".$rowitems['serialNumber']."'>".$rowitems['barcodeNumber']." </option>";    
            $x++;
    }    
    echo $itemsHtml;exit;
}
?>