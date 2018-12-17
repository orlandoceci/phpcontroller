<?php
session_id('phplcSession');   
session_start();

// Data acquisition
$var = $_GET['var'];
$value = $_GET['value'];

// Changing value
$_SESSION[$var] = $value;
?> 
