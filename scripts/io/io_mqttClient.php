<?php
/*
Copyright (c) 2013, Michael Maclean <mgdm@php.net>
All rights reserved.

Redistribution and use in source and binary forms, with or without
modification, are permitted provided that the following conditions are met:
    * Redistributions of source code must retain the above copyright
      notice, this list of conditions and the following disclaimer.
    * Redistributions in binary form must reproduce the above copyright
      notice, this list of conditions and the following disclaimer in the
      documentation and/or other materials provided with the distribution.
    * Neither the name of the <organization> nor the
      names of its contributors may be used to endorse or promote products
      derived from this software without specific prior written permission.

THIS SOFTWARE IS PROVIDED BY THE COPYRIGHT HOLDERS AND CONTRIBUTORS "AS IS" AND
ANY EXPRESS OR IMPLIED WARRANTIES, INCLUDING, BUT NOT LIMITED TO, THE IMPLIED
WARRANTIES OF MERCHANTABILITY AND FITNESS FOR A PARTICULAR PURPOSE ARE
DISCLAIMED. IN NO EVENT SHALL <COPYRIGHT HOLDER> BE LIABLE FOR ANY
DIRECT, INDIRECT, INCIDENTAL, SPECIAL, EXEMPLARY, OR CONSEQUENTIAL DAMAGES
(INCLUDING, BUT NOT LIMITED TO, PROCUREMENT OF SUBSTITUTE GOODS OR SERVICES;
LOSS OF USE, DATA, OR PROFITS; OR BUSINESS INTERRUPTION) HOWEVER CAUSED AND
ON ANY THEORY OF LIABILITY, WHETHER IN CONTRACT, STRICT LIABILITY, OR TORT
(INCLUDING NEGLIGENCE OR OTHERWISE) ARISING IN ANY WAY OUT OF THE USE OF THIS
SOFTWARE, EVEN IF ADVISED OF THE POSSIBILITY OF SUCH DAMAGE.

--- EDITED BY ORLANDO CECI ---
*/
$dir = realpath(dirname(__FILE__).'/../plc');
$enableMqtt = fopen($dir.'/mqttInExecution', 'w');
$txt = $argv[1].' - '.$argv[2].' - '.$argv[3].' - '.$argv[4].' - '.$argv[5];
fwrite($enableMqtt, $txt);
fclose($enableMqtt);

$broker = [$argv[1], $argv[2]];
$user = $argv[3];
$passwd = $argv[4];
$topic = [$argv[5], 1];

$client = new Mosquitto\Client();
$client->onConnect('connect');
$client->onDisconnect('disconnect');
$client->onSubscribe('subscribe');
$client->onMessage('message');
$client->setCredentials($user, $passwd);
$client->connect($broker[0], $broker[1], 60);
$client->subscribe($topic[0], $topic[1]);

while(file_exists($dir.'/coreInExecution')){
	$client->loop();
	//sleep(1);
}

$client->disconnect();
unset($client);
 
function connect($r) {
//	echo "I got code {$r}\n";
}

function subscribe() {
//	echo "Subscribed to a topic\n";
}
 
function message($message) {
//	printf("\nGot a message on topic %s with payload:%s", $message->topic, $data);
	$data = $message->payload;
	$dir = realpath(dirname(__FILE__));
	exec('php '.$dir.'/io_mqttOperations.php '.$data);
}
 
function disconnect() {
//	echo "Disconnected cleanly\n";
	$dir = realpath(dirname(__FILE__).'/../plc');
	unlink($dir.'/mqttInExecution');
}
