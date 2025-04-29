<?php
/*************************************************
 * Max's Site Protector
 *
 * Version: 1.0
 * Date: 2007-11-27
 *
 ****************************************************/
class maxProtector{
	var $password = 'universal131313';
	
    function showLoginForm(){
		if(!isset($_COOKIE['userid'])) {
			include('login.php');
		  } else {
			include('lock.php');
		  }

	
      
    }

    function login(){
		$loggedin = isset($_SESSION['loggedin']) ? $_SESSION['loggedin'] : false;
        if ( (!isset($_POST['submitBtn'])) && (!($loggedin))){
            $_SESSION['loggedin'] = false;
			   $this->showLoginForm();
			   exit();
        } else if (isset($_POST['submitBtn'])) {
			   $pass = isset($_POST['passwd']) ? $_POST['passwd'] : '';
      
			   if ($pass != $this->password) {
				   $_SESSION['loggedin'] = false;
				   $this->showLoginForm();
				   exit();     
			   } else {
				   $_SESSION['loggedin'] = true;
			   }
        }

    }
}

// Auto create
session_start();
$protector = new maxProtector();
$protector->login();
?>