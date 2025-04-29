
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');

  $_POST['orderDateSearch'] = $_POST['orderDate'];
$_POST['dueDateSearch'] = $_POST['dueDate'];
$_POST['orderDate'] = date('d.m.Y',strtotime($_POST['orderDate']));
$_POST['dueDate'] = date('d.m.Y',strtotime($_POST['dueDate']));
$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$removeeuro=str_replace("€","",$_POST['purchasedAmount']);
$ffff=trim($removeeuro);
$num = $ffff."\xc2\xa0$"; 
$_POST['purchasedAmount']  = $fmt->parseCurrency($num, $curr);
$result=updateQuery('purchase',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
