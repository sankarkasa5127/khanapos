<?php include('include/header.php');?>
   <script src="https://js.stripe.com/v3/"></script>

      <div class="container-fluid">
        <div class="col-sm-9 offset-sm-3 col-md-6 offset-md-3 main">
                   <form id="payment-form" >
                 
                     <div class="form-row">
                        <div class="form-group col-md-6 ">
                           <label for="recipient-name" class="col-form-label">Account Holder:</label>
                           <input type="text" class="form-control rowedit1" id="name" name="account_name">
                        </div>
                        <div class="form-group col-md-6 ">
                           <label for="recipient-name" class="col-form-label">Email:</label>
                           <input type="text" class="form-control rowedit1" id="email" name="email">
                        </div>
                       
                        
                     </div>
            <div class="form-row">
                     <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">IBAN:</label>
                           <!-- <input type="text" class="form-control rowedit2" id="iban-element" name="iban"> -->
                           <div id="iban-element" class="form-control"></div>
                         </div>
                     <div class="form-group col-md-4">
                           <label for="recipient-name" class="col-form-label">BIC:</label>
                           <input type="text" class="form-control " id="bic" name="bic">
                         </div>
                    <div class="form-group col-md-4">
                        <label for="recipient-name" class="col-form-label">CID:</label>
                        <input type="text" class="form-control " id="cid" name="cid">
                      </div>
                    
            </div>
            <div class="form-row">
                   <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Direct Debit type:</label>
                        <select class="form-control " id="debit_type" name="debit_type" style="height: 3.4rem;">
                           <option value="direct">Direct</option>
                           <option value="emi">EMI</option>
                        </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Amount:</label>
                        <input type="text" class="form-control rowedit5" id="debit_amount" name="debit_amount">
                      </div>
                  </div>

                  <div class="form-row emi_details" >
                   <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Total amount:</label>
                        <input type="text" class="form-control " id="total_amount" name="total_amount">
                      </div>
                      <div class="form-group col-md-6">
                        <label for="recipient-name" class="col-form-label">Tensure:</label>
                        <input type="number" class="form-control rowedit5" id="tensure" name="tensure">
                      </div>
                  </div>    
                     
            <div class="form-row">
                <div class="form-group col-md-12">
                <label for="address">Notiz:</label>
                <textarea id="Notiz" name="Notiz:" class="form-control" id="Notiz:" autocomplete="off"></textarea>
                    
                </div>
            </div>
                  <div class="form-row text-center">
                    <button id="submit" class="btn btn-primary">Pay</button>
                    </div>
                    </form>
        </div>
        </div>
      </div>


    </div>
 <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js">
      </script>
    <script src=
"https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js">
      </script> 
      <script>
         $(document).ready(function(){
            setEmaiDetails($("#debit_type").val());
         });

            $("#debit_type").change(function(){
              setEmaiDetails($(this).val());
            });
         function setEmaiDetails(type){
             if (type == "emi") {
                  $(".emi_details").show();
               }else{
                  $(".emi_details").hide();
               }
         }

      </script>

      <script>
        // var stripe = Stripe("pk_live_okDBjs5tB2CnceKXzal51rIc");
        var stripe = Stripe("pk_test_51R6RrKBU6QReLcf7LByZX5Qd16YzQbfIwx3HlzYlh6TffRPM9JjsimT4bht5p9MGa24jTVQ5Zvg4LeqxAwO2HzlS00krtzlEaT");
        var elements = stripe.elements();
        var iban = elements.create('iban', { supportedCountries: ['SEPA'] });
        iban.mount('#iban-element');

        document.getElementById("payment-form").addEventListener("submit", function(event) {
            event.preventDefault();

            stripe.createPaymentMethod({
                type: "sepa_debit",
                sepa_debit: iban,
                billing_details: {
                    name: document.getElementById("name").value,
                    email: document.getElementById("email").value
                }
            }).then(function(result) {
                if (result.error) {
                    document.getElementById("error-message").innerText = result.error.message;
                } else {
                    fetch("payment/sepa_subscription.php", {
                        method: "POST",
                        headers: { "Content-Type": "application/json" },
                        body: JSON.stringify({
                            payment_method: result.paymentMethod.id,
                            email: document.getElementById("email").value
                        })
                    })
                    .then(response => response.json())
                    .then(data => alert(data.message));
                }
            });
        });
    </script>
   
<?php $conn->close(); ?>
  </body>
</html>
