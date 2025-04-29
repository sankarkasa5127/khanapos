<?php
require_once("db.php");

if(isset($_FILES['uploadCsv']['name'])){


$fileMimes = array(
    'text/x-comma-separated-values',
    'text/comma-separated-values',
    'application/octet-stream',
    'application/vnd.ms-excel',
    'application/x-csv',
    'text/x-csv',
    'text/csv',
    'application/csv',
    'application/excel',
    'application/vnd.msexcel',
    'text/plain'
);

try {
    if (!empty($_FILES['uploadCsv']['name'])) {
        $file = fopen($_FILES['uploadCsv']['tmp_name'], "r");

        if ($_FILES["uploadCsv"]["size"] > 0) {
            $i=1;
                $categories=array();
                $categoriesXML='';
                $groupXML='';
                $itemXML='';
            while (($getData = fgetcsv($file, 10000, ",")) !== FALSE) {
                if($i!=0){
                    // $array1 = explode(';', $getData[0]);
                    // $array2 = explode(';', $getData[1]);
                    // $array3 = explode(';', $getData[2]);
                            if(!in_array($getData[6] ,$categories ) ){
                                    $categoriesXML.=categoriesXML($getData[6],$i);
                                   $groupXML.= groupXML($getData[6],$i);
                                    array_push($categories,$getData[6]);
                            }
                            // itemXML($barcode,$categories,$name,$id,$buyPrice,$liferantBuyPrice,$rate,$instock){
                                if($getData[4]==19){
                                        $rateid=1;
                                }elseif($getData[4]==7){
                                    $rateid=2;
                                }else{
                                    $rateid=3;
                                }
                           $itemXML.= itemXML($getData[0],$getData[6],$getData[1],$i,$getData[3],$getData[2],$getData[4],$getData[5],$rateid);
                      
                }
     $i++;
    //  echo "<pre>";
    //  print_r($getData);
            }
          
           echo "<elements>
            ".$categoriesXML.$groupXML.$itemXML."
            <taxes>
            <id>1</id>
            <name>IM HAUS</name>
            <rate>19.0</rate>
        </taxes>
        <taxes>
            <id>2</id>
            <name>LIEFERUNG</name>
            <rate>7.0</rate>
        </taxes>
        <taxes>
            <id>3</id>
            <name>ZERO</name>
            <rate>0.0</rate>
        </taxes>
    </elements>";
           // echo "File Imported Successfully..!!";
            fclose($file);die;
        } else {
            echo "Error: File size is 0.";
        }
    }
} catch(\Exception $ex) {
    echo $ex->getMessage(); die;
}

 $conn->close();
}
function itemXML($barcode,$categories,$name,$id,$buyPrice,$liferantBuyPrice,$rate,$instock,$rateid){
    return '
     <menuItems>
    <barcode>'.$barcode.'</barcode>
    <barcode1></barcode1>
    <barcode2></barcode2>
    <blue>0</blue>
    <buyPrice>'.$buyPrice.'</buyPrice>
    <changeprice>false</changeprice>
    <chkRabatt>false</chkRabatt>
    <description></description>
    <description2></description2>
    <discountRate>0.0</discountRate>
    <fblue>255</fblue>
    <fgreen>255</fgreen>
    <fred>255</fred>
    <green>0</green>
    <id>'.$id.'</id>
    <instock>'.$instock.'</instock>
    <itemId>10</itemId>
    <lieferantName></lieferantName>
    <liferantBuyPrice>'.$liferantBuyPrice.'</liferantBuyPrice>
    <modifiedTime>2022-12-28T14:23:39.280+01:00</modifiedTime>
    <name>'.$name.'</name>
    <note></note>
    <parent>
        <discount>0.0</discount>
        <id>'.$id.'</id>
        <name>'.$categories.'</name>
        <parent>
            <beverage>false</beverage>
            <bon>1</bon>
            <categoryid>6</categoryid>
            <id>46</id>
            <name>Sim Karten</name>
            <pfand>false</pfand>
            <priceCategory>1</priceCategory>
            <type>IM HAUS</type>
            <visible>true</visible>
        </parent>
        <visible>true</visible>
    </parent>
    <pfand>false</pfand>
    <price>'.$buyPrice.'</price>
    <priceCategory>1</priceCategory>
    <red>0</red>
    <showImageOnly>false</showImageOnly>
    <subitemid></subitemid>
    <tax>
        <id>'.$rateid.'</id>
        <name>IM HAUS</name>
        <rate>'.$rate.'</rate>
    </tax>
    <unitType></unitType>
    <visible>true</visible>
</menuItems>';
}
function categoriesXML($categoriesName,$id){
    return ' <menuCategories>
        <beverage>false</beverage>
        <bon>1</bon>
        <categoryid>'.$id.'</categoryid>
        <id>41</id>
        <name>'.$categoriesName.'</name>
        <pfand>false</pfand>
        <priceCategory>1</priceCategory>
        <type>IM HAUS</type>
        <visible>true</visible>
    </menuCategories>';
}
function groupXML($groupName,$id){
    return ' 
    <menuGroups>
    <discount>0.0</discount>
    <id>'.$id.'</id>
    <name>'.$groupName.'</name>
    <parent>
        <beverage>false</beverage>
        <bon>1</bon>
        <categoryid>'.$id.'</categoryid>
        <id>'.$id.'</id>
        <name>'.$groupName.'</name>
        <pfand>false</pfand>
        <priceCategory>1</priceCategory>
        <type>IM HAUS</type>
        <visible>true</visible>
    </parent>
    <visible>true</visible>
    </menuGroups>';
}
  ?>
  <form id="addForm" action="" method="POST" enctype="multipart/form-data">
                     
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="recipient-name" class="col-form-label">Upload CSV</label>
                           <input type="file" class="form-control"  value="" name="uploadCsv"  required/>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                    
                  </form>
