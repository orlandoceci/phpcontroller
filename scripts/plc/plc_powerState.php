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

if ($_SESSION['plc_power'] == 1){
	$link_img = 'scripts/images/start_green.png';
} else {
	$link_img = 'scripts/images/start_off.png';
}

echo '<div id="div-startPlc">
		<script type="text/javascript">
			function doChangingState() {
				$.ajax({
					type: "GET",
					url: "scripts/plc/plc_settingState.php",
					async: false,
					data: {id:id},
					success: function() {
						$("#div-startPlc").load(location.href + " #div-startPlc > *");
					}
				});
				return false;
			}
		</script>
		<center>
			<table>
				<tr>
					<td height="80">
						<div id="status" align="center" style="overflow: auto">
							<img src="'.$link_img.'" width="60"><br>
							CORE STATUS: '.$_SESSION['plc_power'].'
						</div>
					</td>
				</tr>
				<tr>
					<td height="40">
						<center>
							<a id="button-power" onclick="doChangingState();">
								<button class="pcButton">On / Off</button>
							</a>
						</center>
					</td>
				</tr>
			</table>
		</center>
	</div>';
?>
