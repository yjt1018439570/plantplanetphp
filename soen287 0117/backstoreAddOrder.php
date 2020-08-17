<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>
<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<style>

body {
  margin: 0;
  background-color: #d3ffd3;
}


.container2 { 
  height: 500px;
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


<!--add product-->
.productAdd {
    border: 1px solid #9ac70f;
    padding: 20px;
    margin: 20px;
}


.productAdd div {
    margin-top: 12px;
    margin-bottom: 12px;
}

.productAdd label {
    width: 200px;
    display: inline-block;
    text-align: right;
}

.productAdd input ,.productAdd select{
    width: 300px;
    height: 30px;
    line-height: 30px;
    border-radius: 4px;
    outline: none;
    padding-left: 10px;
    border: 1px solid #4987c0;
    box-shadow: 1px 1px 1px #99afc4;
}

.productAdd span {
    margin-left: 20px;
    color: #faca0d;
}
.productAdd input[type='button']{
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



<?php

if (isset($_POST['submit']))
{

    $xml = new DomDocument("1.0","UTF-8");
    $xml->load("ordersInformation.xml");

    $orderId = $_POST['orderId'];
    $customerId = $_POST['customerId'];
    $product = $_POST['product'];
    $type = $_POST['product'];
    $size = $_POST['size'];
    $quantity = $_POST['quantity'];

    $rootTag = $xml->getElementsByTagName("document")->item(0);

    $orderTag = $xml->createElement("order");
      $idTag = $xml->createElement("orderId", $_POST['orderId']);
      $customerIdTag = $xml->createElement("customerId", $_POST['customerId']);
      $productTag = $xml->createElement("product", $_POST['product']);
      $sizeTag = $xml->createElement("size", $_POST['size']);
      $quantityTag = $xml->createElement("quantity", $_POST['quantity']);

      $orderTag->appendChild($idTag);
      $orderTag->appendChild($customerIdTag);
      $orderTag->appendChild($productTag);
      $orderTag->appendChild($sizeTag);
      $orderTag->appendChild($quantityTag);
      
    $rootTag->appendChild($orderTag);

    $xml->save("ordersInformation.xml");
      
}


?>

<ul>
  <li><a href="backstoreProductList.php">Product List</a></li>
  <li><a href="UserList.php">User List</a></li>
  <li><a class="active" href="orderList.php">Order List</a></li>
  <li><a href="#">Analysis</a></li>
  <li><a href="#">Marketing</a></li>
  <li><a href="frontstoreHomepage.php">Exit back store</a></li>
</ul>

<div style="margin-left:16%;padding:1px 16px;height:150px;">
<h1>Add Order</h1>
<div class="container">

  </div>
</div>

<div style="margin-left:16%;padding:1px 16px;">
<div class="container2">
<!--change from here, it is the part of the "white" part-->
            <form action="backstoreAddOrder.php" method="POST">
             <div class="productAdd">   
            
                <div>
                    <label for="orderId">Order ID：</label>
                    <input type="text" name="orderId" id="orderId"/>
                    
                </div>

                <div>
                    <label for="customerId">Customer ID：</label>
                    <input type="text" name="customerId" id="customerId"/>
                    
                </div>
                
                <div>
                    <label for="product">Product: </label>
                    <input type="text" name="product" id="product"/>
                </div>
                       
                <div>
                    <label for="type">Type：</label>
                    <input type="text" name = "type" id ="type" />
                </div>

                <div>
                    <label for="size">Size: </label>
                    <input type="text" name = "size" id = "size" />
                </div>

                <div>
                    <label for="quantity">Quantity: </label>
                    <input type="text" name = "quantity" id ="quantity" />
                </div>
        
                <div class="productAddBtn">
                    
				      	<input type="submit" name="submit" value="submit">
                
                <input type="button" value="Back" onclick="history.back(-1)"/>
					
                </div>
  
  </div>
            </form>
           
           
        </div>
</div>
<!--end here-->

</body>


</body>
</html>
