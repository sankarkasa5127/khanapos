<?php 
require_once("db.php");
require_once("function.php");
$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$removeeuro=str_replace("€","",$_POST['price']);
$ffff=trim($removeeuro);
$num = $ffff."\xc2\xa0$"; 
$_POST['price']  = $fmt->parseCurrency($num, $curr);

if(!empty($_POST)){
    $result=insert('_items',$_POST,$conn);
    if($result>0){
        echo "Insert successfully..";
    }else{
        echo "Something went wrong....";
    }
}



?>
  <?php $conn->close();?>