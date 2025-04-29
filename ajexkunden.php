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
$filtersearch = array_filter($_POST["columns"],function($item){
    if (!empty($item["search"]["value"]) || ($item["search"]["value"] == 0) ) {
      return $item;
    }
});
## Search 
$searchQuery = " ";
if($searchValue != ''){
    
        $searchQuery = " and (restaurant_id like '%".$searchValue."%' or 
        restaurant_name like '%".$searchValue."%' or 
        restaurant_inhaber like '%".$searchValue."%' or 
        restaurant_str like '%".$searchValue."%' or 
        restaurant_str_nr like '%".$searchValue."%' or 
        restaurant_plz like '%".$searchValue."%' or 
        restaurant_ort like '%".$searchValue."%'
    ) ";
    
}elseif (count($filtersearch)) {
  $searchCol = $searchVal = "";
   foreach ($filtersearch as $key => $value) {
     $searchCol = $value["data"];
     $searchVal = $value["search"]["value"];
   }
 $searchQuery = " and ".$searchCol." like '%".$searchVal."%'";
}
 
## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from restaurants");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from restaurants WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records
  $empQuery = "select * from restaurants WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    if($row['status']==1){
      $status='<span class="label label-success">Active</span>';

     }elseif($row['status']==0){
      $status='<span class="label label-danger">Dective</span>';

     }elseif($row['status']==4){
      $status='<span class="label label-success">Active-TSE</span>';

     }elseif($row['status']==5){
      $status='<span class="label label-warning">Active-xTSE</span>';

     }elseif($row['status']==3){
      $status='<span class="label label-danger">Delete</span>';

     }else{
      $status='<span class="label label-warning">Wechsel</span>';
     }
        $address="<input type='hidden'  class='restaurant_str' value='".$row["restaurant_str"]."'/><input type='hidden'  class='restaurant_str_nr' value='".$row["restaurant_str_nr"]."'/>".$row["restaurant_str"]." ".$row["restaurant_str_nr"];
        $map='<a target="_blank" href="https://www.google.com/maps/place/'.$row["restaurant_str"].'+'.$row["restaurant_str_nr"].',+'.$row['restaurant_plz'].'+'.$row['restaurant_ort'].'" class="btn btn-success" ><i class="fa fa-map-marker-alt"></i>
        </a>';
    $data[] = array( 
       "restaurant_id"=>"<input type='hidden' class='inputvalue' value='".$row['id']."' />".$row['restaurant_id'],
       "restaurant_name"=>$row['restaurant_name'],
       "restaurant_inhaber"=>$row['restaurant_inhaber'],
       "address"=>$address,
       "status"=>$status,
       "restaurant_plz"=>$row['restaurant_plz'],
       "restaurant_ort"=>$row['restaurant_ort'],
       "resttype"=>$row['resttype'],
       "action"=>$map.'<button type="button" class="btn btn-primary rowedit " ><i class="fa fa-edit"></i>
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