<?php if(isset($_POST["limit"], $_POST["start"]))
{
?>
 <style>
    button.btn.box {
    margin-right: 4px;
    border-radius: 50px;
    position: relative;
}
/*button.btn.box:hover .tooltip{height: 35px; width: 35px;} */

.icon-list {
    display: flex;
    justify-content: center;
    flex-direction: row;
    position: relative;
    top: -30px;
    left: 73%;
    padding: 0px;
    width: 30px;
    height: 30px;
    background-color: #f3be4a;
    align-items: center;
    border-radius: 50px;
}
.icon-list i {
    padding: 0px 5px;
    cursor: pointer;
}
.icon-list i.fa-solid.fa-utensils {
/*    display: flex;
    flex-direction: row;*/
    left: 4px;
    top: 8px;
    position: absolute;
}
.icon-list i.fa-solid.fa-desktop {
    left: 36px;
    position: absolute;
}
.myBox.div {
    background-color: #f0f0f0;
    position: absolute;
    top: -118px;
    width: 203px;
    padding: 10px;
    text-align: left;
}
textarea#w3review {
    width: 100%;
    border:1px solid #dfdfdf;
}
.myBox.div input[type="submit"] {
    background-color: #000;
    color: #fff;
    box-shadow: none;
    border: none;
    font-size: 13px;
    padding: 3px 14px;
    float: right;
}
.myBox.div i.fas.fa-times.close-icon {
    width: 20px;
    height: 20px;
    background-color: #000;
    color: #fff;
    display: flex;
    justify-content: center;
    align-items: center;
    border-radius: 50px;
    position: absolute;
    top: -11px;
    right: 0px;
    cursor: pointer;
}
/* Tooltip box */
 button.btn.box::before {
  content: attr(data-tooltip); 
  position: absolute;
  width: 150px;
  background-color: #000;
  color: #fff;
  text-align: center;
  padding: 5px 5px 10px;
  line-height: 1.2;
  border-radius: 6px;
  z-index: 1;
  opacity: 0;
  transition: opacity .6s;
  bottom: 123%;
  left: 50px;
  margin-left: -60px;
  font-size: 0.85em;
  visibility: hidden;
}

/* Tooltip arrow */
 button.btn.box::after {
  content: "";
  position: absolute;
  bottom: 92%;
  left: 50%; 
  margin-left: -5px;
  border-width: 5px;
  border-style: solid;
  opacity: 0;
  transition: opacity .6s;
  border-color: #000 transparent transparent transparent;
  visibility: hidden;
}

 button.btn.box:hover::before,  button.btn.box:hover::after {
  opacity: 1;
  visibility: visible;
}

</style>

<?php 
include('db.php');
$where="";
$sortBy=" restaurants.id DESC ";
if(isset($_GET['searchby'])){
    if(!empty($_GET['searchby'])){
        $where=" AND ".$_GET['searchby']." LIKE '%".$_GET['searchvalue']."%'";
    }

}
if(isset($_GET['sortvalue'])){
    if(!empty($_GET['sortvalue'])){
        if($_GET['sortvalue']==1){
            $sortBy=" restaurants.status  DESC ";
        }else if($_GET['sortvalue']==2){
            $sortBy=" restaurants.status ASC";
        }else{
            $sortBy=" restaurants.id DESC "; 
           
        }
    }

}
      $empQuery = "select * from  restaurants   where 1 ".$where."  Order by ".$sortBy." LIMIT ".$_POST["start"].", ".$_POST["limit"];

    $empRecords = mysqli_query($conn, $empQuery);
$data = array();

while ($row = mysqli_fetch_assoc($empRecords)) { 

    $address=$row["restaurant_str"]." ".$row["restaurant_str_nr"]."<br>".$row["restaurant_plz"]." ".$row["restaurant_ort"];
    $url="http://api.khanapos.de/storage/app/public/device_images/";
  $file_headers = get_headers($url);
    ?>


<div class="col-lg-3 col-md-6">
        <div class="card">
            <div class="card-header card-active">
                <div class="card-top-caption">
                <?php if($row['status']==1){?>
                    <div class="on-icon"></div>
                    <?php }else{?>
                        <div class="off-icon"></div>
                        <?php } ?>
                    <div class="k-no" id="kon-<?=$row['id']?>" style="cursor: pointer;"><?=$row['restaurant_id']?></div>
                    <div class="star-icon"><i class="ti ti-star"></i></div>
                </div>
            </div>
            <div class="card-body">
                <div class="img-frame">
                <?php 
                    if($file_headers[0] == 'HTTP/1.1 404 Not Found') {
                    ?>
                    <img src="img/realTime/img1.jpg" alt="img" class="img-round">
            
                <?php }else{ ?>
                    <img src="img/realTime/img1.jpg" alt="img" class="img-round">
                    <?php }  ?>
                <div class="icon-list">
                <?php 
                            echo '<i class="fa-solid fa-desktop"></i> <br>'; ?>
                   
<!--                     <i class="fa-solid fa-desktop"></i><br>
                    <i class="fa-solid fa-utensils"></i> -->

                </div>
                </div> 
                <div class="card-bottom-caption">
                    <div class="left-icon"><span class="name-id" id="name-<?=$row['id']?>"><?=$row['restaurant_name']?></span></div>
                    <div class="right-icon">
                        <!-- <i class="fa-solid fa-desktop"></i> -->
<!--                         <i class="fa-solid fa-tablet"></i>
                        <i class="fa-solid fa-mobile"></i> -->
                       <i class="ti ti-map-pin"></i> <span id="address-<?=$row['id']?>"><?=$address?></span>
                    </div>
                </div>
            </div>
            <div class="card-footer">
            <button class="btn box clickevent tooltipupdate-<?=$row['id']?>" onClick="toggleDiv(<?=$row['id']?>)" <?php if(!empty($row['description'])){ ?> data-tooltip="<?=$row['description']?>" <?php } ?> data-rel="<?=$row['id']?>" type="button">2</button><br>
                <div class="myBox divshow<?=$row['id']?> div" style="display: none;">
                    <i class="fas fa-times close-icon" onClick="toggleDiv(<?=$row['id']?>)"></i>
                    <form action="javascript:void(0)">
                          
                          <textarea id="w3review" class="infotext-<?=$row['id']?>" name="w3review" rows="2" cols="50"><?=$row['description']?></textarea>
                          <br>
                          <input type="submit" value="Submit" class="btninfosave" data-rel="<?=$row['id']?>">
                        </form> 
                  <!-- <button class="btn btn-secondary" onClick="toggleDiv()">Close</button> -->
                </div>

                <p class="GFG_DOWN" style="color: green;"></p>
                               
                <button type="button" class="btn btn-light bg-white main-id clipboard"   data-ref="12345" id="any-<?=$row['id']?>"> 123456</button>
                <button class="btn btn-light btn-sm bg-white chat-icon " onclick="kundenEditPopup(<?php echo $row['id'];?>,<?php echo $row['restaurant_id']; ?>)" data-kundennr="<?=$row['restaurant_id']?>" data-rel="<?=$row['id']?>" type="button">
                
                <i class="ti ti-edit" ></i>
               
              
            </button>
            </div>
        </div>
    </div>

<script>
function toggleDiv(showid) {
  var myBox = $('.divshow'+showid);
  myBox.toggle();
  if (myBox.is(':visible')) {
    $('.GFG_DOWN');
  } else {
    $('.GFG_DOWN');
  }
}
</script>


<?php } }  ?>

