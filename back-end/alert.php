<?php
require_once('include.php');

function alertMes($message, $url) {
	if ($message=="SUCCESS")
		$_SESSION['Message']="SUCCESS";
	elseif ($message=="ERROR")
		$_SESSION['Message']="ERROR";
	elseif ($message=="PLUS")
		$_SESSION['Message']="PLUS";
	elseif ($message=="MINUS")
		$_SESSION['Message']="MINUS";
	else
		echo "<script> alert('{$message}'); </script>";
	echo "<script> window.location='{$url}'; </script>";
}

?>