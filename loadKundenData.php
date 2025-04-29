<?php
require_once("db.php");
mysqli_set_charset($conn,'utf8');
  if(isset($_POST['id'])){
    $rowid=$_POST['id'];
    $realid=$_POST['realid'];
    $Query = "select * from kundenDocumentsFiles WHERE rowid= ".$realid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $data = array();
    $i=1;
    $fileHtmlDoc='';
    while ($rowdoc = mysqli_fetch_assoc($Records)) {
            $fileHtmlDoc.="<tr id='delrowf-".$rowdoc['id']."'>"; 
            $fileHtmlDoc.= "<td>".$i."</td>";    
            $file_jpg = $rowdoc['fileNames'];

            if(file_exists('KhanaCRM/kunden/pdf/'.$rowdoc['kundenId'].'/'.$file_jpg) || file_exists('KhanaCRM/KASSE_KUNDEN/'.$rowdoc['kundenId'].'/'.$file_jpg)){
              if (file_exists('KhanaCRM/KASSE_KUNDEN/'.$rowdoc['kundenId'].'/'.$file_jpg)) {
                 $fileHtmlDoc.= "<td class='text-center'><a target='_blank' href='/KhanaCRM/KASSE_KUNDEN/".$rowdoc['kundenId']."/".$file_jpg."'>".$file_jpg."</a></td>";  
              }else{
                 $fileHtmlDoc.= "<td class='text-center'><a target='_blank' href='/KhanaCRM/kunden/pdf/".$rowdoc['kundenId']."/".$file_jpg."'>".$file_jpg."</a></td>";  
               }
            }else{
                 $fileHtmlDoc.= "<td class='text-center'></td>";
            }

            $fileHtmlDoc.= "<td class='text-center'>".$rowdoc['description']."</td>"; 
            $originalDate = $rowdoc['createdDate'];
            $newDate = date("d.m.Y", strtotime($originalDate));
            $fileHtmlDoc.= "<td class='text-center'>".$newDate."</td>"; 
            $fileHtmlDoc.= "<td class='text-center'><button  class=' btn btn-danger' onclick='delfiles(".$rowdoc['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
            $fileHtmlDoc.= "</tr>";     
            $i++;
    }  





    $kundenQuery = "select * from restaurants WHERE id= ".$_POST['realid']."  ORDER BY `id` DESC";
    $kundenRecords = mysqli_query($conn, $kundenQuery);
    $kundenrow = mysqli_fetch_assoc($kundenRecords);
    $Query = "select * from Kasse WHERE kunden_nr= ".$rowid."  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
    $data = array();
    $i=1;
    $fileHtml='';
    while ($row = mysqli_fetch_assoc($Records)) {
        $fileHtml.=  "<tr id='delrow-".$row['id']."'>"; 
        $fileHtml.= "<td>".$i."</td>";    
            $fileHtml.= "<td class='text-center'>".$row['name']."</td>"; 
            
            $fileHtml.= "<td class='text-center'>".$row['username']."</td>"; 
            $fileHtml.= "<td class='text-center'>".$row['password']."</td>"; 
            $fileHtml.= "<td class='text-center'><button  class=' btn btn-danger' onclick='delusers(".$row['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
            $fileHtml.= "</tr>";     
            $i++;
    }
     $QueryDevices = "select * from kassen_protokoll WHERE kundenNr= ".$rowid."  ORDER BY `id` DESC";
    $RecordsDevices = mysqli_query($conn, $QueryDevices);
    $x=1;
    $devicesHtml='';
    while ($rowDevices = mysqli_fetch_assoc($RecordsDevices)) {
      $bussinessOption='';
      $deviceOption='';
      $arrayBussinessType=array('kasse','server','client','tablet','mobile');
      $arraydeviceType=array('restaurant','einzel','pc');
      // foreach($arrayBussinessType as $bTyperow){
      //   $selectedb1='';
      //   if($bTyperow == trim($rowDevices['deviceType'])){
      //     $selectedb1='selected';
      //   }
      //   $bussinessOption.="<option value='".$bTyperow."' ".$selectedb1.">".ucfirst($bTyperow)."</option>";
      // }
      foreach($arrayBussinessType as $dType){
        $selectedb='';
        if($dType == $rowDevices['deviceType']){
          $selectedb='selected';
        }
        $deviceOption.="<option value='".$dType."' ".$selectedb.">".ucfirst($dType)."</option>";
      }
     

      // $devices=' <select class="form-select typeDeviceSel-'.$x.'" name="typeDevice" style="display:none;" required >
      // <option value="">Device Type....</option>'.$bussinessOption.'</select>';
      $bussnessselect=' <select class="form-select bussinessSelectType-'.$x.'"  style="display:none;" name="deviceType" required >
      <option value="">Business Type....</option>'.$deviceOption.'</select>';
      $devicesHtml.=  "<tr id='delrow-".$rowDevices['id']."'>"; 
      $devicesHtml.= "<td>".$x."</td>";     
          $devicesHtml.= "<td class='text-center'>".$rowDevices['client_id']."</td>"; 
          
          $devicesHtml.= "<td class='text-center'><span class='sp-deviceType-".$x."'>".ucfirst($rowDevices['deviceType'])."</span>".$bussnessselect."</td>"; 
          //$devicesHtml.= "<td class='text-center'><span class='sp-bussinessType-".$x."'>".$rowDevices['bussinessType']."</span>".$devices."</td>"; 
          $devicesHtml.= "<td class='text-center'><button  class=' btn btn-primary editDevices editbutton-".$x."' data-rel='".$x."'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-primary updateDevice updatebutton-".$x."'  data-rel-id='".$rowDevices['id']."'  data-rel='".$x."'  style='display:none;'>Update</button><button  class=' btn btn-primary cancelDevice canceldevicebutton-".$x."'  data-rel='".$x."' style='display:none;'><i class='fa fa-times' aria-hidden='true'></i></button></td>";
          $devicesHtml.= "</tr>";     
          $x++;
  }

  $contactHtml='';
  $querycontact = "select * from Kundencontacts WHERE rowid= ".$realid."  ORDER BY `id` DESC";
  $recordContact = mysqli_query($conn, $querycontact);

  $b=1;
  while ($rowContact = mysqli_fetch_assoc($recordContact)) {
          $contactHtml.= "<tr id='delrowcontact-".$rowContact['id']."'>"; 
          $contactHtml.=  "<td>".$b."</td>";  
          $originalDate = $rowContact['date'];
          $newDate = date("d.m.Y", strtotime($originalDate));
          $contactHtml.=  "<td class='text-center'>".$newDate."</td>";    
          $contactHtml.=  "<td class='text-center'>".$rowContact['name']."</td>";  
          $contactHtml.=  "<td class='text-center'>".$rowContact['phoneNumber']."</td>";  
          $contactHtml.=  "<td class='text-center'>".$rowContact['note']."</td>";  
          $contactHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delcontact(".$rowContact['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
          $contactHtml.=  "</tr>";     
          $b++;
  }   
  $personHtml='';
  $queryPerson = "select * from kundenpersons WHERE rowid= ".$realid."  ORDER BY `id` DESC";
  $recordPerson = mysqli_query($conn, $queryPerson);

  $a=1;
  while ($rowPerson = mysqli_fetch_assoc($recordPerson)) {
          $personHtml.= "<tr id='delrowperson-".$rowPerson['id']."'>"; 
          $personHtml.=  "<td>".$a."</td>";    
          $personHtml.=  "<td class='text-center'>".$rowPerson['personName']."</td>";    
          $personHtml.=  "<td class='text-center'>".$rowPerson['roleName']."</td>";  
          $originalDate = $rowPerson['date'];
          $newDate = date("d.m.Y", strtotime($originalDate));
          $personHtml.=  "<td class='text-center'>".$newDate."</td>";  
          $personHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delperson(".$rowPerson['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
          $personHtml.=  "</tr>";     
          $a++;
  } 
  $anydeskHtml='';
  $queryAnydesk = "select * from kundenAnydesk WHERE rowid= ".$realid."  ORDER BY `id` DESC";
  $recordanydesk = mysqli_query($conn, $queryAnydesk);
  $a=1;
  while ($rowAnydesk = mysqli_fetch_assoc($recordanydesk)) {
    $status=($rowAnydesk['status']) ? '<span class="label label-success">Activate</span>' : '<span class="label label-danger">Deactivate</span>';
          $anydeskHtml.= "<tr id='delrowanydesk-".$rowAnydesk['id']."'>"; 
          $anydeskHtml.=  "<td>".$a."</td>";    
          $anydeskHtml.=  "<td class='text-center'>".$rowAnydesk['description']."</td>";    
          $anydeskHtml.=  "<td class='text-center'>".$rowAnydesk['anydeskid']."</td>";  
          $originalDate = $rowAnydesk['date'];
          $newDate = date("d.m.Y", strtotime($originalDate));
          $anydeskHtml.=  "<td class='text-center'>".$newDate."</td>";  
          $anydeskHtml.=  "<td class='text-center'>".$status."</td>";  
          $anydeskHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delAnydesk(".$rowAnydesk['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
          $anydeskHtml.=  "</tr>";     
          $a++;
  } 
  $tseHtml='';
  $querytse = "select * from kundenTSE WHERE rowid= ".$realid."  ORDER BY `id` DESC";
  $recordtse = mysqli_query($conn, $querytse);
  $a=1;
  while ($rowtse = mysqli_fetch_assoc($recordtse)) {
    $status=($rowtse['status']) ? '<span class="label label-success">Activate</span>' : '<span class="label label-danger">Deactivate</span>';
          $tseHtml.= "<tr id='delrowtse-".$rowtse['id']."'>"; 
          $tseHtml.=  "<td>".$a."</td>";    
          $tseHtml.=  "<td class='text-center'>".$rowtse['description']."</td>";    
          $tseHtml.=  "<td class='text-center'>".$rowtse['tseId']."</td>";  
          $originalDate = $rowtse['date'];
          $newDate = date("d.m.Y", strtotime($originalDate));
          $tseHtml.=  "<td class='text-center'>".$newDate."</td>";  
          $tseHtml.=  "<td class='text-center'>".$status."</td>";  
          $tseHtml.=  "<td class='text-center'><button  class=' btn btn-danger' onclick='delTse(".$rowtse['id'].")'><i class='fa fa-trash' aria-hidden='true'></i></button></td>";
          $tseHtml.=  "</tr>";     
          $a++;
  } 
  $uploadsHtml='';
  $queryUploads = "select * from transferNow WHERE assignKunden= ".$rowid."  ORDER BY `id` DESC";
  $uploadRecords = mysqli_query($conn, $queryUploads);
  $a=1;
  while ($rowuploads = mysqli_fetch_assoc($uploadRecords)) {

          $uploadsHtml.= "<tr id='delrowtse-".$rowuploads['id']."'>"; 
          $uploadsHtml.=  "<td>".$a."</td>";    
          $uploadsHtml.=  "<td class='text-center'>".$rowuploads['uploadBy']."</td>";    
          $uploadsHtml.=  "<td>".$rowuploads['notes']."</td>";  
          $uploadsHtml.=  "<td>".$rowuploads['fileName']."</td>";  
          $originalDate = $rowuploads['createdDate'];
          $newDate = date("d.m.Y", strtotime($originalDate));
          $uploadsHtml.=  "<td class='text-center'>".$newDate."</td>";  
          $uploadsHtml.=  "</tr>";     
          $a++;
  }




    $kundenBankQuery = mysqli_query($conn, "select * from kundenBankInfo WHERE rowid= ".$_POST['realid']."  ORDER BY `id` DESC");
    $kundenBankrow = mysqli_fetch_assoc($kundenBankQuery);
    



  $data['uploadsHtml']=$uploadsHtml;
    $data['personHtml']=$personHtml;
  $data['tseHtml']=$tseHtml;
  $data['anydeskHtml']=$anydeskHtml;
    $data['kundenUsers']=$fileHtml;
    $data['devices']=$devicesHtml;
    $data['kundenrow']=$kundenrow;
    $data['contactHtml']=$contactHtml;
    $data['fileloading']=$fileHtmlDoc;
    $data['bankInfo']=$kundenBankrow;

    echo  json_encode($data);   
    $conn->close();
    exit();    

  }