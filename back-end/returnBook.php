<?php
require_once('include.php');

$bookNum=$_POST['bookNum'];
$cardNum=$_SESSION['userID'];

$sqlBook="select * from Record where ISBN=".$bookNum." and card_num=".$cardNum." and return_date is null";
var_dump($sqlBook);
echo "aa<br>";
$certainBook=fetchOne($_SESSION['link'], $sqlBook);
echo mysqli_error($_SESSION['link'])."<br>";

if (is_null($certainBook)) {
	alertMes("The book not exists!", "return.php");
} else {
	$sql="update Book set inventory=inventory+1 where ISBN=$bookNum";
	var_dump($sql);
	echo "aa<br>";
	$result=mysqli_query($_SESSION['link'], $sql);
	echo mysqli_error($_SESSION['link'])."<br>";

	$sql="update Record set return_date='".date("Y-m-d")."' where ISBN=".$bookNum." and card_num=".$cardNum;
	var_dump($sql);
	echo "aa<br>";
	$result=mysqli_query($_SESSION['link'], $sql);
	echo mysqli_error($_SESSION['link'])."<br>";
	alertMes("MINUS", "record.php");
}

?>