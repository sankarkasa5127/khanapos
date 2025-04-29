<?php
 header('Content-Type: text/html; charset=utf-8');
require_once("db.php");
$invoiceid=$_POST['invoiceid'];
if(isset($_POST['amount'])){
  $fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
  $removeeuro=str_replace("€","",$_POST['amount']);
  $ffff=trim($removeeuro);
  $num = $ffff."\xc2\xa0$";
  $price = $fmt->parseCurrency($num, $curr);
  mysqli_set_charset($conn,'utf8');
  $sql = "INSERT INTO `ein_rechnungenpayment`  
(rowid,
invoiceid,
dateofpayment,
amount,
method)
VALUES
('".$invoiceid."',
'".$_POST['invoiceRealId']."',
'".$_POST['date']."',
'".$price."',
'".$_POST['method']."')
";
$result = $conn->query($sql);
}
    $Query = "select * from ein_rechnungenpayment WHERE rowid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $data = array();
    $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
   $i=1;
    while ($row = mysqli_fetch_assoc($Records)) {
      $amount=$row['amount'];
      //$amount = number_format($amount, 2);
      // $priceAmount = str_replace(".", ",", $amount);
      // $finalamount= preg_replace('/,(?=.*,)/', '.', $priceAmount);
                  echo "<tr id='delrow-".$row['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  $originalDate = $row['dateofpayment'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>";    
                  echo "<td class='text-center'>".formatPrice($amount)." &euro;	</td>"; 
                  echo "<td class='text-center'>".$row['method']."</td>"; 
                  echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delPayment(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();
?>