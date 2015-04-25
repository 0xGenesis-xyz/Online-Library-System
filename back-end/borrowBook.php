<?php
require_once('include.php');

$bookNum=$_POST['bookNum'];
$cardNum=$_SESSION['userID'];

$sqlBook="select * from Book where ISBN=$bookNum and inventory>0";
var_dump($sqlBook);
echo "aa<br>";
$certainBook=fetchOne($_SESSION['link'], $sqlBook);
echo mysqli_error($_SESSION['link'])."<br>";

if (is_null($certainBook)) {
	$sqlDate="select * from Record where ISBN=$bookNum and return_date is null Order By due_date";
	var_dump($sqlDate);
	echo "aa<br>";
	$res=fetchOne($_SESSION['link'], $sqlDate);
	echo mysqli_error($_SESSION['link'])."<br>";

	$sqlBook="select * from Book where ISBN=$bookNum";
	$resBook=fetchOne($_SESSION['link'], $sqlBook);
	if (is_null($resBook))
		alertMes("The book is not available! Please report to the administer. We will make a purchase as soon as possible.", "borrow.php");
	else
		alertMes("The book is not available! The latest due date is ".$res['due_date'].".", "borrow.php");
} else {
	$sqlBook="select * from Record where ISBN=".$bookNum." and card_num=".$cardNum." and return_date is null";
	var_dump($sqlBook);
	echo "aa<br>";
	$theBook=fetchOne($_SESSION['link'], $sqlBook);
	echo mysqli_error($_SESSION['link'])."<br>";
	if (!is_null($theBook))
		alertMes("You have already borrow one!", "record.php");
	else {
		$sql="update Book set inventory=inventory-1 where ISBN=$bookNum";
		var_dump($sql);
		echo "aa<br>";
		$result=mysqli_query($_SESSION['link'], $sql);
		echo mysqli_error($_SESSION['link'])."<br>";

		$sql="insert into Record (ISBN, card_num, loan_date, handler_id) values ($bookNum, $cardNum, '".date("Y-m-d")."', ".$_SESSION['adminID'].")";
		var_dump($sql);
		echo "aa<br>";
		$result=mysqli_query($_SESSION['link'], $sql);
		echo mysqli_error($_SESSION['link'])."<br>";

		$nid=mysqli_insert_id($_SESSION['link']);
		$sql="update Record set due_date=DATE_ADD(loan_date, INTERVAL 60 DAY) where record_num=$nid";
		var_dump($sql);
		echo "aa<br>";
		$result=mysqli_query($_SESSION['link'], $sql);
		echo mysqli_error($_SESSION['link'])."<br>";
		alertMes("PLUS", "record.php");
	}
}

?>