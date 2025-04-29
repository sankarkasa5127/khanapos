<?php
require_once("db.php");

// $conn = mysqli_connect($host, $user, $password,$dbname);
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
if($columnName =='auszahlungen'){
   $columnName="CAST(auszahlungen AS DECIMAL(10,2))";
}
if($columnName =='einzahlungen'){
   $columnName="CAST(einzahlungen AS DECIMAL(10,2))";
}
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and ( Name_1 like '%".$searchValue."%' or 
   Betrag like '%".$searchValue."%' or 
   Buchungsdatum like '%".$searchValue."%' or 
   einzahlungen like '%".$searchValue."%' or 
   auszahlungen like '%".$searchValue."%' or 
   kundenBankNr like '%".$searchValue."%' or 
   
   Verwendungszweck like '%".$searchValue."%'
   
    ) ";
}


if(isset($_GET['name'])){
   $searchQuery.= " and  Name_1='".$_GET['name']."'";
}

if(isset($_GET['date'])){
   $searchQuery.= " and  Buchungsdatum='".$_GET['date']."'";
}

if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from bankstatement where CAST(CONCAT(SUBSTRING(Buchungsdatum, 7, 4), '-', SUBSTRING(Buchungsdatum, 4, 2), '-', SUBSTRING(Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'");
}else{
   $sel = mysqli_query($conn,"select count(*) as allcount from bankstatement");
}


$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn,"select count(*) as allcount  from bankstatement  WHERE  CAST(CONCAT(SUBSTRING(Buchungsdatum, 7, 4), '-', SUBSTRING(Buchungsdatum, 4, 2), '-', SUBSTRING(Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery);
}else{
   $sel = mysqli_query($conn,"select count(*) as allcount  from bankstatement  WHERE 1 ".$searchQuery);
}

$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');
$linkGet="bankstatement.php?";
// ## Fetch records
if(isset($_GET['from']) && isset($_GET['to'])){
   $linkGet.="from=".$_GET['from']."&to=".$_GET['to'];
   $empQuery = "select bankstatement.*,bankInvoice.invoiceid,bankInvoice.bankinvoiceid,bankInvoice.buploadfile,typesPayment.name,typesPayment.icon  from bankstatement left join typesPayment ON bankstatement.paymentId=typesPayment.id left join bankInvoice ON bankstatement.id=bankInvoice.invoiceid  WHERE  CAST(CONCAT(SUBSTRING(Buchungsdatum, 7, 4), '-', SUBSTRING(Buchungsdatum, 4, 2), '-', SUBSTRING(Buchungsdatum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
   // die;
}else{
    $empQuery = "select bankstatement.*,bankInvoice.invoiceid,bankInvoice.bankinvoiceid,bankInvoice.buploadfile,typesPayment.name,typesPayment.icon from bankstatement left join typesPayment ON bankstatement.paymentId=typesPayment.id left join bankInvoice ON bankstatement.id=bankInvoice.invoiceid WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
   // die;
}
$otherfilter="";
if(isset($_GET['name']) && isset($_GET['date'])){
   $otherfilter="&name=".$_GET['name']."&date=".$_GET['date'];
}elseif(isset($_GET['date'])){
   $otherfilter="&date=".$_GET['date'];

}elseif(isset($_GET['name'])){
   $otherfilter="&name=".$_GET['name'];
}
// $finallink=$linkGet.$otherfilter;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
$fmt = new NumberFormatter( 'de_DE', NumberFormatter::CURRENCY );
// $fmt->setAttribute(\NumberFormatter::MAX_SIGNIFICANT_DIGITS, 7);
while ($row = mysqli_fetch_assoc($empRecords)) {
    // $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
 
$einzahlungen=$fmt->formatCurrency(trim($row['einzahlungen']), 'EUR');
// $einzahlungen= $fmt->formatCurrency(1234567.891234567890000, "EUR")."\n";
$auszahlungen=$fmt->formatCurrency(trim($row['auszahlungen']), 'EUR');
$minus='';
$datum=date('Y-m-d',strtotime($row['Buchungsdatum']));
if($row['einzahlungen']!=0){
   $appendButton='<input type="hidden" class="datsumss-'.$row["id"].'" value="'.$datum.'"/> ';
}else{
   $minus='-';
   $appendButton='<input type="hidden" class="datsumss-'.$row["id"].'" value="'.$datum.'"/> ';
}
$status=($row['status']) ? '<span class="label label-success">Assign</span>' : '<span class="label label-danger">Not Assign</span>';
$paytype=(!empty($row['name'])) ? '<span class="badge" onclick="paymentTypes('.$row["id"].')" style="cursor: pointer;color:#fff;background-color:'.$row['icon'].'">'.ucfirst($row['name']).'</span>'  : ' <i class="" onclick="paymentTypes('.$row["id"].')">NONE</i>  ';
if(empty($otherfilter)){
   $namelink=$linkGet."&name=".$row['Name_1'];
   $datsumlink=$linkGet."&date=".$row['Buchungsdatum'];
}else{
   $namelink=$linkGet."&name=".$row['Name_1'];
   $datsumlink=$linkGet."&date=".$row['Buchungsdatum'];
}
if($row["kundenBankNr"]==0){
   $kundenNrText='<i class="" onclick="kundenAssing('.$row["id"].','.$row["kundenBankNr"].')">'.$row["kundenBankNr"].'</i>';
}else{
   $kundenNrText='<i class="" onclick="kundenEditPopup('.$row["id"].','.$row["kundenBankNr"].')">'.$row["kundenBankNr"].'</i>';

} 
if(file_exists('KhanaCRM/bankstatement/'.$row['buploadfile'])){
   $htmlinvoiceBank= "<a data-fancybox class='fancybox' href='KhanaCRM/bankstatement/".$row['buploadfile']."'>".$row['bankinvoiceid']."</a>";  
}else{
   $htmlinvoiceBank= "";
}
    $data[] = array( 
      "id"=>'<a href="javascript:void(0)" onclick="viewdata('.$row["id"].','.$row['einzahlungen'].','.$row["Buchungs_ID"].')">'.$row['id'].'</a>',
       "Name_1"=>'<a href="'.$namelink.'">'.ucfirst($row['Name_1']).'</a>',
       "kundenNr"=> $kundenNrText, 
       "Name_2"=>ucfirst($row['Name_2']),
       "IBAN_Kontonummer"=>$row['IBAN_Kontonummer'],
       "BIC_Bankleitzahl"=>$row['BIC_Bankleitzahl'],
       "Export_Bankname"=>$row['Export_Bankname'],
       "Export_Kontonummer"=>$row['Export_Kontonummer'],
       "Betrag"=>$row['Betrag']." &euro;",
       "Wahrung"=>$row['Wahrung'],
       "Verwendungszweck"=>$row['Verwendungszweck'],
       "Wertstellungsdatum"=>$row['Wertstellungsdatum'],
       "Buchungsdatum"=>'<a href="'.$datsumlink.'">'.$row['Buchungsdatum'].'</a>',
       "Saldo_davor"=>$row['Saldo_davor'],
       "Buchungstext"=>$row['Buchungstext'],
       "Textschlussel"=>$row['Textschlussel'],
       "assignType"=>$paytype.'  ',
       "Kategorie"=>$row['Kategorie'],
       "Kategorie_Name"=>$row['Kategorie_Name'],
       "Notizen"=>$row['Notizen'],
       "Anzahl_Splittbuchungen"=>$row['Anzahl_Splittbuchungen'],
       "Auszugnummer"=>$row['Auszugnummer'],
       "Auszugseite"=>$row['Auszugseite'],
       "Buchungs_ID"=>$row['Buchungs_ID'],
       "Datei"=>$row['Datei'],
       "status"=>$status,
       "EndToEndID"=>$row['EndToEndID'],
       "Mandatsreferenz"=>$row['Mandatsreferenz'],
       "Glaubiger_ID"=>$row['Glaubiger_ID'],
       "Primanota"=>$row['Primanota'],
       "Verwendungszweck_1"=>$row['Verwendungszweck_1'],
       "Verwendungszweck_2"=>$row['Verwendungszweck_2'],
       "Verwendungszweck_3"=>$row['Verwendungszweck_3'],
       "Verwendungszweck_4"=>$row['Verwendungszweck_4'],
       "Verwendungszweck_5"=>$row['Verwendungszweck_5'],
       "Farbmarkierung"=>$row['Farbmarkierung'],
       "invoicenumber"=>$htmlinvoiceBank,
       "einzahlungen"=>$einzahlungen,
       "auszahlungen"=>$minus.$auszahlungen,
       "action"=>$appendButton.' <button type="button" class="btn btn-primary " onclick="viewdata('.$row["id"].','.$row['einzahlungen'].','.$row["Buchungs_ID"].')"><i class="fa fa-edit"></i>
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
 $conn->close(); 
 echo json_encode($response);

?>