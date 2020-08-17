<?php
	session_start();
	
	//change hrefs
	
		//make sure it's set?
	if(!isset($_SESSION['names'])){
		$_SESSION['names'] = array();
		$_SESSION['qtys'] = array();
		$_SESSION['prices'] = array();
		$_SESSION['images'] = array();
		$_SESSION['sizes'] = array();
		$_SESSION['types'] = array();
	}
	
	if ($_SERVER['REQUEST_METHOD'] == 'POST') { //if page accessed through post (add to cart)
		if (isset($_POST['addButton'])) { //if add button was clicked
			if ($_POST["quantity"] == 0) { } //do nothing if nothing added (0 quantity)
			elseif (sizeof($_SESSION['names']) == 0) { //if cart empty - add it
				$_SESSION['names'][] = $_POST["pname"];
				$_SESSION['qtys'][] = $_POST["quantity"];
				$_SESSION['prices'][] = $_POST["pprice"];
				$_SESSION['images'][] = $_POST["pimg"];
				$_SESSION['sizes'][] = $_POST["size"];								
				$_SESSION['types'][] = $_POST["type"];	
			}
			else { //if smtg in cart
				$cart_items = sizeof($_SESSION['names']);
				for ($y = 0; $y < $cart_items; $y++) { //loop for similar products (name, size, type)
					if((strcmp($_SESSION['names'][$y], $_POST["pname"]) == 0) && (strcmp($_SESSION['types'][$y], $_POST["type"]) == 0) && (strcmp($_SESSION['sizes'][$y], $_POST["size"]) == 0)) {
						$_SESSION['qtys'][$y] += $_POST["quantity"]; //only change quantity if found
						break; //break once found
					}
					else { //if not found
						if ($y == ($cart_items - 1)){ //if at last index
						$_SESSION['names'][] = $_POST["pname"];
						$_SESSION['qtys'][] = $_POST["quantity"];
						$_SESSION['prices'][] = $_POST["pprice"];
						$_SESSION['images'][] = $_POST["pimg"];
						$_SESSION['sizes'][] = $_POST["size"];
						$_SESSION['types'][] = $_POST["type"];
						}
					}
				}
			}
		} //end of button clicked
	} //end of post request
	
	if ($_SERVER['REQUEST_METHOD'] == 'GET') { //if page accessed through get (delete)
		if (isset($_GET["delete"])) { //if delete button clicked
			$i = $_GET["delete"]; //get index of item
			
			//delete item info
			array_splice($_SESSION['names'], $i, 1);
			array_splice($_SESSION['qtys'], $i, 1);
			array_splice($_SESSION['prices'], $i, 1);
			array_splice($_SESSION['images'], $i, 1);
			array_splice($_SESSION['sizes'], $i, 1);
			array_splice($_SESSION['types'], $i, 1);
			
			//reorder array
			$_SESSION['names'] = array_values($_SESSION['names']);
			$_SESSION['qtys'] = array_values($_SESSION['qtys']);
			$_SESSION['prices'] = array_values($_SESSION['prices']);
			$_SESSION['images'] = array_values($_SESSION['images']);
			$_SESSION['sizes'] = array_values($_SESSION['sizes']);
			$_SESSION['types'] = array_values($_SESSION['types']);
		}
	}//end of get request
	
	
