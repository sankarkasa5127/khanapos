<?php include('include/header.php');?>
<style>
.tooltip {
  position: relative;
  display: inline-block;
  border-bottom: 1px dotted black;
}

.tooltip .tooltiptext {
  visibility: hidden;
  width: 120px;
  background-color: black;
  color: #fff;
  text-align: center;
  border-radius: 6px;
  padding: 5px 0;
  position: absolute;
  z-index: 1;
  bottom: 100%;
  left: 50%;
  margin-left: -60px;
  
  /* Fade in tooltip - takes 1 second to go from 0% to 100% opac: */
  opacity: 0;
  transition: opacity 1s;
}

.tooltip:hover .tooltiptext {
  visibility: visible;
  opacity: 1;
}
</style>
<style>
.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame .panel{background-color: transparent; box-shadow: none; border:0;}
.top-frame .panel-default{width: 100%; border:0;}
.top-frame .panel-default > .panel-heading{border:0; background-color: transparent;}
.top-frame .panel-default .nav-tabs{border: 0; display: inline-block;margin-bottom: 15px;}
.top-frame .panel-default .nav-tabs li a{font-size: 18px; font-weight: 600; border-radius: 5px;border:0;background-color: #eee;}
.top-frame .panel-default .nav-tabs li.active a{background-color: #f3be4a; color:#000; border: 0;}
.top-frame .panel-default .nav-tabs li a:hover{border: 0;}
.top-frame .panel-default .card{padding:0px;border-radius: 10px;box-shadow: 0px 0px 10px 0px rgba(0, 0, 0, 0.2); margin-bottom: 20px; min-height: 300px;flex-wrap: wrap;display: flex;flex-direction: column;}
.top-frame .panel-default .card .card-header{border-bottom:0;}
.top-frame .panel-default .card .card-body{  display: flex;flex-direction: column;justify-content: space-between;position: relative;}
.card-top-caption {display: flex; justify-content: space-between; padding: 7px 0;}
.card-top-caption .on-icon{width:20px; height: 20px; border-radius: 50%; background-color: #00df1b; border:1px solid #fff;}
.card-top-caption .off-icon{width:20px; height: 20px; border-radius: 50%; background-color: #f80909; border:1px solid #fff;}
.card-top-caption .wechsel-icon{width:20px; height: 20px; border-radius: 50%; background-color: #f8ff1a; border:1px solid #fff;}
.card-top-caption .star-icon i{font-size: 24px; color: #000;}
.card-bottom-caption{ position: relative;padding: 10px 0 20px;}
.card-bottom-caption .left-icon i{color: #000; font-size: 20px;}
.card-bottom-caption .left-icon span{font-size: 18px; color: #000; font-weight: 500;}
.card-bottom-caption .right-icon i{color: #000; font-size: 22px; cursor: pointer;}
.img-frame{width: 100px; height: 100px; border-radius: 50%; margin: -15px auto 0;}
.img-frame .img-round{width: 100px; height: 100px; border-radius: 50%; border:3px solid #fff;}
.new-label{background-color: #f80909; color:#fff; position: relative; top:0px;padding: 0 10px;line-height: 24px;border-radius: 5px;}
.card-active{background-color: #038a1e;border-radius: 10px 10px 0 0!important;}
.card-deactive{background-color: #d90000;border-radius: 10px 10px 0 0!important;}
.card-wechsel{background-color: #f3be4a;border-radius: 10px 10px 0 0!important;}
.k-no{color: #fff; font-size: 18px; font-weight: 600;}
.top-frame .panel-default .card .card-footer{display: flex; justify-content: space-between; background-color: transparent; position: absolute; bottom: 0; width: 100%;}
.btn.main-id{width: 99%; font-size: 16px; font-weight: 600;}
.btn.chat-icon{margin-left: 5px; font-size: 16px; font-weight: 600;}
.top-frame .panel-default .card .card-header .card-top-caption .star-icon i{color: #fff;}

.filters-frame{margin-bottom:15px;}
.filters-frame .form-inline{display: flex; justify-content:flex-end;align-items: center;}
.filters-frame .form-inline label{margin-bottom: 0;}
.filters-frame .form-inline .form-group{margin-left: 20px;}
.filters-frame .form-inline .filter-icon i{font-size: 18px;}
.filters-frame .form-inline .form-group .label-text{margin:0 10px;}
.filters-frame .form-inline .form-group select{cursor: pointer; width: 200px;}
.filters-frame .form-inline .form-group select, .filters-frame .form-inline .form-group input{border:1px solid #f3be4a;height: 34px;}
button#resetbtn i {
    font-size: 14px;
}
button#resetbtn span {
    margin-left: 8px;
}
.short_by .form-group {
    display: flex;
    justify-content: center;
    align-items: baseline;
}
.short_by span.label-text {
    width: 102px;
    text-align: start;
}
.short_by select#searchingvalue {
    border: 1px solid #f3be4a;
    height: 34px;
}
.short_by {
    display: flex;
    justify-content: start;
    align-items: center;
}

@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.rt{left:0;}
.filters-frame .form-inline{flex-direction: column;}
.filters-frame .form-inline .form-group{display: flex;}
}
@media only screen and (min-width:768px) and (max-width:991px){
.main {padding-right:0px;padding-left: 40px;}   
.top-frame{top: 15px;left:45px;margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
}
.notify-success {
  border: none;
  background: none;
  color: red !important;
} 
</style>

   <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
   <div class="row" id="reloadHeader">
         <img id="reloadimg" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="width: 50px;height: 34px;display:none;margin-left: 400px;">
               
            <?php include('headers/loadKundenView.php');?>
         </div>
      <div class="row">
     
         <div class="top-frame rt">
            <div class="panel panel-default">
               <!-- <div class="panel-heading panel-heading-nav">
                  <ul class="nav nav-tabs">
                    <li role="presentation" class="active">
                      <a href="#one" aria-controls="one" role="tab" data-toggle="tab">Online</a>
                    </li>
                    <li role="presentation">
                      <a href="#two" aria-controls="two" role="tab" data-toggle="tab">Offline</a>
                    </li>
                  </ul>
               </div> -->
               <div class="panel-body">
                  <div class="tab-content">
                     <div role="tabpanel" class="tab-pane fade in active" id="one">
                        <div>
                           <div class="row">
                           <div class="col-lg-3">
                              
                              <div class="short_by">
                                             <div class="form-group">
                                                    <span class="label-text"><label>Sort By</label></span>
                                                    <select data-filter="make" id="sortvalue" class="filter-make filter form-control">
                                                         <option value="">All</option>
                                                         <option value="1">Online</option>
                                                         <option value="2">Offline</option>
                                                         <option value="3">Latest Kassen</option>
                                                    </select>
                                                </div>
                              </div>
                           </div>
                        <div class="col-lg-9 filters-frame" id="filter">    
    <form class="form-inline">  
            <div class="filter-icon">
               <button type="button"  id="resetbtn" class="btn btn-primary" data-toggle="tooltip" data-placement="top" title="Tooltip on top"><i class="fa-solid fa-arrows-rotate"></i><span>All</span></button>
               <!-- <i class="ti ti-filter-filled"></i> -->
            </div>
            <div class="form-group">
                <!-- <span class="label-text"><label>Search</label></span> -->
                <select data-filter="make" id="searchingvalue" class="filter-make filter form-control">
            <option value="">Select Filter</option>
            <option value="restaurant_id">Search by kunden Number</option>
            <option value="restaurant_name">Search by kunden Name</option>
            <!-- <option value=".anydesk">Any desk id</option> -->
            <option value="restaurant_str">Street Name </option>
            <option value="restaurant_str_nr">By street Number </option>
            <option value="restaurant_plz">By Postcode </option>
            <option value="restaurant_ort">By City Name</option>
                </select>
            </div>
            
            <div class="form-group">
                <!-- <span class="label-text"><label>Search</label></span> -->
                <input class="form-control" type="text" placeholder="Search" id="searchvalue" />
                <button type="button"  id="searchbtn" class="btn btn-primary"><i class="ti ti-search"></i></button>
                <!-- <button type="button"  id="resetbtn" class="btn btn-primary">Reset</button> -->
            </div>
        </form>
</div>
</div>
                        </div>
                        <div class="row" id="loadactive">
                          
                        </div>
                        <div id="load_data_message"></div>
                     </div>
                   
                  </div>
               </div>
            </div>
         </div>
      </div>

      <div class="modal fade" id="editmodel1" tabindex="-1" role="dialog" aria-labelledby="editModal1Label" aria-hidden="true">
   <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
         <div class="modal-header">
            <h5 class="modal-title" id="editModal1Label">Edit your record</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
         </div>
         <div class="modal-body ui-front">
            <ul class="nav nav-tabs">
               <li class="active">
                  <a data-toggle="tab" href="#home1">Info</a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu2"> Documents </a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu5"> Contacts </a>
               </li>
               <li>
                  <a data-toggle="tab" href="#menu4"> Persons </a>
               </li>
               <li >
                  <a data-toggle="tab" href="#users">Users</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#devicesTab">Devices</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#anydesktab">Anydesk</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#tsetab">TSE</a>
               </li>
               <li >
                  <a data-toggle="tab" href="#uploadsTab">Uploads</a>
               </li>
            </ul>
            <div class="tab-content">
               <div id="menu4" class="tab-pane fade">
                  <?php include("modals/rechnungen/persons.php");?>
               </div>
               <div id="menu5" class="tab-pane fade">
                  <?php include("modals/kunden/contacts.php");?>
               </div>
               <div id="menu2" class="tab-pane fade">
                  <?php include("modals/kunden/documents.php");?>
               </div>
               <div id="anydesktab" class="tab-pane fade">
                  <?php include("modals/kunden/anydesks.php");?>
               </div>
               <div id="tsetab" class="tab-pane fade">
                  <?php include("modals/kunden/tse.php");?>
               </div>
               <div id="uploadsTab" class="tab-pane fade">
                  <?php include("modals/kunden/uploads.php");?>
               </div>
               <div id="home1" class="tab-pane fade in active">
                  <form id="editForm1" action="updateCustomer.php" method="POST">
                  <input type="hidden"  class="bankrealid" value=""/>
                     <input type="hidden" name="rowid" class="roweditid" value=""/>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="address">Google Map address</label>
                           <textarea id="searchInput" name="address" class="form-control" id="address" autocomplete="off"></textarea>
                           <div id="map"></div>
                           <input type="hidden" id="latitude" name="latitude" value="" />
                           <input type="hidden" id="longitude" name="longitude" value="" />
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4 ">
                           <label for="recipient-name" class="col-form-label">Restaurant id:</label>
                           <input type="text" class="form-control rowedit1" id="restaurant_id" name="restaurant_id">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Restaurant Name:</label>
                           <input type="text" class="form-control rowedit2" id="restaurant_name" name="restaurant_name">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant inhaber:</label>
                           <input type="text" class="form-control " id="restaurant_inhaber" name="restaurant_inhaber">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant str & nr:</label>
                           <input type="text" class="form-control " id="restaurant_str" name="restaurant_str">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant str nr:</label>
                           <input type="text" class="form-control " id="restaurant_str_nr" name="restaurant_str_nr">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant_plz:</label>
                           <input type="text" class="form-control rowedit5" id="restaurant_plz" name="restaurant_plz">
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">restaurant_ort:</label>
                           <input type="text" class="form-control rowedit6" id="restaurant_ort" name="restaurant_ort">
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Type:</label>
                           <!-- <input type="text" class="form-control " id="type" name="resttype"> -->
                           <select class="form-select"  id="type" name="resttype"   >
                              <option value="">Business Type....</option>
                              <option value="restaurant">Restaurant</option>
                              <option value="einzel">Einzel (Retail)</option>
                              <option value="pc">PC</option>
                           </select>
                        </div>
                        <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">Status :</label>
                           <select class="form-select" id="status" name="status" required >
                              <option value="">Status....</option>
                              <option value="1">Active</option>
                              <option value="0">Deactive</option>
                              <option value="2">Wechsel</option>
                              <option value="3">Delete</option>
                           </select>
                        </div>
                     </div>
                     <div class="form-row">
                        <div class="form-group col-md-12">
                           <label for="address">Notiz:</label>
                           <textarea id="Notiz" name="Notiz" class="form-control" id="Notiz" autocomplete="off"></textarea>
                        </div>
                     </div>
                     <button type="submit" class="btn btn-primary">Save</button><button type="button" class="btn btn-primary resetKunden ">Reset</button>
                  </form>
               </div>
               <div id="users" class="tab-pane fade in">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center">
                              #
                           </th>
                           <th class="text-center">
                              Name
                           </th>
                           <th class="text-center">
                              User Name
                           </th>
                           <th class="text-center">
                              Password 
                           </th>
                           <th class="text-center">
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody id="appendusers">
                     <tbody>
                  </table>
                  <table class="table table-bordered table-hover" id="tab_logic">
                     <tbody>
                        <form method="post" action="javascript:void(0);" id="addkasseUsers">
                           <input type="hidden" name="kunden_nr" id="knumber" value=""/>
                           <tr id='addr0'>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='name' value="" placeholder='Name' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='username' value="" placeholder='UserName' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='password' value="" placeholder='Password' class="form-control"/>
                                 </div>
                              </td>
                              <td>
                                 <button  class=" btn btn-primary" type="submit">Add New</button>
                                 <img id="addPaymentloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </td>
                           </tr>
                        </form>
                     </tbody>
                  </table>
               </div>
               <div id="devicesTab" class="tab-pane fade in">
                  <table class="table table-bordered table-hover">
                     <thead>
                        <tr>
                           <th class="text-center">
                              #
                           </th>
                           <th class="text-center">
                              Client Id
                           </th>
                           <th class="text-center">
                              Device Type
                           </th>
                           <!-- <th class="text-center">
                              Bussiness Type
                              </th> -->
                           <th class="text-center">
                              Action
                           </th>
                        </tr>
                     </thead>
                     <tbody id="appendDevices">
                     <tbody>
                  </table>
                  <table class="table table-bordered table-hover" id="devicsTable">
                     <tbody>
                        <form method="post" action="javascript:void(0);" id="devicekundeform">
                           <!-- <input type="hidden" name="kunden_nr" class="knumberNr" value=""/> -->
                           <tr id='addr0'>
                              <td>
                                 <div class="input-group">	
                                    <input type="text" name='client_id' value="" placeholder='Client Id' class="form-control" required />
                                 </div>
                              </td>
                              <td>
                                 <div class="input-group">
                                    <select class="form-select" id="typeDevice" name="deviceType" required >
                                       <option value="">Device Type....</option>
                                       <option value="kasse">Kasse</option>
                                       <option value="server">Server</option>
                                       <option value="client">Client</option>
                                       <option value="tablet">Tablet</option>
                                       <option value="mobile">Mobile</option>
                                    </select>
                                 </div>
                              </td>
                              <!-- <td>
                                 <div class="input-group">	
                                 
                                                <select class="form-select" id="typeDevice" name="bussinessType"  >
                                                  <option value="">Business Type....</option>
                                                  <option value="restaurant">Restaurant</option>
                                                  <option value="einzel">Einzel (Retail)</option>
                                                  <option value="pc">PC</option>
                                                
                                                                          </select>
                                 </div>
                                 </td> -->
                              <td>
                                 <button  class=" btn btn-primary" type="submit">Save</button>
                                 <img id="addPaymentloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
                                    width: 50px;
                                    height: 34px;
                                    display:none;
                                    ">
                              </td>
                           </tr>
                        </form>
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>


               <!-- Modal -->
         <div class="modal fade" id="kassenassign" role="dialog">
            <div class="modal-dialog">
            
               <!-- Modal content-->
               <div class="modal-content">
               <div class="modal-header">
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
                  <h4 class="modal-title">Update Kassen</h4>
               </div>
               <div class="modal-body">
               <input type="hidden" id="kassenid" name="id" value="" />
                  <!-- <form id="assignkassenForm" action="javascript:;" > 
                    
                     <div class="form-group col-md-12">
                     <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
                                          <input type="text" class="form-control rowedit2 input-datalist"  list="list-timezone12"  id="kunden_nr" name="kundenNr">
                                          <datalist id="list-timezone12">
                                               
                                                <?php
                                               $kundenQuery = "select restaurant_id,restaurant_name from restaurants";
                                               $kundenRecord = mysqli_query($conn, $kundenQuery);
                                               $data = array();
                                               $kudenOption='';
                                               while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                               echo "<option>".$kundenRow['restaurant_id']."</option>";
                                               $kudenOption.=  "<option>".$kundenRow['restaurant_id']."</option>";
                                               }
                                               ?>
                                        </datalist>
                                             </div>
                                        <button type="submit"  style="    margin-left: 0px;" class="btn btn-primary">Save</button>
                                       <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
    width: 50px;
    height: 34px;
    display:none;
">
                                       </form> -->
                                       <form id="editForm" action="updatekassenProtokoll.php" method="POST">
                     <div class="form-row">
                     <input type="hidden" name="id" class="roweditid" value="" />
                     <div class="form-group col-md-12">
                              <label for="recipient-name-nuksaan" class="col-form-label">Client Id :</label>
                              <input type="text" class="form-control " id="client_id" name="client_id" value="" required />
                           </div>
                     <div class="form-group col-md-6">
                     <label for="recipient-weee" class="col-form-label">Kunden Nr:</label>
                                          <input type="text" class="form-control  rowedit2 input-datalist"  list="list-timezone12"  id="kunden_nr" name="kundenNr">
                                          <datalist id="list-timezone12">
                                               
                                               <?php
                                               $kundenQuery = "select restaurant_id,restaurant_name from restaurants";
                                               $kundenRecord = mysqli_query($conn, $kundenQuery);
                                               $data = array();
                                               $kudenOption='';
                                               while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                               echo "<option>".$kundenRow['restaurant_id']."</option>";
                                               $kudenOption.=  "<option>".$kundenRow['restaurant_id']."</option>";
                                               }
                                               ?>
                                        </datalist>
                           </div>
                     <div class="form-group col-md-6">
                              <label for="recipient-name-nuksaan" class="col-form-label">Kunden :</label>
                              <input type="text" class="form-control " id="kunden" name="kunden" value=""  />
                           </div>
                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Anydesk :</label>
                              <input type="text" class="form-control " id="anydesk" name="anydesk" value="" required />
                           </div>
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Terminal :</label>
                              <input type="text" class="form-control " id="terminal" name="terminal" value="">
                           </div>
                           <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Datum:</label>
                                          <input type="date" name='datum' id="datum" data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                       </div>
                          
                           
                        </div>
                        <div class="form-row">
                      
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Version :</label>
                              <input type="text" class="form-control " id="version" name="version" value="">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Tse:</label>
                              <select class="form-select" name="tse" id="tse" required >
                              <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Tier3 :</label>
                              <select class="form-select" name="tier3" id="tier3" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                                                        </select>
                           </div>
                        </div>
                        <div class="form-row"  style="display:none;">
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Street :</label>
                              <input type="text" class="form-control " id="street" name="street" value=""  />
                            </div>
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Zipcode :</label>
                              <input type="text" class="form-control " id="zipcode" name="zipcode" value="">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Stadt:</label>
                              <input type="text" class="form-control " id="stadt" name="stadt" value="">
                            </div>
                            </div>
                        
                      
                      
                        
                        <button type="submit" class="btn btn-primary" id="updated">Save </button>
                        <img id="editformloader" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
    width: 50px;
    height: 34px;
    display:none;
">
                     </form>

               </div>
              
               </div>
               
            </div>
         </div>
   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js"></script>
   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js"></script>
   <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
   <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/notify/0.4.2/notify.min.js"></script>

   <script type="text/javascript">
var limit = 12; //The number of records to display per request
 var start = 0; //The starting pointer of the data
 var action = 'inactive'; //Check if current action is going on or not. If not then inactive otherwise active
 if(action == 'inactive')
 {
  action = 'active';
  load_country_data(limit, start);
 }
 function load_country_data(limit, start)
 {
   var searchby= $("#searchingvalue").val();
        var searchvalue=$("#searchvalue").val();
        var sortvalue=$("#sortvalue").val();
   $.ajax({
   url: 'ajexKunden-view.php?sortvalue='+sortvalue+'&searchby='+searchby+'&searchvalue='+searchvalue,
   method:"POST",
   data:{limit:limit, start:start},
   cache:false,
   success:function(data)
   {
    $('#loadactive').append(data);  
    if(data == '')
    {
     $('#load_data_message').html("<button type='button' class='btn btn-info'>No Data Found</button>");
     action = 'active';
    }
    else
    {
     $('#load_data_message').html("<button type='button' class='btn btn-warning'>Please Wait....</button>");
     action = 'inactive';
    }
    
   }
  });
 }
 $(window).scroll(function(){
  if($(window).scrollTop() + $(window).height() > $("#loadactive").height() && action == 'inactive')
  {
   action = 'active';
   start = start + limit;
   setTimeout(function(){
    load_country_data(limit, start);
   }, 1000);
  }
 });
 function kundenEditPopup(id,kundennr){
               $('#kunden_nr').val(kundennr);
             //  $('.bankrealid').val(id);
               var kundenid=kundennr;   
               $("#knumber").val(kundenid);
               $('#appendusers').html('');
               $.ajax({
               url: 'loadkundenBykundenNr.php',
               type: "POST",
               dataType: "json",
               data: {'id': kundenid},
               success: function(responsedata) {
               $.ajax({
               url: 'loadKundenData.php',
               type: "POST",
               dataType: "json",
               data: {'id': kundenid,'realid':responsedata.kundenData.id},
               success: function(response) {
            $('.roweditid').val(responsedata.kundenData.id);
            $('#restaurant_id').val(responsedata.kundenData.restaurant_id);
            $('#restaurant_name').val(responsedata.kundenData.restaurant_name);
            $('#restaurant_plz').val(responsedata.kundenData.restaurant_plz);
            $('#restaurant_ort').val(responsedata.kundenData.restaurant_ort);
            $('#Notiz').val(responsedata.kundenData.Notiz);
            
            $('#restaurant_str').val(responsedata.kundenData.restaurant_str);
            $('#restaurant_str_nr').val(responsedata.kundenData.restaurant_str_nr);
                $('#filesappend').html(response.fileloading);
                $('#contactApeend').html(response.contactHtml);
                $('#personsAppends').html(response.personHtml);
                $('#anydeskApeend').html(response.anydeskHtml);
                $('#tseApeend').html(response.tseHtml);
                 $('#uploadsApeend').html(response.uploadsHtml);
                
                $('#restaurant_inhaber').val(response.kundenrow.restaurant_inhaber);
               // $('#type').val(response.kundenrow.resttype);
                 $("#status option").filter(function() {
                 
                 return $(this).val() === response.kundenrow.status;
              }).prop("selected", true);
              $("#type option").filter(function() {
                 
                 return $(this).val() === response.kundenrow.resttype;
              }).prop("selected", true);
                if(response.kundenUsers != ''){
                
                  $('#appendusers').html(response.kundenUsers);
                }
                if(response.devices != ''){
                
                $('#appendDevices').html(response.devices);
              }
            }
               });
              }
               });




               $('#editmodel1').modal('show');
            }



      $(function () {
  $('[data-toggle="tooltip"]').tooltip()
})
         $('#editForm').validate({
           rules: {
             status: {
               required: true,
             },
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("editForm"));
             $('#editformloader').show();
             $.ajax({
               url: 'updatekassenProtokoll.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
                 var kassenid= $('.roweditid').val();
                 $.ajax({
                        url: 'viewKassenJoin.php',
                        type: "POST",
                        dataType: "json",
                        data: {'rowId': kassenid},
                        success: function(response) {
                             $('#kon-'+kassenid).html(response.kassen.kundenNr);
                           $("#name-"+kassenid).html(response.kassen.restaurant_name);
                           $("#any-"+kassenid).html(response.kassen.anydesk);
                           $("#address-"+kassenid).html(response.kassen.restaurant_str+" "+ response.kassen.restaurant_str_nr+" "+response.kassen.restaurant_plz+" "+ response.kassen.restaurant_ort);
                        }
                     });
               //  $('#editmodel').modal('hide');
               //   $('#table-1').DataTable().ajax.reload();
               }
             });
           }
         });
         
      </script>
<script>

   $(document).ready(function(){
      // loadDevices();
      $('#sortvalue').on('change', function (e) {
         //loadDevices();
         var limit = 12; //The number of records to display per request
 var start = 0; //The starting pointer of the data
         $('#loadactive').html(""); 
         load_country_data(12, 0);

});
$('body').on('click', '.k-no', function() {
         var kundenr=$(this).text();
         $("#searchingvalue").val("kassen_protokoll.kundenNr");
         $("#searchvalue").val(kundenr);
        // loadDevices();
        var limit = 12; //The number of records to display per request
 var start = 0; //The starting pointer of the data
        $('#loadactive').html(""); 
        load_country_data(12, 0);

      });
      $('body').on('click', '.btninfosave', function() {
         var realids=$(this).attr('data-rel');
         var note=$('.infotext-'+realids).val();
         $.ajax({
               url: 'saveNote.php',
               type: "POST",
               data: {'id': realids,'note':note},
               success: function(response) {
                  $('.tooltipupdate-'+realids).attr( 'data-tooltip',note);
                 alert(response);
               }
             });
      });
            $('body').on('click', '.clipboard', function() {
        value = $(this).data('ref');
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
          
          // Use notify.js to display a notification
          $(this).notify("Anydesk copied!", "success");
          
    });
      $("#searchbtn").click(function(){
        // loadDevices();
        var limit = 12; //The number of records to display per request
 var start = 0; //The starting pointer of the data
        $('#loadactive').html(""); 
         load_country_data(12, 0);

      });
      $("#resetbtn").click(function(){
         $("#searchingvalue").val("");
         $("#searchvalue").val("");
         $("#sortvalue").val("");
         //loadDevices();
         $('#loadactive').html(""); 
         var limit = 12; //The number of records to display per request
 var start = 0; //The starting pointer of the data
         load_country_data(12, 0);

      });
   });
    function loadDevices() {
        var searchby= $("#searchingvalue").val();
        var searchvalue=$("#searchvalue").val();
        var sortvalue=$("#sortvalue").val();
         $.ajax({
               url: 'ajexKunden-view.php?sortvalue='+sortvalue+'&searchby='+searchby+'&searchvalue='+searchvalue,
               type: "GET",
               success: function(response) {
                 $('#loadactive').html(response);
               }
             });
         }
   </script>
        <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    Pusher.logToConsole = true;

    var pusher = new Pusher('4b13f77f8e34738ec5a2', {
      cluster: 'ap2'
    });

    var channel = pusher.subscribe('foodbeePOS');
    channel.bind('POSSTATUS', function(data){
      loadDevices();
    });
  </script>


<script>
      function delfiles(rowid) {
          $('#delrowf-'+rowid).remove();
         $.ajax({
               url: 'helper/kunden/deleteinvoiceFiles.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         } 
         
         function delAnydesk(rowid) {
          $('#delrowanydesk-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteAnydesk.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delTse(rowid) {
          $('#delrowtse-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteTSE.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delcontact(rowid) {
          $('#delrowcontact-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deleteContact.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
         function delperson(rowid) {
          $('#delrowperson-'+rowid).remove();

         $.ajax({
               url: 'helper/kunden/deletePerson.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
               }
             });
         }
    $(document).ready(function(){
     
      $('#personsform').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#personsform').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#personsform').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
            $("#addpersonloader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addperson.php',
                  data: $('#personsform').serialize(),
                  success: function (response) {
                     $("#addpersonloader").hide();
                     $('#personsform')[0].reset();
                     $('#personsAppends').html(response);
                     alert("Person added successfully....");
                  }
            });

         });
      $('#contactform').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#contactform').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#contactform').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#addContactLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addContact.php',
                  data: $('#contactform').serialize(),
                  success: function (response) {
                     $("#addContactLoader").hide();
                     $('#contactform')[0].reset();
                     $('#contactApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#anydeskForm').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#anydeskForm').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#anydeskForm').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#anydeskLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addAnydesk.php',
                  data: $('#anydeskForm').serialize(),
                  success: function (response) {
                     $("#anydeskLoader").hide();
                     $('#anydeskForm')[0].reset();
                     $('#anydeskApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         $('#tseForm').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#tseForm').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#tseForm').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#addlseLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addTSE.php',
                  data: $('#tseForm').serialize(),
                  success: function (response) {
                     $("#addlseLoader").hide();
                     $('#tseForm')[0].reset();
                     $('#tseApeend').html(response);
                     alert("Record added successfully....");
                  }
            });

         });
         
      $('#uploadfiles').validate({
           rules: {
            filepdf: "required",
            description: "required",
           },
           submitHandler: function(form) {
            
            var realInvoiceid=$(".roweditid").val();
          var kundenNumber=  $("#restaurant_id").val();
            $('#uploadfiles').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#uploadfiles').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
             var form_data = new FormData(document.getElementById("uploadfiles"));
           
             if( document.getElementById("fileupload").files.length != 0 &&  document.getElementById("fileupload").value !=''){
              $("#addfilesloader").show();
             $.ajax({
               url: 'helper/kunden/uploadFilesPDF.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addfilesloader").hide();
                 if(response!='error'){
                  $('#uploadfiles')[0].reset();
                  $('#filesappend').html(response);
                 }
                 
               }
             });
            }else{
              alert("Please fill in all the  fields");

            }
           }
         });
      $('#addkasseUsers').validate({
           rules: {
             username: {
               required: true,
             },
             amount: {
               required: true,
             },
             method: {
               required: true,
             }
           }, 
           submitHandler: function(form) {
            $("#addPaymentloader").show();
            
             var form_data = new FormData(document.getElementById("addkasseUsers"));
             $.ajax({
               url: 'addKasseUser.php',
               cache: false,
               contentType: false,
               processData: false,
               dataType: "json",
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addPaymentloader").hide();
                $('#addkasseUsers')[0].reset();
                  alert(response.message);
                  $('#appendusers').html(response.htmlData);
                 
                 
               }
             });
           }
         });

});
$(document).on('click','body .editDevices',function(){
  $(this).hide();
  var relx=$(this).attr('data-rel');
  $('.sp-deviceType-'+relx).hide();
  // $('.sp-bussinessType-'+relx).hide();
  $('.typeDeviceSel-'+relx).show();
  $('.bussinessSelectType-'+relx).show();
  $('.updatebutton-'+relx).show();
  $('.canceldevicebutton-'+relx).show();

});
$(document).on('click','body .cancelDevice',function(){
  $(this).hide();
  var relx=$(this).attr('data-rel');
  $('.sp-deviceType-'+relx).show();
  // $('.sp-bussinessType-'+relx).show();
  $('.typeDeviceSel-'+relx).hide();
  $('.editbutton-'+relx).show();
  $('.bussinessSelectType-'+relx).hide();
  $('.updatebutton-'+relx).hide();
  $('.canceldevicebutton-'+relx).hide();

});
$(document).on('click','body .updateDevice',function(){

  var relx=$(this).attr('data-rel');
  var realid=$(this).attr('data-rel-id');
  var devicetype=$('.bussinessSelectType-'+relx).val();
  $.ajax({
               url: 'updateDevice.php',
               type: "POST",
               data: {'id': realid,'deviceType':devicetype},
               success: function(response) {
alert(response);
               }
              });

});

    </script>
<script src="https://maps.googleapis.com/maps/api/js?libraries=places&key=AIzaSyDCgRYolCmDrbZl76MWBD1BzgBMBLhfFGg&callback=initMap" async defer></script>
<script>
function initMap() {
    var map = new google.maps.Map(document.getElementById('map'), {
      center: {lat: -33.8688, lng: 151.2195},
      zoom: 13
    });
    var input = document.getElementById('searchInput');
    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

    var autocomplete = new google.maps.places.Autocomplete(input);
    autocomplete.bindTo('bounds', map);

    var infowindow = new google.maps.InfoWindow();
    var marker = new google.maps.Marker({
        map: map,
        anchorPoint: new google.maps.Point(0, -29)
    });

    autocomplete.addListener('place_changed', function() {
        infowindow.close();
        marker.setVisible(false);
        var place = autocomplete.getPlace();
        if (!place.geometry) {
            window.alert("Autocomplete's returned place contains no geometry");
            return;
        }
  
        // If the place has a geometry, then present it on a map.
        if (place.geometry.viewport) {
            map.fitBounds(place.geometry.viewport);
        } else {
            map.setCenter(place.geometry.location);
            map.setZoom(17);
        }
        marker.setIcon(({
            url: place.icon,
            size: new google.maps.Size(71, 71),
            origin: new google.maps.Point(0, 0),
            anchor: new google.maps.Point(17, 34),
            scaledSize: new google.maps.Size(35, 35)
        }));
        marker.setPosition(place.geometry.location);
        marker.setVisible(true);
    
        var address = '';
        if (place.address_components) {
            address = [
              (place.address_components[0] && place.address_components[0].short_name || ''),
              (place.address_components[1] && place.address_components[1].short_name || ''),
              (place.address_components[2] && place.address_components[2].short_name || '')
            ].join(' ');
        }
    
        infowindow.setContent('<div><strong>' + place.name + '</strong><br>' + address);
        infowindow.open(map, marker);
      
        // Location details
		var zipcode='';
        
		console.log(place);
        //document.getElementById('location').innerHTML = place.formatted_address;
        //document.getElementById('lat').innerHTML = place.geometry.location.lat();
        //document.getElementById('lon').innerHTML = place.geometry.location.lng();
			$('#chooselocation').modal('hide');
		$(".topbar__title").text(place.formatted_address);
			var Geopincode = localStorage.getItem('Geopincode');
	if(Geopincode == null) {
		localStorage.setItem('Geopincode', JSON.stringify(65936));
	} else {
			if(zipcode!=null){
			localStorage.removeItem('Geopincode');
			localStorage.setItem('Geopincode',zipcode);	
			}
	}
		
		$('#latitude').val(place.geometry.location.lat());
		$('#longitude').val(place.geometry.location.lng());
    });
}
</script>

      <script>
      function delusers(rowid) {
          $('#delrow-'+rowid).remove();

         $.ajax({
               url: 'deleteKasseUsers.php',
               type: "POST",
               data: {'id': rowid},
               success: function(response) {
               
                 alert(response);
                
               }
             });
         }
       
       $('#editForm1').validate({
      rules: {
        restaurant_id: {
                  required: true,
              },
        restaurant_name: {
              required: true,
          },          
          restaurant_inhaber: {
              required: true,
          },
          restaurant_str: {
              required: true,
          },
          restaurant_str_nr: {
              required: true,
          },
          restaurant_plz: {
              required: true,
          },
          
          restaurant_ort: {
              required: true,
          },
      
      },
  submitHandler: function(form) {
    
    $.ajax({
      url: form.action,
      type: form.method,
      data: $(form).serialize(),
      success: function(response) {
        alert(response);
        $('#empTable').DataTable().ajax.reload(null, false);
      }            
    });
  }
  });
  $('#devicekundeform').on('submit', function (e) {
            e.preventDefault();
            var kundenrowid=$("#knumber").val();
            $('#devicekundeform').append('<input type="hidden" name="kundenNr" value="'+kundenrowid+'" />');
          //  $(".loader").show();
            $.ajax({
                  type: 'post',
                  url: 'addDevices.php',
                  data: $('#devicekundeform').serialize(),
                  success: function (response) {
                    if(response !=0){
                      if(response !=1){
                        $('#appendDevices').html(response);
                      }else{
                         alert("client id is already exists");
                      }
                    }else{
                      alert("error...");
                    }
                    // console.log(response);
                    // alert(response);
                   //  $(".loader").hide();
                    //  $('#contactformkunden')[0].reset();
                    //  $('#contactkApeend').html(response);
                    //  alert("Record added successfully....");
                  }
            });

         });

     </script>

 <script>
    $(document).ready(function() {
         $('body').on('mouseover', '.hoverevent', function() {
           
           var id= $(this).attr('data-rel');
         //   alert(".tooltiptext"+id);
           
           $(".tooltiptext"+id).show();
         //  alert(text);
            //$(".hoverevent"+id).attr('title-new',text);
    //stuff to do on mouseover
});
      $('body').on('click', '.openassing', function() {
      // $('.openassing').click(function() {
       
        var kassenid=$(this).attr('data-rel');
      //   var kundennr=$(this).attr('data-kundennr');
      //    $('#kassenid').val(kassenid);
      //    $('#kunden_nr').val(kundennr);
      //    $('#kassenassign').modal('show');
      $.ajax({
               url: 'viewKassenJoin.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': kassenid},
               success: function(response) {
                  $(".roweditid").val(response.kassen.id);
               $("#kunden").val(response.kassen.restaurant_name);
               $("#anydesk").val(response.kassen.anydesk);
               $("#terminal").val(response.kassen.terminal);
               $("#client_id").val(response.kassen.client_id);
               $("#street").val(response.kassen.restaurant_str+" "+ response.kassen.restaurant_str_nr);
                        $('#kunden_nr').val(response.kassen.kundenNr);
               $("#version").val(response.kassen.version);
               $("#zipcode").val(response.kassen.restaurant_plz);
               $("#stadt").val(response.kassen.restaurant_ort);
               $("#datum").val(response.kassen.datum);
                     $("#datum").attr('data-date',response.kassen.datum);
               $("#tse option").filter(function() {
                  return $(this).val() === response.kassen.tse;
               }).prop("selected", true);
               $("#tier3 option").filter(function() {
                 
                 return $(this).val() === response.kassen.tier3;
              }).prop("selected", true);
              $('#kassenassign').modal('show');

                
                 
               }
             });
      });
      $('#assignkassenForm').on('submit', function (e) {
         $(".editformloader").show();
            $.ajax({
                  type: 'post',
                  url: 'updatekassenProtokoll.php',
                  data: $('#assignkassenForm').serialize(),
                  success: function (response) {
                    var kassenid= $('#kassenid').val();
                     $.ajax({
                        url: 'viewKassenJoin.php',
                        type: "POST",
                        dataType: "json",
                        data: {'rowId': kassenid},
                        success: function(response) {
                           $("#name-"+kassenid).val(response.kassen.restaurant_name);
                           $("#any-"+kassenid).val(response.kassen.anydesk);
                           $("#address-"+kassenid).val(response.kassen.restaurant_str+" "+ response.kassen.restaurant_str_nr+" "+response.kassen.restaurant_plz+" "+ response.kassen.restaurant_ort);
                        }
                     });
                     // $('#kon-'+$('#kassenid').val()).html($('#kunden_nr').val());
                     $(".editformloader").hide();
                     alert("Assign successfully....");
                  }
            });


      });
   });
            document.addEventListener('DOMContentLoaded', e => {
            $('.input-datalist').autocomplete()
            }, false);
      </script>
   </body>
</html>