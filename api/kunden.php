<?php
	header('Access-Control-Allow-Origin: *');
	header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
	header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
	header('Access-Control-Max-Age: 86400');

	require_once(".././db.php");

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
	     mysqli_set_charset($conn,'utf8');
	   if (count($records) == 1) {
	       $records = $records[0];
	    }
	   return $records;
	}

	function access($conn){
		$status = [ "status" => 201, "type" => "danger", "message" => "Oops..! something went wrong.", "kunden" => "" ];
		
		if ($_GET['device_id'] && $_GET['myApp_id'] && $_GET["myDevice_id"] && $_GET['kundenNr']) {
			$checkDeviceInfo = getData2($conn, "andriod_device", ["device_id" => $_GET['device_id'], "myDevice_id" => $_GET["myDevice_id"], "myApp_id" => $_GET['myApp_id'], "kunden_nr" => $_GET["kundenNr"]]);
			if (count($checkDeviceInfo)) {
				$kundenInfo = getData2($conn, "restaurants", ["restaurant_id" => $_GET["kundenNr"]]);
				$users = getData2($conn, "Kasse", ["kunden_nr" => $_GET["kundenNr"]]);
				
				foreach($users as $key => $user){
					$timeTrack = mysqli_query($conn, "select * from user_time_mangement where user_id = " .$user['id']." order by id desc limit 1");
					$users[$key]["trackInfo"] = mysqli_fetch_assoc($timeTrack);
				}
				$status = [ "status" => 200, "type" => "success", "message" => "results fetched."];
				$status["kunden"] = $kundenInfo; 
				$status["kunden"]["users"] = $users; 
			}
			echo json_encode($status,JSON_UNESCAPED_UNICODE); 
		}
		
	}


access($conn);

$conn->close();