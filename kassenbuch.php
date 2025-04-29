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
/*.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border: 1px solid #aaa;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;}*/

.top-frame{display: flex;position: relative;top: 22px;z-index: 1;justify-content: center; align-items:center;text-align: center;margin-bottom: 35px;}
.top-frame select {border:0;border-radius: 3px;background-color: transparent;padding: 4px; height: 34px;font-weight: 500;border-bottom: 1px solid #f3be4a;}
.top-frame .sel1{padding-right: 20px;}
.top-frame .sel1 .button{padding: 0px 15px 0px; border-radius: 3px; height: 34px; line-height: 34px; color: #fff; text-decoration: none;}
.top-frame .sel1 label{margin-bottom: 0;}
.top-frame .form-control{display: inline-block;font-weight: 500;border: 0;border-bottom: 1px solid #f3be4a; box-shadow: none;}

.top-form{display: flex; align-items:center;}
.top-form #ycustom{margin-top:-20px;}

.or{padding-right: 20px; padding-top: 8px;}
/*.price-box{background: #b8aaaa; text-align: center; padding: 15px; margin-top: 10px; display: flex;justify-content: center;align-items: center;}
.price-box h3{font-size: 40px; margin-top: 0px;}
.price-box p{font-size: 20px; margin-bottom: 0;}
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}*/

.price-box{/*background: #b8aaaa;*/ background: #fff; text-align: center; padding:20px 15px; margin-top: 10px; display: flex;justify-content: space-between;align-items: center;border-left: 0.4rem solid #f3be4a;}
.price-box h3{font-size: 18px; margin-top: 0px;color: #eda300; font-weight: 700;}
.price-box p{font-size: 20px; margin-bottom: 0; font-weight: 600;}
/*.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #fff; width: 45px; height: 45px; line-height:42px; border-radius: 50%; color: #B0252E;}*/
.price-box i.icon1{font-size: 24px; margin-right: 25px; margin-bottom: 0; background: #f3be4a; width: 45px; height: 45px; line-height:42px; border-radius: 10px; color: #000;}

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
         background-color: #000;
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
            <?php  if(in_array( "kassenbuch" ,$arraypermission )) { ?>
            <div class="row" id="reloadHeader">
                  <?php include('headers/loadkassebunchheader.php');?>
               </div>
               <div class="table-responsive">
                  <div class="top-frame">
                     <div class="sel1" >
                     <a href="kassenbuch.php" class="button" >All</a>
                     </div>
                     <div class="sel1" id="tyear">
                        <label> 
                           <select name="year" id="yearsel" class="">
                           <option value="">Year</option>
                              <option data-date-start='01-01' data-date-end='12-31' value="<?php echo date('Y');?>"><?php echo date('Y');?></option>
                              <?php
                           
                           for ($x = 1; $x <= 8; $x++) {
                               $prevYear = date('Y', strtotime('-'.$x.' year'));
                               echo "<option data-date-start='01-01' data-date-end='12-31' value='".$prevYear."'>".$prevYear."</option>";
                           }
                        ?>
                           </select>
                        </label>
                     </div>
                     <div class="sel1 ">
                       <label> 
                          <select name="quartalDate" id="quartalDate" class="">
                          <option value="">Quartal</option>
                             <option value="Q1" data-date-start='01-01' data-date-end='03-31'>Q1</option>
                             <option value="Q2"  data-date-start='04-01' data-date-end='06-30'>Q2</option>
                             <option value="Q3" data-date-start='07-01' data-date-end='09-30'>Q3</option>
                             <option value="Q4" data-date-start='10-01' data-date-end='12-31'>Q4</option>
                            
                          </select>
                       </label>
                    </div>
                    <div class="sel1" >
                       <label> 
                          <select name="year" id="monthfilter">
                             <?php
                          
                          for ($x = 1; $x <= 12; $x++) {
                           $monthName = date('F', mktime(0, 0, 0, $x, 10));
                           $firstdate=date('m-d',strtotime(date($x.'/01')));
                           $lastdate = date("m-t", strtotime('2023-'.$x.'-01') ); 
                              echo "<option data-first='".$firstdate."' data-last='".$lastdate."' value='".$x."'>".$monthName."</option>";
                          }
                       ?>
                          </select>
                       </label> 
                    </div>
                    <form action="" method="get" class="top-form">
                    <div class="sel1" id="ycustom">
                    <label>From:  <input type="date" name="from" id="filterStartdate" data-date="" class=" form-control"  value="<?php if(isset($_GET['from'])){ echo $_GET['from']; }else{echo date('Y-m-d'); }?>"/>  </label> 
                    
                    <label>To:
                     <input type="date" name="to" id="filterEndDate" data-date="" class=" form-control" data-date-format="DD.m.YYYY" value="<?php if(isset($_GET['to'])){ echo $_GET['to']; }else{echo date('Y-m-d'); }?>"/> </label>
                     </div>
                     <div class="sel1">
                        <input type="submit" class="button" value="Apply">
                     </div>
                      
                  </div>
                  </form>
               <div class="table-responsive">
                  <div class="top-frame">
          
                    
                   
                   
                    
                  <table class="table table-striped tablesorter display dataTable" id='empTable' style="width: 100%;">
                     <thead>
                        <tr>
                            <th>#</th>
                            <th>Date</th>
                            <th>Description</th>
                            <th>Einzahlung</th>
                            <th>Auszahlung</th>
                            <!-- <th>Saldo</th> -->
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
                              <li >
                                 <a data-toggle="tab"  href="#assign">Assign</a>
                              </li>
                             
                              
                           </ul>
                           <div class="tab-content">
                              <div id="home" class="tab-pane fade in active">
                                 
                                 <form id="editForm" action="javascript:;" enctype="multipart/form-data">
                                    <input type="hidden" name="id" class="roweditid" value="" />
                                   
                                    <div class="form-row">
                         
                         <div class="form-group col-md-12">
                            <label for="recipient-name" class="col-form-label"> Date1:</label>
                            <input type="date" name='date' id="date" data-date="" class="datepicker1 form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                         </div>
                         <div class="form-group col-md-12">
                            <label for="recipient-name" class="col-form-label">Art der Transaktion:</label>
                              <input type="radio" name="choosetype" value="Einzahlung"> Einzahlung 
                              <input type="radio" name="choosetype" value="Auszahlung"> Auszahlung
                         </div>
                         <div class="form-group col-md-12">
                            <label for="recipient-name" class="col-form-label">Amount:</label>
                            <input type="text" class="form-control"  value="" id="amount" name="amount" style="width: 20%;" required/>
                         </div>
                         
                         <div class="form-group col-md-12">
                            <label for="recipient-name" class="col-form-label">Description  :</label>
                            <textarea name="description" id="description" placeholder="text" class="form-control"></textarea>
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
                                 <div id="assign" class="tab-pane fade in">
                                 <table class="table table-bordered table-hover">
   <thead>
      <tr>
         <th class="text-center">
            #
         </th>
         <th class="text-center">
        Datum
         </th>
         <th class="text-center">
         Rechnungen Nr.
         </th>
        
         <th class="text-right">
            Amount
         </th>
         <th class="text-center">
            method
         </th>
        
      </tr>
   </thead>
   <tbody id="appendpayment">
   <tbody>
</table>
<table class="table table-bordered table-hover" id="tab_logic">
   <tbody>
      <form method="post" action="javascript:void(0);" id="collectpayment">
         <tr id='addr0'>
            <td>
               <input type="hidden" name="invoiceid" class="roweditid" value="" />
               <input type="hidden" name="bankamount" class="bankamount" value="" />
               <input type="hidden" name="rowid" class="rowids" value="" />
               <input type="hidden" name="dateofpayment" class="dateofpayment" value="" />
               <input type="hidden" name="Buchungs_ID" class="Buchungs_ID" value="" />
               <input type="hidden" name="invoiceamount" class="invoiceamount" value="" />
               <input type="hidden" name="typeofpayment" class="typeofpayment" value="1" />
               <input type="text" class="form-control input-datalist" placeholder="Enter rechnungen Nr" width="30%" name="rechnungen_nr" onmouseout="callfunction();" onmouseover="callfunction();" list="list-timezone1" id="customer_no_edit" required />
                                            <datalist id="list-timezone1">
                                               
                                                   <?php
                                                   $kundenQuery = "select DISTINCT rechnung_nummer from rechnungen";
                                                   $kundenRecord = mysqli_query($conn, $kundenQuery);
                                                   $data = array();
                                                   $kudenOption='';
                                                   while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
                                                   echo "<option class='invoiceids'  data-rel='".$kundenRow['rechnung_nummer']."'>".$kundenRow['rechnung_nummer']."</option>";
                                                   $kudenOption.= "<option>".$kundenRow['rechnung_nummer']."</option>";
                                                   }
                                                   ?>
                                            </datalist>
                         
            </td>
            <td>
            <input type="text" class="form-control " placeholder="Kunden Nr" width="30%" name="customer_no"  id="customer_no"  required readonly />
            </td>
            <td>
            <input type="text" class="form-control " placeholder="Name" width="30%" name="name"  id="name"  required readonly />
            </td>
            <td>
            <div class="input-group">	
                  <input type="text" name='amount' value="" id="amount_assign" placeholder='10,00' class="form-control" readonly />
                  <span class="input-group-addon"><i class="fa fa-euro"></i></span>
               </div>
                                                </td>
            <td>
               <button  class=" btn btn-primary" type="submit">Assign </button>
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
                     <form id="addForm" action="addkassenbuch.php" method="POST">
                     
                        <div class="form-row">
                         
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label"> Date:</label>
                              <input type="date" name='date' data-date="" class="datepicker1 form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Art der Transaktion:</label>
                                <input type="radio" name="choosetype" value="Einzahlung" required> Einzahlung 
                                <input type="radio" name="choosetype" value="Auszahlung"> Auszahlung
                           </div>
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Amount:</label>
                              <input type="text" class="form-control "  value="" id="" name="amount" style="    width: 20%;" required/>
                           </div>
                           
                           <div class="form-group col-md-12">
                              <label for="recipient-name" class="col-form-label">Description  :</label>
                              <textarea name="description" id="description_edit" placeholder="text" class="form-control"></textarea>
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
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
  

     

      <script type="text/javascript">
          function loadcollectedpayment(id) {
           
           $.ajax({
             url: 'loadcollectedbankPayment.php',
           
             type: "POST",
             data: {'invoiceid':id},
             success: function(response) {
                $('#appendpayment').html(response);
             }
           });
         }
       function callfunction(){
          var invoiceid=$("#customer_no_edit").val();
          $.ajax({
                      url: 'loadinvoicedetail.php',
                      type: "POST",
                      dataType: "json",
                      data: {'id': invoiceid},
                      success: function(response) {
                         if(response.status==true){
                            $('.rowids').val(response.record.rowid);
                            $('#customer_no').val(response.record.kundennr);
                            $('#name').val(response.record.name);
                            $('.invoiceamount').val(response.record.invoiceamount);
                            
                            $('#amount_assign').val(response.record.amount);
                         }
                         console.log(response);
                         //$('#empTable').DataTable().ajax.reload();
                      
                      }
                   });
       }
         function deldata(rowid) {
         // $('#delrow-'+rowid).remove();
         if (confirm("Are you sure?")) {
                  $.ajax({
                        url: 'deletekassenBuch.php',
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
           
            choosetype: {
               required: true,
             },
           },
           submitHandler: function(form) {
             var form_data = new FormData(document.getElementById("editForm"));
             $('#editformloader').show();
             $.ajax({
               url: 'updatekassenBuch.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                  $('#editformloader').hide();
                  if(response!='Error'){
                     $("#reloadHeader").html(response);
                     alert("Updated successfully..");
                  }else{
                  alert(response);
                  }
                 //$('#editmodel').modal('hide');
                 $('#empTable').DataTable().ajax.reload();
               }
             });
           }
         });
         $('#collectpayment').validate({
           
           submitHandler: function(form) {
            $("#addPaymentloader").show();
             var form_data = new FormData(document.getElementById("collectpayment"));
             $.ajax({
               url: 'addcollectpaymentofbank.php',
               cache: false,
               contentType: false,
               processData: false,
               type: "POST",
               data: form_data,
               success: function(response) {
                $("#addPaymentloader").hide();
                loadcollectedpayment($('.roweditid').val());
              
                $('#empTable').DataTable().ajax.reload();
               //   if(response!='error'){
               //    $('#collectpayment')[0].reset();
               //    $('#appendpayment').html(response);
               //    $('#empTable').DataTable().ajax.reload();
               //   }
                 
               }
             });
           }
         });
         $('#addForm').validate({
           rules: {
           
            choosetype: {
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
                 
                 $('#addForm')[0].reset();
                 if(response!='Something went wrong....'){
                     $("#reloadHeader").html(response);
                     alert("Insert successfully..");
                  }else{
                     alert(response);
                  }
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
           
      
$('#yearsel').on('change', function (e) {
   var element = $("option:selected", this);
      var startDate = element.attr("data-date-start");
      var endDate = element.attr("data-date-end");
      var selectvalue=element.val();
     
        var  currentYear=selectvalue;
     
      // alert(currentYear+startDate);
      $("#filterStartdate").val(currentYear+"-"+startDate);

$("#filterEndDate").val(currentYear+"-"+endDate);
});

   $('#monthfilter').on('change', function (e) {
      // var selectedMonth=$(this).val();
      var firstdate = $('option:selected', this).attr('data-first');
      var lastdate = $('option:selected', this).attr('data-last');
      // var firstdate=$(this).attr('data-first');
      // var lastdate=$(this).attr('data-last');
      var selectvalue=$('#yearsel option:selected').val();
      if(selectvalue!=''){
        var  currentYear=selectvalue;
      }else{
        var  currentYear=new Date().getFullYear();
      }
      var firstDayWithSlashes = currentYear+"-"+firstdate;
      var firstDayWithSlashesval =  currentYear+"-"+firstdate;
      var lastDayWithSlashes =  currentYear+"-"+lastdate ;
      var lastDayWithSlashesval =  currentYear+"-"+lastdate;
    console.log(lastDayWithSlashesval+" "+ firstDayWithSlashesval);
      // $("#filterStartdate").attr('data-date',firstDayWithSlashes);
      $("#filterStartdate").val(firstDayWithSlashesval);
      // $("#filterEndDate").attr('data-date',lastDayWithSlashes);
      $("#filterEndDate").val(lastDayWithSlashesval);

   });
   function getLastDateOfMonth(year, month) {
  // Create a new Date object with the next month's first day
  var nextMonth = new Date(year, month + 1, 1);
  // Subtract one day to get the last day of the current month
  var lastDate = new Date(nextMonth - 1);
  return lastDate.getDate();
}
   $('#quartalDate').on('change', function (e) {
     // alert();
     // currentYear=new Date().getFullYear();
      var element = $("option:selected", this);
      var startDate = element.attr("data-date-start");
      var endDate = element.attr("data-date-end");
      var selectvalue=$('#yearsel option:selected').val();
      if(selectvalue!=''){
        var  currentYear=selectvalue;
      }else{
        var  currentYear=new Date().getFullYear();
      }
      
      $("#filterStartdate").val(currentYear+"-"+startDate);

      $("#filterEndDate").val(currentYear+"-"+endDate);
    
});
      
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
              <?php if(isset($_GET['from']) && isset($_GET['to'])){
?>  
'url': 'ajexkassenbuch.php?from=<?php echo $_GET['from'];?>&to=<?php echo $_GET['to'];?>'
                  <?php 
               }else{
                  ?>  
                  'url': 'ajexkassenbuch.php'
               <?php 
               }
               ?>
               
             },
             'columns': [{
               data: 'id'
             },
             {
               data: 'date',
               className: 'text-left'
             }, 
             {
               data: 'description',
               className: 'text-left'
             }, 
             {
               data: 'Einzahlung',
               className: 'text-right'
             }, 
             {
               data: 'Auszahlung',
               className: 'text-right'
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
       
         function viewdata(rowid,bankamount,Buchungs_ID) {
           $.ajax({
               url: 'viewKassenBuch.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  loadcollectedpayment(response.Kassenbuch.id);
               $(".roweditid").val(response.Kassenbuch.id);
               $('.bankamount').val(bankamount);
               $('.dateofpayment').val(response.Kassenbuch.date);
               $('.Buchungs_ID').val(response.Kassenbuch.id);
               $("#description").val(response.Kassenbuch.description);
               $("#date").val(response.Kassenbuch.date);
               $("#date").attr('data-date',response.Kassenbuch.date);
               if(response.Kassenbuch.Einzahlung==0){
                $(':radio[name=choosetype][value="Auszahlung"]').prop('checked', true);
                    $("#amount").val(response.Kassenbuch.Auszahlung);
               }else{
                $(':radio[name=choosetype][value="Einzahlung"]').prop('checked', true);
                $('.bankamount').val(response.Kassenbuch.Einzahlung);
                    $("#amount").val(response.Kassenbuch.Einzahlung);
               }
              
              
             
              
               

                
                 
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
 
 <?php $conn->close();?>
   </body>
</html>