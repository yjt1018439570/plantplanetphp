<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>
<?php
	// Unsetting username session variable (incase someone goes back to user list from edit page)
	unset($_SESSION["username"]);
?>
<?php
if(isset($_POST['delete'])) {
	// Set variable to determine whether match is found\
	$matchfound = false;
	// Set a variable to the username entered by the user
	$username = $_POST['username'];
	// Open up the XML file to be used
	$xml = new DomDocument("1.0", "UTF-8");
	$xml->load('allUsers.xml');
	
	$xpath = new DOMXPATH($xml);
	
	// Search the XML file for the correct user to delete
	foreach($xpath->query("/users/user[username = '$username']") as $node)
	{
		$matchfound = true;
		$node->parentNode->removeChild($node);
	}
	
	// Save the XML file after deleting the user
	$xml->formatoutput = true;

	$xml->save('allUsers.xml');	
	// If no match was found, display error message
	if(!$matchfound)
	{
		// If no match is found, alert the user that no match is found
		echo '<script> alert("WARNING! No username match was found!")</script>';
	}
}
if(isset($_POST['edit'])) {
	// Set a variable to the username entered by the user
	$username = $_POST['username'];
	
	// Open up the XML file to be used
	$xml = simplexml_load_file('allUsers.xml');
	
	// Go through XML file to find a match
	foreach($xml->user as $user)
	{
		// Set a temporary variable to store the username of the current user being checked
		$usernameInFile = $user->username;
		
		// Compare the current username to the username entered by user
		if(strcmp($username, $usernameInFile) == 0) {
			// Save xml file
			$xml->asXML('allUsers.xml');
			// Set the session variable
			$_SESSION["username"] = $username;
			// Now redirect to Edit User Page
			header('location:editUser.php');
		}
	}
	// If no match is found, alert the user that no match is found
	echo '<script> alert("WARNING! No username match was found!")</script>';
}
?>


<!DOCTYPE html>
<html>
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>User List</title>
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



<ul>
  <li><a href="backstoreProductList.php">Product List</a></li>
  <li><a class="active" href="UserList.php">User List</a></li>
  <li><a href="orderList.php">Order List</a></li>
  <li><a href="#">Analysis</a></li>
  <li><a href="#">Marketing</a></li>
  <li><a href="frontstoreHomepage.php">Exit back store</a></li>
</ul>

<div style="margin-left:16%;padding:1px 16px;height:150px;">


    <!-- Header -->
<h1>Users</h1>
<div class="container">
 <div class="center">

 <!-- Add User Button -->
    <a href="addUser.php" class="button">Add User</a>
  </div>

  </div>
</div>

<div style="margin-left:16%;padding:1px 16px;">

<div class="container2">
        <div class="edit">
            <span>Enter a username to edit a profile: </span>
            <!-- <input type="text" placeholder="Search user"/> -->
			<form action = "" method="POST">
				<input type="text" name="username" placeholder="Search user"/>
				<input type="submit" value="Edit" name="edit">
			</form>
        </div>
		 <div class="delete">
            <span>Enter a username to delete a profile: </span>
            <!-- <input type="text" placeholder="Search user"/> -->
			<form action = "" method="POST">
				<input type="text" name="username" placeholder="Search user"/>
				<input type="submit" value="Delete" name="delete">
			</form>
        </div>

        <!--table-->
        <div style="overflow-x:auto;">
        <table class="productTable" cellpadding="0" cellspacing="0">
            <tr class="firstTr">
                <th width="10%">Username</th>
				<th width="10%">First Name</th>
                <th width="10%">Last Name</th>
				<th width="15%">Email</th>
                <th width="10%">Phone Number</th>
                <th width="30%">Address</th>
            </tr>
			<?php
				$xml = simplexml_load_file('allUsers.xml');
				foreach($xml->user as $user)
				{       
					echo 
					"<tr>
					<td>".$user->username."</td>
					<td>".$user->firstname."</td>
					<td>".$user->lastname."</td>
					<td>".$user->email."</td>
					<td>".$user->phonenumber."</td>
					<td>".$user->address."</td>
					</tr>";
				}
			?>
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
