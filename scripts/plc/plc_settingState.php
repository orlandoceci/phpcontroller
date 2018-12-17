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

if (!isset($_SESSION['plc_power'])){
	session_id('phplcSession');   
	session_start();
}

if($_SESSION['plc_power'] == 0){
	$_SESSION['plc_power'] = 1;
	$enableCycle = fopen('coreInExecution', 'w');
	fclose($enableCycle);
	
	$_SESSION['plc_coreRunning'] = 1;

	$controLogiClock = $_SESSION['controLogiClock'] * 1000000;
	$execCore = 'php plc_core.php '.$controLogiClock.' '.$_SESSION['root_path'].' > /dev/null 2>&1 &';
	exec($execCore);
} else {
	$_SESSION['plc_power'] = 0;
	$_SESSION['plc_coreRunning'] = 0;
	
	if ($module == 'save'){
		unlink('scripts/plc/coreInExecution');
		unlink('scripts/plc/mqttInExecution');
	} else{
		unlink('coreInExecution');
		unlink('mqttInExecution');
	}
}

unset($_SESSION['plc_refreshingTimeStartCrono']);

$_SESSION['plc_refreshingTimeMin'] = 1;
$_SESSION['plc_refreshingTimeMax'] = 0;

unset($_SESSION['plc_refreshingTimeAvarageBuffer']);
$_SESSION['plc_refreshingTimeAvarageBuffer'][0] = 0;
$_SESSION['plc_refreshingTimeAverage'] = 0;
$_SESSION['plc_refreshingTime'] = 1;

$_SESSION['plc_coreMax'] = 0;
$_SESSION['plc_coreMin'] = 1;

unset($_SESSION['plc_coreAvarageBuffer']);
$_SESSION['plc_coreAvarageBuffer'][0] = 0;
$_SESSION['plc_coreAvarage'] = 0;

$_SESSION['plc_cycle'] = 0;

$_SESSION['plc_refreshingTimeAvarageBufferIsFull'] = 0;
unset($_SESSION['customScripts']);
?>
