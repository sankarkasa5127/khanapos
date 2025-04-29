<!DOCTYPE html>
<html lang="en">
<head>
    <title>Stripe Payment</title>
    <script src="https://js.stripe.com/v3/"></script>
    <style>
        body { font-family: Arial, sans-serif; text-align: center; }
        #payment-form { width: 300px; margin: auto; padding: 20px; border: 1px solid #ddd; border-radius: 5px; box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1); }
        #card-element { padding: 10px; border: 1px solid #ccc; border-radius: 4px; background: #f9f9f9; }
        button { margin-top: 15px; padding: 10px; border: none; background: #28a745; color: white; font-size: 16px; border-radius: 5px; cursor: pointer; }
        button:hover { background: #218838; }
        #card-errors { color: red; margin-top: 10px; }
    </style>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

    <h2>Customized Stripe Payment Form</h2>
     <div class="row">
    <form id="payment-form" style="height: 425px;">
       
            <div class="form-group col-md-12 ">
            <label for="name">Name</label>
            <input type="text" id="name" class="form-control" required>
        </div>
            <div class="form-group col-md-12 ">
            <label for="email">Email</label>
            <input type="email" id="email" class="form-control" required>
    </div>
    <div class="form-group col-md-12 ">
            <label>Card Number</label>
            <div id="card-number" class="form-control"></div>
        </div>
        <div class="form-group col-md-12 ">
             <label>Card Expiry</label>
            <div id="card-expiry" class="form-control"></div>
        </div>
        <div class="form-group col-md-12 ">
             <label>Card CVC</label>
            <div id="card-cvc" class="form-control"></div>
        </div>
     <div class="form-group col-md-12 ">
            <button id="submit">Pay</button>
        </div>
            <div id="card-errors"></div>
    </form>
        </div>

    <script>
        var stripe = Stripe("pk_live_okDBjs5tB2CnceKXzal51rIc");
        var elements = stripe.elements();

        var style = {
            base: {
                fontSize: "16px",
                color: "#32325d",
                "::placeholder": { color: "#aab7c4" }
            },
            invalid: { color: "#fa755a" }
        };

        var cardNumber = elements.create('cardNumber', { style: style });
        var cardExpiry = elements.create('cardExpiry', { style: style });
        var cardCvc = elements.create('cardCvc', { style: style });

        cardNumber.mount('#card-number');
        cardExpiry.mount('#card-expiry');
        cardCvc.mount('#card-cvc');


        document.getElementById("payment-form").addEventListener("submit", function(event) {
            event.preventDefault();
            stripe.createToken(cardNumber).then(function(result) {
                if (result.error) {
                    document.getElementById("card-errors").innerText = result.error.message;
                } else {
                    $.ajax({
                        url: "payment",
                        method "post",
                        beforeSend: function(){
                            console.log("beforeSend")
                        },
                        success: function(response){
                            console.log(response)
                        },
                        complete:function(){
                            console.log("completed")
                        }
                    })
                    // fetch("payment", {
                    //     method: "POST",
                    //     headers: { "Content-Type": "application/json" },
                    //     body: JSON.stringify({
                    //         token: result.token.id,
                    //         name: document.getElementById("name").value,
                    //         email: document.getElementById("email").value
                    //     })
                    // })
                    // .then(response => response.json())
                    // .then(data => alert(data.message));
                }
            });
        });
    </script>
</body>
</html>
