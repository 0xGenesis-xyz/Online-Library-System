<?php
require_once 'include.php';

$ID=$_POST['username'];
$password=$_POST['password'];
$UorA=$_POST['UorA'];

if ($UorA=="admin") {
	$sql="select * from Administer where ID={$ID}";
	$row=fetchOne($_SESSION['link'], $sql);
	if (!$row)
		alertMes("ID not exists！", "index.php");
	else if ($row['password']!=$password)
		alertMes("Wrong password, please try again！", "index.php");
	else {
		$_SESSION['adminID']=$row['ID'];
		$_SESSION['adminName']=$row['name'];
		alertMes("SUCCESS", "back_end.php");
	}
} else
	alertMes("The website is under construction.", "index.php");

?>