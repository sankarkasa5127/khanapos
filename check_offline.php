<?php
require_once("db.php");
$devices = []; // Example device IDs from DB

$resultData = $conn->query("select * from andriod_device");
while ($row = mysqli_fetch_assoc($resultData)) {
    $devices[] = $row['id'];
}

// $devices = ["137","131"];

$offlineDevices = [];

foreach ($devices as $device_id) {
    $file = "status_$device_id.json";
    
    if (file_exists($file)) {
        $data = json_decode(file_get_contents($file), true);
        // print_r($data);
        $lastPong = $data["last_pong"] ?? 0;

        if (time() - $lastPong > 10) { // 60 seconds threshold
            $offlineDevices[] = $device_id;
        }
    } else {
        $offlineDevices[] = $device_id; // No response at all
    }
}
$status = [
    'mode' => 'offline',
    'devices' => [],
    'online' => array_diff($devices,$offlineDevices)
];
// Mark devices as offline
if (!empty($offlineDevices)) {
    // echo "Offline devices: " . implode(", ", $offlineDevices);
    $status ['devices'] = $offlineDevices;
}
echo json_encode($status, true);
