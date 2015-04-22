<?php

function connect() {
	$link=mysqli_connect("localhost", "root", "Sylvanus") or die("connecting the database failed");
	mysqli_select_db($link, "Project") or die("selecting the database failed");
	mysqli_query($link, "set names 'utf8'");
	return $link;
}

function insertBook($link, $table, $array) {
	$keys="aggregate, inventory";
	$values=$array['number'].", ".$array['number'];
	foreach ($array as $key => $value) {
		switch ($key) {
			case 'ISBN':
			case 'year':
			case 'price':
				$keys.=", ".$key;
				$values.=", ".$array[$key];
				break;
			case 'title';
			case 'author':
			case 'category':
			case 'press':
				$keys.=", ".$key;
				$values.=", '".$array[$key]."'";
				break;
		}
	}
	$sql="insert into {$table} ($keys) values({$values})";
	mysqli_query($link, $sql);
	return mysqli_insert_id($link);
}

function insertCard($link, $table, $array){
	$keys=join(", ",array_keys($array));
	$values=$array['card_num'].", '".$array['name']."', '".$array['department']."', '".$array['category']."'";
	$sql="insert into {$table} ($keys) values({$values})";
	mysqli_query($link, $sql);
	return mysqli_insert_id($link);
}

function update($link, $table, $array, $where=null) {
	foreach ($array as $key=>$value){
		if ($str==null) {
			$sep="";
		} else {
			$sep=", ";
		}
		$str.=$sep.$key."='".$value."'";
	}
	$sql="update {$table} set {$str} ".($where==null ? null : " where ".$where);
	$result=mysqli_query($link, $sql);
	if ($result) {
		return mysqli_affected_rows($link);
	} else {
		return false;
	}
}

function updateNum($link, $table, $num, $ISBN) {
	$sql="update {$table} set aggregate=aggregate+$num, inventory=inventory+$num where ISBN=$ISBN";
	$result=mysqli_query($link, $sql);
	if ($result) {
		return mysqli_affected_rows($link);
	} else {
		return false;
	}
}

function delete($link, $table, $where=null) {
	$where= ($where==null) ? null : " where ".$where;
	$sql="delete from {$table} {$where}";
	mysqli_query($link, $sql);
	return mysqli_affected_rows($link);
}

function fetchOne($link, $sql, $result_type=MYSQL_ASSOC) {
	$result=mysqli_query($link, $sql);
	$row=mysqli_fetch_array($result, $result_type);
	return $row;
}

function fetchAll($link, $sql, $result_type=MYSQL_ASSOC) {
	$result=mysqli_query($link, $sql);
	while (@$row=mysqli_fetch_array($result, $result_type)) {
		$rows[]=$row;
	}
	return $rows;
}

function getResultNum($link, $sql) {
	$result=mysqli_query($link, $sql);
	return mysqli_num_rows($result);
}

function getInsertId() {
	return mysqli_insert_id($link);
}

?>