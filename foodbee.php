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

         #order-info,#user-info{
            width: 50%;
         }
         #order-info th, #order-info td,#user-info th, #user-info td, #order-product-details>tfoot th,#order-product-details>tfoot td{
            border: none;
         }

         #order-product-details > tbody > tr:last-child{
            border-bottom: 1px solid #dddddd;
         }
         
      </style>
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "foodbee" ,$arraypermission )) { ?>
            <div class="row" id="reloadHeader">
                  <?php include('headers/loadfoodbeeheader.php');?>
               </div>
               <div class="table-responsive">
                  <div class="top-frame">
                     <div class="sel1" >
                     <a href="foodbee.php" class="button" >All</a>
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
                            <th>ID</th>
                            <th>Order ID</th>
                            <th>Restaurant</th>
                            <th>Total Price</th>
                            <th>Discount(%)</th>
                            <th>Tip</th>
                            <th>Total</th>
                            <th>Order Type</th>
                            <th>Payment</th>
                            <th>Status</th>
                            <th>Created</th>
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
         
         </div>
         <!-- add Invoice details  -->
         <div class="modal fade" id="orderModelLabel" tabindex="-1" role="dialog" aria-labelledby="orderModelLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="">Order Details</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body order-details">
                     
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
'url': 'ajexfoodbee.php?from=<?php echo $_GET['from'];?>&to=<?php echo $_GET['to'];?>'
                  <?php 
               }else if(isset($_GET['restaurant_id']) ){
?>  
'url': 'ajexfoodbee.php?restaurant_id=<?php echo $_GET['restaurant_id'];?>'
                  <?php 
               }else{
                  ?>  
                  'url': 'ajexfoodbee.php'
               <?php 
               }
               ?>
               
             },
             'columns': [{
               data: 'id'
             },
              {
               data: 'order_id'
             },
             {
               data: 'restaurant_id',
               className: 'text-left'
             }, 
             {
               data: 'total_price',
               className: 'text-right'
             },
             {
               data: 'discount',
               className: 'text-right'
             },
             {
               data: 'tip',
               className: 'text-right'
             },
             {
               data: 'total',
               className: 'text-right'
             }, 
             {
               data: 'order_pick_up',
               className: 'text-right'
             },
             {
               data: 'payment_mode',
               className: 'text-center'
             },
            {
               data: 'order_status',
               className: 'text-right'
             },
             {
               data: 'created_at',
               className: 'text-left'
             },
             {
               data: 'action',
               className: 'rowedit'
             }, ],
           });
         });
       
         function vieworderdata(rowid) {
           $.ajax({
               url: 'view_foodbee_order.php',
               type: "POST",
               // dataType: "json",
               data: {'orderId': rowid},
               beforeSend: function(){
                  $(".order-details").html("");
               },
               success: function(response) {
                  console.log(response)
                  $(".order-details").html(response);
               }
             });
         	console.log("orderModelLabel");
           $('#orderModelLabel').modal('show');
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