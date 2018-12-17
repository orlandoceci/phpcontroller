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

session_id('phplcSession');   
session_start();

$operationsTime_start = microtime(true);

eval('?>'.$_SESSION['controlLogic'].'<?php;');

if (!isset($_SESSION['plc_refreshingTimeStartCrono'])){
	$_SESSION['plc_refreshingTimeStartCrono'] = $operationsTime_start;
	
	$_SESSION['plc_refreshingTimeMin'] = 1;
	$_SESSION['plc_refreshingTimeMax'] = 0;
	
	$_SESSION['plc_refreshingTimeAverage'] = 0;
	$_SESSION['plc_refreshingTimeAvarageBuffer'][0] = 0;
	$_SESSION['plc_refreshingTimeAvarageBufferIsFull'] = 0;
	
	$_SESSION['plc_refreshingTime'] = 1;
	
	$_SESSION['plc_coreMax'] = 0;
	$_SESSION['plc_coreMin'] = 1;
	$_SESSION['plc_coreAvarage'] = 0;
	$_SESSION['plc_coreAvarageBuffer'][0] = 0;
	
	$_SESSION['plc_cycle'] = 0;
} else{
	$_SESSION['plc_refreshingTime'] = $operationsTime_start - $_SESSION['plc_refreshingTimeStartCrono'];
	$_SESSION['plc_refreshingTimeStartCrono'] = $operationsTime_start;
	
	$_SESSION['plc_refreshingTimeMax'] = max($_SESSION['plc_refreshingTimeAvarageBuffer']);
	$_SESSION['plc_refreshingTimeMin'] = min($_SESSION['plc_refreshingTimeAvarageBuffer']);
	
	$_SESSION['plc_refreshingTimeAvarageBuffer'][$_SESSION['plc_cycle']] = $_SESSION['plc_refreshingTime'];
	if($_SESSION['plc_refreshingTimeAvarageBufferIsFull'] == 0){
		$_SESSION['plc_refreshingTimeAvarage'] = array_sum($_SESSION['plc_refreshingTimeAvarageBuffer']) / ($_SESSION['plc_cycle']+1);
	} else{
		$_SESSION['plc_refreshingTimeAvarage'] = array_sum($_SESSION['plc_refreshingTimeAvarageBuffer']) / 1000;
	}
	
	$_SESSION['plc_coreMax'] = max($_SESSION['plc_coreAvarageBuffer']);
	$_SESSION['plc_coreMin'] = min($_SESSION['plc_coreAvarageBuffer']);
	
	$_SESSION['plc_coreAvarageBuffer'][$_SESSION['plc_cycle']] = $_SESSION['plc_coreTime'];
	if($_SESSION['plc_refreshingTimeAvarageBufferIsFull'] == 0){
		$_SESSION['plc_coreAvarage'] = array_sum($_SESSION['plc_coreAvarageBuffer']) / ($_SESSION['plc_cycle']+1);
	} else{
		$_SESSION['plc_coreAvarage'] = array_sum($_SESSION['plc_coreAvarageBuffer']) / 1000;
	}
	
	if($_SESSION['plc_cycle'] < 1000){
		$_SESSION['plc_cycle'] = $_SESSION['plc_cycle'] + 1;
	} else {
		$_SESSION['plc_cycle'] = 0;
		$_SESSION['plc_refreshingTimeAvarageBufferIsFull'] = 1;
	}
}

$_SESSION['plc_coreTime'] = microtime(true) - $operationsTime_start;
?>
