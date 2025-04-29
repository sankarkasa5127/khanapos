<?php include('include/header.php');?>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
        <?php  if(in_array( "Kassen_protokoll" ,$arraypermission )) { ?>
          <div class="table-responsive">
            <table class="table table-striped tablesorter display dataTable" id="table-1">
              <thead>
                <tr>
                  <th style='width:100px;'>ID</th>
                  <th style='width:100px;'>Anydesk</th>
                  <th style="width:100px;">Terminal</th>
                  <th style="width:100px;">Kunden Nr.</th>
                  <th style="width:100px;">Kunden</th>
				  <th style="width:100px;">Address</th>
                  
				  <th style='width:100px;'>Tse</th>
				  <th style='width:100px;'>Tier3</th>
				  <th style='width:100px;'>Version</th>
				  
				  <th style='width:100px;'>Datum</th>
                  <th style='width:100px;'>Delete</th>				  
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
                     <form id="addForm" action="addKassen_protokoll.php" method="POST">
                     <div class="form-row">
                           <div class="form-group col-md-6">
                              <label for="recipient-name-nuksaan" class="col-form-label">Kunden :</label>
                              <input type="text" class="form-control " id="" name="kunden" value="" required />
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name-nuksaan" class="col-form-label">Client Id :</label>
                              <input type="text" class="form-control " id="" name="client_id" value="" required />
                           </div>
                        </div>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Anydesk :</label>
                              <input type="text" class="form-control " id="" name="anydesk" value="" required />
                           </div>
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Terminal :</label>
                              <input type="text" class="form-control " id="" name="terminal" value="">
                           </div>
                           <div class="form-group col-md-4">
                                          <label for="recipient-name" class="col-form-label">Datum:</label>
                                          <input type="date" name='datum' data-date="" class="datepicker form-control" data-date-format="DD.m.YYYY" value="<?php echo date('Y-m-d');?>"/>
                                       </div>
                          
                           
                        </div>
                        <div class="form-row">
                      
                        <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Version :</label>
                              <input type="text" class="form-control " id="" name="version" value="">
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Tse:</label>
                              <select class="form-select" name="tse" required >
      
                              <option value="0">Deactive</option>
                                <option value="1">Active</option>
                               
                                                        </select>
                              <!--input type="text" class="form-control " id="kunden_nr" name="kunden_nr"-->
                           </div>
                           
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Tier3 :</label>
                              <select class="form-select" name="tier3" required >
                               
                                <option value="0">Deactive</option>
                                <option value="1">Active</option>
                               
                                                        </select>
                           </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Street :</label>
                              <input type="text" class="form-control " id="" name="street" value="" required />
                            </div>
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Zipcode :</label>
                              <input type="text" class="form-control " id="" name="zipcode" value="">
                            </div>
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Stadt:</label>
                              <input type="text" class="form-control " id="" name="stadt" value="">
                            </div>
                            </div>
                        
                      
                      
                        
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="modal fade" id="editmodel" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
               <div class="modal-content">
                  <div class="modal-header">
                     <h5 class="modal-title" id="editModalLabel">Update record</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="editForm" action="updatekassenProtokoll.php" method="POST">
                     <div class="form-row">
                     <input type="hidden" name="id" class="roweditid" value="" />
                     <div class="form-group col-md-6">
                              <label for="recipient-name-nuksaan" class="col-form-label">Kunden :</label>
                              <input type="text" class="form-control " id="kunden" name="kunden" value="" required />
                           </div>
                           <div class="form-group col-md-6">
                              <label for="recipient-name-nuksaan" class="col-form-label">Client Id :</label>
                              <input type="text" class="form-control " id="client_id" name="client_id" value="" required />
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
                        <div class="form-row">
                            <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Street :</label>
                              <input type="text" class="form-control " id="street" name="street" value="" required />
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
                     </form>
                  </div>
               </div>
            </div>
         </div>


    <script>
function deleteRecord(id){
	 
	   $.ajax('delete.php', {
				type: 'POST',  // http method
				data: { id: id },  // data to submit
				success: function (data, status, xhr) {
					alert(data);
					location.reload();
				},
				error: function (jqXhr, textStatus, errorMessage) {
						alert("error");
					}
			});		
	}
  function view(rowid) {
           $.ajax({
               url: 'viewKassen.php',
               type: "POST",
               dataType: "json",
               data: {'rowId': rowid},
               success: function(response) {
                  $(".roweditid").val(response.kassen.id);
               $("#kunden").val(response.kassen.kunden);
               $("#anydesk").val(response.kassen.anydesk);
               $("#terminal").val(response.kassen.terminal);
               $("#client_id").val(response.kassen.client_id);
               $("#street").val(response.kassen.street);
               
               $("#version").val(response.kassen.version);
               $("#zipcode").val(response.kassen.zipcode);
               $("#stadt").val(response.kassen.stadt);
               $("#datum").val(response.kassen.datum);
                     $("#datum").attr('data-date',response.kassen.datum);
               $("#tse option").filter(function() {
                  return $(this).val() === response.kassen.tse;
               }).prop("selected", true);
               $("#tier3 option").filter(function() {
                 
                 return $(this).val() === response.kassen.tier3;
              }).prop("selected", true);
              // $("#status option").filter(function() {
                 
              //    return $(this).val() === response.item.status;
              // }).prop("selected", true);
             
              
               

                
                 
               }
             });
           $('#editmodel').modal('show');
         }
</script>
 <script>
	var tableOffset = $("#table-1").offset().top;
	var $header = $("#table-1 > thead").clone();
	
	var $fixedHeader = $("#header-fixed").append($header);

	$(window).bind("scroll", function() {
		var offset = $(this).scrollTop();
		
		if (offset >= tableOffset && $fixedHeader.is(":hidden")) {	
           // $( $fixedHeader ).wrap( "<div class='table-responsive'></div>" );		
			$fixedHeader.show();			
		}
		else if (offset < tableOffset) {
			$fixedHeader.hide();
		}
	});
 </script>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
        <!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="https://js.pusher.com/7.0/pusher.min.js"></script>
  <script>
    // Enable pusher logging - don't include this in production
    // Pusher.logToConsole = true;

    // var pusher = new Pusher('4b13f77f8e34738ec5a2', {
    //   cluster: 'ap2'
    // });

    // var channel = pusher.subscribe('foodbeePOS');
    // channel.bind('POSSTATUS', function(data){
    //   $('#table-1').DataTable().ajax.reload();
    // });

    const pusher = new Pusher('86563640c9a1a9a32002', {
            cluster: 'ap2'
        });

        const channel = pusher.subscribe('my-channel');

        channel.bind('my-event', function(data) {
            $.ajax({
               url:"/changeStatus.php",
               method: "post",
               data: "status="+data.status+"&id="+data.id,
               success: function(){
                   alert(data.message);
                   $('#table-1').DataTable().ajax.reload();
               }
            })
        });


  </script>
   <script>
    $(".datepicker").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-m-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change");
</script>
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
               //  $('#editmodel').modal('hide');
                 $('#table-1').DataTable().ajax.reload();
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
             $('#addNewRecord').prop('disabled', true);
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
                 $('#addNewRecord').prop('disabled', false);
                 $('#addForm')[0].reset();
               //  $('#addModalLabel').modal('hide');
                 $('#table-1').DataTable().ajax.reload();
                //location.reload();
               }
             });
           }
         });

      </script>
    <script>
    $(document).ready(function(){
   $('#table-1').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      "aaSorting": [
               [0, "desc"]
             ],
      'ajax': {
          'url':'ajexKassen_protokoll.php'
      },
      'columns': [
         { data: 'id' },
         { data: 'anydesk' },
         { data: 'terminal' },
         { data: 'kundenNr' },
         { data: 'kunden' },
         { data: 'address' },
         { data: 'tseText' },
         { data: 'tierText' },
         { data: 'version' },
         { data: 'datum' },
         { data: 'Delete' },
      ]
   });
});
    </script>
    
 </body>
</html>
