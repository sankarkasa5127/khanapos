<?php

require_once("db.php");
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
   $searchQuery = " and ( id like '%".$searchValue."%' or 
    name like '%".$searchValue."%'  ) ";
}


   $sel = mysqli_query($conn,"select count(*) as allcount from businessType");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


$sel = mysqli_query($conn,"select count(*) as allcount  from businessType  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

    $empQuery = "select * from businessType WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
 // die;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
   // $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
    $data[] = array( 
       "id"=>$row['id'],
       "typeName"=>ucfirst($row['name']),
       "action"=>'<button type="button" class="btn btn-primary " onclick="viewdata('.$row["id"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deldata('.$row["id"].')"><i class="fa fa-trash"></i>
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



$conn->close();
?>