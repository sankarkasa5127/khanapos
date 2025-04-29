<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: POST, GET, OPTIONS, DELETE');
header('Access-Control-Allow-Headers: Content-Type, x-requested-with');
header('Access-Control-Max-Age: 86400');

require 'pusher_config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $data = json_decode(file_get_contents("php://input"), true);
    if ($data['message'] === 'pong') {
        $data['status'] = 'online';
        $pusher->trigger('device-channel', 'online-event', json_encode($data));
        echo "device-online online-event Pong received at " . date('H:i:s', $data['timestamp']);
    }else{
        $data['status'] = 'offline';
        $pusher->trigger('device-online', 'offline-event', json_encode($data));
        echo "device-online online-event Ping connection failed ";
    }
}
?>
