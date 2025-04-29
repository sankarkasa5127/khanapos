<?php

require 'pusher/vendor/autoload.php';


use Pusher\Pusher;

$pusher = new Pusher(
    "86563640c9a1a9a32002",
    "983a115b265f542376bc",
    "1945923",
    [
        'cluster' => 'ap2',
        'useTLS' => true
    ]
);

?>
