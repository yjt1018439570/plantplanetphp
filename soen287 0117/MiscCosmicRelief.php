<?php
	session_start();
	
	//check hrefs

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Product Description Page</title>
		<style type = "text/css">

			body
			{
				background-color:white;
			}

			/* Header */
			
			.header
			{
		   
			text-align: left;
			background-image:url(https://images.unsplash.com/photo-1539321908154-04927596764d?ixlib=rb-1.2.1&auto=format&fit=crop&w=755&q=80);
			color:white;
			font-size: 20px;
			}

			.footer
			{
				position: fixed;
				left:0;
				bottom:0;
				width:100%;
				background-color:bisque;
				color:black;
				text-align:right;
				font-size:6px;
			}
			
			.button1
			{
				text-align: center;
				padding: 0px 32ps;
			}

			a
			{
				text-decoration: none;
				display: inline-block;
				padding: 8px 16px;
			}

			a:hover
			{
				background-color:blanchedalmond;
				color: black;
			}

			.previous
			{
				background-color: white;
				color: black;
			}
			
			.grid-container
			{
				display: grid;
				justify-content: space-evenly;
				grid-template-columns: auto auto;
				grid-template-rows: auto auto;
				grid-gap: 10px;
				padding: 10px;
				color:black;
			}

			.grid-container > div
			{   
			   text-align: left;
			}

			* 
			{
			 box-sizing: border-box;
			}

			#more
			{
				display: none;
			}

			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				}

			li {
			display: inline;
			background-color: bisque;
			padding-top: 9px;
			padding-bottom: 9px;
			}
		</style>
	</head>
	<body>
		<!-- Header -->
		<header class = "header">
			<h1 style = "font-size:10vw">Planting Planets</h1>
		</header>
		
		<!-- Menu -->
		<ul>
			<li><a href="frontstoreHomepage.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="ShoppingCart.php">Shopping Cart</a></li>
		</ul>
		
		<!-- Button to go to appropriate aisle -->
		<a href = "MiscAisle.html" class = "previous">&laquo; Go Back to Misc</a>
		
		<!-- Main Body -->
		<div class = "grid-container">
			<!-- Product Image -->
			<div>
				<img src="cosmic.png"
				style = "max-width:100%" height=200px
				alt="Cosmic Relief">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="cosmis.png" />
					<input type = "hidden" name = "pname" value ="Cosmic Relief" />
					<input type = "hidden" name = "pprice" value = "10.99" />
					<h3>Cosmic Relief</h3>
					<p>$10.99/each</p>
					
					<!-- Select Quantity -->
					<label for="quantity">Quantity:</label>
                    <select id="CosmicReliefselect1"name="quantity">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
					<p />
					
					<!-- Select Size -->
					<label for="size">Size:</label>
                    <select id="CosmicReliefselect2"name="size">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select> 
					<p />
					
					<!-- Select Type -->
					<label for="type">Design:</label>
                    <select id="CosmicReliefselect3"name="type">
                        <option value="leopard">Leopard Print</option>
						<option value="ashy">Ashy Asteroid</option>
						<option value="stylish">Stylish Satellite</option>
                    </select>
					<p />
					
					<!-- Add to Cart Button -->
					<input type ="submit" name = "addButton" value = "Add to Cart" />
				</form>
			</div>
			
			<div>
				<!-- More Description -->
				<br>
				<b>Product Description: </b><br><br>
				<p>
					15 minutes with this hat on and consider yourself well-rested for a light-year! <br /> Based on human design.
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Earth
                        <br>Product Number: 426
					</span>
				</p>
				
				<div>
					<button onclick="myFunction()" id="myBtn">More Description</button>
				</div>
			</div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		
		<!-- Footer -->
		<footer class = "footer">
			<h1>Copyright Planting Planets SOEN 287</h1>
		</footer>
		
		
		<script>
		<!--JavaScript for More Description -->
			function myFunction() {
				var dots = document.getElementById("dots");
				var moreText = document.getElementById("more");
				var btnText = document.getElementById("myBtn");

				if (dots.style.display === "none") {
					dots.style.display = "inline";
					btnText.innerHTML = "More Description"; 
					moreText.style.display = "none";
				} else {
					dots.style.display = "none";
					btnText.innerHTML = "Less Description"; 
					moreText.style.display = "inline";
				}
			}
		
		<!-- JavaScript for Page Refresh -->
			var CosmicReliefselect1 = document.getElementById('CosmicReliefselect1');
			var CosmicReliefselect2 = document.getElementById('CosmicReliefselect2');
			var CosmicReliefselect3 = document.getElementById('CosmicReliefselect3');

			if(!localStorage.getItem('CosmicReliefselect1')) {
				populateStorage();
			} else {
				setStyles();
			}

			function populateStorage() {
				localStorage.setItem('CosmicReliefselect1', document.getElementById('CosmicReliefselect1').value);
				localStorage.setItem('CosmicReliefselect2', document.getElementById('CosmicReliefselect2').value);
				localStorage.setItem('CosmicReliefselect3', document.getElementById('CosmicReliefselect3').value);

				setStyles();
			}

			function setStyles() {
				var currentCosmicReliefselect1 = localStorage.getItem('CosmicReliefselect1');
				var currentCosmicReliefselect2 = localStorage.getItem('CosmicReliefselect2');
				var currentCosmicReliefselect3 = localStorage.getItem('CosmicReliefselect3');

				document.getElementById('CosmicReliefselect1').value = currentCosmicReliefselect1;
				document.getElementById('CosmicReliefselect2').value = currentCosmicReliefselect2;
				document.getElementById('CosmicReliefselect3').value = currentCosmicReliefselect3;


			}

			CosmicReliefselect1.onchange = populateStorage;
			CosmicReliefselect2.onchange = populateStorage;
			CosmicReliefselect3.onchange = populateStorage;
			
		</script>
	</body>
</html>
