<?php include('include/header.php');

?>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
        <?php  if(in_array( "kunden" ,$arraypermission )) { ?>
        <br>
          <div class="table-responsive">
 
            <table class="table table-striped tablesorterdisplay dataTable" id="table-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Kunden Nr.</th>
					<th>Restaurant Name</th>
                  <th>TSE ID</th>
              <th>Date</th>
				      <th>End Date</th>
                
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
     
                           <div class="tab-content">
                           
                              <div id="home" class="tab-pane fade in active">
                                 
        <form id="editForm" action="updateTse.php" method="POST">
		
      <div class="form-row">
          <div class="form-group col-md-12 ">
            <label for="recipient-name" class="col-form-label">Kunden Nr:</label>
			  <input type="hidden" class="form-control " id="tse_id" name="tse_id"  >
			  <input type="text" class="form-control input-datalist" list="list-timezone" id="kundenid" name="kundenid"  >
			  <datalist id="list-timezone">
				  <?php
				  $kundenQuery = "select * from restaurants";
				  $kundenRecord = mysqli_query($conn, $kundenQuery);
				  $data = array();
				  $kudenOption='';

				  while ($kundenRow = mysqli_fetch_assoc($kundenRecord)) {
					  echo "<option value='".$kundenRow['restaurant_id']."'>".$kundenRow['restaurant_id']."</option>";
					  $kudenOption.=  "<option value='".$kundenRow['restaurant_id']."'>".$kundenRow['restaurant_id']."</option>";
				  }
				  ?>
			  </datalist> 
          </div>
		  <div class="form-group col-md-12">
            <label for="recipient-name" class="col-form-label">TSE ID:</label>
            <input type="text" class="form-control rowedit2" id="tseId" name="tseId">
          </div>
          <div class="form-group col-md-12">
            <label for="recipient-name" class="col-form-label">End Date:</label>
            <input type="date" class="form-control rowedit2" id="tse_end_date" name="end_date">
          </div>
          <div class="form-group col-md-12">
            <label for="recipient-name" class="col-form-label">Description:</label>
			  <textarea class="form-control " id="description" name="description"></textarea>
          </div>
</div>
		  <button type="submit" class="btn btn-primary">Save</button>
		  
        </form>
</div>
							


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
        tse_id: {
                  required: true,
              },
        kundenid: {
              required: true,
          },          
          tseId: {
              required: true,
          },
          description: {
              required: true,
          },
      },
  submitHandler: function(form) {
    let _this = form;
    $.ajax({
      url: form.action,
      type: form.method,
      data: $(form).serialize(),
      beforeSend:function(){
         console.log(_this)
         // _this[0].reset()
      },
      success: function(response) {
        alert(response);
        $('#table-1').DataTable().ajax.reload();
        $("#editmodel").modal('hide');
      },
      complete:function(){
         // _this[0].reset()
        // console.log(_this)
        // _this.resetForm()
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
   $('#table-1').DataTable({
    'processing': true,
             "language": {
               "processing": "<img src='img/calc-app-loading.gif'/>"
        },
             'serverSide': true,
             'serverMethod': 'post',
             'lengthMenu': [100, 500, 1000],
             'pageLength': 100,
             "aaSorting": [
               [0, "desc"]
             ],
     
      'ajax': {
          'url':'ajextse.php'
      },
      'columns': [
         { data: 'id'},
         { data: 'kundenid'},
		  { data: 'restaurant_name'},
         { data: 'tseId'},
         { data: 'date'},
         { data: 'end_date'},

          { data: 'action'},
      ]
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
    $("#kundenid").val($(this).attr("data-kundenid"));
    $("#tseId").val($(this).attr("data-tseId"));
    $("#description").val($(this).attr("data-description"));
    $("#tse_id").val($(this).attr("data-id"));
    $("#tse_end_date").val($(this).attr("data-tse_end_date"));

    $('#editmodel').modal('show'); 
});
    </script>
   
<?php $conn->close(); ?>
  </body>
</html>
