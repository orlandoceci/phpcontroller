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
	echo '<!DOCTYPE html>
		<head>
			<title>Php Controller</title>
            <link rel="icon" href="template/favicon.png" type="image/x-icon">
			<link rel="stylesheet" type="text/css" href="template/style.css">';

	require('scripts/init/indexRequirements.php');
	require('scripts/custom/headers/headers.php');

	echo '
		</head>
		<body>';

	// Menù
	echo '	<div>
				<button onclick="window.location.href=\''.$httpPath.'/index.php?module=start\'">Start Session</button>
				<button onclick="window.location.href=\''.$httpPath.'/index.php?module=save\'">Save Session</button>
				<button onclick="window.location.href=\''.$httpPath.'/pages/manualSessionDestroy.php\'">Emergency stop</button>
				<button onclick="window.location.href=\''.$httpPath.'/index.php?module=websocket\'">Websocket</button>
			</div>';

	// Pages
	if ($module == 'none'){
		require ('pages/welcome.php');
	}

	if ($module == 'start'){
		echo '<div id="stats"><script>refreshStats()</script></div>';
		echo '<div id="status"><script>refreshStats()</script></div>';
	}

	if ($module == 'websocket'){
		echo '<div id="message"></div>';
	}   

// Footer
   echo '	<footer class="footer">Php Controller - <a href="https://www.phpcontroller.org">www.phpcontroller.org</a> - 2019</p></footer>
		</body>
	</html>';
?>
