<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>
<?php
	
	
			if(isset($_POST["view"])) { //should have the specific order stored
				$xml = simplexml_load_file('ordersInformation.xml');
				
				foreach($xml->order as $order) { //find order
					if (strcmp($order->orderId, $_POST["orderid"]) == 0) { //set variables
						$orderid = $order->orderId;
						$customerid = $order->customerId;
						$product = $order->product;
					//	$oldtype = $order->type;
						$oldsize = $order->size;
						$oldquantity = $order->quantity;
					
						
						$xml->asXML('ordersInformation.xml');
					}	
				}
				
			}
			
			if(isset($_POST["save"])) {
				if (strcmp($product, "empty") != 0) {
					header('location:orderList.php');
				}
				
				$orderid = $_POST["orderid"];
				$customerid = $_POST["customerid"];
				$product = $_POST["product"];
				//$newtype = $_POST["type"];
				$newsize = $_POST["size"];
				$newquantity = $_POST["quantity"];
				
				$xml = simplexml_load_file('ordersInformation.xml');
				
				foreach($xml->order as $order) {
					if(strcmp($order->orderId, $orderid) == 0) {
					//	$order->type = $newtype;
						$order->size = $newsize;
						$order->quantity = $newquantity;
						
						$xml->asXML('ordersInformation.xml');
						
						// Go back to order profile list
						header('location:orderList.php');
						
						
					}
				}
				
				
			}
			
			
			
			
		//}
		
		
		if ($_SERVER['REQUEST_METHOD'] == 'GET') {
			if (isset($_GET["delete"])) {
				$id = $_GET["delete"]; //order id
				
				$xml = simplexml_load_file('ordersInformation.xml');

					
				//removes node completely since no products
				foreach($xml->order as $order) {
					if ($order->orderId == $id) {
						$dom = dom_import_simplexml($order);
						$dom->parentNode->removeChild($dom);
					}
				}
				
				$product = "empty";
				$orderid = "None";
				$customerid = "None";
				
				$xml->asXML('ordersInformation.xml');
			}
		}
