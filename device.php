<?php

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
header('Access-Control-Max-Age: 86400');

require_once("db.php");

if (!$conn) {
  die("Connection failed: " . mysqli_connect_error());
}


function getData2($conn,$table, $where = []){
    $query = "select * from ".$table;
   $whereString = "";
   $counter = 1;
   $wherCount = count($where);
   foreach ($where as $key => $value) {
      if ( ($counter == $wherCount) && !($value == 'null' || $value == null) ) {
       $whereString .= "$key = '$value'";
      }elseif($value == 'null' || $value == null){
         if (($counter == $wherCount)) {
            $whereString .= " $key IS null";
         }else{
            $whereString .= "$key IS null and ";
         }
      }else{
         $whereString .= "$key = '$value' and ";
      }      
      $counter++;
   }

   if ($wherCount) {
      $query .= " where ".$whereString;
   }

   $getAll = mysqli_query($conn,$query);
   $records = []; 
    while ($row = mysqli_fetch_assoc($getAll)) {
        $records[] = $row; 
    }  
   if (count($records) == 1) {
       $records = $records[0];
    }
   return $records;
}


function updateQry($conn,$table,$set = [], $where = []){
    $query = "update ".$table." set ";
   $whereString = "";
   $setString = [];
   $counter = 1;

   foreach ($set as $col => $val) {
       $setString[] = "$col = '$val'";
   }

   $wherCount = count($where);
   foreach ($where as $key => $value) {
      if ( $counter == $wherCount ) {
       $whereString .= "$key = '$value'";
      }else{
         $whereString .= "$key = '$value' and ";
      }      
      $counter++;
   }

   if (count($setString)) {
      $query .= implode(',',$setString);
   }
   if ($wherCount) {
      $query .= " where ".$whereString;
   }
   return mysqli_query($conn,$query);
}


function insertQry($conn,$table,$data){
   $getQueryString = getInsertQuery($data);
   $query = "insert into ".$table."(".$getQueryString['columns'].") values(".$getQueryString['values'].")";
   return mysqli_query($conn,$query);
}


function generateUniqId($conn){
   $uniqId = rand(111111111111,999999999999);
   // $query = "select * from andriod_device where device_id = '".$uniqId."'";
     // $result = $conn->query($query);
     $result = getData2($conn, 'andriod_device', ['device_id' => $uniqId]);
    if(count($result)){
      generateUniqId($conn);
    }
    return $uniqId;
}

function getInsertQuery($postData){
      $dataArrValues = array_map(function($item){
         return "'".$item."'";
      }, $postData);

      $dataStringValues = implode(',', $dataArrValues);
      $dataStringColumns = implode(',', array_keys($postData));

      return [
         'columns' => $dataStringColumns,
         'values' => $dataStringValues,
      ];
}
 

