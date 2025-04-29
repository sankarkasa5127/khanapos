<?php 
function insert($db_tbl_name, $request_data,$conn) {
        // echo "<pre>";print_r($conn);die();
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);
        if(count($request_data)>0) {
            $fields = array_keys($request_data);
            // build the query
        $sql = 'INSERT INTO '.$db_tbl_name.' ('.implode(",", $fields).')VALUES("'.implode('","', $request_data).'")';
           return $result = $conn->query($sql);
            
        }
 return false;
    }
function updateQuery($table,$requestDate,$column,$id,$conn){
      $updates=array();
      if (count($requestDate) > 0) {
            foreach ($requestDate as $key => $value) {
            $value = "'$value'";
            $updates[] = "$key = $value";
            }
      }
      $implodeArray = implode(', ', $updates);
       $sql = "UPDATE ".$table."  SET ".$implodeArray." WHERE ".$column."=".$id;

      return $result = $conn->query($sql);
}
   
   ?>