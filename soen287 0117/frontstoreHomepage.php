<?php
	session_start();
	
	
	//for now access through localhost/frontstoreHomepage.php
		//have xxamp running
	
	//set session variables
	if(!isset($_SESSION['names'])){
		$_SESSION['names'] = array(); //name of products
		$_SESSION['qtys'] = array(); //product quantities
		$_SESSION['prices'] = array(); //product prices
		$_SESSION['images'] = array(); //product images
		$_SESSION['sizes'] = array(); //product sizes
		$_SESSION['types'] = array();	//product types
	}	
	
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>P1 - Homepage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type="text/css">
			
			* {
				box-sizing: border-box;
			}
			
			.header{
			text-align:center;
			color:white;
			font-size:20px;
			background-image: url("banner.jpg");
			padding:75px;
			background-size:cover;
			}
			
			
			.navbar{
				background-color: #A0AFA0;
				overflow:hidden;
			}
			
			.navbar a{
				float:left;
				font-size:18px;
				text-align:center;
				color:white;
				padding:20px 20px;
				text-decoration: none;
				
			}
			
			.navbar a:hover{
				background-color: #CEB599;
			}
			
			.homeTitle {
				text-align:left;
				font-size:large;
				margin-left:20px;
			}
			
			.container::after {
				content: "";
				clear: both;
				display: table;
			}
			
			[class*="col-"] {
				float: left;
				padding: 15px;
			}
			
			[class*="col-"] {
				width: 100%;
			}
		
			
			
			
			
			.main {
				height:400px;
				
			}
			
			
			.mainSection {
				background-color:white;
				padding:10px;
				font-size:18px;
				border-color:black;
				margin:20px;
				box-sizing: border-box;
			}
			
			.menu {
				background-color:white;
				font-size:18px;
				color:black;
				padding:10px;
				margin-top:20px;
				box-sizing: border-box;
			}
			
			@media only screen and (min-width: 768px) {
				.col-1 {width: 8.33%;}
				.col-2 {width: 16.66%;}
				.col-3 {width: 25%;}
				.col-4 {width: 33.33%;}
				.col-5 {width: 41.66%;}
				.col-6 {width: 50%;}
				.col-7 {width: 58.33%;}
				.col-8 {width: 66.66%;}
				.col-9 {width: 75%;}
				.col-10 {width: 83.33%;}
				.col-11 {width: 91.66%;}
				.col-12 {width: 100%;}
				
				
			}
			
			.menu h2 {
				text-align:center;
			}
			
			.menu a {
				text-decoration: none;
				color:black;
			}
			
			.menu a:hover {
				Color: #ceb599;
			}
			
			/*
			.footer {
			position:fixed;bottom:0;left:0;right:0;height:30px;
			text-align:right;
			color:white;
			padding:8px;
			background-color:black;
			margin-top:20px;
			}
			*/
			
			.footer {
				position: fixed;
				bottom: 0;
				left: 0;
				right: 0;
				width: 100%;
				color: white;
				background-color: black;
				text-align: right;
				font-size: smaller;
				padding: 0;
			}
		</style>
	</head>
	<body style = "background-color:#D3FFD3">
		<!-- HEADER/BANNER SECTION -->
		<div class="header">
			<h1>Planting Planets</h1>
			<p>Connecting planets, one grocery at a time</p>
		</div>
		
		<!-- NAVIGATION BAR SECTION -->
		<div class="navbar">
			<a href="frontstoreHomepage.php">Home</a>
			<a href ="register.php">Register</a>
			<a href ="login.php">Log In</a>
			<a href="profile.php">Profile</a>
			<a href="ShoppingCart.php" style="float:right">Shopping Cart</a>
		</div>
		
		
		
		<!-- HOME PAGE TITLE-->
		<div class="homeTitle">
			<h1>HOME</h1>
		</div>
		
		<div class = "container">
			<div class = "col-3">
				<div class="menu">
					<!-- MENU SECTION-->
					<h2>Aisles Menu</h2>
					<ul>
						<li><a href ="seedAsile.html">Seeds &amp; Fertilizer</a></li>
						<li><a href="AislesBeverages.html">Beverages</a></li>
						<li><a href="FruitsandVegetablesAislePage.html">Fruits &amp; Vegetables</a></li>
						<li><a href="MiscAisle.html">Misc</a></li>
						
					</ul>
				</div>
			</div>
			<div class = "col-9">
				<div class="main">
					<div class="mainSection">
						<!-- MAIN SECTION-->
						<h2>Our motto</h2>
						<p>At Planting Planets, we strive to offer all our customers stellar, high-quality products that meets planetary standards. 
						From freshly picked produce to carefully packaged goods, we carry a variety of products to satisfy anyone's extraterrestrial needs.
						We firmly believe in connecting planets, one grocery at a time!</p>
					</div>
				</div>
			</div>
		</div>
		
		<div class = "footer">
			<p>Copyright &copy; 2020 Planting Planets SOEN 287</P>
		</div>
	</body>
</html>

