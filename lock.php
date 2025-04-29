<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Login">
<title>Lock</title>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
<link href="css/tabler-icons.min.css" rel="stylesheet">
<style type="text/css">
 body{background-color: #000;}  
.height-100 {height: 100vh}
.card {background-color: #f3be4a;width: 400px;border: none;height: 400px;box-shadow: 0px 0px 10px 0px #f3be4a;z-index: 1;display: flex;justify-content: center;align-items: center}
.card img{max-width: 120px; margin-bottom: 15px;}
.card h5 {color: #000;font-size: 22px; font-weight: 600;}
.card h6 {color: #000;font-size: 20px; font-weight: 600;margin-bottom: 15px;}
.inputs input {width: 40px;height: 40px}
input[type=number]::-webkit-inner-spin-button,
input[type=number]::-webkit-outer-spin-button {-webkit-appearance: none; -moz-appearance: none;appearance: none;margin: 0}
.btn-black{background-color: #000!important;color: #fff!important; font-weight: 600;font-size: 16px;}
.form-control:focus {box-shadow: none;border: 2px solid #000;}

a.power-icon{color: #f80909!important;position: relative;top: -45px;right: 0;left: 168px;}
.m-icon1{margin-left: 5px;border-radius: 4px;display: inline-flex;align-items: center;justify-content: center;vertical-align:middle;background-color: #fff;box-shadow: -3px 4px 23px rgba(0, 0, 0, 0.1); padding: 10px 9px; margin-top: 0px;color: #f80909!important;}
.m-icon1 i{font-size: 18px; color: #f80909!important;}

</style>
</head>
<body>
   <div class="container height-100 d-flex justify-content-center align-items-center">
      <div class="position-relative">
         <form action="unclock.php" method="post">
            <div class="card p-2 text-center">
               <a href="logout.php" class="power-icon"><span class="m-icon1"><i class="ti ti-power"></i></span></a>
               <img src="img/logo.png" alt="Kasa">
               
             
               <?php
               require_once("db.php");
               if(isset($_COOKIE['userid'])) {
                     $sel="select * FROM persons WHERE id='".$_COOKIE['userid']."'";
                     $Records = mysqli_query($conn, $sel);
                     $row = mysqli_fetch_assoc($Records);
                     if(!empty($row)){
               ?>
              
                 <h5><?=$row['username'];?></h5>
                 <h6>Enter the 4 Digits Pin</h6>
               <div id="otp" class="inputs d-flex flex-row justify-content-center mt-2"> 
                  <input class="m-2 text-center form-control rounded" type="password" id="first" name="digit1" maxlength="1" autofocus /> 
                  <input class="m-2 text-center form-control rounded" type="password" id="second" name="digit2"  maxlength="1" /> 
                  <input class="m-2 text-center form-control rounded" type="password" id="third" name="digit3"  maxlength="1" /> 
                  <input class="m-2 text-center form-control rounded" type="password" id="fourth" name="digit4"   maxlength="1" /> 
               </div>
               <?php }
            }?>
               <div class="mt-4"> 
                  <button class="btn btn-black px-4" type="submit" name="submitBtn" value="submitBtn">Unlock</button> 
               </div>
            </div>
         </form>
       </div>
   </div>

   <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script>
$(document).ready(function(){
   $("input").bind("input", function() {
        var $this = $(this);
        setTimeout(function() {
            if ( $this.val().length >= parseInt($this.attr("maxlength"),10) )
                $this.next("input").focus();
        },0);
    });
});
</script>

</body>
</html>