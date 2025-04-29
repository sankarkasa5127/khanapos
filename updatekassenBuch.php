<?php header('Content-Type: text/html; charset=utf-8');
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');


$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
$removeeuro=str_replace("€","",$_POST['amount']);
$ffff=trim($removeeuro);
$num = $ffff."\xc2\xa0$";
$price = $fmt->parseCurrency($num, $curr);
mysqli_set_charset($conn,'utf8');

    $sqlData = "select * from Kassenbuch Order by id desc LIMIT 1 ";
$sqlrecord = mysqli_query($conn, $sqlData);
$data = array();
$row = mysqli_fetch_assoc($sqlrecord);
    if($_POST['choosetype']=='Auszahlung'){
            if(!empty($row)){
                //$max_value = max([$var1, $var2, $var3]);
                $Saldo= $row['Saldo'] - $price ;
            }else{
                $Saldo=$price;
            }
            $arrayupdate=array(
            'date'=>$_POST['date'],
            'description'=>$_POST['description'],
            'Auszahlung'=>$price
            );
    }else{
        if(!empty($row)){
            $Saldo=$row['Saldo'] + $price;
    }else{
            $Saldo=$price;
    }
        $arrayupdate=array(
            'date'=>$_POST['date'],
            'description'=>$_POST['description'],
            'Einzahlung'=>$price
    );
    }

$result=updateQuery('Kassenbuch',$arrayupdate,'id',$_POST['id'],$conn);

if ($result > 0) {
    echo $html=include('headers/loadkassebunchheader.php');
    }
 else {
    echo "Error";
}
$conn->close();
