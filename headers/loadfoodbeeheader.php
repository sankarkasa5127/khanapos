<?php 
      // require_once("foodbee_db.php");
      $servername = "92.205.178.167";
      $username = "admin_foodbee";
      $password = "kr0v375L^";
      $dbname = "admin_foodbee";



      // Create connection
      $conn_foodbee = new mysqli($servername, $username, $password, $dbname);
      // Check connection
      if ($conn_foodbee->connect_error) {
          die("Connection failed: " . $conn_foodbee->connect_error);
      } 

      if(isset($_GET['from']) && isset($_GET['to'])){
            $orderQuery = "select count('order_id') as total_count, sum(after_discount+tip) as total_amount from orders WHERE (created_at BETWEEN '".$_GET['from']."' AND '".$_GET['to']."') ";
      }elseif(isset($_GET['restaurant_id'])){
            $orderQuery = "select count('order_id') as total_count, sum(after_discount+tip) as total_amount from orders WHERE restaurant_id = '".$_GET['restaurant_id']."' ";
      }else{
             $orderQuery = "select count('order_id') as total_count, sum(after_discount+tip) as total_amount from orders";
      }

      $from_date = date('Y-m-d')." 00:00:00";
      $to_date = date('Y-m-d')." 23:59:59";


      $todayOrderQuery = "select count('order_id') as total_count, sum(after_discount+tip) as total_amount from orders WHERE (created_at BETWEEN '".$from_date."' AND '".$to_date."') ";

      if(isset($_GET['restaurant_id'])){
            $todayOrderQuery .= " and restaurant_id = '".$_GET['restaurant_id']."' ";
      }

      $getQry = mysqli_query($conn_foodbee, $orderQuery);
      $orderInfo = mysqli_fetch_assoc($getQry);


      $getTodayQry = mysqli_query($conn_foodbee, $todayOrderQuery);
      $todayOrderInfo = mysqli_fetch_assoc($getTodayQry);
      $conn_foodbee->close();
?>
<div class="col-lg-3 col-md-3">
   <div class="price-box">
      <i class="fa-solid fa-bag-shopping icon1"></i>
      <div class="contant-box">
         <h3 class="main-title">Total Orders</h3>
         <p class="tprice"><?= $orderInfo['total_count'] ?></i></p>
      </div>
   </div>
</div> 
<div class="col-lg-3 col-md-3">
   <div class="price-box">
      <i class="fas fa-money-bill icon1"></i>
      <div class="contant-box">
         <h3 class="main-title">Total Amount</h3>
         <p class="tprice"><?php echo formatPrice($orderInfo['total_amount']); ?></p>
      </div>
   </div>
</div>
<div class="col-lg-3 col-md-3">
   <div class="price-box">
      <i class="fa-solid fa-bag-shopping icon1"></i>
      <div class="contant-box">
         <h3 class="main-title">Today Orders</h3>
         <p class="tprice"><?= $todayOrderInfo['total_count'] ?></p>
      </div>
   </div>
</div>
<div class="col-lg-3 col-md-3">
   <div class="price-box">
      <i class="fas fa-money-bill icon1"></i>
      <div class="contant-box">
         <h3 class="main-title">Today Amount</h3>
         <p class="tprice"><?php echo formatPrice($todayOrderInfo['total_amount']);?></p>
      </div>
   </div>
</div>