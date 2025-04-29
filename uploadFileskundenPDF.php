<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  

$rowid=$_POST['invoiceid'];
$invoiceid=$_POST['kundenrowid'];
// Check if image file is a actual image or fake image
  if(isset($_FILES["uploadpdfk"]["tmp_name"])) {
    if (!file_exists('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$invoiceid)) {
        mkdir('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$invoiceid, 0777, true);
    }
    if (!file_exists('KhanaCRM/KASSE_RECHNUNGEN/jpg/kunden/'.$invoiceid)) {
        mkdir('KhanaCRM/KASSE_RECHNUNGEN/jpg/kunden/'.$invoiceid, 0777, true);
    }
        $errors= array();
        $file_name = $_FILES['uploadpdfk']['name'];
        $file_size =$_FILES['uploadpdfk']['size'];
        $file_tmp =$_FILES['uploadpdfk']['tmp_name'];
        $file_type=$_FILES['uploadpdfk']['type'];
        $file_ext=strtolower(end(explode('.',$_FILES['uploadpdfk']['name'])));
        $file_jpg = preg_replace('"\.pdf$"', '.jpg', $file_name);
            // if(is_file("KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name)) 
            // {
            // // Delete the given file
            // unlink("KhanaCRM/KASSE_RECHNUNGEN/pdf/".$file_name); 
            // }
            // if(is_file("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_jpg)) 
            // {
            // // Delete the given file
            // unlink("KhanaCRM/KASSE_RECHNUNGEN/jpg/".$file_jpg); 
            // }
        move_uploaded_file($file_tmp,"KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/".$invoiceid."/".$file_name);
        $pdf = 'KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$invoiceid.'/';
        $jpg = 'KhanaCRM/KASSE_RECHNUNGEN/jpg/kunden/'.$invoiceid.'/';
      
        $pdf_file = $pdf.''.$file_name;
        $jpg_file = $jpg.''.$file_jpg;


        if (!file_exists($jpg_file)) {
            $fp_pdf = fopen($pdf_file, 'rb');
            $img = new imagick(); // [0] can be used to set page number
            $img->setResolution(300,300);
            $img->readImageFile($fp_pdf);
            $img->setImageFormat( "jpeg" );
            $img->setImageCompression(imagick::COMPRESSION_JPEG); 
            $img->setImageCompressionQuality(1); 
            $img->setImageUnits(imagick::RESOLUTION_PIXELSPERINCH);
            //$data = $img->getImageBlob();
            file_put_contents($jpg_file, $img);	
            }
             $sql = "INSERT INTO `kundenfiles`  
            (rowid,
            kundenid,fileNames,description)
            VALUES
            ('".$rowid."',
            '".$_POST['kundenrowid']."',
            '".$file_name."',
            '".$_POST['description']."')
            ";
            $result = $conn->query($sql);
           $Query = "select * from kundenfiles WHERE rowid= ".$rowid;
    $Records = mysqli_query($conn, $Query);
                $data = array();
            $i=1;
                while ($row = mysqli_fetch_assoc($Records)) {
                    $file_jpg =  $row['fileNames'];
                            echo "<tr id='delrowfk-".$row['id']."'>"; 
                            echo "<td>".$i."</td>";    
                            if(file_exists('KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/'.$row['kundenid'].'/'.$file_jpg)){
                                echo "<td class='text-center'><a data-fancybox class='fancybox' href='http://khana-gmbh.de/portal_/KhanaCRM/KASSE_RECHNUNGEN/pdf/kunden/".$row['kundenid']."/".$file_jpg."'>".$file_jpg."</a></td>";  
                            }else{
                                echo "<td class='text-center'></td>";
                            }
                              
                            echo "<td class='text-center'>".$row['description']."</td>"; 
                            echo "<td class='text-center'>".$row['createdDate']."</td>"; 
                            echo "<td class='text-center'><button  class=' btn btn-primary' onclick='editpayment(".$row['id'].")'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-danger' onclick='delfilesk(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                            echo "</tr>";     
                            $i++;
                }    
     }
     ?>