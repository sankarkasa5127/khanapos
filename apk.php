<?php include('include/header.php');
$apk_files = mysqli_query($conn, "select * from apk");
?>

<style>

.ringing-bell{

    transition:translate(-50%,-50%);
}
.ringing-bell i {
    font-size: 24px;
    margin-left: 5px;
}

.faa-ring{
    color:red;
}
.faa-ring1{
    color:grey;
}


@-webkit-keyframes ring {
  0% {
    -webkit-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }

  2% {
    -webkit-transform: rotate(15deg);
    transform: rotate(15deg);
  }

  4% {
    -webkit-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  6% {
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  8% {
    -webkit-transform: rotate(-22deg);
    transform: rotate(-22deg);
  }

  10% {
    -webkit-transform: rotate(22deg);
    transform: rotate(22deg);
  }

  12% {
    -webkit-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  14% {
    -webkit-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  16% {
    -webkit-transform: rotate(-12deg);
    transform: rotate(-12deg);
  }

  18% {
    -webkit-transform: rotate(12deg);
    transform: rotate(12deg);
  }

  20% {
    -webkit-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}

@keyframes ring {
  0% {
    -webkit-transform: rotate(-15deg);
    -ms-transform: rotate(-15deg);
    transform: rotate(-15deg);
  }

  2% {
    -webkit-transform: rotate(15deg);
    -ms-transform: rotate(15deg);
    transform: rotate(15deg);
  }

  4% {
    -webkit-transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  6% {
    -webkit-transform: rotate(18deg);
    -ms-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  8% {
    -webkit-transform: rotate(-22deg);
    -ms-transform: rotate(-22deg);
    transform: rotate(-22deg);
  }

  10% {
    -webkit-transform: rotate(22deg);
    -ms-transform: rotate(22deg);
    transform: rotate(22deg);
  }

  12% {
    -webkit-transform: rotate(-18deg);
    -ms-transform: rotate(-18deg);
    transform: rotate(-18deg);
  }

  14% {
    -webkit-transform: rotate(18deg);
    -ms-transform: rotate(18deg);
    transform: rotate(18deg);
  }

  16% {
    -webkit-transform: rotate(-12deg);
    -ms-transform: rotate(-12deg);
    transform: rotate(-12deg);
  }

  18% {
    -webkit-transform: rotate(12deg);
    -ms-transform: rotate(12deg);
    transform: rotate(12deg);
  }

  20% {
    -webkit-transform: rotate(0deg);
    -ms-transform: rotate(0deg);
    transform: rotate(0deg);
  }
}

.faa-ring.animated,
.faa-ring.animated-hover:hover,
.faa-parent.animated-hover:hover > .faa-ring {
  -webkit-animation: ring 2s ease infinite;
  animation: ring 2s ease infinite;
  transform-origin-x: 50%;
  transform-origin-y: 0px;
  transform-origin-z: initial;
}


#empTable_wrapper{
   width: 100%;
}

   </style>
 
            <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
            <?php  if(in_array( "rechnungen" ,$arraypermission )) { ?>
              
               <div class="table-responsive">
                  <div class="top-frame">
                     
                  <table class="table table-striped tablesorter display dataTable" id='empTable'>
                     <thead>
                        <tr>
                           <th>#ID</th>
                           <th>Name</th>
                           <th>File Name</th>
                           <th>File Path</th>
                           <th>Created_at</th>
                           <th>Action</th>
                        </tr>
                     </thead>
                     <tbody>
                        
                        <?php 
                           while($row = mysqli_fetch_assoc($apk_files)) { ?>
                              <tr>
                                 <td><?= $row["id"] ?></td>
                                 <td><?= $row["name"] ?></td>
                                 <td><?= $row["file_name"] ?></td>
                                 <td><?= $row["file_path"] ?></td>
                                 <td><?= $row["created_at"] ?></td>
                                 <td><a href="./<?= $row["file_path"] ?>" class="btn btn-primary" download>Download</a></td>
                              </tr>

                        <?php }  ?>

                     </tbody>
                  </table>
               </div>
               <?php }else { ?>
               <div class="image-overlay" style="background-image:url(../img/access-denied.jpg);"></div>
               <?php } ?>
            </div>
         </div>
         
         </div>

         <!-- add APK details  -->
         <div class="modal fade" id="addModalLabel" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document" style="height: 40%;">
               <div class="modal-content" style="height: 100%;">
                  <div class="modal-header">
                     <h5 class="modal-title" id="addModalLabel">Add record</h5>
                     <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                     <span aria-hidden="true">&times;</span>
                     </button>
                  </div>
                  <div class="modal-body">
                     <form id="addApkForm" action="upload_apk.php" method="POST" enctype="multipart/form-data">
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Name:</label>
                              <input type="text" class="form-control " id="apk_name" name="apk_name" required>
                           </div>
                        </div>
                        <div class="row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">APK File:</label>
                              <input type="file" class="form-control " id="apk_file" name="apk_file" required >
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button>
                        <!-- <div class="form-row">
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">Name:</label>
                              <input type="text" class="form-control " id="apk_name" name="apk_name" required>
                           </div>
                           <div class="form-group col-md-4">
                              <label for="recipient-name" class="col-form-label">APK File:</label>
                              <input type="file" class="form-control " id="apk_file" name="apk_file" required >
                           </div>
                        </div>
                        <button type="submit" class="btn btn-primary" id="addNewRecord">Add New </button> -->
                     </form>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- jQuery first, then Tether, then Bootstrap JS. -->
      <!-- Datatable CSS -->
      <link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/buttons/2.4.1/css/buttons.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/select/1.7.0/css/select.dataTables.min.css' rel='stylesheet' type='text/css'>
      <link href='https://cdn.datatables.net/datetime/1.5.1/css/dataTables.dateTime.min.css' rel='stylesheet' type='text/css'>
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
      <!-- Datatable JS -->
      <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
      <script src="https://cdn.datatables.net/buttons/2.4.1/js/dataTables.buttons.min.js"></script>
      <script src="https://cdn.datatables.net/select/1.7.0/js/dataTables.select.min.js"></script>
      <script src="https://cdn.datatables.net/datetime/1.5.1/js/dataTables.dateTime.min.js"></script>
      <!-- <script src="https://editor.datatables.net/extensions/Editor/js/dataTables.editor.min.js"></script> -->
      <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
      <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
      <script src="https://cdn.ckeditor.com/ckeditor5/39.0.2/classic/ckeditor.js"></script>
      <script src="js/autoComplete/bootstrap-autocomplete.js"></script>
      <script>
    $(".datepicker").on("change", function() {
    this.setAttribute(
        "data-date",
        moment(this.value, "YYYY-m-DD")
        .format( this.getAttribute("data-date-format") )
    )
}).trigger("change");
</script>
      <script>
         ClassicEditor.create(document.querySelector('#ckeditortxt')).then(editor => {
           console.log(editor);
         }).catch(error => {
           console.error(error);
         });
      </script>
      <script>
         ClassicEditor.create(document.querySelector('#ckeditortxt1')).then(editor => {
           console.log(editor);
         }).catch(error => {
           console.error(error);
         });
      </script>
      <script>
         var table = $(document).ready(function() {
            $('#empTable').DataTable();
         });
      </script>
   </body>
</html>