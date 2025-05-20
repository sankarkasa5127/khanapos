<?php
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
    header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
    header('Access-Control-Max-Age: 86400');

    require_once(".././db.php");


if (isset($_POST['apk_name'])) {
    $status = [
        'code' => 201,
        'message' => "Oops..! something went wrong"
    ];
      $checkExistFileQry_ = mysqli_query($conn, "select * from apk where file_name = '".$_POST['apk_name']."'");
      if ($checkExistFileQry_->num_rows > 0) {
         $checkExistFile_ = mysqli_fetch_assoc($checkExistFileQry_);

         $checkExistFileQry = mysqli_query($conn, "select * from apk where id > ".$checkExistFile_['id']." order by id asc");
         $info = [];
         while($row = mysqli_fetch_assoc($checkExistFileQry)){
            // $row["link"] = $_SERVER['HTTPS'];
            $row["link"] = ($_SERVER['HTTPS'] == 'on' ? 'https://':'http://').$_SERVER['SERVER_NAME'].'/'.$row['file_path'];
            $info[] = $row;
         }
         $status = [
            'code' => 200,
            'message' => "fetched successfully",
            'info' => $info
        ];
      }else{
        $status['message'] = 'Apk is not found';
      }

      echo json_encode($status); die();
}

?>
