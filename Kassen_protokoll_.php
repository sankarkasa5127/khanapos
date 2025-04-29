<?php include('include/header.php');?>
        <div class="col-sm-9 offset-sm-3 col-md-10 offset-md-2 main">
          <div class="table-responsive">
            <table class="table table-striped tablesorter display dataTable" id="table-1">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Anydesk</th>
                  <th>Terminal</th>
                  
                  <th>Kunden</th>
				  <th>Address</th>
                  
				  <th>Datum</th>
                   				  
                </tr>
              </thead>
			  <tbody>

              </tbody>
           
        </div>
      </div>
    </div>
 <script>
	var tableOffset = $("#table-1").offset().top;
	var $header = $("#table-1 > thead").clone();
	
	var $fixedHeader = $("#header-fixed").append($header);

	$(window).bind("scroll", function() {
		var offset = $(this).scrollTop();
		
		if (offset >= tableOffset && $fixedHeader.is(":hidden")) {	
           // $( $fixedHeader ).wrap( "<div class='table-responsive'></div>" );		
			$fixedHeader.show();			
		}
		else if (offset < tableOffset) {
			$fixedHeader.hide();
		}
	});
 </script>
<!-- jQuery first, then Tether, then Bootstrap JS. -->
<link href='https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css' rel='stylesheet' type='text/css'>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.0.0/jquery.min.js" integrity="sha384-THPy051/pYDQGanwU6poAc/hOdQxjnOEXzbT+OuUAFqNqFjL+4IGLBgCJC3ZOShY" crossorigin="anonymous"></script>
       <!-- Datatable JS -->
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.2.0/js/tether.min.js" integrity="sha384-Plbmg8JY28KFelvJVai01l8WyZzrYWG825m+cZ0eDDS1f7d/js6ikvy1+X+guPIB" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.3/js/bootstrap.min.js" integrity="sha384-ux8v3A6CPtOTqOzMKiuo3d/DomGaaClxFYdCu2HPMBEkf6x2xiDyJ7gkXU0MWwaD" crossorigin="anonymous"></script>
   
    <script>
function deleteRecord(id){
	 
	   $.ajax('delete.php', {
				type: 'POST',  // http method
				data: { id: id },  // data to submit
				success: function (data, status, xhr) {
					alert(data);
					location.reload();
				},
				error: function (jqXhr, textStatus, errorMessage) {
						alert("error");
					}
			});		
	}
</script>
   <script>
    $(document).ready(function(){
   $('#table-1').DataTable({
      'processing': true,
      'serverSide': true,
      'serverMethod': 'post',
      'ajax': {
          'url':'ajexKassen_protokoll_.php'
      },
      'columns': [
         { data: 'id' },
         { data: 'anydesk' },
         { data: 'terminal' },
         { data: 'kunden' },
         { data: 'address' },
        
         { data: 'datum' },
    
      ]
   });
});
    </script>
 </body>
</html>
