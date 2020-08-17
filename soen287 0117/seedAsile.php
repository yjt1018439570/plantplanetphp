<?php
	session_start();
	//add links to product pages
	
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
<!--p2-->
<html>
	<head>
		<title>Misc Aisle</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
		
			* {
				box-sizing: border-box;
			}

			.row::after {
				content: "";
				clear: both;
				display: table;
			}

			[class*="col-"] {
				float: left;
				padding: 15px;
			}

			html {
				color: #a0afa0;
				font-family: 'Times New Roman', serif;
				background-color: #d3ffd3;
			}

			/*header*/
			.header {
				background-color: #e9ffd3;
				text-align: center;
				padding: 15px;
			}

			/*navigation bar*/
			.nav ul {
				list-style-type: none;
				overflow: hidden;
				background-color: #a0afa0;
				padding: 0;
				margin: 0;
			}
				
			.nav li a {
				display: block;
				float: left;
				text-align: center;
				text-decoration: none;
				color: #f6f4f2;
				background-color: #a0afa0;
				padding: 5px;
			}
						
			.nav li a:hover{
				background-color: #ceb599;
			}
			
			/*aisle title*/
			.aislename {
				text-align: left;
				color: #546254;
				font-size: large;
				font-family: 'Lucida Sans Unicode', sans-serif;
				margin-left: 20px;
			}
			
			/*product preview container*/
			.products {
				display: grid;
				grid-template-columns: auto auto;
				word-break: break-word;
				grid-gap: 5px;
				margin: 5px;
			}
			
			.products > a {
				display: block;
				text-decoration: none;
			}
			
			.products > a > div {
				display: grid;
				grid-template-columns: 30% auto;
				grid-gap: 5px;
				background-color: #e7ffe7;
				padding: 10px;
			}
			
			.products > a > div:hover {
				background-color: #c0ffc0;
			}
			
			
			
			/*footer*/
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
			
			/* for phones*/
			[class*="col-"] {
				width: 100%;
			}
			
			@media only screen and (max-width: 767px) {
				/*for mobile*/
				.products {
					display: block;
				}
				
				.aislename {
					text-align: center;
					font-size: xx-large;
				}
				
				.pname {
					font-size: large;
				}

			}
			
			@media only screen and (min-width: 768px) and (max-width: 1023px) {
				/*for tablets*/
				.products {
					display: block;
					margin: 2px;
				}
				
				.pname {
					font-size: xx-large;
				}
				
				.pinfo {
					font-size: x-large;
				}
				
				.aislename {
					text-align: center;
					font-size: xx-large;
				}
			}
			
			
			@media only screen and (min-width: 1024px) {
				/* for desktop: */
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
				
				.pname {
					font-size: xx-large;
				}
				
				.pinfo {
					font-size: x-large;
				}
				
				.aislename {
					font-size: xx-large;
				}
			}
			
			.pimage img { /*product image*/
				height: auto;
				max-width: 100%;
				padding: 2px;
			}
			
			.pname { /*product name*/
				color: #546254;
			}
			
			.pinfo { /*product info*/
				color: #ceb599;
			}
			
			/*next/last page buttons*/
			.pages input[type=button] {
				border: none;
				text-align: center;
				color: #f6f4f2;
				background-color:#a0afa0;
				margin-top: 10px;
				padding: 10px;
			}
			
			.pages input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
			/*aisle menu*/
			.menu {
				background-color: #f6f4f2;
				padding: 10px;
				margin: 20px;
			}
			
			.menu ul {
				list-style-type: none;
				margin: 0;
				padding:5px;
			}
			
			.menu li {
				margin-bottom: 5px;
			}
			
			.menu li a {
				text-decoration:none;
				color: #546254;
				font-size: larger;
				padding: 5px;
			}
			
			.menu li a:hover{
				color: #ceb599;
			}

			/* Next button */
			
			.next
			{
				background-color:grey;
				color:white;
				padding: 8px 16px;
			}

			a:hover
			{
				background-color: gainsboro;
			}
			
		</style>
	</head>
	<body>
		<hgroup>
			<div class="header">
				<h1>Planting Planets</h1>
			</div>
			<div class ="nav">
				<ul>
					<li><a href ="frontstoreHomepage.php">Home</a></li>
					<li><a href ="register.php">Register</a></li>
					<li><a href ="login.php">Log In</a><li>
					<li><a href="profile.php">Profile</a></li>
					<li style="float:right"><a href="ShoppingCart.php">Shopping Cart</a></li>
				</ul>
			</div>
		</hgroup>
		
		<div class = "aislename">
			<h4>AISLE: Seeds & Fertilizer</h4>
		</div>

		<div class="row">
			<div class="col-3"> <!--aisle menu-->
				<div class = "menu">
					<h4 style="text-align:center;">AISLE MENU</h4>
					<ul>
						<li><a href ="seedAsile.php">Seeds &amp; Fertilizer</a></li>
						<li><a href="AislesBeverages.php">Beverages</a></li>
						<li><a href="FruitsandVegetablesAislePage.phpl">Fruits &amp; Vegetables</a></li>
						<li><a href="MiscAisle.php">Misc</a></li>
					</ul>
				</div>
			</div>
			
			<div class="col-9" style="margin-bottom:50px;">
				<div class = "products"> <!--insert link to specific product here-->
					<a href= "product1Description.php"><div>
						<div class = "pimage">
							<img src ="seed pet.jpg">
						</div>
						<div>
							<div class = "pname">Seed pets</div>
							<div class = "pinfo">2kg/each<br />$499.00</div>
						</div>
					</div></a>
					<a href= "product2Description.php"><div>
						<div class = "pimage">
							<img src ="seed.jpg">
						</div>
						<div>
							<div class = "pname">Seed for MarsTree</div>
							<div class = "pinfo">10g/each<br />$29.99</div>
						</div>
					</div></a>
					<a href= "product3Description.php"><div>
						<div class = "pimage">
							<img src ="fertilizer.jpg">
						</div>
						<div>
							<div class = "pname">Fertilizer for seed from Mars</div>
							<div class = "pinfo">10kg/each<br />$24.99</div>
						</div>
					</div></a>
					<a href= "product4Description.php"><div>
						<div class = "pimage">
							<img src ="petfertilizer.jpg">
						</div>
						<div>
							<div class = "pname">Fertilizer for seed pet</div>
							<div class = "pinfo">5kg/each<br />$49.99</div>
						</div>
					</div></a>
				</div>
				<div class = "pages">
					<form action = "">
						<a href="seedAislePage2.php" input type = "button" class="next" style="float:right;margin-right:5px;">Next Page &raquo;</a>
				</form>
				</div>
			</div>
		</div>

		<div class="footer">
			<p>Copyright &copy; 2020 Planting Planets SOEN 287</p>
		</div>
		

	</body>
</html>



