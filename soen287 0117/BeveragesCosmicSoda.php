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
		<a href = "AislesBeverages.html" class = "previous">&laquo; Go Back to Beverages</a>
		
		<!-- Main Body -->
		<div class = "grid-container">
			<!-- Product Image -->
			<div>
				<img src="cosmic-soda.jpg"
				style = "max-width:100%" height=200px
				alt="cosmic soda">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="cosmic-soda.jpg" />
					<input type = "hidden" name = "pname" value ="Cosmic Soda" />
					<input type = "hidden" name = "pprice" value = "2.99" />
					<h3>Cosmic Soda</h3>
					<p>$2.99 ea.</p>
					
					<!-- Select Quantity -->
					<label for="quantity">Quantity:</label>
                    <select id="CosmicSodaselect1"name="quantity">
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
					<input type = "hidden" name = "size" value ="" />
					<p />
					
					<!-- Select Type -->
					<label for="type">Type:</label>
                    <select id="CosmicSodaselect2"name="type">
                        <option value="rcola">Cola</option>
                        <option value="gingerAle">Ginger Ale</option>
						<option value="rootBeer">Root Beer</option>
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
					Bubbly and refreshing, it's perfect for cooling off on a summer day.
					<br> Available in a variety of flavours.
					<br> Warning: Contains moon dust.
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Moon
                        <br>Product Number: 501420167242
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
var CosmicSodaselect1 = document.getElementById('CosmicSodaselect1');
var CosmicSodaselect2 = document.getElementById('CosmicSodaselect2');


if(!localStorage.getItem('CosmicSodaselect1')) {
populateStorage();
} else {
setStyles();
}

function populateStorage() {
localStorage.setItem('CosmicSodaselect1', document.getElementById('CosmicSodaselect1').value);
localStorage.setItem('CosmicSodaselect2', document.getElementById('CosmicSodaselect2').value);


setStyles();
}

function setStyles() {
var currentCosmicSodaselect1 = localStorage.getItem('CosmicSodaselect1');
var currentCosmicSodaselect2 = localStorage.getItem('CosmicSodaselect2');


document.getElementById('CosmicSodaselect1').value = currentCosmicSodaselect1;
document.getElementById('CosmicSodaselect2').value = currentCosmicSodaselect2;



}

CosmicSodaselect1.onchange = populateStorage;
CosmicSodaselect2.onchange = populateStorage;
		</script>
	</body>
</html>
