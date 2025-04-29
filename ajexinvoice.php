<?php
$host = "92.205.178.167";
$user = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}

## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and (rechnung_nummer like '%".$searchValue."%' or 
   kunden_nr like '%".$searchValue."%' or 
   kunden_name like '%".$searchValue."%' or 
   rechnung_datum like '%".$searchValue."%' or 
   betrag_brutto like '%".$searchValue."%' or 
   payment_method like '%".$searchValue."%' ) ";
}

## Total number of records without filtering
if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from rechnungen where CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'");
}
elseif(isset($_GET['kunden'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from rechnungen where kunden_nr = ".$_GET['kunden']);
}
else{
   $sel = mysqli_query($conn,"select count(*) as allcount from rechnungen");
}
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from rechnungen WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery);
}
elseif(isset($_GET['kunden'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from rechnungen WHERE kunden_nr = ".$_GET['kunden'].$searchQuery);
}
else{
$sel = mysqli_query($conn,"select count(*) as allcount from rechnungen WHERE 1 ".$searchQuery);
}
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
if(isset($_GET['from']) && isset($_GET['to'])){
   $empQuery = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}
elseif(isset($_GET['kunden'])){
   $empQuery = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE kunden_nr = ".$_GET['kunden'].$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}
else{
 $empQuery = "select *,(select sum(rechnungenpayment.amount) from rechnungenpayment where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
$jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/';
$pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/';
$word = 'KhanaCRM/KASSE_RECHNUNGEN/word/';
while ($row = mysqli_fetch_assoc($empRecords)) {
   // $collectsql = mysqli_query($conn,"select sum(amount) as collectedAmount from rechnungenpayment where rowid=".$row['id']);
   // $collectsqlrecord = mysqli_fetch_assoc($collectsql);
   $pdfdiv='';

   if(!empty($row['collectedAmount'])){
      $totalcollected = $row['collectedAmount'];
   }else{
      $totalcollected = 0;
   }
   //  $totalcollected = $row['collectedAmount'];
   $jpg_file = $jpg.''.$row["rechnung_nummer"].'.jpg';
   $pdf_file = $pdf.''.$row["rechnung_nummer"].'.pdf';
   $word_file = $word.''.$row["rechnung_nummer"].'.doc';
   $word_filedocx = $word.''.$row["rechnung_nummer"].'.docx';
	//echo $jpg_file.'<br/>';Z
	$nameoffile='';
   $nameofPDF='';
   $nameofWord='';
	if (file_exists($jpg_file)) {
      $nameoffile=$row["rechnung_nummer"].'.jpg';
   }
   if (file_exists($pdf_file)) {
      $nameofPDF=$row["rechnung_nummer"].'.pdf';
      $pdfdiv='<div class="ringing-bell"><i class="fa-solid fa-file-pdf"></i></div>';

   }
   if (file_exists($word_file)) {
      $nameofWord=$row["rechnung_nummer"].'.doc';
   }
   if (file_exists($word_filedocx)) {
      $nameofWord=$row["rechnung_nummer"].'.docx';
   }
   $payarray=array("img/Harvey/g0.png","img/Harvey/g25.png","img/Harvey/g50.png","img/Harvey/g75.png","img/Harvey/g100.png");
   $installArray=array("img/Harvey/y0.png","img/Harvey/y25.png","img/Harvey/y50.png","img/Harvey/y75.png","img/Harvey/y100.png");
   $serviceArray=array("img/Harvey/r0.png","img/Harvey/r25.png","img/Harvey/r50.png","img/Harvey/r75.png","img/Harvey/r100.png");
    $payimage=" <img src='".$payarray[$row['payStatus']]."' class='shapesImg'/>";
    $installimage=" <img src='".$installArray[$row['installStatus']]."' class='shapesImg'/>";
    $serviceimage="  <img src='".$serviceArray[$row['serviceStatus']]."' class='shapesImg'/>";
   //  echo $totalcollected;
   //  echo "ok<br>";
   if(!empty($row['betrag_brutto'])){
      $removeeuro=str_replace("€","",$row['betrag_brutto']);
   }else{
      $removeeuro=0;
   }
    
    $offenamount=$removeeuro - $totalcollected;

     $betrag_brutto= formatPrice($removeeuro);

     $Bezahlt= formatPrice($totalcollected);

     $Offen= formatPrice($offenamount);
     if($Offen!="0,00"){
      $TodayDate = date("Y-m-d"); 
      $expireDate = $row['paymentReminderDate']; 
        
      // Use comparison operator to  
      // compare dates 
      $datsumchange=date('Y-m-d',strtotime($row['rechnung_datum']));
      $expiredatedatsum=date('Y-m-d', strtotime($datsumchange. ' + 14 days')); 
      if ($TodayDate > $expireDate) {
         // echo "$date1 is latest than $date2"; 
         if($expireDate !='0000-00-00' && !empty($expireDate)){
            $ringdiv='<div class="ringing-bell"><i class="fa fa-bell faa-ring animated fa-5x"></i></div>';
         }elseif ($TodayDate > $expiredatedatsum){
            $ringdiv='<div class="ringing-bell"><i class="fa fa-bell faa-ring animated fa-5x"></i></div>';
         }else{
            $ringdiv='<div class="ringing-bell"><i class="fa fa-bell faa-ring1  fa-5x"></i></div>';
         }
         
      }
      else{
          //echo "$date1 is older than $date2"; 
          $ringdiv='<div class="ringing-bell"><i class="fa fa-bell faa-ring1  fa-5x"></i></div>';
      }
        

     
     }else{
      $ringdiv='';
     }




   //   $reminderPayment=date('Y-m-d');
   if(empty($row["paymentReminderDate"]) OR  $row["paymentReminderDate"]=='0000-00-00' ){
      $reminderPayment=date('Y-m-d'); 
     }else{
      $reminderPayment=$row["paymentReminderDate"];
     }
    $data[] = array( 
       "rechnung_nummer"=>"<input type='hidden' class='rechnungaexpiredate' value='".$reminderPayment."'  data-value='".date('d.m.Y',strtotime($reminderPayment))."' /><input type='hidden' class='rechnungannumber' value='".$row["rechnung_nummer"]."' /><input type='hidden' class='inputjpg' value='".$nameoffile."' /><input type='hidden' class='inputpdf' value='".$nameofPDF."' /><input type='hidden' class='inputword' value='".$nameofWord."' /><input type='hidden' class='inputnotiz' value='".$row['notiz']."' /><input type='hidden' class='inputpayment' value='".$row['payment_method']."' /> <input type='hidden' class='inputvalue' value='".$row['id']."' /><a data-fancybox class='fancybox' href='http://khanapos.de/KhanaCRM/KASSE_RECHNUNGEN/jpg/".$row["rechnung_nummer"].".jpg'>".$row["rechnung_nummer"]."</a>",
       "kunden_nr"=>"<a href='javascript:void(0);' class='kundenView' data-ref='".$row['kunden_nr']."'> ".$row['kunden_nr']."</a>",
       "kunden_name"=>$row['kunden_name'],
       "status"=>$pdfdiv.$payimage.$installimage.$serviceimage." <input type='hidden' class='payset' value='".$row['payStatus']."'/> <input type='hidden' class='installset' value='".$row['installStatus']."'/> <input type='hidden' class='serviceset' value='".$row['serviceStatus']."'/>".$ringdiv,
       "rechnung_datum"=>$row['rechnung_datum'],
       "betrag_brutto"=>$betrag_brutto." €",
       "Bezahlt"=>$Bezahlt." €",
       "Offen"=>$Offen." €",
       "payment_method"=>$row['payment_method'],
      
       "Update_Img"=>'<button type="button" class="btn btn-danger rowedit"  value="Update"><i class="fa fa-info-circle"></i></button><button type="button" class="btn btn-success popupBarcode" ><i class="fa fa-barcode" aria-hidden="true"></i>
       </button>&nbsp;<a href="?kunden='.$row['kunden_nr'].'" onclick="filter_kunden('.$row['kunden_nr'].')" ><i class="fa fa-eye" aria-hidden="true"></i>
       </button>'
      
    );
 }

 ## Response
 $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $data
 );
 
 echo json_encode($response);

 function formatPrice($amount)
{
	if(trim($amount) == '')
		$amount = 0;

	$amount = number_format($amount, 2);
	$priceAmount = str_replace(".", ",", $amount);
	return preg_replace('/,(?=.*,)/', '.', $priceAmount);
}

$conn->close();
?>