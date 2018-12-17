<?php
/*
    PHP CONTROLLER - the library to develop smart web applications
    Copyright (C) 2018 Orlando Ceci - orlando.ceci@phpcontroller.org

    This program is free software: you can redistribute it and/or modify
    it under the terms of the GNU General Public License as published by
    the Free Software Foundation, either version 3 of the License, or
    (at your option) any later version.

    This program is distributed in the hope that it will be useful,
    but WITHOUT ANY WARRANTY; without even the implied warranty of
    MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
    GNU General Public License for more details.

    You should have received a copy of the GNU General Public License
    along with this program.  If not, see <https://www.gnu.org/licenses/>.
*/
if ($module == 'start'){
	echo "<script>
			function refreshStats(){
				$('#stats').load('".$_SESSION['root_http']."/scripts/plc/plc_showingStats.php');
				$('#status').load('".$_SESSION['root_http']."/scripts/plc/plc_showingStatusMod.php');
			}
			setInterval(refreshStats, ".$_SESSION['statistics'].");
		</script>";
}

if ($module == 'websocket'){
	echo '<script src="https://cdnjs.cloudflare.com/ajax/libs/paho-mqtt/1.0.1/mqttws31.min.js" type="text/javascript"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
		<script type = "text/javascript" language = "javascript">
			var broker = "'.$_SESSION['broker'].'";
			var port = '.$_SESSION['portWS'].';
			var user = "'.$_SESSION['user'].'";
			var passwd = "'.$_SESSION['password'].'";
			var clientId = "clientID";
			var topicSub = "topic/1";
			var topicPub = "topic/2";

			// Create a client instance
			client = new Paho.MQTT.Client(broker, port, clientId);
			
			// set callback handlers
			client.onConnectionLost = onConnectionLost;
			client.onMessageArrived = onMessageArrived;
			
			// connect the client
			client.connect({
				useSSL: true,
				onSuccess: onConnect,
				userName : user,
				password : passwd
			});
			
			
			// called when the client connects
			function onConnect() {
				// Once a connection has been made, make a subscription and send a message.
				$("#message").append("client connected<br>");
				
				client.subscribe(topicSub);

				message = new Paho.MQTT.Message("client connected");
				message.destinationName = topicPub;
				client.send(message);
			}
			
			// called when the client loses its connection
			function onConnectionLost(responseObject) {
				if (responseObject.errorCode !== 0) {
					$("#message").append("connection lost<br>");
				}
			}
			
			// called when a message arrives
			function onMessageArrived(message) {
				$("#message").append("Topic: "+message.destinationName+" - Message: "+message.payloadString+"<br>");
			}
		</script>';
}
?>
