<?php
//php for authorization
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')||$_SESSION['username2']!='admin'){

	header('Location: loginAdmin.php');
	die;

}
?>

<?php
if(isset($_POST['save'])){
	// Set variable to determine whether a username already exists
	$matchfound=false;
	//$username = preg_replace('/[^A-Za-z]/','',$_POST['username']);
	$username = $_POST['username'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	
	$title = $_POST['title'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];
	$dob = $_POST['dob'];
	$country = $_POST['country'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	
	// Check to see if the entered username already exists
	// Open up the XML file to be used
	$xml = simplexml_load_file('allUsers.xml');
	
	// Check to see if the username entered is already taken by someone else by checking through file
	foreach($xml->user as $user)
	{
		// Set a temporary variable to store the username of the current user being checked
		$usernameInFile = $user->username;
		
		// Compare the current username to the username being used for registration
		if(strcmp($username, $usernameInFile) == 0) {
			$matchfound=true;
		}
	}
	// In the case that the username is not taken, we can add the new user
	if(!$matchfound)
	{
		// Add a new child called 'user' to existing XML file
		$newUser = $xml->addChild('user');
		// Then, add all other info related to this new user using addChild again
		$newUser->addChild('username',$username);
		$newUser->addChild('password',$password);
		$newUser->addchild('email',$email);
		$newUser->addChild('title',$title);
		$newUser->addchild('firstname',$firstname);
		$newUser->addchild('lastname',$lastname);
		$newUser->addchild('phonenumber',$phonenumber);
		$newUser->addchild('dob',$dob);
		$newUser->addchild('country',$country);
		$newUser->addchild('province',$province);
		$newUser->addchild('city',$city);
		$newUser->addchild('address',$address);
		$xml->asXML('allUsers.xml');
		
		
		$xml2 = new SimpleXMLElement('<users></users>');
		$xml2->addChild('username',$username);
		$xml2->addChild('password',$password);
		$xml2->addchild('email',$email);
		$xml2->addChild('title',$title);
		$xml2->addchild('firstname',$firstname);
		$xml2->addchild('lastname',$lastname);
		$xml2->addchild('phonenumber',$phonenumber);
		$xml2->addchild('dob',$dob);
		$xml2->addchild('country',$country);
		$xml2->addchild('province',$province);
		$xml2->addchild('city',$city);
		$xml2->addchild('address',$address);
		$xml2->asXML('users/' . $username. '.xml'); 
		
		// Redirect to User List Page page
		header('Location:UserList.php');
	}
	else
	{
		// Display error message
		echo '<script> alert("WARNING: Username entered has already been taken!")</script>';
	}
}
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add User</title>

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
<h1>Add Profile</h1>
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
						<option value="mr">Mr.</option>
						<option value="miss">Miss</option>
						<option value="ms">Ms.</option>
						<option value="mrs.">Mrs.</option>
						<option value="other">Other</option>
					</select>
                </div>
                
                <div>
                    <label for="firstname">First Name: </label>
					<input type="text" name="firstname" placeholder="Client's first name" required>
                </div>
				
                <div>
                    <label for="lastname">Last Name: </label>
					<input type="text" name="lastname" placeholder="Client's last name" required>
                </div>
				
				 <div>
                    <label for="username">Username: </label>
					<input type="text" name="username" placeholder="Client's username" required>
                </div>

                <div>
                    <label for="email">E-mail: </label>
					<input type="email" name="email" id="email" placeholder="Client's e-mail" required>
                    
                </div>
				
				<div>
                    <label for="password">Password: </label>
					<input type="text" name="password" placeholder="Client's password" required>
				</div>
				
				<div>
                    <label for="phonenumber">Phone Number: </label>
					<input type="tel" name="phonenumber" placeholder="Client's phone number" required>
				</div>
				
				<div>
					<label for="dob">Date of Birth: </label>
					<input type="date" name="dob" required>
				</div>

				<div>
					<label for="country">Country: </label>
					<input type="text" name="country" placeholder="Client's country" required>
				</div>
				
				<div>
					<label for="province">Province/State: </label>
					<input type="text" name="province" placeholder="Client's province/state" required>
				</div>
				
				<div>
					<label for="city">City: </label>
					<input type="text" name="city" placeholder="Client's city" required>
				</div>
				
				<div>
					<label for="address">Building Number<br> and Street Name: </label>
					<input type="text" name="address" id="address" placeholder="Client's address" required>
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
