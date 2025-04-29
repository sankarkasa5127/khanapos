<?php include('include/header.php');

$totalQry = mysqli_query($conn, "select COUNT(*) as total_count,(select COUNT(*) FROM `restaurants` WHERE status = 1) as active,(select COUNT(*) FROM `restaurants` WHERE status = 4) as active_tse,(select COUNT(*) FROM `restaurants` WHERE status = 5) as active_xtse FROM `restaurants`");
$totalCount = mysqli_fetch_assoc($totalQry);
?>
<style>
   .active-tab{
      background-color: #fff !important;
       border-color: #000 !important;
       color: #000 !important;
   }
</style>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
        <?php  if(in_array( "kunden" ,$arraypermission )) { ?>
          <br>

          <div class="row">
             
             <div class="form-group">
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Total</h3>
                           <p class="tprice"><?= $totalCount["total_count"] ?>&nbsp;</p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Active</h3>
                           <p class="tprice"><?= $totalCount["active"] ?>&nbsp;</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Active-TSE</h3>
                           <p class="tprice"><?= $totalCount["active_tse"] ?>&nbsp;</p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Active-xTSE</h3>
                           <p class="tprice"><?= $totalCount["active_xtse"] ?>&nbsp;</p>
                        </div>
                     </div>
                  </div>

               </div>


          </div>
<div class="row" style="margin: 30px;">
   
   

   <div class="col-md-12">
      <div style="float: right;">
         <a href="KundenLocations.php" class="btn btn-primary">Map View</a>
      </div>
      <div>
         <button class="btn btn-primary active-tab statusFilter" data-val="" >ALL</button>
         <button class="btn btn-primary statusFilter" data-val="1" >Active</button>
         <button class="btn btn-primary statusFilter" data-val="0" >Deactive</button>
         <button class="btn btn-primary statusFilter" data-val="2" >Wechsel</button>
         <button class="btn btn-primary statusFilter" data-val="3" >Delete</button>
         <button class="btn btn-primary statusFilter" data-val="4" >Active-TSE</button>
         <button class="btn btn-primary statusFilter" data-val="5" >Active-xTSE</button>
      </div>
   </div>
              
</div>



          <div class="table-responsive">
 
            <table class="table table-striped tablesorterdisplay dataTable" id="table-1">
              <thead>
                <tr>
                  <th>Kunden Nr.</th>
                  <th>Geschäfts Name</th>
				      <th>Type</th>
                  <th>Str.</th>
                  <th>PLZ</th>
                  <th>Ort</th>
                  <th>Status</th>
                  <th data-orderable="false">Action</th>
                </tr>
              </thead>
			  <tbody>
			  


              </tbody>
            </table>
          </div>
          <?php }else { ?>
               <div class="image-overlay" style="background-image:url(../img/access-denied.jpg);"></div>
               <?php } ?>
        </div>
      </div>
<div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit your record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ui-front">
      <ul class="nav nav-tabs">
                              <li class="active">
                                 <a data-toggle="tab" href="#home">Info</a>
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
                              <li>
                                 <a data-toggle="tab" href="#banktab">Bank</a>
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
                                 
<div id="banktab" class="tab-pane">
                                 
        <form id="addKundenBankDetailsForm"  method="POST">
            <input type="hidden" class="form-control " id="bankId" name="bankId">
    
      <div class="form-row">
          <div class="form-group col-md-6 ">
            <label for="recipient-name" class="col-form-label">Account Holder:</label>
            <input type="text" class="form-control " id="account_holder" name="account_holder">
          </div>
		  <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control " id="email" name="email">
          </div>
</div>
<div class="form-row">
		  
		  <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">IBAN:</label>
            <input type="text" class="form-control " id="iban" name="iban">
          </div>
		  <div class="form-group col-md-6">
            <label for="recipient-name" class="col-form-label">BIC</label>
            <input type="text" class="form-control " id="bic" name="bic">
          </div>
</div>

<div class="form-row">
   
    <div class="form-group col-md-6">
    <label for="address">Notiz:</label>
    <textarea name="bankNotiz" class="form-control" id="bankNotiz" autocomplete="off"></textarea>
        
    </div>

    <div class="form-group col-md-6">&nbsp;    
    </div>

