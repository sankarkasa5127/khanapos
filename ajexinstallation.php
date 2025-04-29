<?php
require_once("db.php");## Read value   ccfrgt


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
   kunden_nr like '%".$searchValue."%' or 
   firma like '%".$searchValue."%' or 
   anschrift like '%".$searchValue."%' or 
   auftraggeber like '%".$searchValue."%' or 
   termin like '%".$searchValue."%' or 
   version like '%".$searchValue."%' or 
   kontakt like '%".$searchValue."%' or 
   version like '%".$searchValue."%' 
   
    ) ";
}


   $sel = mysqli_query($conn,"select count(*) as allcount from Kasse_Installation");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


$sel = mysqli_query($conn,"select count(*) as allcount  from Kasse_Installation  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

    $empQuery = "select * from Kasse_Installation WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
 // die;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    if ($row["done"] == 1) {$finished = 'Ja';}else {$finished = 'Nein';}		
   //  $kundeName=substr_replace(, "...", 20);
    $data[] = array( 
       "id"=>$row['id'],
       "done"=>$finished,
       "kunden_nr"=>ucfirst($row['kunden_nr']),
       "firma"=>$row['firma'],
       "anschrift"=>"<a target='_BLANK' href='https://www.google.com/maps/search/?api=1&query=".$row["anschrift"]."' /a>".$row["anschrift"],
       "kontakt"=>$row['kontakt'],
       "version"=>$row['version'],
       "termin"=>$row['termin'],
       "auftraggeber"=>$row['auftraggeber'],
       "notiz"=>$row['notiz'],
       "updated"=>$row['updated'],
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