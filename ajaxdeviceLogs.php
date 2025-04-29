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
        $searchQuery = " and (AD.myDevice_id like '%".$searchValue."%' or 
   AD.device_id like '%".$searchValue."%' or 
   AD.status like '%".$searchValue."%' or 
   AD.remarks like '%".$searchValue."%' or 
   AD.created_at like '%".$searchValue."%'
    ) ";
}
 
## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from andriod_device");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from andriod_device WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
 $empQuery = "select * FROM device_logs ".$searchQuery." order by ".$columnName." ".$columnSortOrder."  limit ".$row.",".$rowperpage;
  // $empQuery = "select * from andriod_device WHERE 1 ".$searchQuery." order by AD.".$columnName." ".$columnSortOrder."  limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
        $status='<span class="label label-danger">Rejected</span>';
        if ($row['status'] == "Accepted") {
            $status='<span class="label label-success">Accepted</span>';
        }
        
    $data[] = array( 
       "id"=>$row['id'],
       "device_id"=>$row['device_id'],
       "myDevice_id"=>$row['myDevice_id'],
       "status"=>$status,
       "remarks"=>$row['remarks'],
       "datum"=>$row['created_at'],
      
    );
 }
 // <button type="button" class="btn btn-danger " onclick="deleteRecord(`'.$row["device_id"].'`)"><i class="fa fa-trash"></i></button>

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
