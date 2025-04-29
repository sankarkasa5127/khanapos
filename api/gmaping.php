<?php
	require './../db.php';

	function utf8ize($data) {
	    if (is_array($data)) {
	        foreach ($data as $key => $value) {
	            $data[$key] = utf8ize($value);
	        }
	    } elseif (is_string($data)) {
	        return mb_convert_encoding($data, 'UTF-8', 'ISO-8859-1');
	    }
	    return $data;
	}

	function getLocation($conn){
		// $qry = "SELECT * FROM `de_streets` WHERE PostalCode = 74934 and id = 1474435";
		$qry = "select * from ".$_GET['table']." where ".$_GET['column']." = '".$_GET['value']."'";
		$result = mysqli_query($conn, $qry);

		 $records = []; 
	    while ($row = mysqli_fetch_assoc($result)) {
	        $records[] = utf8ize($row); 
	    }  
	     mysqli_set_charset($conn,'utf8');

		echo json_encode($records,JSON_UNESCAPED_UNICODE); 
		// print_r($rows);
	}

	getLocation($conn);
	$conn->close();
	