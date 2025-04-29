<?php
require_once("./../../db.php");
require_once("./../../function.php");
mysqli_set_charset($conn,'utf8');
$rowid=$_POST['invoiceid'];
$invoiceid='';
  if(isset($_FILES["fileuploadInvoice"]["tmp_name"])) {
        $errors= array();
        $file_name = $_FILES['fileuploadInvoice']['name'];
        $file_size =$_FILES['fileuploadInvoice']['size'];
        $file_tmp =$_FILES['fileuploadInvoice']['tmp_name'];
        $file_type=$_FILES['fileuploadInvoice']['type'];
        move_uploaded_file($file_tmp,"./../../KhanaCRM/bankstatement/".$file_name);
$arrayBank=array('Bname'=>$_POST['bname'],'invoiceid'=>$_POST['invoiceid'],'bdate'=>date('Y-m-d',strtotime($_POST['bdate'])),'bnote'=>$_POST['bnotes'],'bankinvoiceid'=>$_POST['binvoiceNumber'],'buploadfile'=>$file_name); 
$result=insert('bankInvoice',$arrayBank,$conn);
           $Query = "select * from bankInvoice WHERE invoiceid= ".$rowid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
                $data = array();
            $i=1;
                while ($row = mysqli_fetch_assoc($Records)) {
                  
                            echo "<tr id='delrowInB-".$row['id']."'>"; 
                            echo "<td>".$i."</td>"; 
                            echo "<td class='text-center'>".$row['bankinvoiceid']."</td>";    
                            echo "<td class='text-center'>".$row['Bname']."</td>";   
                          
                            $originalDate = $row['bdate'];
                            $newDate = date("d.m.Y", strtotime($originalDate));
                            echo "<td class='text-center'>".$newDate."</td>";  
                            if(file_exists('./../../KhanaCRM/bankstatement/'.$file_name)){
                                echo "<td class='text-center'><a data-fancybox class='fancybox' href='./../../KhanaCRM/bankstatement/".$file_name."'>".$file_name."</a></td>";  
                            }else{
                                echo "<td class='text-center'></td>";
                            }
                              
                            echo "<td class='text-center'>".$row['bnote']."</td>"; 
                            echo "<td class='text-center'><button  class=' btn btn-danger' onclick='delInfoB(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
                            echo "</tr>";     
                            $i++;
                }    
     }
     ?>