</div>
<div class="row">

		  <button type="submit" class="btn btn-primary">Save</button>
		  </div>
        </form>
</div>

   <div id="home" class="tab-pane fade in active">
                                 
        <form id="editForm" action="updateCustomer.php" method="POST">
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
              
              <?php
                     $typesPayment = "select id,name from businessType";
                     $typesPaymentrecord = mysqli_query($conn, $typesPayment);
                     $data = array();
                     $kudenTypes='';
                     while ($typesPaymentRow = mysqli_fetch_assoc($typesPaymentrecord)) {
                        echo "<option value='".ucfirst($typesPaymentRow['name'])."'>".ucfirst($typesPaymentRow['name'])."</option>";
                        $kudenTypes.= "<option value='".ucfirst($typesPaymentRow['name'])."'>".ucfirst($typesPaymentRow['name'])."</option>";
                     }
 ?>            
 
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
                                  <option value="4">Active-TSE</option>
                                <option value="5">Active-xTSE</option>
                              
                                                        </select>
          </div>
</div>
<div class="form-row">
    <div class="form-group col-md-12">
    <label for="address">Notiz:</label>
    <textarea id="Notiz" name="Notiz" class="form-control" id="Notiz" autocomplete="off"></textarea>
        
    </div>
</div>

        <button type="submit" class="btn btn-primary">Save</button>
        
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
<div class="modal fade" id="addModalLabel" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="addModalLabel">Add record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form id="addForm" action="addNewCustomer.php" method="POST">
        <div class="form-row">
          <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">Restaurant id:</label>
            <input type="text" class="form-control rowedit1"  name="restaurant_id">
          </div>
		  <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">Restaurant Name:</label>
            <input type="text" class="form-control rowedit2"  name="restaurant_name">
          </div>
		  <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">restaurant inhaber:</label>
            <input type="text" class="form-control rowedit3"  name="restaurant_inhaber">
          </div>
</div>
<div class="form-row">
		  <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">restaurant str:</label>
            <input type="text" class="form-control "  name="restaurant_str">
          </div>
		  <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">restaurant str nr:</label>
            <input type="text" class="form-control "  name="restaurant_str_nr">
          </div>
          <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">restaurant_plz:</label>
            <input type="text" class="form-control rowedit5"  name="restaurant_plz">
          </div>
</div>
          <div class="form-row">
		  <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">restaurant_ort:</label>
            <input type="text" class="form-control rowedit6"  name="restaurant_ort">
          </div>
          <div class="form-group col-md-4">
            <label for="recipient-name" class="col-form-label">Type:</label>
            <!-- <input type="text" class="form-control "  name="resttype"> -->
            <select class="form-select"  name="resttype" required >
            <option value="">Business Type....</option>
                                <?php echo $kudenTypes;?>
                              
                                                        </select>
          </div>
          <div class="form-group col-md-4">
          <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" id="status" name="status" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
								  

                              
                                                        </select>
          </div>
</div>

		  <button type="submit" class="btn btn-primary" id="addNewRecord">Add</button>
		  
        </form>
      </div>
      
    </div>
  </div>
</div>
    </div>

