<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="author" content="Login">
<title>Login</title>
<link rel='stylesheet' href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css'>
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css">
<style type="text/css">
 body{background-color: #000;}  
.height-100 {height: 100vh}
.card {background-color: #f3be4a;width: 400px;border: none;height: 400px;box-shadow: 0px 0px 10px 0px #f3be4a;z-index: 1;display: flex;justify-content: center;align-items: center}
.card img{max-width: 120px; margin-bottom: 15px;}
.card h5 {color: #000;font-size: 22px; font-weight: 600;}
.card h6 {color: #000;font-size: 20px; font-weight: 600;margin-bottom: 15px;}
.btn-black{background-color: #000!important;color: #fff!important; font-weight: 600;font-size: 16px;}
/*.form-control:focus {box-shadow: none;border: 2px solid #000;}*/
form.form{width: 80%; margin-top: 15px;}
.form-field {margin-bottom: 16px;width: 100%;position: relative;}
.form-field .icon {position: absolute;background: #000;color: #f3be4a;left: -2px;top: 0;display: flex;align-items: center;height: 100%;width: 40px;height: 40px;justify-content: center;border-radius: 20px;}
.form-field .icon:after {content: "";display: block;width: 0;height: 0;border: 12px solid transparent;border-left: 12px solid #000;position: absolute;top: 8px;right: -20px;}
.form-field input {border: 1px solid rgba(255, 255, 255, 0.6);width: 100%;border-radius: 16px;height: 40px;background: rgba(255, 255, 255, 0.2);color: #000;outline: none;transition: all 0.2s;padding-left: 55px;padding-top: 0;}
.form-field input::placeholder {color: #000;}
.form-field input:hover,
.form-field input:focus {background: #fff;color: #000;transition: all 0.2s;}
</style>
</head>
<body>
   <div class="container height-100 d-flex justify-content-center align-items-center">
      <div class="position-relative">
         <div class="card p-2 text-center">
            <img src="img/logo.png" alt="Kasa">
            <form class="form" action="authentication.php" method="post">
               <div class="form-field">
                 <div class="icon">
                   <i class="far fa-user"></i>
                 </div>
                 <input type="text" name="username" id="username" placeholder="Username">
               </div>
               <div class="form-field">
                 <div class="icon">
                   <i class="fas fa-lock"></i>
                 </div>
                 <input type="password"  name="passwd" id="pswd" placeholder="Password">
               </div>
               <button type="submit" name="submitBtn" class="btn btn-black px-4">Login</button>
            </form>
         </div>
      </div>
   </div>
</body>
</html>