<?php include('include/header.php');?>
<style type="text/css">
	 .tool-tip[title-new]:hover:after {
      content: attr(title-new);
      position: absolute;
      padding: 10px;
      display: block;
      z-index: 100;
      color: #ffffff;
      max-width: 200px;
      text-decoration: none;
      text-align:center;
      font-size: 10px;
      line-height: 20px;
      border: none;
      top: 75%;
      left: 14%;
      background-color: #337ab7 !important;
      margin-top: 4px;
      width: 200px;
    }
    i.fa.fa-info-circle.tool-tip {
    position: absolute;
    margin-left: 3px;
    margin-top: 10px;
}

.notifyjs-corner{
   top: 82px !important;
}
</style>
      <style>
         #empTable_length{
            display:none;
         }
    .datepicker {
    position: relative;
    width: 150px; height: 34px;
    color: white;
}
#empTable_wrapper{
width:100%
}
.datepicker:before {
    position: absolute;
    content: attr(data-date);
    display: inline-block;
    color: black;
}

.datepicker::-webkit-datetime-edit, .datepicker::-webkit-inner-spin-button, .datepicker::-webkit-clear-button {
    display: none;
}

.datepicker::-webkit-calendar-picker-indicator {
    position: absolute;
    top: 3px;
    right: 0;
    color: black;
    opacity: 1;
}
.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border: 1px solid #aaa;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;}


.top-form{display: flex; align-items:center;}
.top-form #ycustom{margin-top:-20px;}

.or{padding-right: 20px; padding-top: 8px;}
.price-box{background: #b8aaaa; text-align: center; padding: 15px; margin-top: 10px; display: flex;justify-content: center;align-items: center;}
.price-box h3{font-size: 40px; margin-top: 0px;}
.price-box p{font-size: 20px; margin-bottom: 0;}
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}
.dataTables_wrapper .dataTables_processing{top:-55%!important; z-index: 1;}
.dataTables_wrapper .dataTables_processing img{width: 7%;}

.radio_container {
    display: flex;
    justify-content: space-between;
    align-items: center;
    background-color: #000;
    width: 35%;
    height: 50px;
    border-radius:0;
    box-shadow: inset 0.5px 0.5px 2px 0 rgba(0, 0, 0, 0.15);
    margin: 0 auto;
}

.radio_container input[type="radio"] {
    appearance: none;
    display: none;
    cursor: pointer;
}

.radio_container label {
    font-size: 16px;
    display: flex;
    justify-content: center;
    align-items: center;
    background-color: inherit;
    width: 150px;
    height: 40px;
    text-align: center;
    border-radius: 0;
    overflow: hidden;
    transition: linear 0.3s;
    color: #fff;
    cursor: pointer;
    font-weight: 600;
    margin: 5px;
}

.radio_container input[type="radio"]:checked + label {
    background-color: #f3be4a;
    color: #000;
    font-weight: 600;
    transition: 0.3s;
}


