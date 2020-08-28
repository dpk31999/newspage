<?php

require_once 'classes/Session.php';

date_default_timezone_set('Asia/Ho_Chi_Minh'); 
$date_current = '';
$date_current = date("Y-m-d H:i:s");

$session = new Session();
$session->start();

if ($session->get() != '')
{
	$user = $session->get();
}
else
{
	$user = '';
}

?>