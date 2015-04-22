<?php
require_once 'include.php';

$cardNum=$_POST['card_num'];

$sql="select * from Card where card_num=$cardNum";
$res=fetchOne($_SESSION['link'], $sql);
if (is_null($res))
	alertMes("Library card not exists!", "cardManage.php");
else {
	delete($_SESSION['link'], "Card", "card_num=$cardNum");
	alertMes("MINUS", "cardManage.php");
}

?>