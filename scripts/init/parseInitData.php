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

$initData = parse_ini_file("scripts/custom/system/initData.ini");

foreach ($initData as $key => $value){
	if ($key == 'serverPath'){
		$_SESSION['root_path'] = $value;
	}
	if ($key == 'serverIP'){
		$_SESSION['serverIP'] = $value;
	}
	if ($key == 'broker'){
		$_SESSION['broker'] = $value;
	}
	if ($key == 'portNoSSL'){
		$_SESSION['port'] = $value;
	}
	if ($key == 'portWS'){
		$_SESSION['portWS'] = $value;
	}
	if ($key == 'user'){
		$_SESSION['user'] = $value;
	}
	if ($key == 'password'){
		$_SESSION['password'] = $value;
	}
	if ($key == 'controLogiClock'){
		$_SESSION['controLogiClock'] = $value / 1000;
	}
	if ($key == 'statistics'){
		$_SESSION['statistics'] = $value;
	}
}

$_SESSION['indexDir'] = end(explode('/', $_SESSION['root_path']));
$_SESSION['ipAddress'] = $_SESSION['serverIP'].'/'.$_SESSION['indexDir'];
$_SESSION['root_http'] = 'http://'.$_SESSION['ipAddress'];

$_SESSION['plc_power'] = 0;
$_SESSION['timeZone'] = 'Europe/Rome';
?>
