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

// Acquire the MQTT message (it's contained in $argv[1])
// and store the data contained into the payload inside Php Controller variables
$_SESSION['MQTTvar'] = $argv[1];

// Write your custom code to elaborate the data
//
// develop your php code here
//

// Publish a response message via MQTT
exec('mosquitto_pub -h '.$_SESSION['broker'].' -p '.$_SESSION['port'].' -u '.$_SESSION['user'].' -P '.$_SESSION['password'].' -t "topic/2" -m "message received" > /dev/null 2>&1 &');
?>
