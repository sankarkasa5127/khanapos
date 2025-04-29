<?php
error_reporting(E_ALL);
set_time_limit(0);
ob_implicit_flush();

$host = "0.0.0.0";
$port = 8080;

$socket = socket_create(AF_INET, SOCK_STREAM, SOL_TCP);
socket_set_option($socket, SOL_SOCKET, SO_REUSEADDR, 1);
socket_bind($socket, $host, $port);
socket_listen($socket);

$clients = [$socket];

while (true) {
    $read = $clients;
    $write = $except = null;
    
    if (socket_select($read, $write, $except, 2) < 1) {
        continue;
    }

    foreach ($read as $client) {
        if ($client === $socket) {
            // New client connection
            $newClient = socket_accept($socket);
            if ($newClient) {
                $clients[] = $newClient;
                handshake($newClient);
            }
        } else {
            // Read data from client
            $data = @socket_read($client, 1024, PHP_BINARY_READ);
            if (!$data) {
                unset($clients[array_search($client, $clients)]);
                socket_close($client);
                continue;
            }
            
            $decoded = decode($data);
            
            if ($decoded['opcode'] === 0x9) { // 0x9 = Ping frame
                // Respond with Pong
                sendPong($client);
            }
        }
    }

    // Send a ping to all clients every 10 seconds
    foreach ($clients as $client) {
        if ($client !== $socket) {
            sendPing($client);
        }
    }

    sleep(10);
}

// Function to perform WebSocket handshake
function handshake($client) {
    $request = socket_read($client, 1024);
    if (preg_match("/Sec-WebSocket-Key: (.*)\r\n/", $request, $matches)) {
        $key = base64_encode(pack('H*', sha1($matches[1] . '258EAFA5-E914-47DA-95CA-C5AB0DC85B11')));
        $headers = "HTTP/1.1 101 Switching Protocols\r\n";
        $headers .= "Upgrade: websocket\r\n";
        $headers .= "Connection: Upgrade\r\n";
        $headers .= "Sec-WebSocket-Accept: $key\r\n\r\n";
        socket_write($client, $headers, strlen($headers));
    }
}

// Function to decode WebSocket frame
function decode($data) {
    $opcode = ord($data[0]) & 0x0F;
    return ['opcode' => $opcode];
}

// Function to send a Ping frame
function sendPing($client) {
    $frame = chr(0b10001001) . chr(0); // 0x89 = Ping frame, 0x00 = no payload
    socket_write($client, $frame, strlen($frame));
}

// Function to send a Pong frame
function sendPong($client) {
    $frame = chr(0b10001010) . chr(0); // 0x8A = Pong frame
    socket_write($client, $frame, strlen($frame));
}

socket_close($socket);
?>
