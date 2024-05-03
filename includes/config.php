<?php
define("DB_USERNAME", 'urgenqtx_user');
define("DB_PASSWORD", 'RLP@#$kd1984');
define("DB_DNAME", 'urgenqtx_live');
define("DB_HOST", 'localhost');


$con = new mysqli(DB_HOST, DB_USERNAME, DB_PASSWORD, DB_DNAME);
if ($con->connect_errno > 0) {
	die('Unable to connect to database [' . $dbquery->connect_error . ']');
}

function redirect_to($url)
{
	echo '<script>window.location = "' . $url . '";</script>';
}
