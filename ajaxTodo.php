<?php

 // die('developer');
$host = "92.205.178.167";
$user = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";

$conn = mysqli_connect($host, $user, $password,$dbname);
// Check connection
if (!$conn) {
  die("Connection failed: ". mysqli_connect_error());
}
// echo "<pre>";print_r($_POST);die('developer');
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
   $searchQuery = " and ( todo.id like '%".$searchValue."%' or 
   todo.priority like '%".$searchValue."%' or 
   todo.customer_no like '%".$searchValue."%' or 
   persons.name like '%".$searchValue."%' or 
   todo.description like '%".$searchValue."%' or 
   todo.created_at like '%".$searchValue."%' 
   
    ) ";
}


$sel = mysqli_query($conn,"select count(*) as allcount from todo");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

$sel = mysqli_query($conn,"select count(*) as allcount  from todo INNER JOIN persons on persons.id=todo.person WHERE todo.person = ".$_POST['userid']." ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

  $todoQuery = "select todo.*,persons.name as pName from todo INNER JOIN persons on persons.id=todo.person WHERE todo.person = ".$_POST['userid']." ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;

 //$todoQuery = "select * from todo WHERE 1  order by id  limit 0,1000";
 
$empRecords = mysqli_query($conn, $todoQuery);
$data = array();

 
while ($row = mysqli_fetch_assoc($empRecords)) {
    $status=($row['status']) ? '<span class="label label-success">Done</span>' : '<span class="label label-danger">UnDone</span>';
   if($row['form_type']=='appointment'){
        $icon='<i class="fa fa-calendar"></i>';
   }else{
    $icon='<i class="fa fa-tasks"></i>';
   }
   //  $kundeName=substr_replace(, "...", 20);
   $priority=array("img/Harvey/r100.png","img/Harvey/g100.png","img/Harvey/y100.png");
    $priorityimg=" <img src='".$priority[$row['priority']]."' class='shapesImg'/>";
    $data[] = array( 
       "id"=>$row['id'],
       "priority"=>$icon." ".$priorityimg,
       "customer_no"=>$row['customer_no'],
       "person"=>$row['pName'],
       "description"=>$row['description'],
       "created_at"=>date('d.m.Y h:i',strtotime($row['created_at'])),
       "status"=>$status,
       "action"=>'<button type="button" class="btn btn-primary " onclick="viewdata('.$row["id"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deltodo('.$row["id"].')"><i class="fa fa-trash"></i>
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