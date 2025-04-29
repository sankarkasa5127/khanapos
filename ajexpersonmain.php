<?php
require_once("db.php");## Read value
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
   $searchQuery = " and ( persons.id like '%".$searchValue."%' or 
   persons.name like '%".$searchValue."%' or 
   persons.password like '%".$searchValue."%' or 
   persons.startdate like '%".$searchValue."%' or 
   persons.enddate like '%".$searchValue."%' or 
   persons.status like '%".$searchValue."%' 
   
    ) ";
}


   $sel = mysqli_query($conn,"select count(*) as allcount from persons");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


$sel = mysqli_query($conn,"select count(*) as allcount  from persons  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

     $empQuery = "select *,persons.id as pid,roles.roleName from persons INNER JOIN roles ON persons.roleid=roles.id  WHERE 1 ".$searchQuery." order by persons.".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

$empRecords = mysqli_query($conn, $empQuery);
$data = array();
$i=1;
while ($row = mysqli_fetch_assoc($empRecords)) {
    $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
    $data[] = array( 
       "id"=>$i,
       "name"=>ucfirst($row['name']),
       "username"=>$row['username'],
       "password"=>$row['password'],
       "digits"=>$row['digits'],
       "roleName"=>$row['roleName'],
       "startdate"=>date('d.m.Y',strtotime($row['startdate'])),
       "enddate"=>date('d.m.Y',strtotime($row['endDate'])),
       "status"=>$status,
       "action"=>'<button type="button" class="btn btn-primary " onclick="viewdata('.$row["pid"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deldata('.$row["pid"].')"><i class="fa fa-trash"></i>
       </button>'
      
    );
    $i++;
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