?>
<html>
	<head>
		<title>Shopping Cart</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style type = "text/css">
		
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
			
			/*shopping cart title*/
			.shop {
				text-align: left;
				color: #546254;
				font-size: large;
				font-family: 'Lucida Sans Unicode', sans-serif;
				margin-left: 20px;
			}
						
			.cart ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
			}

			.cart li {
                display: grid;
                grid-template-columns: 20% auto 30% 20%;
                grid-gap: 2px;
                word-break: break-word;
                background-color: #e7ffe7;
                margin-bottom: 5px;
			}
			
			.cart li:hover {
				background-color: #c0ffc0;
			}
			
			.cart li div {
				padding: 5px;
			}
			
			.footer {
				background-color: #e9ffd3;
				text-align: center;
				font-size: smaller;
				padding: 5px;
			}

			/*for phones: */
			[class*="col-"] {
				width: 100%;
			}
			
			@media only screen and (max-width: 767px) {
			/*for phones(landscape)*/
				.shop {
					text-align: center;
					font-size: xx-large;
				}
			}

			@media only screen and (min-width: 768px) and (max-width: 1023px) {
				/*for tablets*/
				.pname {
					font-size: x-large;
				}
				
				.pinfo, .oname {
					font-size: large;
				}
				
				.shop {
					font-size: xx-large;
				}
			}
			
			@media only screen and (min-width: 1024px) {
				/*for desktop*/
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
					font-size: x-large;
				}
				
				.pinfo {
					font-size: large;
				}
				
				.shop {
					font-size: xx-large;
				}
			}
			
			/*cart product details*/
			.pimage img { /*product image*/
				height: auto;
				width: 100%;
				padding: 2px;
			}
			.pname { /*product name*/
				color: #546254;
			}
			
			.pinfo, .pprice { /*product info*/
				color: #ceb599;
			}
			
			.ptype select { /*product type*/
				border: none;
				color: #f6f4f2;
				background-color: #a0afa0;
				width: 100%;
			}
			
			.psize select { /*product size*/
				border: none;
				color: #f6f4f2;
				background-color: #a0afa0;
				width: 100%;
			}
			
			.qprice { /*product price considering quantity*/
				color: #546254;
				font-weight: bold;
				text-align: center;
			}
			
			/*quantity buttons*/
			.qty {
				text-align: center;
				margin-left: 10%;
				margin-right: 10%;
			}
			
			.qty input[type=button] {
				border: none;
				text-align: center;
				color: #f6f4f2;
				background-color: #a0afa0;
				width: 75%;
				padding: 2px;
				margin-top: 5px;
			}
			
			.qty input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
			.qty input[type=text] {
				border-width: 1px;
				border-color: #f6f4f2;
				text-align: center;
				width: 25%;
				color: #546254;
				background-color: #f6f4f2;
			}
			
			/*delete button*/
			.delete {
				text-align: center;
			}
			
			.delete input[type=button] {
				color: #f6f4f2;
				border: none;
				background-color: #ffc58f;
				margin-top: 20%;
				padding: 5px;
				width: 75%;
			}
			
			.delete input[type=button]:hover {
				background-color: #ffdfc2;
			}
			
			/*order summary*/
			.sum {
				background-color: #f6f4f2;
				padding-top: 5px;
				padding-bottom: 5px;
				margin: 20px;
			}
			
			.sum ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
			}
			
			.sum li {
				display: grid;
				grid-template-columns: 20% auto 30%;
				grid-gap: 2px;
				word-break: break-word;
				padding: 5px;
			}
			
			
			.sum li div {
				padding: 2px;
			}
			
			.oname {
				color: #546254;
			}
			
			.tqty {
				color: #546254;
			}
			
			.tprice, .tproducts, .tpriceafter {
				text-align: right;
				color: #546254;
			}
			
			/*Total Cost Button*/
			.tcost {
				text-align:right;
			}
			
			.tcost input[type=button] {
				border: none;
				text-align: center;
				color: #f6f4f2;
				background-color: #a0afa0;
				width: 100%;
				padding: 5px;
			}
			
			.tcost input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
			span.type {
				color: #ceb599;
				font-size: smaller;
			}
			
			/*continue shopping button*/
			.continue {
				text-align: center;
			}
			
			.continue input[type=button] {
				border: none;
				text-align: center;
				color: #f6f4f2;
				background-color: #a0afa0;
				width: 40%;
				padding: 5px;
			}
			
			.continue input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
		</style>
	</head>
	<body>
		<hgroup>
			<div class ="header">
				<h1>Planting Planets</h1>
			</div>
			
			<!--navigation bar -->
			<div class = "nav">
				<ul>
					<li><a href ="frontstoreHomepage.php">Home</a></li>
					<li><a href ="register.php">Register</a></li>
					<li><a href ="login.php">Log In</a><li>
					<li><a href="profile.php">Profile</a></li>
					<li style="float:right"><a href="ShoppingCart.php">Shopping Cart</a></li>
				</ul>
			</div>
		</hgroup>
		
		<div class = "shop">
			<h4>My Shopping Cart</h4>
		</div>
		
		<!--cart list -->
		<div class="row">
			<div class = "col-8 cart">
				<!--car items here in unordered list-->
				<ul>
					<?php
						if(sizeof($_SESSION['names']) == 0) { //if nothing in cart
							echo "<p class = \"shop\">Empty!</>";
						}
						else { //if smtg in cart
							for ($x = 0; $x < sizeof($_SESSION['names']); $x++) { //loops to display one item at a time							
								echo "<li>";
								//product image
								echo "<div class = \"pimage\"><img src =\"", $_SESSION['images'][$x], "\" alt=\"", $_SESSION['names'][$x], "\"></div>";
								
								//product info
								echo "<div>";
								echo "<div class = \"pname\">", $_SESSION['names'][$x], "</div>";
								echo "<div class = \"pprice\">", $_SESSION['prices'][$x], "</div>";
								echo "<div class = \"ptype\">", $_SESSION['types'][$x], "</div>";
								echo "<div class = \"psize\">", $_SESSION['sizes'][$x], "</div>";
								echo "</div>";
								
								//quantity and total product price
								echo "<div>";
								echo "<form action = \"\">";
								echo "<div class = \"qty\">";
								echo "<label>QTY: <input type = \"text\" class = \"equantity\" value =", $_SESSION['qtys'][$x], "></label>";
								echo "<br />";
								echo "<input type = \"button\" value=\"Confirm\" onclick =\"calculateProductPrice(", $x, ");\">";
								echo "<div class = \"qprice\">$", ($_SESSION['prices'][$x]*$_SESSION['qtys'][$x]),"</div>";
								echo "</div>";
								echo "<br />";
								echo "</form>";
								echo "</div>";
								
								//delete button
								echo "<div class = \"delete\">";
								echo "<form method = \"GET\" style =\"margin-top:50%\">"; //start of form
								echo "<button><a href=\"?delete=", $x, "\" style=\"text-decoration:none;color:black;\">Delete</a></button>";
								echo "</form>";
								echo "</div>";
							
								echo "</li>";
							}
						}
					?>
				</ul>

			</div>
			
			<!--order summary -->
			<div class="col-4">
				<div class="sum">
					<h4 style = "text-align:center;">Order Summary</h4>
					<ul>
						<!--cart item summaries-->
						<?php
							if (sizeof($_SESSION['names']) == 0) { //if nothing in cart
								echo "<h4 style = \"text-align:center;\">Empty!</>";
							}
							else { //if smtg in cart
								for ($x = 0; $x < sizeof($_SESSION['names']); $x++) { //loops to display one item at a time
									echo "<li>";
									echo "<div class = \"tqty\">x", $_SESSION['qtys'][$x], "</div>";
									echo "<div class =\"oname\">", $_SESSION['names'][$x], "<br/><span class = \"type\">", $_SESSION['types'][$x], " | ", $_SESSION['sizes'][$x], "</span></div>";
									echo "<div class = \"tprice\">$", ($_SESSION['prices'][$x]*$_SESSION['qtys'][$x]), "</div>";
									echo "</li>";
								}
							}
						?>
					</ul>
					<hr>
					
					<!-- Total Info -->
					<ul>
						<!--total products-->
						<li>
							<div></div>
							<div style ="text-align:right;">Total Products</div>
							<div class = "tproducts">
								<?php
									$totalProducts = 0;
									for ($x = 0; $x < sizeof($_SESSION['names']); $x++) {
										$totalProducts += $_SESSION['qtys'][$x];
									}
									echo $totalProducts;
								?>
							</div>
						</li>
						 <!--Total Price Button-->
						<li>
							<div></div>
							<div></div>
							<form action ="">
								<div class = "tcost">
									<input type ="button" value ="Total Price" onclick ="totalPrice();">
								</div>
							</form>
						</li>
						<!--Total Before Tax-->
						<li>
							<div></div>
							<div style="text-align:right;">Total Before Tax</div>
							<div class ="tpriceafter" style="border-bottom:solid 1px black"><span id="tbeforetax">$0.00</span></div>
						</li>
						<!--QST-->
						<li>
							<div></div>
							<div style="text-align:right;">QST</div>
							<div class ="tpriceafter"><span id="tqst">$0.00</span></div>
						</li>
						<!--GST-->
						<li>
							<div></div>
							<div style="text-align:right;">GST</div>
							<div class ="tpriceafter"><span id="tgst">$0.00</span></div>
						</li>
						<!--TOTAL-->
						<li>
							<div></div>
							<div style="text-align:right;font-weight:bold;">TOTAL</div>
							<div class ="tpriceafter"><span id="taftertax">$0.00</span></div>
						</li>
					</ul>
				</div>
				
				<!--Continue Shopping Button-->
				<div class = "continue">
					<form action = "">
						<input type ="button" value="Continue Shopping" onclick = "location.href='frontstoreHomepage.php';">
					</form>
				</div>
			</div>
			
		</div>
		
		<div class="footer">
			<p>Copyright &copy; 2020 Planting Planets SOEN 287</p>
		</div>
		
	</body>
	<script>
	function calculateProductPrice(item) { //item represents the index on the cart starting at 0
	var cart = document.getElementsByClassName("cart")[0]; //cart container class
	
	var productQuantity = cart.getElementsByClassName("equantity")[item].value; //entered quantity once user clicks confirm
	var productPrice = cart.getElementsByClassName("pprice")[item].innerText.replace("$", ""); //price of specific item without the $ sign
	var totalProductPrice = (productQuantity * productPrice).toFixed(2); //total cost for product consideringthe quantity, fixed to 2 numbers after decimal points
	

	cart.getElementsByClassName("qprice")[item].innerText = "$" + totalProductPrice;
	//outputs the result below the confirm button
	
	cartSummary(productQuantity, totalProductPrice, item); //calls function to change quantity/price in the order summary as well
	

}