?>
<html lang = "en">
	<head>
		<title>Edit Order Profile</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<style>
			* {
				box-sizing: border-box;
			}
			
			html {
				height: 100%;
			}
			
			body {
				margin: 0;
				background-color: #d3ffd3;
				height: 100%;
			}
			
			/*for smaller screens*/
			[class*="col-"]{
				float:left;
				width: 100%;
			}
			
			@media only screen and (max-width: 600px) {
				*for smaller screens*/
				.sidebar {
					width: 100%;
					
				}
				
				.page {
					width: 100%;
				}
				
				.edittitle { /*title*/
					height: 50px;
				}
				
				img {
					width: 100%;
				}
			}
			
			@media only screen and (min-width: 601px) {
				/*for tablets and up?*/
				.sidebar {
					float:left;
					width: 15%;
					position: fixed;
					height: 100%;
				}
				
				.page {
					margin-left: 16%;
				}
				
				.edittitle { /*title*/
					height: 150px;
				}
				
				img {
					width: 75%;
				}
				
			}
					
			
			/*backstore sidebar*/
			.sidebar {
				background-color: #f1f1f1;
				margin: 0;
				padding: 0;
			}
			
			.sidebar ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				overflow: auto;
			}
			
			.sidebar li a {
				display: block;
				color: #000;
				padding: 8px 16px;
				text-decoration:none;
			}
			
			.sidebar li a.active {
				background-color: #4CAF50;
				color: white;
			}
			
			.sidebar li a:hover:not(.active) {
				background-color: #555;
				color: white;
			}
			
			/*edit page*/
			.page {
				padding: 1px 16px;
			}
			
			
			/*order profile*/
			.info > div {
				background: white;
				border: 1px solid green;
				margin-bottom: 5%;
			}
			
			/*user information*/
			.user table {
				margin: 10px;
			}
			
			.user tr {
				width: 100%;
			}
			
			.user td {
				width: 50%;
			}
			
			.user span {
				color: #4CAF50;
			}
			
			/*order information*/
			.order table {
				margin: 10px;

			}
			
			.order tr {
				text-align: center;
				width: 100%;
			}
			
			.order tr:nth-child(odd) {
				background: #f6f7f9;
			}
			
			.order tr:hover {
				background: #e9f9ca;
			}
			
			img { /*product image*/
				height: auto;
				padding: 5px;
			}
			
			select {
				border: none;
				border-radius: 4px;
				border: 1px solid #7ba92c;
				color: #f6f4f2;
				background-color:#87c212;
				width: 100%;
				margin-bottom: 5px;
			}
			
			/*quantity buttons*/
			.qty {
				text-align: center;
				margin-left: 10%;
				margin-right: 10%;
			}
			
			.qty input[type=button] {
				border: none;
				border-radius: 4px;
				border: 1px solid #7ba92c;
				text-align: center;
				color: #f6f4f2;
				background-color: #87c212;
				width: 25%;
				padding: 0;
			}
			
			.qty input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
			.qty input[type=text] {
				border: none;
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
				border-radius: 4px;
				border: 1px solid #7ba92c;
				background-color: red;
				padding: 5px;
				width: 75%;
			}
			
			.delete input[type=button]:hover {
				background-color: #ffdfc2;
			}
			
			.firstTr {
				border: 1px solid #d6dfe6;
				background: linear-gradient(to bottom, #f3f8fc, #ebf4f9, #e3f1fa, #e0f0fd, #d8e9fd);
			}
			
			.firstTr th {
				border-right: 2px solid rgba(209, 218, 223, 0.4);
			}
			
			/*save button*/
			.save {
				margin: auto;
				width: 100px;
			}
			.save input[type=button] {
				width: 100px;
				height: 30px;
				margin-bottom: 50px;
				border: 1px solid #7ba92c;
				border-radius: 4px;
				color: #fff;
				font-weight: bold;
				background: #87c212;
			}
			
			
			
		</style>
	</head>
	<body>
			<div class ="sidebar">
				<ul>
					<li><a href="backstoreProductList.php">Product List</a><li>
					<li><a href="UserList.php">User List</a><li>
					<li><a class="active" href="orderList.php">Order List</a><li>
					<li><a href="">Analysis</a><li>
					<li><a href="">Marketing</a><li>
					<li><a href="frontstoreHomepage.php">Exit back store</a><li>
				</ul>
			</div>
			
			
			<div class ="page">
				<form action = "" method ="POST">
				<div class="edittitle"><h1>Edit Order Profile</h1></div>
				<div class = "info">
					<h3>Order Information</h3>
					<div class = "user"> 
						<table>
							<tr>
								<td style="padding-right:20px;">
								<span>Order ID:</span> 
								<?php echo $orderid ?>
								</td>
								<td><span>Customer ID:</span> 
								<?php echo $customerid ?></td>
							</tr>
						</table>
					</div>
					<h3>Order Information</h3>
					<div class ="order">
						<table class="order" width="95%">
							<tr class ="firstTr" width="100%">
								<th width="40%">Product Name</th>
								<th width="40%">Edit Options</th>
								<th width="20%">Delete</th>
							</tr>
							
							<?php
							if (strcmp($product, "empty") !=0) {
							?>
							
							<tr>
								<td><?php echo $product ?></td>
								<td>
									<!--<form action = "" method ="POST">-->
									<!--	Type:<input type = "text" name = "type" value ="<?php echo $oldtype; ?>">
										<br /><br /> -->
									
										<select name = "size">
											<option value = "small"
											<?php if ($oldsize == "small") { echo " selected=\"selected\""; }?>
											>Small</option>
											<option value = "medium"
											<?php if ($oldsize == "medium") { echo " selected=\"selected\""; }?>
											>Medium</option>
											<option value = "large"
											<?php if ($oldsize == "large") { echo " selected=\"selected\""; }?>
											>Large</option>
										</select>
									
									<div class = "qty">
											QTY: <input type = "text" name = "quantity" value ="<?php echo $oldquantity; ?>">
									</div>
									</form>
								</td>
								<td>
									<div class = "delete">
									
									<?php
										echo "<form method = \"GET\" style =\"margin-top:30%\">";
										//delete button
										echo "<button><a href=\"?delete=", $orderid, "\" style=\"text-decoration:none;color:black;\">Delete</a></button>";
										echo "</form>";
									?>
									</div>
								</td>
							</tr>
							
							<?php
								}
								else {
									echo "<tr><td colspan=\"3\">Order will be deleted.</td></tr>";
								}
							?>
							
							
						</table>
					</div>	
				</div>
				<div class ="save">
					<!--<form action = "4try.php" method="POST">-->
						<input type ="hidden" name="orderid" value="<?php echo $orderid; ?>">
						<input type ="hidden" name="customerid" value="<?php echo $customerid; ?>">
						<input type ="hidden" name="product" value="<?php echo $product; ?>">
						<input type="submit" name = "save" value="Save">
					<!--</form>-->
				</div>
				</form>
			</div>
			
			
	</body>
</html>





