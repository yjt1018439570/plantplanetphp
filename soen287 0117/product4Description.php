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
				<img src="petfertilizer.jpg"
            style="max-width:100%" height=200px
            alt="seed pet fertilizer">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="petfertilizer.jpg" />
					<input type = "hidden" name = "pname" value ="Fertilizer for seed pet" />
					<input type = "hidden" name = "pprice" value = "49.99" />
					<h3>Fertilizer for seed pet</h3>
					<p>$49.99/5kg</p>
					
					<!-- Select Quantity -->
					<label for="quantity">Quantity:</label>
                    <select id="MarsWaterselect1"name="quantity">
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
                    <select id="product4select2"name="type">
                        <option value="beef">Beef flavour</option>
                        <option value="pork">Pork flavour</option>
						<option value="chicken">Chicken flavour</option>
						<option value="fish">fish flavour</option>
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
					This is pet food for seed pet.
                    <br>Include 80% carbohydrate, 10% protein, 5% fat, 2% vitamins.
                    <br>Recommended for all pets, even for dogs and cats from Earth.
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Pokémon Planet.
                        <br>Product caution: edible for human, but bad taste.
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
var product4select1 = document.getElementById('product4select1');
var product4select2 = document.getElementById('product4select2');


if(!localStorage.getItem('product4select1')) {
  populateStorage();
} else {
  setStyles();
}

function populateStorage() {
  localStorage.setItem('product4select1', document.getElementById('product4select1').value);
  localStorage.setItem('product4select2', document.getElementById('product4select2').value);


  setStyles();
}

function setStyles() {
  var currentproduct4select1 = localStorage.getItem('product4select1');
  var currentproduct4select2 = localStorage.getItem('product4select2');


  document.getElementById('product4select1').value = currentproduct4select1;
  document.getElementById('product4select2').value = currentproduct4select2;



}

product4select1.onchange = populateStorage;
product4select2.onchange = populateStorage;
		</script>
	</body>
</html>
