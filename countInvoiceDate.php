<?php 
require_once("db.php");
mysqli_set_charset($conn,'utf8');
$rechnungenTypes = "select * from rechnungenTypes WHERE rowid= ".$rowid;
        $recordrechnungenTypes = mysqli_query($conn, $rechnungenTypes);
        while ($rowtype = mysqli_fetch_assoc($recordrechnungenTypes)) {
                $rowinvoicetype []= $rowtype;
        }

        
?>
  <?php $conn->close();?>