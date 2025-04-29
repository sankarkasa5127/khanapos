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
   $searchQuery = " and ( _items.id like '%".$searchValue."%' or 
   supplier_details.supplier_name like '%".$searchValue."%' or 
    _itemType.typeName  like '%".$searchValue."%' or 
    _items.itemName like '%".$searchValue."%' or 
    _items.Description like '%".$searchValue."%' or 
    _items.price like '%".$searchValue."%' 
   
    ) ";
}


   $sel = mysqli_query($conn,"select count(*) as allcount from _items INNER JOIN supplier_details ON  _items.venderid=supplier_details.id INNER JOIN _itemType ON _itemType.id=_items.typeid");

$records = mysqli_fetch_assoc($sel);
$totalRecords = $records['allcount'];


$sel = mysqli_query($conn,"select count(*) as allcount  from _items INNER JOIN supplier_details ON  _items.venderid=supplier_details.id INNER JOIN _itemType ON _itemType.id=_items.typeid  WHERE 1 ".$searchQuery);
$records = mysqli_fetch_assoc($sel);
$totalRecordwithFilter = $records['allcount'];
mysqli_set_charset($conn,'utf8');

// ## Fetch records

     $empQuery = "select _items.*,supplier_details.supplier_name,_itemType.typeName from _items INNER JOIN supplier_details ON  _items.venderid=supplier_details.id INNER JOIN _itemType ON _itemType.id=_items.typeid  WHERE 1 ".$searchQuery." order by ".$columnName." ".$columnSortOrder." limit ".$row.",".$rowperpage;
$empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) {
    $status=($row['status']) ? '<span class="label label-success">Active</span>' : '<span class="label label-danger">Deactive</span>';
   //  $kundeName=substr_replace(, "...", 20);
    $data[] = array( 
       "id"=>$row['id'],
       "supplier_name"=>ucfirst($row['supplier_name']),
       "typeName"=>$row['typeName'],
       "itemName"=>$row['itemName'],
       "Description"=>$row['Description'],
       "price"=>formatPrice($row['price']),
       "status"=>$status,
       "action"=>'<button type="button" class="btn btn-primary " onclick="view('.$row["id"].')"><i class="fa fa-edit"></i>
       </button><button type="button" class="btn btn-danger " onclick="deleteRecord('.$row["id"].')"><i class="fa fa-trash"></i>
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