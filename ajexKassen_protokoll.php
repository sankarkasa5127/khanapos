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
    if($searchValue=="Activated" || $searchValue=="activated"){
        $searchQuery = " and (tse like '%1%' or 
        tier3 like '%1%' ) ";
    }else if($searchValue=="Deactivated" || $searchValue=="Deactivated"){
        $searchQuery = " and (tse='NULL' or 
        tier3='NULL' ) ";
    }else{
        $searchQuery = " and (anydesk like '%".$searchValue."%' or 
   terminal like '%".$searchValue."%' or 
   kunden like '%".$searchValue."%' or 
   street like '%".$searchValue."%' or 
   zipcode like '%".$searchValue."%' or 
   stadt like '%".$searchValue."%' or 
   datum like '%".$searchValue."%' or 
   version like '%".$searchValue."%'
    ) ";
    }
   //echo $searchQuery;die;
}
 
## Total number of records without filtering
$sel = mysqli_query($conn,"select count(*) as allcount from kassen_protokoll");
$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


## Total number of record with filtering
$sel = mysqli_query($conn,"select count(*) as allcount from kassen_protokoll WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

## Fetch records

  $empQuery = "select * from kassen_protokoll WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder."  limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {

    $tseText="Deactivated";
		if($row["tse"]!=null&&$row["tse"]==1){ $tseText ="<span style='color:white;background-color:green;padding:4px;'> Activated</span>";} 
       $tierText="Deactivated";
		    if($row["tier3"]!=null&&$row["tier3"]==1){ $tierText ="<span style='color:white;background-color:green;padding:4px;'> Activated</span>";
		} 	
       $version="";
		if($row["version"]!=null){ $version ="<span style='color:white;background-color:green;padding:4px;'> ".$row["version"]."</span>";} 
    if($row["kundenNr"]==0){ 
      $kundenr ="<a href='javascript:void(0);'  style='color:blue;' rel-id='".$row['id']."'>Assign</a>";
    }else{
      $kundenr ="<a href='javascript:void(0);' style='color:blue;' rel-id='".$row['id']."'>".$row['kundenNr']."</a>";
    }
        $address=$row["street"]."<br>".$row["zipcode"]." ".$row["stadt"];

        $priority=array("img/Harvey/r100.png","img/Harvey/g100.png","img/Harvey/y100.png");
        $priorityimg=" <img src='".$priority[$row['status']]."' class='shapesImg'/>";
    $data[] = array( 
       "id"=>$row['id'].$priorityimg,
       "anydesk"=>$row['anydesk'],
       "terminal"=>$row['terminal'],
       "kundenNr"=>$kundenr,
       "kunden"=>$row['kunden'],
       "address"=>$address,
       "tseText"=>$tseText,
       "tierText"=>$tierText,
       "version"=>$version,
       "datum"=>$row['datum'],
       "Delete"=>'<button type="button" class="btn btn-primary " onclick="view('.$row["id"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deleteRecord('.$row["id"].')"><i class="fa fa-trash"></i>
       </button>',
      
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