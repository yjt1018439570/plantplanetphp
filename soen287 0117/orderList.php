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

.button {
  background-color: #0066ff;
  border: none;
  border-radius: 8px;
  color: white;
  padding: 10px 15px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  margin: 4px 2px;
  cursor: pointer;
}
.button2 {
  background-color: #00ff00;
  border: none;
  border-radius: 8px;
  color: black;
  padding: 5px 8px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 5px;
  margin: 4px 2px;
  cursor: pointer;
}
.center {
  margin: 0;
  position: absolute;
  top: 50%;
  left: 90%;
  -ms-transform: translate(-50%, -50%);
  transform: translate(-50%, -50%);
}

.container { 
  height: 50px;
  position: relative;
  border: none; 
}

.container2 { 
  height: 1000px;
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

<!--product list-->
.productTable {
    width: 100%;
    border: 1px solid #ccc;
}

.productTable tr {
    height: 30px;
    line-height: 30px;
    text-align: center;
}

.productTable tr:nth-child(odd) {
    background: #f6f7f9;
}

.productTable tr:hover {
    background: #e9f9ca;
}

.firstTr {
    border: 1px solid #d6dfe6;
    background: linear-gradient(to bottom, #f3f8fc, #ebf4f9, #e3f1fa, #e0f0fd, #d8e9fd);
}

.firstTr th {
    border-right: 2px solid rgba(209, 218, 223, 0.4);
    padding-right: 10px;
    padding-left: 10px;
}

.productTable td a {
    margin-top: 10px;
    display: inline-block;
    margin-right: 10px;
}
<!--search bar-->
.search{
    height:50px;
    line-height:50px;
    background: #f6fafd;
    padding-left: 24px;
    color: #000;
}
.search input[type='text']{
    width: 200px;
    height: 30px;
    outline: none;
    padding-left: 10px;
    border: 1px solid #8ab2d5;
    border-radius: 4px;
}
.search input[type='button']{
    margin-left: 20px;
    width: 100px;
    padding: 0 20px;
    height: 30px;
    border: 1px solid #7ba92c;
    border-radius: 4px;
    color: #fff;
    font-weight: bold;
    background:#87c212 url("../img/search.png") 10px center no-repeat;
}
.search input[type='button']:focus{
    outline: none;
    background-color: #5d8410;
}
.search a{
    width: 80px;
    padding-left:40px;
    float: right;
    margin: 10px 60px;
    height: 30px;
    line-height: 30px;
    border: 1px solid #0c89de;
    border-radius: 4px;
    color: #fff;
    font-weight: bold;
    background:#47acf1 url("../img/tianjia.png") 10px center no-repeat;
    display: inline-block;
}
.search a:hover,.search a:active{
    background-color: #0778c5;
}
.search span{
    margin-left: 10px;
}
.search select{
    margin: 10px;
    width: 100px;
    height: 30px;
    border-radius: 4px;
    border: 1px solid #0c89de;
    outline: none;
}

div.a {
  word-wrap: normal;
}

div.b {
  word-wrap: break-word;
}
</style>
</head>
<body>

<?php


    if ($_SERVER['REQUEST_METHOD'] == 'GET') {
            if (isset($_GET["delete"])) {
                $orderid = $_GET["delete"]; //index of item
                
                $xml = simplexml_load_file('ordersInformation.xml');
    
                foreach($xml->order as $theData) {
                    if($theData->orderId == $orderid) {
                        $dom = dom_import_simplexml($theData);
                        $dom->parentNode->removeChild($dom);
                    }
                }
                $xml->asXML('ordersInformation.xml');
            }
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


    <!-- Header -->
<h1>Orders</h1>
<div class="container">
 <div class="center">

 <!-- Add User Button -->
    <a href="EditOrderProfile.php" class="button">Add Order</a>
  </div>
  </div>
</div>

<div style="margin-left:16%;padding:1px 16px;">

<div class="container2">
            <div class="search">
            <span>User: </span>
            <input type="text" placeholder="Search user"/>
                
        </div>

        <div style="overflow-x:auto;">

        <?php
		$xml = simplexml_load_file("ordersInformation.xml");
		?>

        <table class="productTable" cellpadding="0" cellspacing="0">
            <thead>
                <tr class="firstTr">
                    <th width="10%">Order ID</th>
                    <th width="20%">Customer ID</th>
				    <th width="10%">Product</th>
                    <th width="10%">Type</th>
                    <th width="30%">Size</th>
                    <th width="10%">Quantity</th>
                    <th width="30%">Controls</th>
                </tr>
            </thead>
            <tbody>

            <?php $products = $xml->order;?>

            <?php foreach ($products as $data) :?>
                <tr>
                    <td><?php echo $data->orderId; ?></td>
                    <td><?php echo $data->customerId; ?></td>
                    <td><?php echo $data->product; ?></td>
                    <td><?php echo $data->type; ?></td>
                    <td><?php echo $data->size; ?></td>
                    <td><?php echo $data->quantity; ?></td>
                    <td>

                    <form method = "POST" action = "EditOrderProfile.php">
						<input type = "hidden" name = "orderid" value = "<?php echo $data->orderId; ?>">
						<input type="submit" name="view" value="View">
						<input type="submit" name="view" value="Edit">
                        
                    </form>
        
                    <form method="GET">
                        <?php
                        $pid = $data->orderId;
                        echo "<button><a href=\"?delete=", $pid, "\" style=\"text-decoration:none;color:black;\">Delete</a></button>";
                        ?>
                    </form>
                </tr>
            <?php endforeach; ?>
            </tbody>

        </table>
        </div>  
</div>
 <!--end here-->
 <footer>
    <p>Copyright &copy; 2020 Planting Planets SOEN 287</P>
</footer>
</body>


</body>
</html>
