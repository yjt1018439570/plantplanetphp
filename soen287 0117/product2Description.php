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
		<a href = "seedAsile.html" class = "previous">&laquo; Go Back to Seeds &amp; Fertilizer</a>
		
		<!-- Main Body -->
		<div class = "grid-container">
			<!-- Product Image -->
			<div>
				<img src="seed.jpg"
            style="max-width:100%" height=200px
            alt="seed for MarsTree">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="seed.jpg" />
					<input type = "hidden" name = "pname" value ="Seed for MarsTree" />
					<input type = "hidden" name = "pprice" value = "29.99" />
					<h3>Seed for MarsTree</h3>
					<p>$29.99/10g</p>
					
					<!-- Select Quantity -->
					<label for="quantity">Quantity:</label>
                    <select id="product2select1"name="quantity">
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
                    <select id="product2select2"name="size">
						<option value="0.5m">up to 0.5 meter</option>
                        <option value="1m">up to 1 meter</option>
						<option value="2m">up to 2 meter</option>
                    </select> 
					<p />
					
					<!-- Select Type -->
					<label for="type">Colour:</label>
                    <select id="product2select3"name="type">
                        <option value="green">Green</option>
                        <option value="blue">Blue</option>
						<option value="pink">Pink(limited)</option>
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
					This is a seed for MarsTree from Mars.
                    <br>Suitable for back yards, parks, not recommended for indoor.
                    <br>Recommended for tree lovers.
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Mars.
                        <br>Product caution: the product needs extremly much CO2, special fertilizer is required.
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
var product2select1 = document.getElementById('product2select1');
var product2select2 = document.getElementById('product2select2');
var product2select3 = document.getElementById('product2select3');

if(!localStorage.getItem('product2select1')) {
  populateStorage();
} else {
  setStyles();
}

function populateStorage() {
  localStorage.setItem('product2select1', document.getElementById('product2select1').value);
  localStorage.setItem('product2select2', document.getElementById('product2select2').value);
  localStorage.setItem('product2select3', document.getElementById('product2select3').value);

  setStyles();
}

function setStyles() {
  var currentproduct2select1 = localStorage.getItem('product2select1');
  var currentproduct2select2 = localStorage.getItem('product2select2');
  var currentproduct2select3 = localStorage.getItem('product2select3');

  document.getElementById('product2select1').value = currentproduct2select1;
  document.getElementById('product2select2').value = currentproduct2select2;
  document.getElementById('product2select3').value = currentproduct2select3;


}

product2select1.onchange = populateStorage;
product2select2.onchange = populateStorage;
product2select3.onchange = populateStorage;
		</script>
	</body>
</html>
