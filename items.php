<?php include('include/header.php');?>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "items" ,$arraypermission )) { ?>
               <div class="table-responsive">
                  <div class="top-frame">
          
                    
                   
                   
                    
                  <table class="table table-striped tablesorter display dataTable" id='empTable' style="width: 100%;">
                     <thead>
                        <tr>
                        <th>#</th>
                           <th>Vender Name</th>
                           <th>Type Name</th>
                           <th>Item Name</th>
                           <th>Description</th>
                           <th>Price</th>
                           <th>Status</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody></tbody>
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
                  <div class="modal-body">
                    
                    
                           <ul class="nav nav-tabs">
                              <li class="active">
                                 <a data-toggle="tab" href="#home">Info</a>
                              </li>
                              
                             
                              
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 
                                 <form id="editForm" action="javascript:;" enctype="multipart/form-data">
                                    <input type="hidden" name="id" class="roweditid" value="" />
                                    <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name-nuksaan" class="col-form-label">Item Description :</label>
                              <textarea class="form-control " id="Description"   name="Description"></textarea>
                           </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-8">
                              <label for="recipient-name" class="col-form-label">Item  Name :</label>
                              <input type="text" class="form-control " id="itemName" name="itemName" value="" required />
                           </div>
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Item Price :</label>
                              <input type="text" class="form-control " id="price" name="price" value="">
                           </div>
                          
                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Vender:</label>
                              <select class="form-select" id="venderid"  name="venderid" required >
                                <option value="">Select Vender....</option>
                                    <?php
                                    mysqli_set_charset($conn,'utf8');
                                    $supplier_detailsq = "select * from supplier_details where status=1"; 
                                    $supplier_details = mysqli_query($conn, $supplier_detailsq);
                                    $numSupplieredit = mysqli_num_rows($supplier_details);
                                    if($numSupplieredit>0){
                                    while ($supplierRowedit = mysqli_fetch_assoc($supplier_details)) {
                                    echo "<option value='".$supplierRowedit['id']."'>".$supplierRowedit['supplier_name']."</option>";
                                    }
                                    }

                                    ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Type:</label>
                              <select class="form-select" name="typeid" id="typeid" required >
                                <option value="">Select Type....</option>
                                    <?php
                                   
                                    $itemTypesq = "select * from _itemType where status=1"; 
                                    $itemTypedetail = mysqli_query($conn, $itemTypesq);
                                    $itemTypeNum = mysqli_num_rows($itemTypedetail);
                                    if($itemTypeNum>0){
                                    while ($itemTyperow = mysqli_fetch_assoc($itemTypedetail)) {
                                    echo "<option value='".$itemTyperow['id']."'>".$itemTyperow['typeName']."</option>";
                                    }
                                    }

                                    ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Item Status :</label>
                              <select class="form-select" name="status" id="status" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                              
                                                        </select>
                           </div>
                        </div>
                        
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Save </button>
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
            </div>
         </div>
         <!-- add Invoice details  -->
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
                     <form id="addForm" action="createitem.php" method="POST">
                     <div class="form-row">
                           <div class="form-group col-md-12">
                              <label for="recipient-name-nuksaan" class="col-form-label">Item Description :</label>
                              <textarea class="form-control " name="Description"></textarea>
                           </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-8">
                              <label for="recipient-name" class="col-form-label">Item  Name :</label>
                              <input type="text" class="form-control " id="" name="itemName" value="" required />
                           </div>
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Item Price :</label>
                              <input type="text" class="form-control " id="purchasedAmount" name="price" value="">
                           </div>
                          
                           
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Vender:</label>
                              <select class="form-select"  name="venderid" required >
                                <option value="">Select Vender....</option>
                                    <?php
                                    mysqli_set_charset($conn,'utf8');
                                    $supplier_detailsq = "select * from supplier_details where status=1"; 
                                    $supplier_details = mysqli_query($conn, $supplier_detailsq);
                                    $numSupplieredit = mysqli_num_rows($supplier_details);
                                    if($numSupplieredit>0){
                                    while ($supplierRowedit = mysqli_fetch_assoc($supplier_details)) {
                                    echo "<option value='".$supplierRowedit['id']."'>".$supplierRowedit['supplier_name']."</option>";
                                    }
                                    }

                                    ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Type:</label>
                              <select class="form-select" name="typeid" required >
                                <option value="">Select Type....</option>
                                    <?php
                                   
                                    $itemTypesq = "select * from _itemType where status=1"; 
                                    $itemTypedetail = mysqli_query($conn, $itemTypesq);
                                    $itemTypeNum = mysqli_num_rows($itemTypedetail);
                                    if($itemTypeNum>0){
                                    while ($itemTyperow = mysqli_fetch_assoc($itemTypedetail)) {
                                    echo "<option value='".$itemTyperow['id']."'>".$itemTyperow['typeName']."</option>";
                                    }
                                    }

                                    ?>
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Item Status :</label>
                              <select class="form-select" name="status" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                              
                                                        </select>
                           </div>
                        </div>
                        
                      
                      
                        
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <!-- Datatable CSS -->
      <link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
      <!-- Datatable JS -->
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
      <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
      <!-- <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
  

     

      <script type="text/javascript">
    
         function deleteRecord(rowid) {
         // $('#delrow-'+rowid).remove();
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'trashItem.php',
                        type: "POST",
                        data: {'id': rowid},
                        success: function(response) {
                           alert(response);
                           $('#empTable').DataTable().ajax.reload();
                        
                        }
                     });
            }
            return false;
         }
         
       
        
       
       
       
         
      
         
        
    
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
               url: 'updateitem.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
               //  $('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#addForm').validate({
           rules: {
           
             status: {
               required: true,
             },
           },
           submitHandler: function(form) {
             //$('#addNewRecord').prop('disabled', true);
             var form_data = new FormData(document.getElementById("addForm"));
             $.ajax({
               url: form.action,
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                 alert(response);
                 $('#addForm')[0].reset();
               //  $('#addModalLabel').modal('hide');
                 $('#empTable').DataTable().ajax.reload();
                //location.reload();
               }
             });
           }
         });

      </script>
      <script>
         $(document).ready(function() {
           
      
      
           $('#empTable').DataTable({
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
            
                  'url': 'ajexItems.php' 
           
               
             },
             'columns': [{
               data: 'id'
             }, {
               data: 'supplier_name'
             }, {
               data: 'typeName'
             },
             {
               data: 'itemName',
               className: 'text-center'
             }, 
             {
               data: 'Description',
               className:'descriptiontd'
             }, 
             {
               data: 'price',
               className: 'text-center'
             },
             {
               data: 'status',
               className: 'text-center'
             },
             {
               data: 'action',
               className: 'rowedit'
             }, ],
           });
         });
       
         function view(rowid) {
           $.ajax({
               url: 'viewItem.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  $(".roweditid").val(response.item.id);
               $("#Description").val(response.item.Description);
               $("#itemName").val(response.item.itemName);
               $("#price").val(response.item.price);
               $("#typeid option").filter(function() {
                 
                  return $(this).val() === response.item.typeid;
               }).prop("selected", true);
               $("#venderid option").filter(function() {
                 
                 return $(this).val() === response.item.venderid;
              }).prop("selected", true);
              $("#status option").filter(function() {
                 
                 return $(this).val() === response.item.status;
              }).prop("selected", true);
             
              
               

                
                 
               }
             });
           $('#editmodel').modal('show');
         }
      </script>
 
 
   </body>
</html>