@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;}   
.price-box h3{font-size: 30px;}
.price-box p{font-size: 18px;}
.radio_container{width: 92%;}
}
@media only screen and (min-width:768px) and (max-width:991px){
.top-frame{top: 15px;left:45px;margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;} 
.price-box{padding: 5px;}  
.price-box h3{font-size: 26px;}
.price-box p{font-size: 15px;}
.radio_container{width: 50%;}
}
</style>
      <script>
         $(".fancybox").fancybox({
           width: 500,
           height: 300,
           type: 'iframe'
         });
      </script>
      <style>
         td.shapedisplayflex{
            display:flex;
         }
         .shapesImg{
            width: 28px;
         }
        .form-select{
         border: 1px solid #ccc;
  background: #fff;
  height: 34px;
  border-radius: 5px;
  width: 100%;
}
         #rowAdder {
         margin-left: 17px;
         }
         .rowedit {
         cursor: pointer;
         }
         .hideClass {
         display: none;
         }
         .error {
         color: red;
         }
         .button {
         background-color: #B0252E;
         border: none;
         color: white;
         padding: 5px 10px;
         text-align: center;
         text-decoration: none;
         display: inline-block;
         font-size: 16px;
         cursor: pointer;
         }
         .subitem{
            display:none;
         }

         .tododiv{
                text-align: right;
         }
         .tododiv input[type=radio]{
             margin: 4px 0 0 -18px;
          }

          .appointdiv input[type=radio]{
             margin: 4px 0 0 -18px;
          }
         
      </style>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "todo" ,$arraypermission )) { ?>
               <!-- <div class="row">
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Umsatz</h3>
                           <p class="tprice"><?php echo $totalrevenueAmount;?></i></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-university icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Bank</h3>
                           <p class="tprice"><?php echo $totalBankAmount;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-money-bill icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Bar</h3>
                           <p class="tprice"><?php echo $totalBaramount;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-credit-card icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Offen</h3>
                           <p class="tprice"><?php echo $numOffenTotal;?></p>
                        </div>
                     </div>
                  </div>
               </div> -->
               <div class="table-responsive">
                  <div class="top-frame">
          
<?php 
   require_once("db.php");
   $personQuery = "SELECT * FROM persons WHERE status = 1";
   $personRecords = mysqli_query($conn, $personQuery);

   if (!$personRecords) {
       die("Error in SQL query: " . mysqli_error($conn));
   }
?>
                   
                   
                    
                  <table class="table table-striped tablesorter display dataTable" id='empTable' style="width: 100%;">
                     <thead>
                        <tr>
                        <th>#</th>
                           <th>Type/Priority</th>
                           <th>Customer</th>
                           <th>Person</th>
                           <th>Description</th>
                           <th>Date/time</th>
                           <th>Status</th>
                           <th width="75px;">Action</th>
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

                              <!-- <div class="form-group col-md-6">
                                 <div class="tododiv">
                                    <input type="radio" id="to_do"  class="form-check-input todoForm_edit" name="form_type" value="todo"><label>Todo</label>
                                 </div>
                              </div>
                              <div class="form-group col-md-6">
                                 <div class="appointdiv">
                                    <input type="radio" id="apoint" class="form-check-input todoForm_edit" name="form_type" value="appointment" ><label>Appointment</label>
                                 </div>
                              </div> -->

                              <div class="radio_container" style="margin-top: 10px;">
                                 <input type="radio" name="form_type" id="to_do" class="form-check-input todoForm_edit" value="todo" checked>
                                 <label for="to_do">Todo</label>
                                 <input type="radio" name="form_type" id="apoint" class="form-check-input todoForm_edit" value="appointment">
                                 <label for="apoint">Appointment</label>
                              </div>


                           <span id="todo_div_edit">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Priority:</label>
                              <select class="form-select" name="priority" id="priority_edit" required >
                              <option value="">Select  Priority....</option>
                                <option value="0">red</option>
                                <option value="1">green</option>
                                <option value="2">yellow</option>
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Customer Nr</label>
                              <!-- <input type="text" class="form-control " id="customer_no_edit"  value="" name="customer_no"  required/> -->
                              <input type="text" class="form-control input-datalist" placeholder="Enter Kunden Nr" name="customer_no"   list="list-timezone1" id="customer_no_edit" required />
                                            <datalist id="list-timezone1">
                                               
                                                   <?php
                                                   $kundenQuery = "select restaurant_id from restaurants";
                                                   $kundenRecord = mysqli_query($conn, $kundenQuery);
                                                   $data = array();
                                                   $kudenOption='';
                                                   while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                                   echo "<option>".$kundenRow['restaurant_id']."</option>";
                                                   $kudenOption.= "<option>".$kundenRow['restaurant_id']."</option>";
                                                   }
                                                   ?>
                                            </datalist>
                             
                           </div>
                          <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Person :</label>
                              <select class="form-select" id="person_edit" name="person" required >
                              <option value="">Select Person ....</option>
                              <?php
                                    // Use a for loop to fetch and process the records
                                    while ($row = mysqli_fetch_assoc($personRecords)) {
                                        // You can access the data in each row like this:
                                        $id = $row['id'];

                                        echo '<option value="'.$row['id'].'">'.$row['name'].'</option>';
                                        $personprint.="
                                        <option value='".$row['id']."'>".$row['name']."</option>";
                                        

                                        
                                    }

                                    // Don't forget to close the database connection when you're done
                                    mysqli_close($conn);
                                    ?> 
                              </select>
                           </div>


                        


                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" name="status" id="status_edit" required >
                              <option value="">Select  Status....</option>
                                <option value="0">undone</option>
                                <option value="1">Done</option>
                              </select>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Description  :</label>
                              <textarea name="description" id="description_edit" placeholder="text" class="form-control"></textarea>
                           </div>
                        
                        </div>
                     </span>
                      <span id="apoint_div_edit">
                             
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Date Time</label>
                              <input type="datetime-local" class="form-control " id="dateTime_edit"  value="" name="dateTime"  required/>
                           </div> 
                            <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Duration :</label>
                              <input type="text" class="form-control " id="duration_edit"  value="" name="duration"  required/>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Location</label>
                              <input type="text" class="form-control " id="location_edit"  value="" name="location"  required/>
                           </div> 
                        </span>   

                      
                        
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Save</button>
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
                     <h5 class="modal-title" id="addModalLabelH">Add record</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="addForm" action="addTodo.php" method="POST">
                        <div class="form-row">

                              <!-- <div class="form-group col-md-6">
                                 <div class="tododiv">
                                    <input type="radio" checked class="form-check-input todoForm" name="form_type" value="todo"><label>Todo</label>
                                 </div>
                              </div>
                              <div class="form-group col-md-6">
                                 <div class="appointdiv">
                                    <input type="radio" class="form-check-input todoForm" name="form_type" value="appointment" ><label>Appointment</label>
                                 </div>
                              </div> -->

                              <div class="radio_container">
                                 <input type="radio" name="form_type" id="todo" class="form-check-input todoForm" value="todo" checked>
                                 <label for="todo">Todo</label>
                                 <input type="radio" name="form_type" id="appoint" class="form-check-input todoForm" value="appointment">
                                 <label for="appoint">Appointment</label>
                              </div>
                          
                        <span id="todo_div">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Priority:</label>
                              <select class="form-select" name="priority" id="priority" required >
                              <option value="">Select  Priority....</option>
                                <option value="0">Red</option>
                                <option value="1">Green</option>
                                <option value="2">Yellow</option>
                              
                              </select>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Kunden Nr</label>
                              <!-- <input type="text" class="form-control " id="customer_no"  value="" equired/> -->

                              <input type="text" class="form-control input-datalist" placeholder="Enter Kunden Nr" name="customer_no"   list="list-timezone" id="customer_no" required />
                                            <datalist id="list-timezone">
                                              <?php echo $kudenOption;?>
                                            </datalist>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Person :</label>
                              <select class="form-select" id="person" name="person" required >
                              <option value="">Select Person ....</option>
                                 <?php
                                   
                                       echo  $personprint;
                                        

                                        
                                    

                                   
                                    ?> 
                              </select>
                           </div>

                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" name="status" id="status" required >
                              <option value="">Select Status ....</option>
                                <option value="0">undone</option>
                                <option value="1">Done</option>
                              </select>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Description  :</label>
                              <textarea name="description" id="description" placeholder="Description..." class="form-control"></textarea>
                           </div>


                         
                        
                        </div>
                        </span>

                        <span id="apoint_div">
                            
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Date Time</label>
                              <input type="datetime-local" class="form-control " id="dateTime"  name="dateTime"  required/>
                           </div> 
                            <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Duration :</label>
                              <input type="text" class="form-control " id="duration"  value="" name="duration"  required/>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Location</label>
                              <input type="text" class="form-control " id="location"  value="" name="location"  required/>
                           </div> 
                        </span>

                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
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
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
      <script src="js/notify.js"></script>
      <script type="text/javascript">
    
         function deltodo(rowid) {
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'deleteTodo.php',
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
               url: 'updatetodo.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 // alert(response);
                 $.notify(response,"success",{
                     autoHideDelay: 1000,
                      clickToHide: true,
                     arrowSize: 50
                  }); 
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload();
                 $("#editmodel").modal('hide');
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
             var form_data = new FormData(document.getElementById("addForm"));
             $.ajax({
               url: form.action,
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $.notify(response,"success",{
                     autoHideDelay: 1000,
                      clickToHide: true,
                     arrowSize: 50
                  }); 
                 $('#addForm')[0].reset();
                 $('#empTable').DataTable().ajax.reload();
                 setTimeout(location.reload(), 5000);
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
                  'url': 'ajaxTodo.php',
                   'data': {
                     'userid': '<?= $_SESSION['userid'] ?>'
                   },
             },
             'columns': [{
                           data: 'id',
                           className: 'text-left'
                       },
                       {
                           data: 'priority',
                           className: 'text-center'
                       },
                       {
                           data: 'customer_no',
                           className: 'text-center'
                       },
                       {
                           data: 'person',
                           className: 'text-center'
                       },
                       {
                           data: 'description',
                           className: 'text-left'
                       },
                       {
                           data: 'created_at',
                           className: 'text-center'
                       },
                       {
                           data: 'status',
                           className: 'text-center'
                       },
                       {
                           data: 'action',
                           className: 'rowedit'
                           // You might need to define a custom rendering function here
                       }, ],
           });
         });
       
         function viewdata(rowid) {
           $.ajax({
               url: 'viewTodo.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  console.log(response);
                   $(".roweditid").val(response.itemType.id);
                  $("#priority_edit option").filter(function() {
                   return $(this).val() === response.itemType.priority;
                }).prop("selected", true);
                $("#customer_no_edit").val(response.itemType.customer_no);

                $("#person_edit option").filter(function() {
                   return $(this).val() === response.itemType.person;
                }).prop("selected", true);
                console.log(response.itemType.form_type);
                if(response.itemType.form_type == 'todo'){
                  $("#to_do").attr('checked','checked');
                  // $('#todo_div_edit').show();
                  $('#apoint_div_edit').hide();
                }
                 if(response.itemType.form_type == "appointment"){
                  $("#apoint").attr('checked','checked');
                  // $('#todo_div_edit').hide();
                  $('#apoint_div_edit').show();
                }



                $("#location_edit").val(response.itemType.location);
                $("#duration_edit").val(response.itemType.duration);
                $("#dateTime_edit").val(response.itemType.dateTime);

                $("#description_edit").val(response.itemType.description);

                $("#status_edit option").filter(function() {
                   return $(this).val() === response.itemType.status;
                }).prop("selected", true);
                // $("#status").text(response.itemType.description);
                
             
              
               

                
                 
               }
             });
           $('#editmodel').modal('show');
         }





