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
   uploadBy like '%".$searchValue."%' or 
   notes like '%".$searchValue."%' or 
   transferid like '%".$searchValue."%' or 
   fileName like '%".$searchValue."%'
   
    ) ";
}


   $sel = mysqli_query($conn,"select count(*) as allcount from transferNow");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


$sel = mysqli_query($conn,"select count(*) as allcount  from transferNow  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

    $empQuery = "select * from transferNow WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
 // die;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {  
    //$assignrowId=($row['assignrowId']) ? '<span class="label label-success">assign Yes</span>' : '<span class="label label-danger">Not Assign</span>';

   $assignrowId=($row['assignKunden']) ? '<span class="badge badge-success" onclick="assignTo('.$row["id"].')" style="background-color:green;cursor: pointer;">'.ucfirst($row['assignKunden']).'</span>'  : ' <span class="badge badge-danger"  style="cursor: pointer;" onclick="assignTo('.$row["id"].')">Not Assign</span>  ';
   //  $kundeName=substr_replace(, "...", 20);  
    $data[] = array( 
       "id"=>$row['id'],
       "uploadBy"=>ucfirst($row['uploadBy']),
       "notes"=>$row['notes'],
       "transferid"=>$row['transferid'],
       "fileName"=>$row['fileName'],
       "assignrowId"=>$assignrowId,
       "action"=>'<button type="button" class="btn btn-primary " onclick="deldata('.$row["id"].')"><i class="fa fa-download"></i>
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