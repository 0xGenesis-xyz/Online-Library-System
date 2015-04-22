<?php
require_once('include.php');
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
								<a href="query.php" class="selected"><span>Query</span></a>
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
							Query
						</div>
						<div class="modules_right">
						</div>
					</div>
					<div id="desc">
						<div class="body">
							<div class="col w10 last">
								<div class="content">
									<div class="col w4"></div>
									<div class="col w5 last">
										<div class="content">
											<form action="searchBooks.php" method="post">
												<p>
													<label for="simple_input">Title:</label>
													<input type="text" name="title" value="" class="text w_21" />
													<br />
												</p>
												<p>
													<label for="simple_input">Author:</label>
													<input type="text" name="author" value="" class="text w_21" />
													<br />
												</p>
												<p>
													<label for="simple_input">Category:</label>
													<input type="text" name="category" value="" class="text w_21" />
													<br />
												</p>
												<p>
													<label for="simple_input">Press:</label>
													<input type="text" name="press" value="" class="text w_21" />
													<br />
												</p>
												<p>
													<label for="simple_input">Year:</label>
													<input type="text" name="yearL" value="" class="text w_9" /> - <input type="text" name="yearR" value="" class="text w_9" />
													<br />
												</p>
												<p>
													<label for="simple_input">Price:</label>
													<input type="text" name="priceL" value="" class="text w_9" /> - <input type="text" name="priceR" value="" class="text w_9" />
													<br />
												</p>
												<p>
													<label for="simple_input">sort by:</label>
													<select name="keyword" id="select">
														<option value="ISBN">ISBN</option>
														<option value="title" selected="selected">title</option>
														<option value="author">author</option>
														<option value="category">category</option>
														<option value="press">press</option>
														<option value="year">year</option>
														<option value="price">price</option>
														<option value="aggregate">aggregate</option>
														<option value="inventory">inventory</option>
													</select>
													<input name="AorD" id="radio" value="asc" type="radio" checked="checked" />ascending<br />
													<input name="AorD" id="radio" value="desc" type="radio" />descending<br />
												</p>
												<p class="last">
													<input type="submit" value="Login" class="novisible" />
													<a href="" class="button form_submit"><small class="icon looking_glass"></small><span>Search</span></a>
													<br />
												</p>
											</form>
										</div>
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