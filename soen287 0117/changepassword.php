<?php
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')){
	header('Location: login.php');
	die;
}

$error = false;

if(isset($_POST['o_password']) ){
	$old = $_POST['o_password'];
	$new = $_POST['n_password'];
	$c_new = $_POST['c_n_password'];
	
	$xml = new SimpleXMLElement('users/' . $_SESSION['username2'] . '.xml', 0, true );
	if($old == $xml->password){
		if($new ==  $c_new){
			$xml->password = $new;
			$xml->asXML('users/' . $_SESSION['username2'] . '.xml'); 
				//8888888888888888888888
	$xml = simplexml_load_file('allUsers.xml');
	
	// Find the matching username
	foreach($xml->user as $user)
	{
		// Set a temporary variable to store the username of the current user being checked
		$usernameInFile = $user->username;
		
		// Compare session variable with username being analyzed
		if(strcmp($_SESSION["username2"], $usernameInFile) == 0) {
			// After finding a match, extract all necessary data 
			// and store them in other variables
			$username = $user->username;
			$old_password = $user->password;

			
		// save XML file at the end
		$xml->asXML('allUsers.xml');
		}
	}
	// Retrieving data from form and updating XML file
	if(isset($_POST['o_password'])) 
	{

	
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

				$user->password = $new;

				// Save XML file
				$xml->asXML('allUsers.xml');

				
				
				
				
				// unset session variable
				unset($_SESSION['username']);
				header('Location:logout.php');
				die;
				// Go back to user list
				//header('location:UserList.php');
			}
		}	
		
	}	
	//88888888888888888888888888888888888888
		}
		
	}

	$error =true;
			
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml/DTD/xhtml-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
	<title>Change Password</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
	 /* Design of the body */

        body
        {
        z-index:1;
        background-image: url(alexander-andrews-fsH1KjbdjE8-unsplash.jpg);
        padding-left: 20px;
        padding-right: 20px;
        font-family: Arial, Helvetica, sans-serif;
        color:white;
        font-weight: bold;
        }

        /* Design of the transparent box */
        div.transbox
        {
            margin: 40px;
            background-image: url(jeremy-thomas-4dpAqfTbvKA-unsplash.jpg);
            border: 4px solid white;
            font-size: 16px;
            opacity:0.6;
            text-align:left;
            font-family: Arial, Helvetica, sans-serif;
        }
              
        /* Header */
        .header
        {
        padding: 60px;
        text-align: center;
        background-color: black;
        color:white;
        font-size: 20px;
        }

        /* Footer */
        .footer
        {
            position: fixed;
            left:0;
            bottom:0;
            width:100%;
            background-color:bisque;
            color:black;
            text-align:end;
            font-size:8px;
        }
        
        /* Main Page Design */
        .main
        {
            margin-left:160px;
            padding: 0px 10px;
        }

        h2
        {
            color: black;
            background-color:white;
            text-align:center;
            text-align: center;
            font-size: 20px;
            padding-top: 10px;
            padding-bottom:10px;
            overflow: hidden;
        }

        *
        {
            box-sizing: border-box;
        }

        .center
        {
            display: flex;
            justify-content: center;
            align-items: center;
            height:200px;
            border:3px;
        }

        /* Specifications about the text inputs */
        input[type=text]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=email]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=password]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=date]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }


        input[type=number]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        input[type=tel]
        {
            width: 100%;
            padding: 12px 20px;
            margin: 8px 0;
            box-sizing: border-box;
        }

        /* Button to go to Homepage */

        a
        {
            text-decoration: none;
            padding: 8px 16px;
            color: white;
        }

        a:hover
        {
            background-color:blanchedalmond;
            color: black;
        }

        input[type="submit"]
        {
            margin: 10px 80px 10px 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left:20px;
        }

        input[type="reset"]
        {
            
            margin: 10px 10px 10px 10px;
            padding-top: 10px;
            padding-bottom: 10px;
            padding-right: 20px;
            padding-left:20px;
        }
    </style>
	</head>
	<body>
		<h1>Change Password</h1>
		<form method="post" action="">
			<?php
				if($error){
					echo '<p>Passwords do not match!</p>';
				}
				
			?>
			<p>Old Password <input type="password" name="o_password" size="20" /></p>
			<p>New Password <input type="password" name="n_password" size="20" /></p>
			<p>Confirm New Password <input type="password" name="c_n_password" size="20" /></p>
			<p><input type="submit" name="change" value="Change Password" /></p>
		</form>
		<hr />
		<a href="logout.php">Logout</a>		
	</body>
</html>