$(document).ready(function() {
   var selValue = $(".todoForm").val();
   if (selValue == 'todo') {
      // $('#todo_div').show();
      $('#apoint_div').hide();
    } 

  $(".todoForm").click(function() {
    // Use the :checked selector to select the checked radio button
    var selectedValue = $(this).val();
     // alert(selectedValue);
    // Check if a radio button is selected
    if (selectedValue == 'todo') {
      // $('#todo_div').show();
      $('#apoint_div').hide();
    } 
    if(selectedValue == 'appointment'){
      // $('#todo_div').hide();
      $('#apoint_div').show();
    }
  });



$(".todoForm_edit").click(function() {
    // Use the :checked selector to select the checked radio button
    var selectedValue_edit = $(this).val();
    // alert(selectedValue_edit);
    // Check if a radio button is selected
    if (selectedValue_edit == 'todo') {
      // $('#todo_div_edit').show();
      $('#apoint_div_edit').hide();
    } 
    if(selectedValue_edit == 'appointment'){
      // $('#todo_div_edit').hide();
      $('#apoint_div_edit').show();
    }
  });
});
      </script>
  <script>
                                            document.addEventListener('DOMContentLoaded', e => {
                                                $('.input-datalist').autocomplete()
                                            }, false);
                                        </script>
 
   </body>
</html>