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

if (isset($_SESSION['plc_coreRunning']) && $_SESSION['plc_coreRunning']==1){
	$_SESSION['plc_coreRunning'] = 0;
	$_SESSION['plc_power'] = 0;
	exec('pkill php > /dev/null 2>&1 &');
	require('scripts/plc/plc_settingState.php');
}

session_destroy();

error_reporting(0);
session_id('phplcSession');   
session_start();

if(isset($_SESSION['plc_coreRunning'])){
	$_SESSION['status_sessionClear'] = '<font color="red">CLOSING SESSION ERROR!</font>';
	$_SESSION['link_statusImg'] = 'scripts/images/status_wrong.png';  
} else {
	$_SESSION['status_sessionClear'] = 'Session cleared';   
	$_SESSION['link_statusImg'] = 'scripts/images/status_ok.png'; 
}

// Graphics
$_SESSION['link_uploadImg'] = 'scripts/images/database_upload.png';

echo '<div id="div-status"><center><table><tr>';
echo '<td><img src="'.$_SESSION['link_uploadImg'].'" width="40" height="40"></td>';
echo '<td><img src="'.$_SESSION['link_statusImg'].'" width="40" height="40"></td>';
echo '</tr></table>';
echo '<table><tr>';
echo '<td><center><b>DATA STATUS</b></center></td></tr><tr>';
echo '<td>Session: <b>'.$_SESSION['status_sessionClear'].'</b></td></tr>';
echo '</table></center></div>';
?>
