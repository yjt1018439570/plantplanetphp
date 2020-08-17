<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>

<?php
	// Starting a session
	
	
	// Check to see if user has entered the editProduct via the Product List
	if(isset($_POST['edit']))
	{
		// Create session variables using the values passed from the Product List page
		$_SESSION['old_productId'] = $_POST['productId'];
		$_SESSION['old_productName'] = $_POST['productName'];
		$_SESSION['old_vendor'] = $_POST['vendor'];
		$_SESSION['old_type'] = $_POST['type'];
		$_SESSION['old_description'] = $_POST['description'];
	}
	// Now process the new information from the user and update the values in the XML file
	else if(isset($_POST['save']))
	{
		// Set variables to the values entered by the user
		$new_productId = $_POST['productId'];
		$new_productName = $_POST['productName'];
		$new_vendor = $_POST['vendor'];
		$new_type = $_POST['type'];
		$new_description = $_POST['description'];
		
		// Open the XML file
		$xml = simplexml_load_file('productInformation.xml');
		
		// Loop through file until you reach the matching product.
		foreach($xml->data as $data)
		{
			// Compare current value being checked with the old values related to the product
			if(strcmp($_SESSION['old_productId'], $data->productId) == 0 && strcmp($_SESSION['old_productName'], $data->productName) == 0 && strcmp($_SESSION['old_vendor'], $data->vendor) == 0 
			&& strcmp($_SESSION['old_type'], $data->type) == 0 && strcmp($_SESSION['old_description'], $data->description) == 0)
			{
				// Now set the values inside the XML file to the new values
				$data->productId = $new_productId;
				$data->productName = $new_productName;
				$data->vendor = $new_vendor;
				$data->type= $new_type;
				$data->description = $new_description;
				
				// Save the XML file
				$xml->asXML('productInformation.xml');
				
				// unset all the session variables before leaving the page
				unset($_SESSION['old_productId']);
				unset($_SESSION['old_productName']);
				unset($_SESSION['old_vendor']);
				unset($_SESSION['old_type']);
				unset($_SESSION['old_description']);
				
				// Return to the product list
				header('location:backstoreProductList.php');
			}
			
		}
	}
	else
	{
		// Force the user to go back to the product list if they try to enter the edit page 
		// anywhere else except from the backstoreProductList page
		header('location:backstoreProductList.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit Product</title>

<style>

body {
  margin: 0;
  background-color: #d3ffd3;
}


.container2 { 
  height: 350px;
  position: relative;
  background: white;
  border: 1px solid green;
}

ul {
  list-style-type: none;
  margin: 0;
  padding: 0;
  width: 15%;
  background-color: #f1f1f1;
  position: fixed;
  height: 100%;
  overflow: auto;
}

li a {
  display: block;
  color: #000;
  padding: 8px 16px;
  text-decoration: none;
}

li a.active {
  background-color: #4CAF50;
  color: white;
}

li a:hover:not(.active) {
  background-color: #555;
  color: white;
}


<!--edit profile-->
.editProfile {
    border: 1px solid #9ac70f;
    padding: 20px;
    margin: 20px;
}

.editProfile form {

}

.editProfile div {
    margin-top: 12px;
    margin-bottom: 12px;
}

.editProfile label {
    width: 200px;
    display: inline-block;
    text-align: right;
}

.editProfile input ,.editProfile select{
    width: 300px;
    height: 30px;
    line-height: 30px;
    border-radius: 4px;
    outline: none;
    padding-left: 10px;
    border: 1px solid #4987c0;
    box-shadow: 1px 1px 1px #99afc4;
}

.editProfile span {
    margin-left: 20px;
    color: #faca0d;
}
.editProfile input[type='submit']{
    margin-left: 150px;
    width: 100px;
    padding: 0 20px;
    height: 30px;
    border: 1px solid #7ba92c;
    border-radius: 4px;
    color: #fff;
    font-weight: bold;
    background:#87c212;
}

</style>
</head>
<body>



<ul>
  <li><a class="active" href="backstoreProductList.php">Product List</a></li>
  <li><a href="UserList.php">User List</a></li>
  <li><a href="orderList.php">Order List</a></li>
  <li><a href="#">Analysis</a></li>
  <li><a href="#">Marketing</a></li>
  <li><a href="frontstoreHomepage.php">Exit back store</a></li>
</ul>

<div style="margin-left:16%;padding:1px 16px;height:150px;">
<h1>Edit Product</h1>
<div class="container">

  </div>
</div>

<div style="margin-left:16%;padding:1px 16px;">
<div class="container2">
            <form method="POST" action="">
             <div class="editProfile">  
                <div>
                    <label for="productId">Product ID: </label>
					<input type="text" name="productId" placeholder="Product ID" value="<?php echo $_SESSION['old_productId'];?>" required>
                </div>
				
                <div>
                    <label for="productName">Product Name: </label>
					<input type="text" name="productName" placeholder="Product Name" value="<?php echo $_SESSION['old_productName'];?>" required>
                </div>
				
                <div>
                    <label for="vendor">Vendor: </label>
					<input type="text" name="vendor" placeholder="Vendor" value="<?php echo $_SESSION['old_vendor'];?>" required>
                </div>

				<div>
                    <label for="type">Type: </label>
					<input type="text" name="type" placeholder="Type" value="<?php echo $_SESSION['old_type'];?>" required>
				</div>
				
				<div>
					<label for="description">Description: </label>
					<input type="text" name="description" placeholder="Description" value="<?php echo $_SESSION['old_description'];?>"required>
				</div> 
				
                <div class="addProduct">
                   <input type="submit" value="Save" name="save">
                </div> 
            </form>
        </div>
</div>

</body>


</body>
</html>