function cartSummary(quantity, price, index) { //changes values in order summary for products
	var summary = document.getElementsByClassName("sum")[0]; //summary container class
	summary.getElementsByClassName("tqty")[index].innerText = "x" + quantity; //changes value of quantity in order summary
	summary.getElementsByClassName("tprice")[index].innerText = "$" + price; //changes value of total price of product considering quantity in order summary


	var amntOfProducts = summary.getElementsByClassName("tqty"); //array of all the product quantities
	var totalProducts = 0; //initializing
	for (var i = 0; i < amntOfProducts.length; i++) { //for loop to add all the products
		totalProducts += parseInt(amntOfProducts[i].innerText.replace("x", "")); //removes "x" in string, then converts to a number so it could be added instead of catenated
	}
	
	summary.getElementsByClassName("tproducts")[0].innerText = totalProducts; //changes value of total products in order summary

}

function totalPrice() {
	var summary = document.getElementsByClassName("sum")[0]; //summary container class
	
	var allPrices = summary.getElementsByClassName("tprice"); //array of all the product prices
	
	var totalPrice = 0.00; //initializing
	for (var j = 0; j < allPrices.length; j++) { //for loop to add all the prices
		totalPrice += parseFloat(allPrices[j].innerText.replace("$", "")); //removes "$" in string, then converts to a float so it could be added instead of catenated
	}
	
	var qst = (totalPrice*(5/100)).toFixed(2); // calculate qst
	var gst = (totalPrice*(9.975/100)).toFixed(2); // calculate gst
	var totalAfterTax = (parseFloat(totalPrice)+parseFloat(qst)+parseFloat(gst)).toFixed(2);
	
	document.getElementById("tbeforetax").innerHTML = "$" + totalPrice.toFixed(2); // Change total before tax
	document.getElementById("tqst").innerHTML = "$" + qst; // Change QST
	document.getElementById("tgst").innerHTML = "$" + gst; // Change GST
	document.getElementById("taftertax").innerHTML = "$" + totalAfterTax; // Change total after tax
}


calculateProductPrice();
totalPrice();

	</script>
	
	
	

</html>





