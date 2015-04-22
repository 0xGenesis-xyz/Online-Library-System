<?php
require_once 'include.php';

$ID=$_POST['userID'];
$password=$_POST['password'];

$sql="select * from Administer where ID={$ID}";
$row=fetchOne($_SESSION['link'], $sql);
if (!$row)
	alertMes("ID not exists！", "adminLogin.php");
else if ($row['password']!=$password)
	alertMes("Wrong password, please try again！", "adminLogin.php");
else {
	$_SESSION['adminID']=$row['ID'];
	$_SESSION['adminName']=$row['name'];
	alertMes("SUCCESS", "back_end.php");
}

?>