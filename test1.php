<?php
require 'pusher/vendor/autoload.php';

use Ratchet\MessageComponentInterface;
use Ratchet\ConnectionInterface;
use Ratchet\Server\IoServer;
use Ratchet\WebSocket\WsServer;
use Ratchet\Http\HttpServer;

class WebSocketServer implements MessageComponentInterface {
    protected $clients;

    public function __construct() {
        $this->clients = new \SplObjectStorage;
    }

    public function onOpen(ConnectionInterface $conn) {
        $this->clients->attach($conn);
        echo "New connection! ({$conn->resourceId})\n";
        
        // Send Ping every 10 seconds
        $conn->loop = React\EventLoop\Factory::create();
        $conn->loop->addPeriodicTimer(10, function () use ($conn) {
            $conn->send(pack('C*', 0x89, 0)); // 0x89 = Ping frame
            echo "Ping sent to {$conn->resourceId}\n";
        });
    }

    public function onMessage(ConnectionInterface $from, $msg) {
        echo "Received message: $msg from {$from->resourceId}\n";

        // If message is a Pong response
        if ($msg === "pong") {
            echo "Pong received from {$from->resourceId}\n";
        }
    }

    public function onClose(ConnectionInterface $conn) {
        $this->clients->detach($conn);
        echo "Connection {$conn->resourceId} closed\n";
    }

    public function onError(ConnectionInterface $conn, \Exception $e) {
        echo "Error: " . $e->getMessage() . "\n";
        $conn->close();
    }
}

// Create WebSocket Server
$server = IoServer::factory(
    new HttpServer(new WsServer(new WebSocketServer())),
    8080
);

echo "WebSocket server running on ws://localhost:8080";
$server->run();
