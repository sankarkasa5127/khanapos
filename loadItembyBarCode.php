<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $barcode=$_POST['barcode'];
 $vendersql = "SELECT _itemStock.*,_itemType.typeName,supplier_details.supplier_name,_items.itemName,_items.Description FROM `_itemStock` INNER JOIN _items ON _items.id=_itemStock.itemid INNER JOIN _itemType ON _itemType.id=_itemStock.typeid INNER JOIN supplier_details ON supplier_details.id=_items.venderid WHERE  barcodeNumber='".$barcode."' LIMIT 1";
$venderrecord = mysqli_query($conn, $vendersql);
$data = array();
$row = mysqli_fetch_assoc($venderrecord);

$htmldata='';
$assignvalue='';
if(!empty($row)){
  
    $htmldata='<div class="card-group">
  <div class="card bg-light">
    <div class="card-body ">
    <div class="row">
    <div class=" col-md-6">
      <p class="card-text">
      <input type="hidden" name="id" value="'.$row['id'].'" />  
      
      <strong>Supplier</strong>: '.$row['supplier_name'].'</p>
      <p class="card-text"><strong>Serial Number</strong>: '.$row['serialNumber'].'</p>
     
      <p class="card-text"><strong>Type</strong>: '.$row['typeName'].'</p>
</div>

<div class=" col-md-6">
<p class="card-text"><strong>Name</strong>: '.$row['itemName'].'</p>
      <p class="card-text"><strong>Description</strong>:  '.$row['Description'].'</p>
      
</div>
<div class=" col-md-12">
<p class="card-text" ><strong>Price</strong>: '.formatPrice($row['price']).' &euro;</p>';
if(!empty($row['assignInvoiceNumber'])){
    $assignvalue='yes';
    $htmldata.='<p class="card-text" style="color:red;"><strong>Already Assign To </strong>: '.$row['assignInvoiceNumber'].'</p>';
}

$htmldata.='</div>




</div>
    </div>
  </div>
</div>';
 }

$data['loadhtml']=$htmldata;
$data['assignStatus']=$assignvalue;
echo  json_encode($data);exit;

?>

