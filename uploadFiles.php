<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  

$rowid=$_POST['invoiceid'];
$kundenid=$_POST['invoiceRealId'];

// Check if image file is a actual image or fake image
  if(isset($_FILES["uploadpdf"]["tmp_name"])) {
    if (!file_exists('KhanaCRM/KASSE_KUNDEN/'.$kundenid)) {
        mkdir('KhanaCRM/KASSE_KUNDEN/'.$kundenid, 0777, true);
    }
    if (!file_exists('KhanaCRM/KASSE_KUNDEN/'.$kundenid)) {
        mkdir('KhanaCRM/KASSE_KUNDEN/'.$kundenid, 0777, true);
    }
        $errors= array();
        $file_name = $_FILES['uploadpdf']['name'];
        $file_size =$_FILES['uploadpdf']['size'];
        $file_tmp =$_FILES['uploadpdf']['tmp_name'];
        $file_type=$_FILES['uploadpdf']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['uploadpdf']['name'])));
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_KUNDEN/".$kundenid."/".$file_name);
       
             $sql = "INSERT INTO `kundenDocumentsFiles`  
            (rowid,
            kundenid,fileNames,description)
            VALUES
            ('".$rowid."',
            '".$kundenid."',
            '".$file_name."',
            '".$_POST['description']."')
            ";
            $result = $conn->query($sql);
           
     }


      $Query = "select * from kundenDocumentsFiles WHERE kundenid= ".$kundenid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
                $data = array();
            $i=1;
                while ($row = mysqli_fetch_assoc($Records)) {
                            echo "<tr id='delrowf-".$row['id']."'>"; 
                            echo "<td>".$i."</td>";    
                            if(file_exists('KhanaCRM/KASSE_KUNDEN/'.$kundenid.'/'.$row["fileNames"])){
                                echo "<td class='text-center'><a data-fancybox class='fancybox' href='KhanaCRM/KASSE_KUNDEN/".$kundenid."/".$row["fileNames"]."'>".$row["fileNames"]."</a></td>";  
                            }else{
                                echo "<td class='text-center'></td>";
                            }
                              
                            echo "<td class='text-center'>".$row['description']."</td>"; 
                            $originalDate = $row['createdDate'];
                            $newDate = date("d.m.Y", strtotime($originalDate));
                            echo "<td class='text-center'>".$newDate."</td>"; 
                            echo "<td class='text-center'><button  class=' btn btn-primary' onclick='editpayment(".$row['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delfiles(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                            echo "</tr>";     
                            $i++;
                }   


                
     ?>