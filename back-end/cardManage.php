<?php
require_once 'include.php';
if (empty($_SESSION['adminID']))
	alertMes("Please login first!", "adminLogin.php");
?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		<meta name="keywords" content="" />
		<meta name="description" content="" />
		<title>Online Library Management System</title>
		<link rel="stylesheet" href="css/style.css" type="text/css" media="screen" charset="utf-8" />
		<script src="js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/global.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/modal.js" type="text/javascript" charset="utf-8"></script>
		<script src="js/jquery.leanModal.min.js" type="text/javascript" charset="utf-8"></script>

		<script>
			$(document).ready(function(){
				$("#out").fadeOut(2000);
			});
		</script>
	</head>
	<body>
		<div id="header">
			<div class="col w5 bottomlast">
				<a href="" class="logo">
					<img src="images/logo.gif" alt="Logo" />
				</a>
			</div>
			<div class="col w5 last right bottomlast">
				<p class="last">Welcome <span class="strong"><?php echo $_SESSION['adminName']; ?></span>, Logged in as <span class="strong">Admin</span>, <a href="adminLogin.php">Logout</a></p>
			</div>
			<div class="clear"></div>
		</div>
		<div id="wrapper">
			<div id="minwidth">
				<div id="holder">
					<div id="menu">
						<div id="left"></div>
						<div id="right"></div>
						<ul>
							<li>
								<a href="back_end.php"><span>Welcome</span></a>
							</li>
							<li>
								<a href="bookManage.php"><span>Borrow/Return</span></a>
							</li>
							<li>
								<a href="cardManage.php" class="selected"><span>Library Cards</span></a>
							</li>
							<li>
								<a href="query.php"><span>Query</span></a>
							</li>
							<li>
								<a href="addBooks.php"><span>Add Books</span></a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div id="submenu">
						<div class="modules_left">
						</div>
						<div class="title">
							Library Cards
						</div>
						<div class="modules_right">
						</div>
					</div>
					<?php
					if ($_SESSION['Message']=="PLUS") {
					?>
					<div id="out" class="success">
						<div class="tl"></div><div class="tr"></div>
						<div class="desc">
							<center>Add a library card successfully!</center>
						</div>
						<div class="bl"></div><div class="br"></div>
					</div>
					<?php
						unset($_SESSION['Message']);
					} elseif ($_SESSION['Message']=="MINUS") {
					?>
					<div id="out" class="success">
						<div class="tl"></div><div class="tr"></div>
						<div class="desc">
							<center>Delete the library card successfully!</center>
						</div>
						<div class="bl"></div><div class="br"></div>
					</div>
					<?php
						unset($_SESSION['Message']);
					}
					?>
					<div id="desc">
						<div class="body">
							<div class="col w2">
								<div class="content">
									<div class="box header">
										<div class="head"><div></div></div>
										<h2>Management</h2>
										<div class="desc">
											<ul>
												<li> <a href="register.php" title=" Add a Library Card" class="modal">Add</a> </li>
												<li> <a href="resign.php" title=" Delete a Library Card" class="modal">Delete</a> </li>
											</ul>
										</div>
										<div class="bottom"><div></div></div>
									</div>
								</div>
							</div>
							<div class="col w8 last">
								<div class="content">
									<div id="table" class="help">
										<h1>Library Cards:</h1>
										<div class="col w10 last">
											<div class="content">
												<table>
													<tr>
														<th class="checkbox"><input type="checkbox" name="checkbox" /></th>
														<th>Card Number</th>
														<th>Name</th>
														<th>Department</th>
														<th>Category</th>
													</tr>
													<?php
													$sql="select * from Card";
													$rows=fetchAll($_SESSION['link'], $sql);
													foreach ($rows as $row) {
													?>
													<tr>
														<td class="checkbox"><input type="checkbox" name="checkbox" /></td>
														<td> <?php echo $row['card_num'] ?> </td>
														<td> <?php echo $row['name'] ?> </td>
														<td> <?php echo $row['department'] ?> </td>
														<td> <?php echo $row['category'] ?> </td>
													</tr>
													<?php
													}
													?>
												</table>
											</div>							
										</div>
										<div class="clear"></div>
									</div>
								</div>
								<div class="clear"></div>
							</div>
							<div class="clear"></div>
						</div>
						<div class="clear"></div>
						<div id="body_footer">
							<div id="bottom_left"><div id="bottom_right"></div></div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="footer">
			<p class="last">Copyright 2015 - Sylvanus - Email: <a herf="mailto:sylvanuszhy@gmail.com">sylvanuszhy@gmail.com</a></p>
		</div>		
	</body>
</html>