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
        $searchQuery = " and (anydesk like '%".$searchValue."%' or 
   device_id like '%".$searchValue."%' or 
   myDevice_id like '%".$searchValue."%' or 
   myApp_id like '%".$searchValue."%' or 
   ip like '%".$searchValue."%' or 
   port like '%".$searchValue."%' or 
   datum like '%".$searchValue."%' or
   kunden_nr like '%".$searchValue."%'
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
 // $empQuery = "select AD.*,R.restaurant_name,R.restaurant_str,R.restaurant_str_nr,R.restaurant_plz,R.restaurant_state,R.restaurant_ort FROM andriod_device as AD left JOIN restaurants as R ON AD.kunden_nr = R.restaurant_id ".$searchQuery." order by AD.".$columnName." ".$columnSortOrder."  limit ".$row.",".$rowperpage;
  $empQuery = "select * from andriod_device as AD WHERE 1 ".$searchQuery." order by AD.".$columnName." ".$columnSortOrder."  limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
        $status='<span class="label label-danger">Inactive</span>';
        if ($row['status']) {
            $status='<span class="label label-success">Active</span>';
        }
        $device_status='<span class="label label-danger">Offline</span>';
        if ($row['device_status']) {
            $device_status='<span class="label label-success">Online</span>';
        }
        $address = $kunden = "";
        if ($row['kunden_nr'] && !empty($row['kunden_nr'])) {
            $kundenQry = mysqli_query($conn,"select restaurant_name,restaurant_str,restaurant_str_nr,restaurant_plz,restaurant_state,restaurant_ort from restaurants where restaurant_id = ".$row['kunden_nr']." limit 1");
            $kundenInfo = mysqli_fetch_assoc($kundenQry);
            if ($kundenInfo) {
                $kunden = $kundenInfo['restaurant_name'];
                $address = $kundenInfo['restaurant_str'].". ".$kundenInfo['restaurant_str_nr'].", ".$kundenInfo['restaurant_plz']." ".$kundenInfo['restaurant_ort'];
            }
        }
        
    $data[] = array( 
       "id"=>$row['id'],
       "typ"=> $row['typ'],
       "anydesk"=>$row['anydesk'],
       "device_id"=>$row['device_id'],
       "myDevice_id"=>$row['myDevice_id'],
       "myApp_id"=>$row['myApp_id'],
       "kunden_nr"=>$row['kunden_nr'],
       "ip"=>$row['ip'],
       "port"=>$row['port'],
       "status"=>$status,
       "device_status"=>$device_status,
       "datum"=>$row['datum'],
       "Delete"=>'<button type="button" class="btn btn-primary " onclick="view(`'.$row["id"].'`)"><i class="fa fa-edit"></i>
       </button> <button type="button" class="btn btn-danger " onclick="deleteRecord(`'.$row["id"].'`)"><i class="fa fa-trash"></i></button>',
      
    );
 }

 //

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
