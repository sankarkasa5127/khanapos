<?php
require('pusher/vendor/autoload.php');
define('APP_KEY','86563640c9a1a9a32002');
define('APP_SECRET','983a115b265f542376bc');
define('APP_ID','1945923');

$pusher = new Pusher\Pusher(
    APP_KEY,
    APP_SECRET,
    APP_ID,
    [
        'cluster'   =>'ap2',
        'encrypted' => true
    ]
);
$data['id'] = 1339;
$data['status'] = 1;
if($data['status']){
    $data['message'] = "device has been online";
}else{
    $data['message'] = "device has been offline";
}
$pusher->trigger('my-channel','my-event',$data);
echo "Event pushed successfully!";
?>