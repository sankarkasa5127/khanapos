<?php include('include/header.php');?>
<script src="https://cdn.tiny.cloud/1/87wkobbkbhk1hmj92en7s7v1vqc064xauiic54qr8hmvw5y3/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
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

@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;}   
.price-box h3{font-size: 30px;}
.price-box p{font-size: 18px;}
}
@media only screen and (min-width:768px) and (max-width:991px){
.top-frame{top: 15px;left:45px;margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;} 
.price-box{padding: 5px;}  
.price-box h3{font-size: 26px;}
.price-box p{font-size: 15px;}
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
         
      </style>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
              
               <div class="table-responsive">
                  <div class="top-frame">
          
                    
                   
                   
                    
                  <table class="table table-striped tablesorter display dataTable"  style="width: 100%;">
                     <thead>
                        <tr>
                           <th class="text-center">#</th>
                           <th class="text-center">Template Name</th>
                           <th class="text-center">Type</th>
                           <th class="text-center">Action</th>
                        </tr>
                     </thead>
                     <tbody>
<?php     
    $Query = "select * from templates  ORDER BY `id` DESC";
    $Records = mysqli_query($conn, $Query);
   $i=1;
   $rowcount=mysqli_num_rows($Records);
   if($rowcount!=0){

    while ($row = mysqli_fetch_assoc($Records)) { 
        $type=($row['type']) ? '<span class="label label-success">PDF</span>' : '<span class="label label-warning">EMAIL</span>';
        ?>
        <tr>
        <td><?=$i;?></td>
        <td><?=$row['name'];?></td>
        <td><?=$type;?></td>
        <td><a href="viewtemplate.php?name=<?=$row["filename"];?>&type=<?=$row['type']?>" class="btn btn-primary " ><i class="fa fa-eye"></i>
    </a><button type="button" class="btn btn-danger " onclick="deldata('<?=$row['id'];?>')"><i class="fa fa-trash"></i>
       </button></td>
        </tr>
   <?php  $i++; }
}?>


                     </tbody>
                  </table>
               </div>
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
                              <label for="recipient-name" class="col-form-label">Type Name:</label>
                              <input type="text" class="form-control " id="typeName" value="" name="typeName"  required/>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" id="status" name="status" required >
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
                     <form id="addForm" action="addtemplates.php" method="POST">
                     
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Template Name:</label>
                              <input type="text" class="form-control "  value="" name="name"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Type :</label>
                              <select class="form-select" name="type" required >
                                <option value="">Select Type....</option>
                                <option value="1">PDF</option>
                                <option value="0">Email</option>
                              </select>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Keywords:</label>
                              [BALANCE] , [STATEMENTS] , [TODAYDATE]
                                       </div>
                           <div class="form-group col-md-12">

                              <!-- <label for="recipient-name" class="col-form-label">Template:</label> -->
                              <textarea name="template" id="mytextarea" class="form-control " ></textarea>
                              <!-- <input type="text" class="form-control "  value="" name="typeName"  required/> -->
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
    
         function deldata(rowid) {
         // $('#delrow-'+rowid).remove();
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'deletetemplate.php',
                        type: "POST",
                        data: {'id': rowid},
                        success: function(response) {
                           alert(response);
                           location.reload();
                        
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
               url: 'updateType.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
                 //$('#editmodel').modal('hide');
                 
               }
             });
           }
         });
         $('#addForm').validate({
           rules: {
           },
           submitHandler: function(form) {
             //$('#addNewRecord').prop('disabled', true);
             var form_data = new FormData(document.getElementById("addForm"));
             $.ajax({
               url: form.action,
               type: "POST",
               data: form_data,
               success: function(response) {
                 alert(response);
                 //$('#addForm')[0].reset();
               //  $('#addModalLabel').modal('hide');
                
               // location.reload();
               }
             });
           }
         });

      </script>
      <script>
         $(document).ready(function() {
           
      
      
         
         });
       
         function viewdata(rowid) {
           $.ajax({
               url: 'viewType.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  $(".roweditid").val(response.itemType.id);
               $("#typeName").val(response.itemType.typeName);
               $("#status option").filter(function() {
                 
                  return $(this).val() === response.itemType.status;
               }).prop("selected", true);
             
              
               

                
                 
               }
             });
           $('#editmodel').modal('show');
         }
      </script>
      <script>
      tinymce.init({
        selector: '#mytextarea'
      });
    </script>
 
 
   </body>
</html>