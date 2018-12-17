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

// Data sending via AJAX request from client browser to the web server
echo '<script type="text/javascript">
	function changeValue(var, value) {
		$.ajax({
			type: "GET",
			url: "'.$_SESSION['root_http'].'/scripts/custom/work/changeValue.php?var=" + var + "&value=" + value,
			async: false,
			data: {id:id},
			success: function() {
				$("#led").load(location.href + " #led > *");
			}
		});
		return false;
	}
</script>
<form method="POST">
	<input type="range" name="slider" value="'.$_SESSION['var1'].'" step="0.1" onChange="changeValue(\'var1\', this.value)" min="0" max="100"/>
</form>';
?>
