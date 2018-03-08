<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8" />
		<title><?php echo $title; ?></title>
		<link rel="stylesheet" type="text/css" href="styles/stylesheet.css" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0" />	
	</head>
	<body>
		<div id="wrapper">
			<div id="banner">
				
			</div>
			<nav id="navigation">
				<ul id="nav">
					<li><a href="index.php">Home</a></li>
					<li><a href="cake.php">Cake</a></li>
					<li><a href="#">Shop</a></li>
					<li><a href="#">About</a></li>
					<?php
					if(isset($_SESSION['status'])){
					if($_SESSION['status']){
					echo '<li><a href="management.php">Management</a></li>';
					}}
					?>
				</ul>
			</nav>
			<div id="content_area">
				<?php echo $content; ?>
			</div>
			<div id="sidebar">
				<?php
					if(isset($_SESSION['w'])){
						include_once    "{$_SESSION['w']}.php";
					}else{
						include_once "loginW.php";
					}
				?>
			</div>
			
			<footer>
				<p>All rights reserved</p>
			</footer>
		</div>
	</body>
</html>