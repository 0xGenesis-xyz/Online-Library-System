<?php
require_once('include.php');
unset($_SESSION['adminID']);
unset($_SESSION['adminName']);
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>Online Library System</title>
		<link rel="stylesheet" href="css/index.css" type="text/css" media="screen" charset="utf-8" />
	</head>
	<body>
		<div class="page-container">
			<p style="font-size: 45px; font-family: Helvetica">Welcome to Online Library</p>
			<a href="#"><img src="images/userlogo.png"></a>
            <div id="userlogo">
				User Login
			</div>
            <form action="doLogin.php" method="post">
            	<input type="text" name="username" class="inputT" id="user">
            	<input type="password" name="password" class="inputT" id="key">
                <br><br>&nbsp;&nbsp;&nbsp;
                <input name="UorA" id="radio" value="user" type="radio" checked="checked" />user&nbsp;&nbsp;&nbsp;
				<input name="UorA" id="radio" value="admin" type="radio" />admin<br>
                <button type="submit">Login</button>
                <div class="error"><span>+</span></div>
            </form>
        </div>
	</body>
</html>