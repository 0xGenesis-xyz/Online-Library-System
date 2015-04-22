<?php
require_once 'include.php';

$cardNum=$_POST['card_num'];
$name=$_POST['name'];
$department=$_POST['department'];
$category=$_POST['category'];

$sql="select * from Card where card_num=$cardNum";
$res=fetchOne($_SESSION['link'], $sql);
if (is_null($res)) {
	insertCard($_SESSION['link'], "Card", $_POST);
	alertMes("PLUS", "cardManage.php");
} else
	alertMes("Library card already exists!", "cardManage.php");

?>