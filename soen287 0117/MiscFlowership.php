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
				<img src="flowership.png"
				style = "max-width:100%" height=200px
				alt="Flowership">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="flowership.png" />
					<input type = "hidden" name = "pname" value ="Flowership" />
					<input type = "hidden" name = "pprice" value = "15.00" />
					<h3>Flowership</h3>
					<p>$15.00/each</p>
					
					<!-- Select Quantity -->
					<label for = "quantity">Quantity: </label>
					<select name = "quantity" id = "Flowershipselect1">
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
					<label for = "size">Size:</label>
					<select name="size" id = "Flowershipselect2">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>
					<p />
					
					<!-- Select Type -->
					<label for="type">Colour:</label>
                    <select name="type" id = "Flowershipselect3">
                        <option value="Green">Green</option>
						<option value="Blue">Blue</option>
						<option value="Maroon">Maroon</option>
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
					Levitating flowerpot to add more life to the mothership.
					<br />
					Recommended to be surveilled at all times.
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Jupiter
						<br>Product Number: 424
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
			var Flowershipselect1 = document.getElementById('Flowershipselect1');
			var Flowershipselect2 = document.getElementById('Flowershipselect2');
			var Flowershipselect3 = document.getElementById('Flowershipselect3');

			if(!localStorage.getItem('Flowershipselect1')) {
				populateStorage();
			} else {
				setStyles();
			}

			function populateStorage() {
				localStorage.setItem('Flowershipselect1', document.getElementById('Flowershipselect1').value);
				localStorage.setItem('Flowershipselect2', document.getElementById('Flowershipselect2').value);
				localStorage.setItem('Flowershipselect3', document.getElementById('Flowershipselect3').value);

				setStyles();
			}

			function setStyles() {
				var currentFlowershipselect1 = localStorage.getItem('Flowershipselect1');
				var currentFlowershipselect2 = localStorage.getItem('Flowershipselect2');
				var currentFlowershipselect3 = localStorage.getItem('Flowershipselect3');

				document.getElementById('Flowershipselect1').value = currentFlowershipselect1;
				document.getElementById('Flowershipselect2').value = currentFlowershipselect2;
				document.getElementById('Flowershipselect3').value = currentFlowershipselect3;
			}

			Flowershipselect1.onchange = populateStorage;
			Flowershipselect2.onchange = populateStorage;
			Flowershipselect3.onchange = populateStorage;
			
		</script>
	</body>
</html>
