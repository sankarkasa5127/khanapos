
<div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-inbox icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Umsatz</h3>

                           <?php 
                           $fmt = numfmt_create( 'de_DE', NumberFormatter::CURRENCY );
                           if(isset($_GET['from']) && isset($_GET['to'])){
                              $bankquery = "SELECT SUM(Kassenbuch.Einzahlung) as einzahlungen,SUM(Kassenbuch.Auszahlung) as auszahlungen FROM Kassenbuch WHERE(date BETWEEN '".$_GET['from']."' AND '".$_GET['to']."')";
                           }else{
                              $bankquery = "SELECT SUM(Kassenbuch.Einzahlung) as einzahlungen,SUM(Kassenbuch.Auszahlung) as auszahlungen FROM Kassenbuch";
                           }
                           //$bankquery = "SELECT SUM(bankstatement.einzahlungen) as einzahlungen,SUM(bankstatement.auszahlungen) as auszahlungen FROM bankstatement WHERE CAST(CONCAT(SUBSTRING(rechnungen.rechnung_datum, 7, 4), '-', SUBSTRING(rechnungen.rechnung_datum, 4, 2), '-', SUBSTRING(rechnungen.rechnung_datum, 1, 2)) AS DATE) BETWEEN '".$_GET['from']."' AND '".$_GET['to']."'";
                           $sumQueryrecord = mysqli_query($conn, $bankquery);
                           $recordQuery = mysqli_fetch_assoc($sumQueryrecord);
                        $totaleinzahlungen=0;
                        $totalauszahlungen=0;
                           if(!empty($recordQuery['einzahlungen'])){
                              $totaleinzahlungen=$recordQuery['einzahlungen'];
                              $einzahlungen= numfmt_format_currency($fmt, $recordQuery['einzahlungen'], "EUR")."\n";
                          }else{
                              $einzahlungen= numfmt_format_currency($fmt, 0, "EUR")."\n";
                          }
                          if(!empty($recordQuery['auszahlungen'])){
                           $totalauszahlungen=$recordQuery['auszahlungen'];
                           $auszahlungen= numfmt_format_currency($fmt, $recordQuery['auszahlungen'], "EUR")."\n";
                       }else{
                           $auszahlungen= numfmt_format_currency($fmt, 0, "EUR")."\n";
                       }
                       $saldo=$totaleinzahlungen - $totalauszahlungen;
$totaltransaction=$totaleinzahlungen + $totalauszahlungen;

    ?>
                           <p class="tprice"><?php echo numfmt_format_currency($fmt, $totaltransaction, "EUR")."\n";?></i></p>
                        </div>
                     </div>
                  </div> 
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-university icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Einzahlungen</h3>
                           <p class="tprice"><?php echo $einzahlungen;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="fas fa-money-bill icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Auszahlungen</h3>
                           <p class="tprice">-<?php echo $auszahlungen;?></p>
                        </div>
                     </div>
                  </div>
                  <div class="col-lg-3 col-md-3">
                     <div class="price-box">
                        <i class="far fa-credit-card icon1"></i>
                        <div class="contant-box">
                           <h3 class="main-title">Saldo</h3>
                           <p class="tprice"><?php echo numfmt_format_currency($fmt, $saldo, "EUR")."\n";?></p>
                        </div>
                     </div>
                  </div>