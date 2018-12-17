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

$path = $argv[1];

$initData = parse_ini_file($path.'/scripts/custom/system/initData.ini');
foreach ($initData as $key => $value){
	if ($key == 'serverPath'){
		$_SESSION['root_path'] = $value;
	}
	if ($key == 'serverIP'){
		$_SESSION['serverIP'] = $value;
	}
	if ($key == 'indexDir'){
		$_SESSION['indexDir'] = $value;
	}
	if ($key == 'controLogiClocklock'){
		$_SESSION['controLogiClocklock'] = $value / 1000;
	}
	if ($key == 'statistics'){
		$_SESSION['statistics'] = $value;
	}
}

$_SESSION['ipAddress'] = $_SESSION['serverIP'].'/'.$_SESSION['indexDir'];
$_SESSION['root_http'] = 'http://'.$_SESSION['ipAddress'];

$_SESSION['plc_power'] = 0;
$_SESSION['timeZone'] = 'Europe/Rome';

$operationsUserCode = fopen($path.'/scripts/custom/system/controlLogic.php', 'rb');
$_SESSION['controlLogic'] = stream_get_contents($operationsUserCode);
fclose($operationsUserCode);

$httpPath = $_SESSION['root_http'];
$rootPath = $_SESSION['root_path'];
$_SESSION['plc_coreRunning'] = 0;
$coreStatus = $_SESSION['plc_coreRunning'];

require($path.'/scripts/init/customScripts.php');

$_SESSION['plc_power'] = 1;

require($path.'/scripts/plc/plc_resetStats.php');

$enableCycle = fopen($path.'/scripts/plc/coreInExecution', 'w');
fclose($enableCycle);

$_SESSION['plc_coreRunning'] = 1;
$plc_refreshingTimeClock = $_SESSION['controLogiClocklock'] * 1000000;
$execCore = 'php '.$path.'/scripts/autorun/startCore.php '.$plc_refreshingTimeClock.' '.$path.' > /dev/null 2>&1 &'; 
exec($execCore);
?>
