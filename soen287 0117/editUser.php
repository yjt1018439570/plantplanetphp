<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>

<?php

	// PREVENTING access to the edit user page if no username has been set 
	// to be edited
	if(!isset($_SESSION['username'])) {
		header('location:UserList.php');
	}
	
	// Open up the XML file to be used
	$xml = simplexml_load_file('allUsers.xml');
	
	// Find the matching username
	foreach($xml->user as $user)
	{
		// Set a temporary variable to store the username of the current user being checked
		$usernameInFile = $user->username;
		
		// Compare session variable with username being analyzed
		if(strcmp($_SESSION["username"], $usernameInFile) == 0) {
			// After finding a match, extract all necessary data 
			// and store them in other variables
			$username = $user->username;
			$old_email = $user->email;
			$old_password = $user->password;
			$old_title = $user->title;
			$old_firstname = $user->firstname;
			$old_lastname = $user->lastname;
			$old_phonenumber = $user->phonenumber;
			$old_dob = $user->dob;
			$old_country = $user->country;
			$old_province = $user->province;
			$old_city = $user->city;
			$old_address = $user->address;
			
		// save XML file at the end
		$xml->asXML('allUsers.xml');
		}
	}
	// Retrieving data from form and updating XML file
	if(isset($_POST['save'])) 
	{
		// Set variables
		$new_email = $_POST['email'];
		$new_password = $_POST['password'];
		$new_title = $_POST['title'];
		$new_firstname = $_POST['firstname'];
		$new_lastname = $_POST['lastname'];
		$new_phonenumber = $_POST['phonenumber'];
		$new_dob = $_POST['dob'];
		$new_country = $_POST['country'];
		$new_province = $_POST['province'];
		$new_city = $_POST['city'];
		$new_address = $_POST['address'];
		
		// Open up the XML file to be used
		$xml = simplexml_load_file('allUsers.xml');
		
		// First, loop through all usernames to make sure username entered is unique
		foreach($xml->user as $user)
		{
			// Set temporary variable to username being analyzed
			$usernameInFile = $user->username;
			// Find the matching username
			if(strcmp($username, $usernameInFile) == 0)
			{
				// Now change the vales needed
				$user->email = $new_email;
				$user->password = $new_password;
				$user->title = $new_title;
				$user->firstname = $new_firstname;
				$user->lastname = $new_lastname;
				$user->phonenumber = $new_phonenumber;
				$user->dob = $new_dob;
				$user->province = $new_province;
				$user->city = $new_city;
				$user->address = $new_address;
				
				// Save XML file
				$xml->asXML('allUsers.xml');
				
				$xml2 = new SimpleXMLElement('users/' . $_SESSION['username'] . '.xml', 0, true );
				$xml2 = new SimpleXMLElement('<users></users>');
				$xml2->email = $new_email;
				$xml2->password = $new_password;
				$xml2->title = $new_title;
				$xml2->firstname = $new_firstname;
				$xml2->lastname = $new_lastname;
				$xml2->phonenumber = $new_phonenumber;
				$xml2->dob = $new_dob;
				$xml2->province = $new_province;
				$xml2->city = $new_city;
				$xml2->address = $new_address;
				$xml2->asXML('users/' . $_SESSION['username'] . '.xml'); 
				
				
				
				
				// unset session variable
				unset($_SESSION['username']);
				
				// Go back to user list
				header('location:UserList.php');
			}
		}	
		
	}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Edit User</title>

<style>

body {
  margin: 0;
  background-color: #d3ffd3;
}


.container2 { 
  height: 610px;
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
  <li><a href="backstoreProductList.php">Product List</a></li>
  <li><a class="active" href="UserList.php">User List</a></li>
  <li><a href="orderList.php">Order List</a></li>
  <li><a href="#">Analysis</a></li>
  <li><a href="#">Marketing</a></li>
  <li><a href="frontstoreHomepage.php">Exit back store</a></li>
</ul>

<div style="margin-left:16%;padding:1px 16px;height:150px;">
<h1>Edit Profile: <?php echo $username?></h1>
<div class="container">

  </div>
</div>

<div style="margin-left:16%;padding:1px 16px;">
<div class="container2">
            <form method="POST" action="">
             <div class="editProfile"> 
                <div>
                    <label for="title">Title:</label>
                    <select name="title" id="title">
						<option value="mr"<?php if($old_title=="mr"){ echo 'selected="selected"';}?>>Mr.</option>
						<option value="miss"<?php if($old_title=="miss"){ echo 'selected="selected"';}?>>Miss</option>
						<option value="ms"<?php if($old_title=="ms"){ echo 'selected="selected"';}?>>Ms.</option>
						<option value="mrs."<?php if($old_title=="mrs."){ echo 'selected="selected"';}?>>Mrs.</option>
						<option value="other"<?php if($old_title=="other"){ echo 'selected="selected"';}?>>Other</option>
					</select>
                </div>
                
                <div>
                    <label for="firstname">First Name: </label>
					<input type="text" name="firstname" placeholder="Client's first name" value ="<?php echo $old_firstname?>" required>
                </div>
				
                <div>
                    <label for="lastname">Last Name: </label>
					<input type="text" name="lastname" placeholder="Client's last name" value ="<?php echo $old_lastname?>"required>
                </div>
				
                <div>
                    <label for="email">E-mail: </label>
					<input type="email" name="email" id="email" placeholder="Client's e-mail" value ="<?php echo $old_email?>" required>
                    
                </div>
				
				<div>
                    <label for="password">Password: </label>
					<input type="text" name="password" placeholder="Client's password" value ="<?php echo $old_password?>" required>
				</div>
				
				<div>
                    <label for="phonenumber">Phone Number: </label>
					<input type="tel" name="phonenumber" placeholder="Client's phone number" value ="<?php echo $old_phonenumber?>"required>
				</div>
				
				<div>
					<label for="dob">Date of Birth: </label>
					<input type="date" name="dob" value ="<?php echo $old_dob?>"required>
				</div>

				<div>
					<label for="country">Country: </label>
					<input type="text" name="country" placeholder="Client's country" value ="<?php echo $old_country?>"required>
				</div>
				
				<div>
					<label for="province">Province/State: </label>
					<input type="text" name="province" placeholder="Client's province/state" value ="<?php echo $old_province?>" required>
				</div>
				
				<div>
					<label for="city">City: </label>
					<input type="text" name="city" placeholder="Client's city" value ="<?php echo $old_city?>" required>
				</div>
				
				<div>
					<label for="address">Building Number<br> and Street Name: </label>
					<input type="text" name="address" id="address" placeholder="Client's address" value ="<?php echo $old_address?>" required>
				</div>
				
                <div class="addUser">
                   <input type="submit" value="Save" name="save">
                </div> 
            </form>
        </div>
</div>

</body>


</body>
</html>
