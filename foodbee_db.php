<?php 
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

function formatPrice($amount)
{
	if(trim($amount) == '')
		$amount = 0;

	$amount = number_format($amount, 2);
	$priceAmount = str_replace(".", ",", $amount);
	return preg_replace('/,(?=.*,)/', '.', $priceAmount);
}
?>