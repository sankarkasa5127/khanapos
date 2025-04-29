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
   $searchQuery = " and (id like '%".$searchValue."%' or 
   Name like '%".$searchValue."%' or 
   Stadt like '%".$searchValue."%' or 
   Version like '%".$searchValue."%' or 
   Start_Date like '%".$searchValue."%' or 
   AnyDesk_1 like '%".$searchValue."%' or 
   AnyDesk_2 like '%".$searchValue."%' or 
   AnyDesk_Server like '%".$searchValue."%' or 
   Client_1 like '%".$searchValue."%' or 
   Client_2 like '%".$searchValue."%' or 
   Server like '%".$searchValue."%' or 
   Printer_Bon like '%".$searchValue."%' or 
   Printer_Kueche like '%".$searchValue."%' or 
   Printer_Theke like '%".$searchValue."%' or 
   Tab like '%".$searchValue."%' or 
   Router like '%".$searchValue."%' or 
   Router_AP like '%".$searchValue."%' or 
   Kontak like '%".$searchValue."%' or 
   Notiz like '%".$searchValue."%' or 
   Email like '%".$searchValue."%' or 
   Extras_1 like '%".$searchValue."%' or 
   Extras_2 like '%".$searchValue."%' or 
   Extras_3 like '%".$searchValue."%' or 
   updated like'%".$searchValue."%' ) ";
}


$sel = mysqli_query($conn,"select count(*) as allcount from Kunden_Protokoll");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from Kunden_Protokoll WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
  $empQuery = "select * from Kunden_Protokoll WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    if($row["Status"]==1) { $status = '<img src="img/green_small.png"/>'; } elseif($row["Status"]==2) { $status = '<img src="img/yellow_small.png"/>'; } elseif($row["Status"]==3) { $status = '<img src="img/gray_small.png"/>'; } else {$status = '<img src="img/red_small.png"/>';}
    $data[] = array( 
       "status"=> $status,
		"id"=>$row["id"],
		"Name"=>$row["Name"],
		"Stadt"=>$row["Stadt"],
		"Version"=>$row["Version"],
		"Start_Date"=>$row["Start_Date"],
		"AnyDesk_1"=>$row["AnyDesk_1"],
		"AnyDesk_2"=>$row["AnyDesk_2"],
		"AnyDesk_Server"=>$row["AnyDesk_Server"],
		"Client_1"=>$row["Client_1"],
		"Client_2"=>$row["Client_2"],
		"Server"=>$row["Server"],
		"Printer_Bon"=>$row["Printer_Bon"],
		"Printer_Kueche"=>$row["Printer_Kueche"],
		"Printer_Theke"=>$row["Printer_Theke"],
		"Tab"=>$row["Tab"],
		"Router"=>$row["Router"],
		"Router_AP"=>$row["Router_AP"],
		"Kontakt"=>$row["Kontak"],
		"Notiz"=>$row["Notiz"],
		"Email"=>$row["Email"],
		"Extras_1"=>$row["Extras_1"],
		"Extras_2"=>$row["Extras_2"],
		"Extras_3"=>$row["Extras_3"],
		"updated"=>$row["updated"],
      
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
$conn->close();
?>