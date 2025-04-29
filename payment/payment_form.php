<!DOCTYPE html>
<html lang="en">
<head>
    <title>SEPA Direct Debit Subscription</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        #payment-form { width: 300px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); }
        button { margin-top: 15px; padding: 10px; border: none; background: #28a745; color: white; font-size: 16px; border-radius: 5px; cursor: pointer; }
        button:hover { background: #218838; }
    </style>

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <h2>Subscribe with SEPA Direct Debit</h2>
    <form id="payment-form">



        <div class="row">
            <div class="form-group col-md-12 text-left"> 
                <label for="name">Name</label>
                <input type="text" class="form-control" id="name" required>
            </div>
            <div class="form-group col-md-12 text-left">
                <label for="email">Email</label>
                <input type="email" class="form-control" id="email" required>
            </div>
            <div class="form-group col-md-12 text-left">
                <label>IBAN</label>
                <div id="iban-element" class="form-control"></div>
            </div>
            
             <div class="form-group col-md-12 text-center">
                <button id="submit" style="color: #fff;">Subscribe</button>
            </div>
        <div id="card-errors"></div>
        </div>




       <!--  <label for="name">Full Name</label>
        <input type="text" id="name" required>
        
        <label for="email">Email</label>
        <input type="email" id="email" required>

        <label for="iban-element">IBAN</label>
        <div id="iban-element"></div>
        
        <button id="submit">Subscribe</button>
        <div id="error-message"></div> -->
    </form>

    <script>
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
                    fetch("sepa_subscription.php", {
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

</body>
</html>
