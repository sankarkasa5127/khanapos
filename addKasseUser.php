<?php
require_once("db.php");
require_once("function.php");
if(isset($_POST['username'])){
    $Query = "select * from Kasse WHERE username= '".$_POST['username']."'  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $rowcheck = mysqli_fetch_assoc($Records);
    if(empty($rowcheck)){
            $result=insert('Kasse',$_POST,$conn);
            if($result>0){
                $message= "User created successfully..";
            }else{
                $message=  "Something went wrong....";
            }
    }
    else{
        $message=  "UserName already exist..";
    }
    $Queryselect = "select * from Kasse WHERE kunden_nr= ".$_POST['kunden_nr']."  ORDER BY `id` DESC";
    $Recordsselect = mysqli_query($conn, $Queryselect);
    $i=1;
    $fileHtml='';
    while ($row = mysqli_fetch_assoc($Recordsselect)) {
        $fileHtml.= "<tr id='delrow-".$row['id']."'>";   
        $fileHtml.= "<td>".$i."</td>";    
            $fileHtml.= "<td class='text-center'>".$row['name']."</td>"; 
            
            $fileHtml.= "<td class='text-center'>".$row['username']."</td>"; 
            $fileHtml.= "<td class='text-center'>".$row['password']."</td>"; 
            $fileHtml.= "<td class='text-center'><button  class=' btn btn-danger' onclick='delusers(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
            $fileHtml.= "</tr>";     
            $i++;
    }
    $response=array(
            "message" =>$message,
            "htmlData" =>$fileHtml
    );
    echo  json_encode($response);
}
 $conn->close();?>