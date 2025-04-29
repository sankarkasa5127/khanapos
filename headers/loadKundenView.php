<div class="col-lg-3 col-md-3">
    <?php 
     $kundenQuery="SELECT count(*)as totalcount ,(select count(*) from  kundenAnydesk ) as countanydesk,SUM(CASE WHEN status = 0 THEN 1 ELSE 0 END) AS active_kunden, SUM(CASE WHEN status = 1 THEN 1 ELSE 0 END) AS inactive_kunden FROM `restaurants`";
    $sumQueryrecord = mysqli_query($conn, $kundenQuery);
                           $recordQuery = mysqli_fetch_assoc($sumQueryrecord);
                    
    ?>
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Kunden</h3>

                          
                           <p class="tprice"><?php echo $recordQuery['totalcount'];?></i></p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-university icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Anydesk</h3>
                           <p class="tprice"><?php echo $recordQuery['countanydesk'];?></p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-money-bill icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Active</h3>
                           <p class="tprice"><?php echo $recordQuery['active_kunden'];?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-credit-card icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Deactive</h3>
                           <p class="tprice"><?php echo $recordQuery['inactive_kunden'];?></p>
                        </div>
                     </div>
                  </div>