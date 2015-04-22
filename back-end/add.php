<?php
require_once 'include.php';

$ISBN=$_POST['ISBN'];
$title=$_POST['title'];
$author=$_POST['author'];
$category=$_POST['category'];
$press=$_POST['press'];
$year=$_POST['year'];
$price=$_POST['price'];
$number=$_POST['number'];

$sql="select * from Book where ISBN=$ISBN";
$res=fetchOne($_SESSION['link'], $sql);
if (is_null($res))
	insertBook($_SESSION['link'], "Book", $_POST);
else
	updateNum($_SESSION['link'], "Book", $number, $ISBN);

$sql="select * from Book";
$rows=fetchAll($_SESSION['link'], $sql);

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
								<a href="cardManage.php"><span>Library Cards</span></a>
							</li>
							<li>
								<a href="query.php"><span>Query</span></a>
							</li>
							<li>
								<a href="addBooks.php" class="selected"><span>Add Books</span></a>
							</li>
						</ul>
						<div class="clear"></div>
					</div>
					<div id="submenu">
						<div class="modules_left">
						</div>
						<div class="title">
							Book List
						</div>
						<div class="modules_right">
						</div>
					</div>
					<div id="out" class="success">
						<div class="tl"></div><div class="tr"></div>
						<div class="desc">
							<center>Add the book successfully!</center>
						</div>
						<div class="bl"></div><div class="br"></div>
					</div>
					<div id="desc">
						<div class="body">
							<div class="col w10 last">
								<div class="content">
									<div id="table" class="help">
									<h1>Book List:</h1>
									<div class="col w10 last">
										<div class="content">
											<table>
												<tr>
													<th class="checkbox"><input type="checkbox" name="checkbox" /></th>
													<th>ISBN</th>
													<th>Title</th>
													<th>Author</th>
													<th>Category</th>
													<th>Press</th>
													<th>Year</th>
													<th>Price</th>
													<th>Aggregate</th>
													<th>Inventory</th>
												</tr>
												<?php
												foreach ($rows as $row) {
												?>
												<tr>
													<td class="checkbox"><input type="checkbox" name="checkbox" /></td>
													<td> <?php echo $row['ISBN'] ?> </td>
													<td> <?php echo $row['title'] ?> </td>
													<td> <?php echo $row['author'] ?> </td>
													<td> <?php echo $row['category'] ?> </td>
													<td> <?php echo $row['press'] ?> </td>
													<td> <?php echo $row['year'] ?> </td>
													<td> <?php echo $row['price'] ?> </td>
													<td> <?php echo $row['aggregate'] ?> </td>
													<td> <?php echo $row['inventory'] ?> </td>
												</tr>
												<?php
												}
												?>
											</table>
											<br>
											<a href="addBooks.php" class="button"><small class="icon previous_track"></small><span>Back</span></a>
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