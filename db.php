<?php 
$servername = "92.205.178.167";
$username = "kasseUser";
$password = "4_6Ou7x3d";
$dbname = "kasse";



// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
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