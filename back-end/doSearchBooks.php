<?php
require_once 'include.php';

$title=$_POST['title'];
$author=$_POST['author'];
$category=$_POST['category'];
$press=$_POST['press'];
$yearL=$_POST['yearL'];
$yearR=$_POST['yearR'];
$priceL=$_POST['priceL'];
$priceR=$_POST['priceR'];

if (is_null($yearL))
	$yearL=0;
if (is_null($yearR))
	$yearR=9999;
if (is_null($priceL))
	$priceL=0.0;
if (is_null($priceR))
	$priceR=9999.9;

if (!is_null($title)) {
	if ($condition=null) {
		$sep="";
	} else {
		$sep=", ";
	}
	$condition.=$sep."title='".$title."'";
}
if (!is_null($author)) {
	if ($condition=null) {
		$sep="";
	} else {
		$sep=", ";
	}
	$condition.=$sep."author='".$author."'";
}
if (!is_null($category)) {
	if ($condition=null) {
		$sep="";
	} else {
		$sep=", ";
	}
	$condition.=$sep."category='".$category."'";
}
if (!is_null($press)) {
	if ($condition=null) {
		$sep="";
	} else {
		$sep=", ";
	}
	$condition.=$sep."press='".$press."'";
}

if ($condition=null) {
	$sep="";
} else {
	$sep=", ";
}
$condition.=$sep."year BETWEEN ".$yearL." AND ".$yearR;
if ($condition=null) {
	$sep="";
} else {
	$sep=", ";
}
$condition.=$sep."price BETWEEN ".$priceL." AND ".$priceR;

$sql="select * from Book where $condition Order By title LIMIT 0,50";
$rows=fetchAll($_SESSION['link'], $sql);

?>