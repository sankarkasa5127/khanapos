<?php
require_once("foodbee_db.php");
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
if($columnName =='Auszahlung'){
   $columnName="CAST(Auszahlung AS DECIMAL(10,2))";
}
if($columnName =='total_amount'){
   $columnName="CAST(total_amount AS DECIMAL(10,2))";
}
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn_foodbee,$_POST['search']['value']); // Search value


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and ( id like '%".$searchValue."%' or 
   order_id like '%".$searchValue."%' or 
   restaurant_id like '%".$searchValue."%' or 
   total_price like '%".$searchValue."%' or 
   order_pick_up like '%".$searchValue."%' or 
   order_status like '%".$searchValue."%' or 
   payment_mode like '%".$searchValue."%' or 
   discount like '%".$searchValue."%' or 
   tip like '%".$searchValue."%' or 
   created_at like '%".$searchValue."%' 
    ) ";
}

if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn_foodbee,"select count(*) as allcount from orders WHERE (created_at BETWEEN '".$_GET['from']."' AND '".$_GET['to']."')");
}else{
   $sel = mysqli_query($conn_foodbee,"select count(*) as allcount from orders");
}

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

if(isset($_GET['from']) && isset($_GET['to'])){
$sel = mysqli_query($conn_foodbee,"select count(*) as allcount  from orders  WHERE (created_at BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ".$searchQuery);
}else{
   $sel = mysqli_query($conn_foodbee,"select count(*) as allcount  from orders  WHERE 1 ".$searchQuery);
}
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn_foodbee,'utf8');

// ## Fetch records
if(isset($_GET['from']) && isset($_GET['to'])){
      $empQuery = "select * from orders WHERE (created_at BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}elseif(isset($_GET['restaurant_id'])){
      $empQuery = "select * from orders WHERE restaurant_id = '".$_GET['restaurant_id']."' ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}else{
       $empQuery = "select * from orders WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}

// echo $empQuery;die;
 // die;
$empRecords = mysqli_query($conn_foodbee, $empQuery);
$data = array();
$totalamount=0;
$saldoarray=array();
while ($row = mysqli_fetch_assoc($empRecords)) {
  
   // $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
   $total = $row["after_discount"]+$row["delivery_charge"];
   
   array_push($saldoarray,formatPrice($totalamount)." &euro;");
   $status=($row['status']) ? '<span class="label label-success">Assign</span>' : '<span class="label label-danger">Not Assign</span>';
    $data[] = array( 
       "id"=>$row['id'],
       "order_id"=>$row['order_id'],
       "restaurant_id"=>'<a href="foodbee.php?restaurant_id='.$row['restaurant_id'].'" >'.$row['restaurant_id'].'</a>',
       "total_price"=>$row["total_price"],
       "discount"=>$row["discount"],
       "tip"=>$row["tip"],
       "total"=> number_format($total,2),
       "order_pick_up"=>$row["order_pick_up"],
       "order_status"=>$row["order_status"],
       "payment_mode"=>$row["payment_mode"],
       "created_at"=>date('d.m.Y',strtotime($row['created_at'])),
       "action"=>'<button type="button" class="btn btn-primary " onclick="vieworderdata('.$row["order_id"].')"><i class="fa fa-eye"></i>
       </button>'
    );
 }

 $arrayData=array();
 if(!empty($data)){
   $afterRevsers=array_reverse($saldoarray);
   $i=0;
   foreach($data as $extrarow ){
         $extrarow['Saldo']=$afterRevsers[$i];
         $arrayData[]=$extrarow;
         $i++;
   }
 }
 
 ## Response
 $response = array(
   "draw" => intval($draw),
   "iTotalRecords" => $totalRecords,
   "iTotalDisplayRecords" => $totalRecordwithFilter,
   "aaData" => $arrayData
 );
 
 echo json_encode($response);



$conn_foodbee->close();
?>