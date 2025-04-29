<?php include('include/header.php');?>

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
                        <div class="col-lg-12 filters-frame" id="filter">    
    <form class="form-inline">  
            <div class="filter-icon"><i class="ti ti-filter-filled"></i></div>
            <div class="form-group">
                <span class="label-text"><label>Search</label></span>
                <select data-filter="make" id="searchingvalue" class="filter-make filter form-control">
            <option value="">All</option>
            <option value="kassen_protokoll.kundenNr">Search by kunden Number</option>
            <option value="restaurants.restaurant_name">Search by kunden Name</option>
            <option value="kassen_protokoll.anydesk">Any desk id</option>
            <option value="restaurants.restaurant_str">Street Name </option>
            <option value="restaurants.restaurant_str_nr">By street Number </option>
            <option value="restaurants.restaurant_plz">By Postcode </option>
            <option value="restaurants.restaurant_ort">By City Name</option>
                </select>
            </div>
            
            <div class="form-group">
                <!-- <span class="label-text"><label>Search</label></span> -->
                <input class="form-control" type="text" placeholder="Search" id="searchvalue" />
                <button type="button"  id="searchbtn" class="btn btn-primary"><i class="ti ti-search"></i></button>
                <button type="button"  id="resetbtn" class="btn btn-primary">Reset</button>
            </div>
        </form>
</div>
                        </div>
                        <div class="row" id="loadactive">
                          
                        </div>
                     </div>
                     <div role="tabpanel" class="tab-pane fade" id="two">
                        <div class="row">
                           <div class="col-lg-3 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="card-top-caption">
                                       <div class="off-icon"></div>
                                       <div class="star-icon"><i class="ti ti-star"></i></div>
                                    </div>
                                    <div class="img-frame">
                                       <img src="img/realTime/img2.jpg" alt="img" class="img-round">
                                    </div>
                                    <div class="card-bottom-caption">
                                       <div class="left-icon"><i class="ti ti-device-desktop"></i> <span class="main-id">523 756 289</span></div>
                                       <div class="right-icon">
                                          <i class="ti ti-map-pin"></i> <span>Abc, Street 2303, CA - 100223</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="card-top-caption">
                                       <div class="off-icon"></div>
                                       <div class="star-icon"><i class="ti ti-star"></i></div>
                                    </div>
                                    <div class="img-frame">
                                       <img src="img/realTime/img1.jpg" alt="img" class="img-round">
                                    </div>
                                    <div class="card-bottom-caption">
                                       <div class="left-icon"><i class="ti ti-device-desktop"></i> <span class="main-id">323 356 689</span></div>
                                       <div class="right-icon">
                                          <i class="ti ti-map-pin"></i> <span>Abc, Street 2303, CA - 100223</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="card-top-caption">
                                       <div class="off-icon"></div>
                                       <div class="star-icon"><i class="ti ti-star"></i></div>
                                    </div>
                                    <div class="img-frame">
                                       <img src="img/realTime/img3.jpg" alt="img" class="img-round">
                                    </div>
                                    <div class="card-bottom-caption">
                                       <div class="left-icon"><i class="ti ti-device-desktop"></i> <span class="main-id">423 156 589</span></div>
                                       <div class="right-icon">
                                          <i class="ti ti-map-pin"></i> <span>Abc, Street 2303, CA - 100223</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="col-lg-3 col-md-6">
                              <div class="card">
                                 <div class="card-body">
                                    <div class="card-top-caption">
                                       <div class="off-icon"></div>
                                       <div class="star-icon"><i class="ti ti-star"></i></div>
                                    </div>
                                    <div class="img-frame">
                                       <img src="img/realTime/img1.jpg" alt="img" class="img-round">
                                    </div>
                                    <div class="card-bottom-caption">
                                       <div class="left-icon"><i class="ti ti-device-desktop"></i> <span class="main-id">623 856 089</span></div>
                                       <div class="right-icon">
                                          <i class="ti ti-map-pin"></i> <span>Abc, Street 2303, CA - 100223</span>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
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
      loadDevices();
      $('body').on('click', '.k-no', function() {
         var kundenr=$(this).text();
         $("#searchingvalue").val("kassen_protokoll.kundenNr");
         $("#searchvalue").val(kundenr);
         loadDevices();
      });
            $('body').on('click', '.clipboard', function() {
        value = $(this).data('ref');
        var $temp = $("<input>");
          $("body").append($temp);
          $temp.val(value).select();
          document.execCommand("copy");
          $temp.remove();
          
          // Use notify.js to display a notification
          $.notify("Anydesk copied!", "success");
          
    });
      $("#searchbtn").click(function(){
         loadDevices();
      });
      $("#resetbtn").click(function(){
         $("#searchingvalue").val("");
         $("#searchvalue").val("");
         loadDevices();
      });
   });
    function loadDevices() {
        var searchby= $("#searchingvalue").val();
        var searchvalue=$("#searchvalue").val();
         $.ajax({
               url: 'ajexactive_kassen.php?searchby='+searchby+'&searchvalue='+searchvalue,
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
    $(document).ready(function() {
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