<?php
session_start();
 if (isset($_POST['submitBtn'])) {
      $password = 'universal1313';
		 	   $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
      
			   if ($pass != $password) {
				   $_SESSION['loggedin'] = false;
			   } else {
				   $_SESSION['loggedin'] = 1;
			   }
            header("Location: index.php");
        }
?>