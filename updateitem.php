
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$removeeuro=str_replace("€","",$_POST['price']);
$ffff=trim($removeeuro);
$num = $ffff."\xc2\xa0$"; 
$_POST['price']  = $fmt->parseCurrency($num, $curr);

$result=updateQuery('_items',$_POST,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo "Updated successfully";
    }
 else {
    echo "Error";
}
$conn->close();
