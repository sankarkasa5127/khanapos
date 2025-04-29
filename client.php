<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>WebSocket Ping/Pong</title>
</head>
<body>
    <h2>WebSocket Ping/Pong Test</h2>
    <button onclick="sendPing()">Send Ping</button>
    <p id="status">Connecting...</p>

    <script>
        let ws;
        let reconnectTimeout = 5000; // 5 seconds before trying to reconnect

        function connectWebSocket() {
            ws = new WebSocket("wss://92.205.178.167:8080/sockets/server.php");
            console.log(ws);
            ws.onopen = function () {
                console.log(" Connected to WebSocket server ");
                document.getElementById("status").innerText = "Connected ";
            };

            ws.onmessage = function (event) {
                console.log(" Received message:", event.data);

                if (event.data === "pong") {
                    // if (event.data === "ping") {
                    ws.send("pong");
                    console.log("Pong sent back to server");
                }
            };

            ws.onclose = function () {
                console.log("WebSocket connection closed. Reconnecting...");
                document.getElementById("status").innerText = "Disconnected  Reconnecting...";
                setTimeout(connectWebSocket, reconnectTimeout);
            };

            ws.onerror = function (error) {
                console.error("WebSocket error:", error);
            };

            // Send a PING every 10 seconds to keep connection alive
            setInterval(() => {
                if (ws.readyState === WebSocket.OPEN) {
                    ws.send("ping");
                    console.log("Ping sent to server");
                }
            }, 10000);
        }

        function sendPing() {
            if (ws.readyState === WebSocket.OPEN) {
                ws.send("ping");
                console.log("Manual Ping sent to server");
            } else {
                console.warn("WebSocket is not open!");
            }
        }

        // Start the WebSocket connection
        connectWebSocket();
    </script>
</body>
</html>
