<?php
require_once("db.php");
$invoiceid=$_POST['invoiceid'];
$Query = "select * from rechnungenpayment WHERE bankstatementid= ".$invoiceid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $data = array();
  //  $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
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
                  echo "<td class='text-center'>".$row['invoiceid']."</td>";    
                  echo "<td class='text-center'>".formatPrice($amount)." &euro;	</td>"; 
                  echo "<td class='text-center'>".$row['method']."</td>"; 
                //   echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delPayment(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    
    $Queryein = "select * from ein_rechnungenpayment WHERE bankstatementid= ".$invoiceid."  ORDER BY `id` DESC";
    $Recordsein = mysqli_query($conn, $Queryein);
    $data = array();
    $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';

    while ($rowein = mysqli_fetch_assoc($Recordsein)) {
      $amount=$rowein['amount'];
      //$amount = number_format($amount, 2);
      // $priceAmount = str_replace(".", ",", $amount);
      // $finalamount= preg_replace('/,(?=.*,)/', '.', $priceAmount);
                  echo "<tr id='delrow-".$rowein['id']."'>"; 
                  echo "<td>".$i."</td>";    
                  $originalDate = $rowein['dateofpayment'];
                  $newDate = date("d.m.Y", strtotime($originalDate));
                  echo "<td class='text-center'>".$newDate."</td>";    
                  echo "<td class='text-center'>".$rowein['invoiceid']."</td>";    
                  echo "<td class='text-center'>".formatPrice($amount)." &euro;	</td>"; 
                  echo "<td class='text-center'>".$rowein['method']."</td>"; 
                //   echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delPayment(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                  echo "</tr>";     
                  $i++;
    }    

$conn->close();