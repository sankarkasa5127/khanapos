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
                  <th>Holder Name</th>
				      <th>Email</th>
                  <th>IBAN</th>
                  <th>BIC</th>
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
<div class="modal fade" id="paymentModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="editModalLabel">Edit your record</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body ui-front">
         <div>
             
             <form id="paymentForm" action="" method="POST">
               <input type="hidden" class="form-control " id="bankId" name="bankId">
               <input type="hidden" class="form-control " id="kundenId" name="kundenId">
               <input type="hidden" class="form-control " id="rowId" name="rowId">
               <input type="hidden" class="form-control " id="cid" name="cid" value="DE52ZZZ00001827774">
               <input type="hidden" class="form-control " id="debit_type" name="debit_type" value="direct">
       
                  <div class="form-row">
                      <div class="form-group col-md-6 ">
                        <label for="recipient-name" class="col-form-label">Account Holder:</label>
                        <input type="text" class="form-control " readonly id="account_holder" name="account_holder">
                      </div>
                    <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Email:</label>
                        <input type="text" class="form-control " readonly id="email" name="email">
                      </div>
            </div>
            <div class="form-row">
                    
                    <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">IBAN:</label>
                        <input type="text" class="form-control " readonly id="iban-element" name="iban">
                         <!-- <div id="iban-element" class="form-control"></div> -->
                      </div>
                    <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">BIC</label>
                        <input type="text" class="form-control " readonly id="bic" name="bic">
                      </div>
            </div>

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="address">Amount:</label>
                    <input type="number" class="form-control " id="amount" step=".01" name="amount">
                    <p class="text-primary">Amount in format is <span class="formatAmt"></span></p>
                </div>
                <div class="form-group col-md-6">
                <label for="address">Notiz:</label>
                <textarea name="bankNotiz" class="form-control" id="bankNotiz" autocomplete="off"></textarea>
                    
                </div>

               

            </div>
            <div class="row">

                    <button type="submit" id="payment_btn" class="btn btn-primary">Save</button>
                    </div>
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
       <script src="https://js.stripe.com/v3/"></script>
    <script>
  
      
    $(document).ready(function(){

 
   $('#table-1').DataTable({
    'processing': true,
             "language": {
               "processing": "<img src='img/calc-app-loading.gif'/>"
        },
             'serverSide': true,
             'serverMethod': 'post',
             'lengthMenu': [100, 500, 1000],
             'pageLength': 10,
             "aaSorting": [
               [0, "desc"]
             ],
     
      'ajax': {
          'url':'ajexkundenIban.php'
      },
      'columns': [
         { data: 'id'},
         { data: 'kundenid'},
         { data: 'holder_name'},
         { data: 'email'},
         { data: 'iban' },
         { data: 'bic' },
          { data: 'action'},
      ]
   });
});


function payIban(ibanInfo){
    $("#paymentForm")[0].reset();
   $("#bankId").val($(ibanInfo).attr("data-id"));
   $("#rowId").val($(ibanInfo).attr("data-rowid"));
   $("#kundenId").val($(ibanInfo).attr("data-kundenid"));
   $("#account_holder").val($(ibanInfo).attr("data-holder_name"));
   $("#email").val($(ibanInfo).attr("data-email"));
   $("#iban-element").val($(ibanInfo).attr("data-iban"));
   $("#bic").val($(ibanInfo).attr("data-bic"));
   $("#paymentModal").modal("show");
}

    </script>

    <script>

      $("#paymentForm").submit(function(e){
         e.preventDefault();
         let formdata = $("#paymentForm").serialize();
        //  if(typeof(parseFloat($("#amount").val())) != "Number") {
        //     alert(typeof($("#amount").val()))
        //     alert("Amount should be numerical");
        //     return false;
        // }
         console.log(formdata)
         $.ajax({
            url:"payment/sepa_subscription.php",
            data: formdata,
            type: "post",
            beforeSend: function(){
                $("#payment_btn").prop("disabled", true);
            },
            success:function(response){
               if (response.status == 200) {
                  createPayment(response.paymentIntent);
               }else{
                  alert("payment failed");
               }
            },
            complete: function(){
                $("#payment_btn").prop("disabled", false);
            }
         })
      })

      function createPayment(paymentId){
            $.ajax({
                url: "store_bank_transaction.php",
                type: "post",
                data:{
                    paymentId: paymentId,
                    payment_status: "success"
                },
                beforeSend: function(){
                    $("#payment_btn").prop("disabled", true);
                },
                success: function(response){
                    $("#paymentModal").modal("hide");
                    alert(response.message)
                },
                complete: function(){
                    $("#payment_btn").prop("disabled", false);
                }
            })
      }

      const amount = document.getElementById("amount");
      amount.addEventListener("input", function(){
        // convertAmount = this.value.toLocaleString('de-DE', {
        //                     style: 'currency', 
        //                     currency: 'EUR', 
        //                     minimumFractionDigits: 2 
        //                 });
         convertAmount = new Intl.NumberFormat("de-DE", {style: "currency", currency: "EUR"}).format(this.value)
        $(".formatAmt").text(convertAmount);
      })
 
    </script>

<?php $conn->close(); ?>
  </body>
</html>
