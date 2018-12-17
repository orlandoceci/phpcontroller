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

// WRITE YOUR PHP SCRIPT TO LOOP
if ($_SESSION['safetySensor'] == 1){
	$_SESSION['motorLeft'] = 0;
} elseif ($_SESSION['motorEnable'] == 1) {
	$_SESSION['motorLeft'] = 1;
} else {
	$_SESSION['motorLeft'] = 0;
}

// USE THE FOLLOWING LINES IF YOU WANT START THE MQTT CLIENT IN YOUR PROJECT
// AND SUBSCRIBE IT TO A TOPIC
//if(!file_exists($_SESSION['root_path'].'/scripts/plc/mqttInExecution') && $_SESSION['plc_power'] == 1){
//	exec('php '.$_SESSION['root_path'].'/scripts/io/io_mqttClientStart.php '.$_SESSION['broker'].' '.$_SESSION['port'].' '.$_SESSION['user'].' '.$_SESSION['password'].' "topic/1" > /dev/null 2>&1 &');
//}
?>
