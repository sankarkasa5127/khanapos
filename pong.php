<?php
require 'pusher/vendor/autoload.php';

use Pusher\Pusher;

// Get device_id from request
$data = json_decode(file_get_contents("php://input"), true);
$device_id = $data["device_id"] ?? null;

if (!$device_id) {
    http_response_code(400);
    echo json_encode(["error" => "Device ID required"]);
    exit;
}

// Initialize Pusher
require 'pusher_config.php';

// Store last "pong" timestamp in database (this tracks online status)
file_put_contents("status_$device_id.json", json_encode(["last_pong" => time()]));

$pusher->trigger("devices-$device_id", "pong", ["message" => "I'm online"]);

echo json_encode(["status" => "Pong received"]);
