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
		$status = [ "status" => 201, "type" => "danger", "message" => "Oops..! something went wrong." ];
		$insertedId=0;
		$message = "";
		if ( $_GET['myApp_id'] && $_GET["user"] ) {
			/*

			$checkExistDevice = getData2($conn, 'andriod_device', ['myApp_id' => $_GET['myApp_id'], "kunden_nr" => $_GET['kunden_nr']]);
			if (count($checkExistDevice)) {
				if ($_POST['trackId'] && ($_GET["status"] == "logged_out")) {
					$qry = mysqli_query($conn, "update user_time_mangement set logged_out = ".$_POST['timestamp']." where id = ".$_POST["trackId"]);
					$insertedId = $_POST['trackId'];
					$message = "User logged out successfully.";
				}else{
					$qry = mysqli_query($conn, "insert into user_time_mangement('user_id','logged_in') values(".$_POST['user'].",".$_POST['timestamp'].")")
					$insertedId = mysqli_insert_id($conn);
					$message = "User logged in successfully.";
				}

				if ($qry) {
					$status = [ "status" => 200, "type" => "success", "message" => $message, "trackId" => $insertedId ];	
				}
				  
			}

			*/
		}
		
		echo json_encode($status); 
		
	}


access($conn);

$conn->close();