
<?php
require_once("db.php");
require_once("function.php");
mysqli_set_charset($conn,'utf8');
 $kundenQuery = "select * from kassen_protokoll WHERE client_id= '".$_POST['client_id']."' AND kundenNr='".$_POST['kundenNr']."'  LIMIT 1 ";
$kundenRecords = mysqli_query($conn, $kundenQuery);
$kundenrow = mysqli_fetch_assoc($kundenRecords);
if(!empty($kundenrow)){

         $result=updateQuery('kassen_protokoll',$_POST,'id',$kundenrow['id'],$conn);

        if ($result > 0) {
            $QueryDevices = "select * from kassen_protokoll WHERE kundenNr= ".$_POST['kundenNr']."  ORDER BY `id` DESC";
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
          $devicesHtml.= "<td class='text-center'><button  class=' btn btn-primary editDevices editbutton-".$x."' data-rel='".$x."'><i class='fa fa-edit' aria-hidden='true'></i></button><button  class=' btn btn-primary updateDevice updatebutton-".$x."' data-rel-id='".$rowDevices['id']."'  data-rel='".$x."'  style='display:none;'>Update</button><button  class=' btn btn-primary cancelDevice canceldevicebutton-".$x."'  data-rel='".$x."' style='display:none;'><i class='fa fa-times' aria-hidden='true'></i></button></td>";
          $devicesHtml.= "</tr>";     
          $x++;
  }
  echo $devicesHtml;




            }
         else {
            echo "0";
        }
        
}else{
    echo "1";
}
$conn->close();
?>
