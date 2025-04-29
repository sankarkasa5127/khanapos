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
   $searchQuery = " and (purchase.invoiceId like '%".$searchValue."%' or 
   supplier_details.supplier_name like '%".$searchValue."%' or 
   purchase.purchaseDescription like '%".$searchValue."%' or 
   purchase.orderDate like '%".$searchValue."%' or 
   purchase.status like '%".$searchValue."%' or 
   purchase.dueDate like '%".$searchValue."%' 
    ) ";
}

## Total number of records without filtering
// if(isset($_GET['from']) && isset($_GET['to'])){

//    $sel = mysqli_query($conn,"select count(*) as allcount from purchase where CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'");
// }else{
   $sel = mysqli_query($conn,"select count(*) as allcount from purchase  INNER JOIN supplier_details ON purchase.supplierNo=supplier_details.id");
// }
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
// if(isset($_GET['from']) && isset($_GET['to'])){
//    $sel = mysqli_query($conn,"select count(*) as allcount from purchase WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery);
// }else{
$sel = mysqli_query($conn,"select count(*) as allcount  from purchase  INNER JOIN supplier_details ON purchase.supplierNo=supplier_details.id  WHERE 1 ".$searchQuery);
// }
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
// if(isset($_GET['from']) && isset($_GET['to'])){
//    $empQuery = "select *,(select sum(rechnungenpayment.amount) from purchase where rechnungenpayment.rowid=rechnungen.id) as collectedAmount from rechnungen WHERE CAST(CONCAT(SUBSTRING(rechnung_datum, 7, 4), '-', SUBSTRING(rechnung_datum, 4, 2), '-', SUBSTRING(rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// }else{
 $empQuery = "select *,purchase.id as pid,purchase.status as pstatus from purchase INNER JOIN supplier_details ON purchase.supplierNo=supplier_details.id WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// }
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
  

   //  $kundeName=substr_replace(, "...", 20);
    $data[] = array( 
       "invoiceId"=>$row['invoiceId'],
       "supplierNo"=>ucfirst($row['supplier_name']),
       "purchaseDescription"=>mb_strimwidth($row['purchaseDescription'], 0, 50, '...'),
       "status"=>ucfirst($row['pstatus']),
       "orderDate"=>$row['orderDate'],
       "dueDate"=>$row['dueDate'],
       "purchasedAmount"=>formatPrice($row['purchasedAmount'])." €",
       "paid"=>"0 €",
       "balanceAmount"=>"0 €",
       "action"=>'<button type="button" class="btn btn-success " onclick="viewPurchase('.$row["pid"].')"><i class="fa fa-info-circle"></i>
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