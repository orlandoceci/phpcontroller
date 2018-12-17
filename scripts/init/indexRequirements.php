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
	error_reporting(0);

	if (isset($_GET['module'])){
		$module = $_GET['module'];
	} else{
		$module = 'none';
	}

	if ($module == 'start'){
		require ('scripts/init/parseData.php');
		require ('scripts/plc/plc_powerState.php');
	}   

	if ($module == 'save'){
		if (file_exists('scripts/plc/coreInExecution')){
			require('scripts/plc/plc_settingState.php');
		}
		require('scripts/init/storeData.php');
	}

	if (isset($_SESSION['plc_coreRunning'])){
		$coreStatus = $_SESSION['plc_coreRunning'];
	}

	if (!isset($_SESSION['customScripts'])){
		require('scripts/init/customScripts.php');
	}

	if (!isset($_SESSION['ipAddress'])){
		require('scripts/init/parseInitData.php');
		require('scripts/init/loadControlLogic.php');
	}
	$httpPath = $_SESSION['root_http'];
	$rootPath = $_SESSION['root_path'];
	$headFunctions = $httpPath.'/scripts/header/headFunctions';
	$headHandleFunctions = fopen($headFunctions, "rb");
	$headContentFunctions = stream_get_contents($headHandleFunctions);
	fclose($headHandleFunctions);
	echo $headContentFunctions;
?>
