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
$searchQuery = "";
if($searchValue != ''){
    
        $searchQuery = " and (id like '%".$searchValue."%' or 
        kundenid like '%".$searchValue."%' or 
        holder_name like '%".$searchValue."%' or 
        email like '%".$searchValue."%' or 
        iban like '%".$searchValue."%' or 
        bic like '%".$searchValue."%' or 
        created_at like '%".$searchValue."%' 
    ) ";

    
}
 
## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from kundenBankInfo");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from kundenBankInfo WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
    // echo print_r($records); die();

## Fetch records
 $empQuery = "select * from kundenBankInfo WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);

$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    if($row['status']==1){
      $status='<span class="label label-success">Active</span>';

     }elseif($row['status']==0){
      $status='<span class="label label-danger">Dective</span>';

     }else{
      $status='<span class="label label-warning">Wechsel</span>';
     }
    $kundenid = $row['kundenid'];
    $rowid = $row['rowid'];
    $holder_name = $row['holder_name'];
    $email = $row['email'];
    $iban = $row['iban'];
    $bic = $row['bic'];
    $data[] = array( 
       "id"=>$row['id'],
       "kundenid"=>$row['kundenid'],
       "holder_name"=>$row['holder_name'],
       "email"=>$row['email'],
       "iban"=>$row['iban'],
       "bic"=>$row['bic'],
       "action"=>'<button type="button" class="btn btn-primary pay " data-id='.$row["id"].' data-kundenid="'.$kundenid.'" data-rowid="'.$rowid.'" data-holder_name="'.$holder_name.'" data-email="'.$email.'" data-iban="'.$iban.'" data-bic="'.$bic.'" onclick="payIban(this)" >Pay</button>'
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