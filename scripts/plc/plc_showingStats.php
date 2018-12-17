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

echo '<table>
		<tr>
			<td><font color="#000"><b>PLC STATUS</b></font></td>
		</tr>';
if (file_exists('coreInExecution')){
	echo'<tr>
			<td><font size="1"><em>(statistics for last 1000 cycles)</em></font></td>
		</tr>
	</table>
	<table>
		<tr>
			<td>Refreshing setup:</td><td>'.number_format(($_SESSION['controLogiClock']), 3).' s</td>
		</tr>
		<tr>
			<td>Actual cycle:</td><td>'.$_SESSION['plc_cycle'].'</td>
		</tr>
		<tr>
			<td>Average time cycle:</td><td>'.number_format($_SESSION['plc_refreshingTimeAvarage'], 3).' s</td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
	</table>
	<table>';
} else{
	echo '<tr>
			<td><em>...no statistics to show<em></td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>';
}
echo '	<tr>
			<td>Custom scripts:</td><td>'.$_SESSION['customScripts'].'</td>
		</tr>
		<tr>
			<td height="10"></td>
		</tr>
	</table>';
?> 
