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

$_SESSION['plc_power'] = 0;
$_SESSION['plc_coreRunning'] = 0;

unlink($path.'/scripts/plc/coreInExecution');
unlink($path.'/scripts/plc/mqttInExecution');
require($path.'/scripts/plc/plc_unsetStats.php');

exec('pkill php > /dev/null 2>&1 &');

session_destroy();
error_reporting(0);
?>
