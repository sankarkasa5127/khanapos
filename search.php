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

.btn-black{background-color: #000; color:#fff;}
.btn-black:hover{color: #fff;}
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

.search-frame{margin-top: 15px;}
.search-table{ margin:30px 0; height:370px; border-bottom: 2px solid #999;scrollbar-width: thin;}
table { font-size: 100%; /*table-layout: fixed;*/ width: 100%; }
table { border-collapse: separate; border-spacing: 2px; }
th, td { border-width: 1px; padding: 0.5em; position: relative; text-align: center; border-radius: 0.25em; border-style: solid;}
td { padding: 6px 0;}
th {  border-color: #999; }
td { border-color: #999; background-color:#f5f5f5; }
table.inventory { clear: both; width: 100%;padding-bottom: 20px; overflow: auto;}
table.inventory th { font-weight: bold; text-align: center; background: #000; color:#fff;position: sticky; top: 0; z-index: 1;}
table.inventory td{padding:0;}
table.inventory .form-group{margin-bottom: 0;}
table.inventory .form-group .checkbox{margin-top: 0px;margin-bottom: 0px;}

.bankstatement-table{margin-top: 50px;height:290px;scrollbar-width: thin;}
table.statement { clear: both; width: 100%;overflow: auto;}
.pr{text-align: right; padding-right:10px;}
table.statement th { font-weight: bold; text-align: center; background: #f3be4a; color: #000;position: sticky; top: 0; z-index: 1;}
table.statement td span strong{font-size: 18px;}
.panel table.table-fixed { clear: both; width: 100%;overflow: auto;}
.panel table.table-fixed th { font-weight: bold; text-align: right; padding-right:10px;background: #f5f5f5; color: #000;position: sticky; top: 0; z-index: 1;width:86%;}
.panel{position: sticky; bottom: 0; z-index: 1; overflow: hidden;}
.panel .btn{opacity: 1; font-size: 15px; margin-left: 5px; font-weight: 600;}
.btn-black{color: #fff!important;}
.btn-success{
   background-color: #449d44;
  border-color: #398439;
}
.btn-warning{
   background-color: #f3be4a!important;
  border-color: #f3be4a!important;
  color: #000!important;
}

/*table.inventory td:nth-child(1) { width: 26%; }
table.inventory td:nth-child(2) { width: 38%; }
table.inventory td:nth-child(3) { text-align: center; width: 12%; }
table.inventory td:nth-child(4) { text-align: center; width: 12%; }
table.inventory td:nth-child(5) { text-align: center; width: 12%; }*/

@media only screen and (max-width:767px){
.top-frame{top:15px;left:8px; margin-bottom:20px;flex-wrap: wrap;align-items: center;justify-content: center;}
.top-frame .sel1 {padding-right: 17px;}   
.price-box h3{font-size: 30px;}
.price-box p{font-size: 18px;}
.panel .btn{margin-bottom: 10px;}
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
            <?php  if(in_array( "search" ,$arraypermission )) { ?>
               
               <div class="row">
                  <form action="loadfilterinvoiceSearch.php" method="post" id="filterData" class="col-md-3 search-frame"> 
                        <div class="input-group">
                          <input type="text" class="form-control input-datalist" list="list-kunden" placeholder="Enter Kunden Nr."  name="kundenNr" id="txtSearch"/>
                          <datalist id="list-kunden">
                                               
                                                   <?php
                                                   $kundenQuery = "select restaurant_id,restaurant_name from restaurants";
                                                   $kundenRecord = mysqli_query($conn, $kundenQuery);
                                                   $data = array();
                                                   $kudenOption='';
                                                   while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                                   echo "<option>".$kundenRow['restaurant_id']."</option>";
                                                   $kudenOption.= "<option value='".$kundenRow['restaurant_id']."'>".$kundenRow['restaurant_name']."</option>";
                                                   }
                                                   ?>
                                            </datalist>
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                              Search
                            </button>
                          </div>
                        </div>
                  </form>
                  <form action="loadfilterinvoiceSearch.php" method="post" id="filterDataByName" class="col-md-3 search-frame"> 
                        <div class="input-group">
                          <input type="text" class="form-control input-datalist" list="list-kundenname" placeholder="Enter Kunden Name."  name="kundenNr" id="txtSearch"/>
                          <datalist id="list-kundenname">
                                                <?php echo $kudenOption;?>   
                                            </datalist>
                          <div class="input-group-btn">
                            <button class="btn btn-primary" type="submit">
                              Search
                            </button>
                          </div>
                        </div>
                  </form>
               </div>
             
            <div class="table-responsive search-table" id="loadfilterinvoice">
               
            </div>

            <div class="table-responsive bankstatement-table" id="loadBankstatement">
           
            </div>
           

         </div>
         <div class="modal fade" id="sendwhatsappmodel" tabindex="-1" role="dialog" aria-labelledby="sendwhatsapplabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="sendwhatsapplabel">Send PDF To Whatsapp</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                    
                    
                           <ul class="nav nav-tabs">
                              <li class="active">
                                 <a data-toggle="tab" href="#home">Send</a>
                              </li>
                              
                             
                              
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 
                                 <form id="sendwhatsapp" action="javascript:;" enctype="multipart/form-data">
                                  
                                    <div class="form-row">
                           <div class="form-group col-md-12">
                           <div id="pdfdetail"><input type="hidden" name="filename" id="pdffile" value=""/></div>
                              <label for="recipient-name" class="col-form-label"> Enter Phone where you want to send pdf:</label>
                              <input type="text" class="form-control " id="sendPhone" value="" name="sendPhone"  required/>
                           </div>
                           
                        
                        </div>
                        
                        
                        <button type="submit" class="btn btn-primary" id="sendwhatsapp">Send </button>
                                       <img id="loadersendwhatsapp" src="https://i.gifer.com/origin/b4/b4d657e7ef262b88eb5f7ac021edda87.gif" style="
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
               <?php }else { ?>
               <div class="image-overlay" style="background-image:url(../img/access-denied.jpg);"></div>
               <?php } ?>
            </div>
         </div>
         <!-- edit model -->
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
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Name:</label>
                              <input type="text" class="form-control " id="name" value="" name="name"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Phone Number:</label>
                              <input type="text" class="form-control " id="phoneNumber"  value="" name="phoneNumber"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Email:</label>
                              <input type="email" class="form-control " id="email"  value="" name="email"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" id="status" name="status" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                              </select>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label"> Description:</label>
                              <textarea class="form-control" id="description"  name="description"   rows="3"></textarea>
                              
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
                     <form id="addForm" action="addPhoneBook.php" method="POST">
                     
                        <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Name:</label>
                              <input type="text" class="form-control "  value="" name="name"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Phone Number:</label>
                              <input type="text" class="form-control "  value="" name="phoneNumber"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label"> Email:</label>
                              <input type="email" class="form-control "  value="" name="email"  required/>
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name" class="col-form-label">Status :</label>
                              <select class="form-select" name="status" required >
                                <option value="">Status....</option>
                                <option value="1">Active</option>
                                <option value="0">Deactive</option>
                              </select>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label"> Description:</label>
                              <textarea class="form-control" name="description"  id="" rows="3"></textarea>
                              
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

      
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>

     

      <script type="text/javascript">
         (function ($) {
    $("form#contact_form").submit(function (event) {
    var value = $("#fromurl").val();
    console.log(value);
    //Use .val() to set the value of textarea
    console.log(" textarea "+$('#message').val());
    $('#message').val($('#message').val()+value);

});
})(jQuery);
         function downloadPDF(typeaction){
           // document.getElementById("postpreviewPdf").submit();
            var invoiceid = []; 
            $("input:checkbox[name=invoiceids]:checked").each(function() { 
               invoiceid.push("'"+$(this).val()+"'"); 
            }); 
            // $('.invoiceidss').val(invoiceid);
            $('#postpreviewPdf').append('<input type="hidden" name="invoiceRealId" value="'+invoiceid+'" />');
            $('#postpreviewPdf').append('<input type="hidden" name="pdfid" value="'+typeaction+'" />');
             document.getElementById("postpreviewPdf").submit();
            // $.ajax({
            //             url: 'pdfHtmlPreview.php',
            //             type: "POST",
            //             data: {'id': invoiceid,'type':typeaction},
            //             success: function(response) {
            //                if(typeaction=='preview'){
            //                   window.open("https://portal.khanapos.de/statementPdf/"+response+".pdf", '_blank');
            //                }else if(typeaction=='download'){
            //                   window.open("https://portal.khanapos.de/downloadpdf.php?link="+response, '_blank');
            //                }else{
            //                   $('#sendwhatsappmodel').modal('show');
            //                }
                          

            //               $('#pdffile').val(response);
                         
                        
            //             }
            //          });
         }
         function loadInvoiceStatement(invoiceid){
            var invoiceid = []; 
            $("input:checkbox[name=invoiceids]:checked").each(function() { 
               invoiceid.push($(this).val()); 
            }); 
            $.ajax({
                        url: 'loadBankStatements.php',
                        type: "POST",
                        data: {'id': invoiceid},
                        success: function(response) {
                           
                           $('#loadBankstatement').html(response);
                           //$('#empTable').DataTable().ajax.reload();
                        
                        }
                     });
         }
         function deldata(rowid) {
         // $('#delrow-'+rowid).remove();
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'deletephoneBook.php',
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
         
       
        
       
       
       
         
         $('#sendwhatsapp').validate({
           rules: {
           
            
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("sendwhatsapp"));
             $('#loadersendwhatsapp').show();
             $.ajax({
               url: 'sendPDF.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#loadersendwhatsapp').hide();
                 alert(response);
               
               }
             });
           }
         });
         
        
    
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
               url: 'updatePhoneBook.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                 alert(response);
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#filterData').validate({
           rules: {
           
           },
           submitHandler: function(form) {
             //$('#addNewRecord').prop('disabled', true);
             var form_data = new FormData(document.getElementById("filterData"));
             $.ajax({
               url: form.action,
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                 $('#loadfilterinvoice').html(response);
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
            
                  'url': 'ajaxcontacts.php' 
           
               
             },
             'columns': [ 
                {
               data: 'phoneNumber'
             }, 
                {
               data: 'name'
             }, 
            
             {
               data: 'email'
             }, 
             {
               data: 'description'
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
       
         function viewdata(rowid) {
           $.ajax({
               url: 'viewPhoneBook.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  $(".roweditid").val(response.phoneBook.id);
               $("#name").val(response.phoneBook.name);
                $("#email").val(response.phoneBook.email);
                $("#phoneNumber").val(response.phoneBook.phoneNumber);
                $("#description").val(response.phoneBook.description);
               $("#status option").filter(function() {
                 
                  return $(this).val() === response.phoneBook.status;
               }).prop("selected", true);
             
              
               

                
                 
               }
             });
           $('#editmodel').modal('show');
         }
      </script>
 
 <script>
                                            document.addEventListener('DOMContentLoaded', e => {
                                                $('.input-datalist').autocomplete()
                                            }, false);
                                        </script>
   </body>
</html>