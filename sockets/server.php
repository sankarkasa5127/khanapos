<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);


require '../pusher/vendor/autoload.php';
require '../db.php';


use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;

class WebSocketServer implements MessageComponentInterface {
    protected $clients;
    private $loop;
    private $channels = [];
    public $pusher;
    public function __construct($loop) {
        $this->clients = new \SplObjectStorage;
        $this->loop = $loop;
         $this->pusher = new \Pusher\Pusher(
            "86563640c9a1a9a32002",
            "983a115b265f542376bc",
            "1945923",
            [
                'cluster' => 'ap2',
                'useTLS' => true
            ]
        );

    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";

                $conn->send(json_encode(["type" => "ping"]));
                echo "Ping sent first time to {$conn->resourceId}\n";
        // Send ping messages every 10 seconds
        $conn->pingTimer = $this->loop->addPeriodicTimer(120, function() use ($conn) {
            // if ($conn->isConnected()) {
                $conn->send(json_encode(["type" => "ping"]));
                echo "Ping sent to {$conn->resourceId}\n";
            // }
        });
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        $data = json_decode($msg, true);
        if (isset($data['type']) && $data['type'] === 'pong') {
            if(!isset($this->channels[$from->resourceId])){
                $this->channels[$from->resourceId] = $data["deviceId"];
                $data['status'] = 'online';
                $data['id'] = $data["deviceId"];
                $data['clientMessage'] = $data["deviceId"]. " device is online";
                // $this->pusher->trigger('device-channel', 'online-event', json_encode($data));
            }
            echo "Pong received from Connection {$from->resourceId}\n and {$data['deviceId']}";
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
                $data['status'] = 'offline';
                $data['id'] = $this->channels[$conn->resourceId];
                $data['clientMessage'] = $this->channels[$conn->resourceId]. " device is offline";
                $this->pusher->trigger('device-online', 'offline-event', json_encode($data));
        echo "Connection {$conn->resourceId} has disconnected\n with channel = ".$this->channels[$conn->resourceId];

        // Stop the ping timer if it exists
        if (isset($conn->pingTimer)) {
            $this->loop->cancelTimer($conn->pingTimer);
        }
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: {$e->getMessage()}\n";
        $conn->close();
    }
}


// Start the WebSocket server
$loop = \React\EventLoop\Factory::create();
$webSocketServer = new WebSocketServer($loop); // Pass $loop here

$server = new Ratchet\Server\IoServer(
    new Ratchet\Http\HttpServer(
        new Ratchet\WebSocket\WsServer($webSocketServer)
    ),
    new React\Socket\Server('0.0.0.0:8080', $loop),
    $loop
);

echo "WebSocket Server started on ws://0.0.0.0:8080\n";
$loop->run();

