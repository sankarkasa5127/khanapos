<?php

require_once("db.php");
require_once("function.php");

$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$removeeuro=str_replace("€","",$_POST['price']);
$ffff=trim($removeeuro);
$num = $ffff."\xc2\xa0$"; 
$_POST['price']  = $fmt->parseCurrency($num, $curr);
$result=insert('_itemStock',$_POST,$conn);
if($result>0){
    
    $typeSql="SELECT _itemType.id,_itemType.typeName,_items.venderid,_items.itemName,_itemStock.date as stockdate,_itemStock.price as stockPrice,_itemStock.* from `_itemStock` INNER JOIN _items ON _itemStock.itemid INNER JOIN _itemType ON _itemType.id=_itemStock.typeid where _itemStock.rowId=".$_POST['rowId']." Group BY _itemStock.id  Order by _itemStock.id desc";
    $typerecord = mysqli_query($conn, $typeSql);
    // $rowType=array();
    $htmlRow='';
    $y=1;
    while($typeRow = mysqli_fetch_assoc($typerecord)){
        $amount=$typeRow['stockPrice'];
                //$amount = number_format($amount, 2);
                $originalDate = $typeRow['stockdate'];
                $newDate = date("d.m.Y", strtotime($originalDate));
                $htmlRow.= "<tr id='delrow-".$typeRow['id']."'>"; 
                $htmlRow.=  "<td>".$y."</td>";   
                $htmlRow.=  "<td class='text-center'>".$typeRow['typeName']."</td>"; 
                $htmlRow.=  "<td class='text-center'>".$typeRow['itemName']."</td>";
                $htmlRow.=  "<td class='text-right'>".formatPrice($amount)." &euro;</td>"; 
                $htmlRow.=  "<td class='text-center'>".$typeRow['serialNumber']."</td>"; 
                $htmlRow.=  "<td class='text-center'>".$typeRow['barcodeNumber']."</td>"; 
                $htmlRow.=  "<td class='text-center'>".$newDate."</td>";    
                
                
                $htmlRow.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delRecItem(".$typeRow['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                $htmlRow.=  "</tr>";     
                $y++;
    }
echo $htmlRow;
}else{
    echo "Something went wrong....";
}


?>