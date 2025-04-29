<?php
require_once("db.php");## Read value
$draw = $_POST['draw'];
$row = $_POST['start'];
$rowperpage = $_POST['length']; // Rows display per page
$columnIndex = $_POST['order'][0]['column']; // Column index
$columnName = $_POST['columns'][$columnIndex]['data']; // Column name
if($columnName =='Auszahlung'){
   $columnName="CAST(Auszahlung AS DECIMAL(10,2))";
}
if($columnName =='Einzahlung'){
   $columnName="CAST(Einzahlung AS DECIMAL(10,2))";
}
$columnSortOrder = $_POST['order'][0]['dir']; // asc or desc
$searchValue = mysqli_real_escape_string($conn,$_POST['search']['value']); // Search value


## Search 
$searchQuery = " ";
if($searchValue != ''){
   $searchQuery = " and ( id like '%".$searchValue."%' or 
   date like '%".$searchValue."%' or 
   description like '%".$searchValue."%' or 
   Einzahlung like '%".$searchValue."%' or 
   Saldo like '%".$searchValue."%' or 
   Auszahlung like '%".$searchValue."%' 
    ) ";
}

if(isset($_GET['from']) && isset($_GET['to'])){
   $sel = mysqli_query($conn,"select count(*) as allcount from Kassenbuch WHERE (date BETWEEN '".$_GET['from']."' AND '".$_GET['to']."')");
}else{
   $sel = mysqli_query($conn,"select count(*) as allcount from Kassenbuch");
}

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];

if(isset($_GET['from']) && isset($_GET['to'])){
$sel = mysqli_query($conn,"select count(*) as allcount  from Kassenbuch  WHERE (date BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ".$searchQuery);
}else{
   $sel = mysqli_query($conn,"select count(*) as allcount  from Kassenbuch  WHERE 1 ".$searchQuery);
}
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records
if(isset($_GET['from']) && isset($_GET['to'])){
      $empQuery = "select * from Kassenbuch WHERE (date BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}else{
       $empQuery = "select * from Kassenbuch WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
}
// echo $empQuery;die;
 // die;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();
$totalamount=0;
$saldoarray=array();
while ($row = mysqli_fetch_assoc($empRecords)) {
  
   // $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
   if(empty($row['Einzahlung'])){
      $row['Einzahlung']=0;
   }
   if($row['Einzahlung']!=0){
      $totalamount= $totalamount + $row['Einzahlung'];
    $Einzahlung=formatPrice($row['Einzahlung'])." &euro;";
   }else{
    $Einzahlung='';
   }
   if($row['Auszahlung']!=0){
     // $totalamount= $totalamount - trim($row['Auszahlung']);
     $totalamount = floatval($totalamount);
$normalamount = floatval($row['Auszahlung']);
 $totalamount = $totalamount-$normalamount;
    $Auszahlung='-'.formatPrice($row['Auszahlung'])." &euro;";
   }else{
    $Auszahlung='';
   }
   array_push($saldoarray,formatPrice($totalamount)." &euro;");
   $status=($row['status']) ? '<span class="label label-success">Assign</span>' : '<span class="label label-danger">Not Assign</span>';
    $data[] = array( 
       "id"=>$row['id'],
       "date"=>date('d.m.Y',strtotime($row['date'])),
       "description"=>$row['description'],
       "Einzahlung"=>$Einzahlung,
       "Auszahlung"=>$Auszahlung,
       "status"=>$status,
       "Saldo"=>formatPrice($totalamount)." &euro;",
       "action"=>'<button type="button" class="btn btn-primary " onclick="viewdata('.$row["id"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deldata('.$row["id"].')"><i class="fa fa-trash"></i>
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



$conn->close();
?>