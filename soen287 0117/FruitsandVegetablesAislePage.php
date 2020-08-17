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
		<title>Fruits &amp; Vegetables</title>
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
			<h4>AISLE: Fruits &amp; Vegetables</h4>
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
                    
                    <!-- Digital Grapes-->
					<a href= "DigitalGrapes.php"><div>
						<div class = "pimage">
							<img src ="https://images.unsplash.com/photo-1515778767554-42d4b373f2b3?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60">
						</div>
						<div>
							<div class = "pname">Digital Grapes</div>
							<div class = "pinfo">200grams/each<br />$3.00</div>
						</div>
                    </div></a>
                    
                    <!-- Black Hole Coconut-->
					<a href= "BlackHoleCoconut.php"><div>
						<div class = "pimage">
                            <img src ="https://images.unsplash.com/photo-1580984969071-a8da5656c2fb?ixlib=rb-1.2.1&ixid=eyJhcHBfaWQiOjEyMDd9&auto=format&fit=crop&w=800&q=60">
						</div>
						<div>
							<div class = "pname">Black Hole Coconut</div>
							<div class = "pinfo">3kg/each<br />$15</div>
						</div>
                    </div></a>
                    
					<a href= "MilkyWayCarrots.php"><div>
                        
                        <div class = "pimage">
							<img src ="data:image/jpeg;base64,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">
						</div>
						<div>
                            <div class = "pname">Milky Way Carrots</div>
							<div class = "pinfo">500grams/each<br />$20.00</div>
						</div>
					</div></a>
					<a href= "StrengthSpinach.php"><div>
						<div class = "pimage">
							<img src="data:image/jpeg;base64,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"alt="StrengthSpinach"alt="StrengthSpinach"<div>
						</div>
						<div>
							<div class = "pname">Strength Spinach</div>
							<div class = "pinfo">200grams/each<br />$8.00</div>
						</div>
					</div></a>
				</div>
				<div class = "pages">
				<form action = "">
						<a href="FruitsandVegetablesAislePage2.php" input type = "button" class="next" style="float:right;margin-right:5px;">Next Page &raquo;</a>
				</form>
				</div>
			</div>
		</div>

		<div class="footer">
			<p>Copyright &copy; 2020 Planting Planets SOEN 287</p>
		</div>
		

	</body>
</html>