function access($conn){
   
   if (isset($_GET['device']) && ($_GET['device'] == 'newDevice_id') ) {
      $isExistMyApp = $isNullId = 0;
      $status = [
         "status" => 201,
         "message" => "Oops... something went wrong",
         "device" => null
      ];
      if (!$_GET['myDevice_id']) {
         echo json_encode($status); die();
      }

      $postData["myDevice_id"] = $_GET["myDevice_id"];
      $postData["device_id"] = generateUniqId($conn);
      $checkExistDevice = getData2($conn, 'andriod_device', ['myDevice_id' => $_GET['myDevice_id']]);
      if (is_array($checkExistDevice[0])) {
         foreach($checkExistDevice as $device){
            if ($device['myApp_id'] == $_GET['myApp_id']) {
               $isExistMyApp = $device['id'];
            }
            if (empty($device['myApp_id']) || ($device['myApp_id'] == null)) {
               $isNullId = $device['id'];
            }
         }
      }else{
         if ($checkExistDevice['myApp_id'] == $_GET['myApp_id']) {
            $isExistMyApp = $checkExistDevice['id'];
         }
         if (empty($checkExistDevice['myApp_id']) || ($checkExistDevice['myApp_id'] == null)) {
            $isNullId = $checkExistDevice['id'];
         }
      }
      
      if($checkExistDevice && count($checkExistDevice)){
         if ($_GET['myApp_id']) {
            if ($isNullId) {
               $result = updateQry($conn, 'andriod_device', ['myApp_id' => $_GET['myApp_id']],[ 'id' => $isNullId]);
               if ($result) {
                  $status = [
                     "status" => 200,
                     "message" => "Device has been updated",
                     "device" => getData2($conn, 'andriod_device',['id' => $isNullId])
                  ];
                  $status["device"]["serverInfo"] = null;
               }
            }else{
               if ($isExistMyApp) {
                  $status["message"] = "Device already exist";
                  $status["device"] = getData2($conn, 'andriod_device',['id' => $isExistMyApp]);
               }else{
                  $newPostData = [
                     'myDevice_id' => $checkExistDevice["myDevice_id"],
                     'device_id' => $checkExistDevice["device_id"],
                     'myApp_id' => $_GET['myApp_id']
                  ];
                  $result = insertQry($conn, 'andriod_device', $newPostData);
                  if ($result) {
                     $status = [
                        "status" => 200,
                        "message" => "Device has been created",
                        "device" => getData2($conn, 'andriod_device',['id' => mysqli_insert_id($conn)])
                     ];
                  }
                  $status["device"]["serverInfo"] = null;
               }
            }
         }else{
            $status["message"] = "Device already exist";
         }
      }else{
         if ($_GET['myApp_id']) {
            $postData['myApp_id'] = $_GET['myApp_id'];
         }
         $result = insertQry($conn, 'andriod_device', $postData);
         if ($result) {
            $status = [
               "status" => 200,
               "message" => "Device has been created",
               "device" => getData2($conn, 'andriod_device',['id' => mysqli_insert_id($conn)]),
            ];
             $status["device"]["serverInfo"] = null;
         }
      }
       
      echo json_encode($status); die();
   }
   
   elseif ( (isset($_GET['device_id']) && isset($_GET['myDevice_id'])) || ( isset($_GET['type']) && ($_GET['type'] == 'getData')) ) {

      $status = [
         'status' => 201,
         'message' => 'Record not exist',
         'device' => null,
      ];
      if (($_GET['device_id'] && $_GET['myDevice_id']) || $_GET['id']) {
         if ( isset($_GET['id']) && $_GET['id']) {
             $where = ['id' => $_GET['id']];
         }else{
             $where = ['device_id' => $_GET['device_id'], 'myDevice_id' => $_GET['myDevice_id'], 'myApp_id' => 'null'];
            if ($_GET['myApp_id']) {
               $where['myApp_id'] = $_GET['myApp_id']; 
            }
         }
          $deviceInfo = getData2($conn, 'andriod_device', $where);
         if ($deviceInfo && count($deviceInfo)) {
            if ($deviceInfo['server_id']) {
               $serverInfo = getData2($conn, 'andriod_device',['device_id' => $deviceInfo['server_id']]);
               $deviceInfo['serverInfo'] = $serverInfo; 
            }else{
               $deviceInfo['serverInfo'] = null; 
            }
            $status = [
               'status' => 200,
               'message' => 'Record successfully fetched',
               'device' => $deviceInfo,
            ];
         }
      }
      
      echo json_encode($status);

   }elseif (isset($_GET['device']) && ($_GET['device'] == 'newUpdate')) {

       $status = [
               "status" => 201,
               "message" => "Device data not match with our records"
         ];
      if ($_GET['myDevice_id']) {
         $checkExistDevice = getData2($conn, 'andriod_device',["device_id" => $_POST["device_id"], "myDevice_id" => $_GET['myDevice_id']]);
         if($checkExistDevice && count($checkExistDevice)){
            $notiz = str_replace("'",'"',$_POST['info']);
            $where = [
               'device_id' => $_POST["device_id"],
               'myDevice_id' => $_GET["myDevice_id"]
            ];
            $set = [
               'notiz' => $notiz,
               'status' => 0
            ];
            if ($_GET['myApp_id']) {
               $where["myApp_id"] = $_GET['myApp_id'];
            }else{
               $where["myApp_id"] = null;
            }
            $result = updateQry($conn, 'andriod_device', $set, $where);
            if ($result) {
               $status = [
                     "status" => 200,
                     "message" => "Device configurations has been updated"
               ];
            }
         }
      }
       $logInfo = [
               'device_id' => $_POST["device_id"],
               'myDevice_id' => $_GET["myDevice_id"]
            ];
            if ($status["status"] != 200) {
               $logInfo["status"] = 'Rejected';
               $logInfo["remarks"] = $status["message"];
            }
            $logQuery = insertQry($conn, 'device_logs', $logInfo);
      echo json_encode($status);
   }elseif (isset($_GET['type']) && ($_GET['type'] == 'update')) {
      $status = [
         "status" => 201,
         "type" => 'danger',
         "message" => "Oops... something went wrong",
      ];
        $postData = $_POST;
         if ($postData["device_id"] && $postData["id"]) {
             unset($postData["datum"]);
               $where = [
                  "device_id" => $postData["device_id"],
                  "id" => $postData["id"]
               ];
         
              $result = updateQry($conn, 'andriod_device',$postData, $where);
            if ($result) {
               $status = [
                  "status" => 200,
                  "type" => 'success',
                  "message" => "Device has been updated",
               ];
            }
             $status["serverInfo"] = null;
         }
         
      echo json_encode($status);
   }elseif (isset($_GET['type']) && ($_GET['type'] == 'delete')) {
      $status = [
         "status" => 201,
         "type" => 'danger',
         "message" => "Oops... something went wrong",
      ];
      if (!$_POST['device_id']) {
         echo json_encode($status); die();
      }
        $device_id = $_POST['device_id'];
      $query = "delete from andriod_device where id = '".$device_id."'";
      $result = $conn->query($query);
      
      if ($result) {
         $status = [
            "status" => 200,
            "type" => 'success',
            "message" => "Device has been deleted",
         ];
      }
       $status["serverInfo"] = null;
      echo json_encode($status);
   }elseif (isset($_GET['type']) && ($_GET['type'] == 'scrpts')) {

      if (!$_POST["device_id"] || !$_POST["name"]) {
         $status = ["status" => 201, "statusMsg" => 'danger', "message" => 'Oops..! something went wrong.'];
         echo json_encode($status); die();
      }
      $status = ["status" => 200, "statusMsg" => 'success', "message" => 'Script inserted successfully.'];
      $checkExistDevice = getData2($conn, 'device_scripts', ['device_id' => $_POST['device_id'], 'name' => $_POST['name']]);
      $resultInfo = str_replace("'",'"',$_POST["resultz"]);
      $data = $_POST;
      $data['resultz'] = $resultInfo;
      $qryColumns = getInsertQuery($data);
      $result = insertQry($conn, 'device_scripts', $data);
      if (!$result) {
         $status = ["status" => 201, "statusMsg" => 'danger', "message" => 'Oops..! something went wrong.'];
      }
      echo json_encode($status); die();
   }else{
      echo "default"; die();
   }
}
access($conn);

$conn->close();
?>
