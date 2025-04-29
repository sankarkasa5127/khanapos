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
    
        $searchQuery = " where (T.id like '%".$searchValue."%' or 
        T.kundenid like '%".$searchValue."%' or 
        T.tseId like '%".$searchValue."%' or 
        R.restaurant_name like '%".$searchValue."%' or 
        T.date like '%".$searchValue."%' 
		
    ) ";
    
   //echo $searchQuery;die;
}
 
## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from restaurants");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from kundenTSE WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
 // $empQuery = "select * from kundenTSE WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
// $empRecords = mysqli_query($conn, $empQuery);
$empQuery = "select T.*,R.restaurant_name FROM `kundenTSE` as T JOIN restaurants as R on T.kundenid = R.restaurant_id";
if ($searchQuery) {
  $empQuery .= $searchQuery;
}
 $empQuery .= " order by T.".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    if($row['status']==1){
      $status='<span class="label label-success">Active</span>';

     }else{
      $status='<span class="label label-warning">Wechsel</span>';
     }
        
    $data[] = array( 
       "id"=>$row['id'],
       "kundenid"=>$row['kundenid'],
		 "restaurant_name"=>$row['restaurant_name'],
       "tseId"=>$row['tseId'],
       "date"=>$row['date'],
       "end_date"=>$row['end_date'],
      
       "action"=>'<button type="button" class="btn btn-primary rowedit "  data-id="'.$row["id"].'" data-tse_end_date="'.$row["end_date"].'" data-kundenid="'.$row["kundenid"].'" data-tseId="'.$row["tseId"].'" data-description="'.$row["description"].'" ><i class="fa fa-edit"></i>
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