<!-- jQuery first, then Tether, then Bootstrap JS. -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
        <!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
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
       
       $('#editForm').validate({
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
        $('#table-1').DataTable().ajax.reload();
		  $("#editmodel").modal("hide")
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
  $('#addForm').validate({
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
    $('#addNewRecord').prop('disabled', true);
    $.ajax({
      url: form.action,
      type: form.method,
      data: $(form).serialize(),
      success: function(response) {
        alert(response);
        $('#table-1').DataTable().ajax.reload();
       // location.reload();
      }            
    });
  }
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

         $('#addKundenBankDetailsForm').on('submit', function (e) {
            e.preventDefault();
            var realInvoiceid=$(".roweditid").val();
            var kundenNumber=  $("#restaurant_id").val();
            $('#addKundenBankDetailsForm').append('<input type="hidden" name="invoiceRealId" value="'+kundenNumber+'" />');
            $('#addKundenBankDetailsForm').append('<input type="hidden" name="invoiceid" value="'+realInvoiceid+'" />');
           
            $("#addlseLoader").show();
            $.ajax({
                  type: 'post',
                  url: 'helper/kunden/addBankDetails.php',
                  data: $('#addKundenBankDetailsForm').serialize(),
                  success: function (response) {
                     response = JSON.parse(response);
                     $("#addlseLoader").hide();
                     $('#addKundenBankDetailsForm')[0].reset();
                     // $('#tseApeend').html(response);
                     alert(response.message);
                     $("#editmodel").modal("hide");
                  }
            });

         });



         /*const fileUpload = document.getElementById("fileupload");
          fileUpload.addEventListener("change", function (e) {
             const file = e.target.files[0];
             if (!file) return;
             const mime = file.type;
             if ((mime === "application/pdf") || (mime.startsWith("image/"))) {
             }else {
               alert("Please upload file should be pdf or image");
               fileUpload.value = "";
               return;
             }
        });*/

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
               url: 'uploadFiles.php',
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
    var table = $('#table-1').DataTable({
    'processing': true,
             "language": {
               "processing": "<img src='img/calc-app-loading.gif'/>"
        },
             'serverSide': true,
             'serverMethod': 'post',
             'lengthMenu': [100, 500, 1000],
             'pageLength': 1000,
             "aaSorting": [
               [0, "desc"]
             ],
     
      'ajax': {
          'url':'ajexkunden.php'
      },
      'columns': [
         { data: 'restaurant_id'},
         { data: 'restaurant_name'},
         { data: 'resttype'},
         { data: 'address' },
         { data: 'restaurant_plz'},
         { data: 'restaurant_ort'},
         { data: 'status'},
       
          { data: 'action'},
      ]
   });


    // Apply filtering when the dropdown changes
    $('.statusFilter').on('click', function () {
      $(".statusFilter").not($(this)).removeClass('active-tab');
      $(this).addClass("active-tab");
        table.columns(6).search($(this).attr("data-val")).draw(); // Redraw table to apply filter
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
$(document).on('click','body .rowedit',function(){
                  $("#editForm")[0].reset();
                  $("#uploadfiles")[0].reset();

    var row = $(this).closest("tr"),       
    tds = row.find("td");    
    var countitems=1;
    $('.roweditid').val(row.find(".inputvalue").val());
    $('#restaurant_str').val(row.find(".restaurant_str").val());
    $('#restaurant_str_nr').val(row.find(".restaurant_str_nr").val());
    var kundenid='';
    $.each(tds, function() {      
        if(countitems==1){
          kundenid=$(this).text();
        }       
    $('.rowedit'+countitems).val($(this).text());
    countitems++;
    });
    $("#knumber").val(kundenid);
    $('#appendusers').html('');
    $("#type option").prop("selected", false);
    $.ajax({
               url: 'loadKundenData.php',
               type: "POST",
               dataType: "json",
               data: {'id': kundenid,'realid':$('.roweditid').val()},
               beforeSend: function(){
                  // $("#editmodel").form().get(0).reset();
               },
               success: function(response) {
                $('#filesappend').html(response.fileloading);
                $('#contactApeend').html(response.contactHtml);
                $('#personsAppends').html(response.personHtml);
                $('#anydeskApeend').html(response.anydeskHtml);
                $('#tseApeend').html(response.tseHtml);
                
                $('#restaurant_inhaber').val(response.kundenrow.restaurant_inhaber);
                $('#Notiz').val(response.kundenrow.notiz);

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


              if (response.bankInfo) {
               let bankInfo = response.bankInfo;
                   $('#bankId').val(bankInfo.id);
                   $('#email').val(bankInfo.email);
                   $('#iban').val(bankInfo.iban);
                   $('#bic').val(bankInfo.bic);
                   $('#bankNotiz').val(bankInfo.notiz);
                   $('#account_holder').val(bankInfo.holder_name)
              }


             
              }
               });
    $('#editmodel').modal('show'); 
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
<?php $conn->close(); ?>
  </body>
</html>
