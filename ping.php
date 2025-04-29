<?php
require 'pusher/vendor/autoload.php';
require_once("db.php");

use Pusher\Pusher;

// Initialize Pusher
require 'pusher_config.php';

// Fetch active device IDs from the database
$devices = []; // Example device IDs from DB

$resultData = $conn->query("select * from andriod_device");
while ($row = mysqli_fetch_assoc($resultData)) {
    $devices[] = $row['id'];
}
// $devices = ["137","131"];

foreach ($devices as $device_id) {
    $pusher->trigger("devices-".$device_id, "ping", ["message" => "Are you online?"]);
}

echo json_encode(["status" => "Ping sent"]);
