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
	session_destroy();

	if (file_exists('../scripts/plc/coreInExecution')){
		unlink('../scripts/plc/coreInExecution');
		unlink('../scripts/plc/mqttInExecution');
	}
	
	$url = "http://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	$link = substr($url, 0, (strlen($url)-25));
	echo '<html>
		<head>
			<style>
				a.button::before {
					-webkit-border-radius: 3px;
					-moz-border-radius: 3px;
					-webkit-box-shadow: #959595 0 2px 5px;
					-moz-box-shadow: #959595 0 2px 5px;
					border-radius: 3px;
					box-shadow: #959595 0 2px 5px;
					content: "";
					display: block;
					height: 100%;
					left: 0;
					padding: 2px 0 0;
					position: absolute;
					top: 0;
					width: 100%;
				}
	
				a.button:active::before {
					padding: 1px 0 0;
				}

				a.button {
					-moz-box-shadow: inset 0 0 0 1px #63ad0d;
					-webkit-box-shadow: inset 0 0 0 1px #63ad0d;
					-moz-border-radius: 3px;
					-webkit-border-radius: 3px;
					background: #eee;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#eee), to(#e2e2e2));
					background: -moz-linear-gradient(#eee, #e2e2e2);
					background: linear-gradient(#eee, #e2e2e2);
					border: solid 1px #d0d0d0;
					border-bottom: solid 3px #b2b1b1;
					border-radius: 3px;
					box-shadow: inset 0 0 0 1px #f5f5f5;
					color: #555;
					display: inline-block;
					font: bold 12px Arial, Helvetica, Clean, sans-serif;
					margin: 0 25px 25px 0;
					padding: 10px 20px;
					position: relative;
					text-align: center;
					text-decoration: none;
					text-shadow: 0 1px 0 #fafafa;
				}

				a.button:hover {
					background: #e4e4e4;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#e4e4e4), to(#ededed));
					background: -moz-linear-gradient(#e4e4e4, #ededed);
					background: linear-gradient(#e4e4e4, #ededed);
					border: solid 1px #c2c2c2;
					border-bottom: solid 3px #b2b1b1;
					box-shadow: inset 0 0 0 1px #efefef;
				}

				a.button:active {
					background: #dfdfdf;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#dfdfdf), to(#e3e3e3));
					background: -moz-linear-gradient(#dfdfdf, #e3e3e3);
					background: linear-gradient(#dfdfdf, #e3e3e3);
					border: solid 1px #959595;
					box-shadow: inset 0 10px 15px 0 #c4c4c4;
					top:2px;
				}

				a.button.orange {
					background: #feda71;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#feda71), to(#febe4d));
					background: -moz-linear-gradient(#feda71, #febe4d);
					background: linear-gradient(#feda71, #febe4d);
					border: solid 1px #eab551;
					border-bottom: solid 3px #b98a37;
					box-shadow: inset 0 0 0 1px #fee9aa;
					color: #996633;
					text-shadow: 0 1px 0 #fedd9b;
				}

				a.button.orange:hover {
					background: #fec455;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#fec455), to(#fecd61));
					background: -moz-linear-gradient(#fec455, #fecd61);
					background: linear-gradient(#fec455, #fecd61);
					border: solid 1px #e6a93d;
					border-bottom: solid 3px #b98a37;
					box-shadow: inset 0 0 0 1px #fedb98;
				}

				a.button.orange:active {
					background: #f9bd4f;
					background: -webkit-gradient(linear, 0 0, 0 bottom, from(#f9bd4f), to(#f0b64d));
					background: -moz-linear-gradient(#f9bd4f, #f0b64d);
					background: linear-gradient(#f9bd4f, #f0b64d);
					border: solid 1px #a77f35;
					box-shadow: inset 0 10px 15px 0 #dba646;
				}
			</style>
		</head>
		<body style="background-color:#fff;">
			<img src="../scripts/images/splashscreen.jpg" height="60%" width="auto" />
			<div style="line-height: 150%; font-family: Arial;">
				<center>
					<h1 style="color:#0b476b;">Php Controller</h1>
					<font color="#000" size="2em">Session: </font><font color="#6e292e" size="2em">STOPPED</font>
					<br>
					<font color="#000" size="2em">Data: </font><font color="#6e292e" size="2em">All data CLEARED</font>
				</center>
			</div>

			<center>
				<a href="../index.php" class="button orange">START NEW SESSION</a>
			</center>
		</body>
	</html>';
?>
