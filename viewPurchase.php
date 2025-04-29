
<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
 $id=$_POST['rowId'];
$purchase = "select * from purchase WHERE id=".$id;
$purchaserecord = mysqli_query($conn, $purchase);
$data = array();
$row = mysqli_fetch_assoc($purchaserecord);
$row['purchasedAmount']=formatPrice($row['purchasedAmount']);
$data['purchase']=$row;
if(!empty($row)){
$typeSql="select _itemType.id,_itemType.typeName,_items.venderid from _items INNER JOIN _itemType ON _itemType.id=_items.typeid where _items.venderid=".$row['supplierNo']." group by _items.typeid";
$typerecord = mysqli_query($conn, $typeSql);
$rowType=array();
while($typeRow = mysqli_fetch_assoc($typerecord)){
    $rowType[]=$typeRow;
}
$data['typeList']=$rowType;
}else{
    $data['typeList']='';
}
$receviedItemsql="SELECT _itemType.id,_itemType.typeName,_items.venderid,_items.itemName,_itemStock.date as stockdate,_itemStock.price as stockPrice,_itemStock.* from `_itemStock` INNER JOIN _items ON _itemStock.itemid INNER JOIN _itemType ON _itemType.id=_itemStock.typeid where _itemStock.rowId=".$id." Group BY _itemStock.id  Order by _itemStock.id desc";
$receviedItem = mysqli_query($conn, $receviedItemsql);
$y=1;
$htmlRow='';
while($itemrow = mysqli_fetch_assoc($receviedItem)){
    $amount=$itemrow['stockPrice'];
            //$amount = number_format($amount, 2);
            $originalDate = $itemrow['stockdate'];
            $newDate = date("d.m.Y", strtotime($originalDate));
            $htmlRow.= "<tr id='delrow-".$itemrow['id']."'>"; 
            $htmlRow.=  "<td>".$y."</td>";   
            $htmlRow.=  "<td class='text-center'>".$itemrow['typeName']."</td>"; 
            $htmlRow.=  "<td class='text-center'>".$itemrow['itemName']."</td>";
            $htmlRow.=  "<td class='text-right'>".formatPrice($amount)." &euro;</td>"; 
            $htmlRow.=  "<td class='text-center'>".$itemrow['serialNumber']."</td>"; 
            $htmlRow.=  "<td class='text-center'>".$itemrow['barcodeNumber']."</td>"; 
            $htmlRow.=  "<td class='text-center'>".$newDate."</td>";    
            
            
            $htmlRow.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delRecItem(".$itemrow['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
            $htmlRow.=  "</tr>";     
            $y++;
}
$data['itemsrec']=$htmlRow;
echo  json_encode($data);exit;
?>