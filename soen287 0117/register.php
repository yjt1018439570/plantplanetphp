<?php
$errors = array();
if(isset($_POST['register'])){
	//$username2 = preg_replace('/[^A-Za-z]/','',$_POST['username2']);
	$username2 = $_POST['username2'];
	$email = $_POST['email'];
	$password = $_POST['password'];
	$c_password = $_POST['c_password'];
	
	$title = $_POST['title'];
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$phonenumber = $_POST['phonenumber'];
	$dob = $_POST['dob'];
	$country = $_POST['country'];
	$province = $_POST['province'];
	$city = $_POST['city'];
	$address = $_POST['address'];
	
	// Check to see if the entered username2 already exists
	// Open up the XML file to be used
	$xml2 = simplexml_load_file('allUsers.xml');
	
	// Check to see if the username2 entered is already taken by someone else by checking through file
	foreach($xml2->user as $user)
	{
		// Set a temporary variable to store the username2 of the current user being checked
		$usernameInFile = $user->username2;
		
		// Compare the current username2 to the username2 being used for registration
		if(strcmp($username2, $usernameInFile) == 0) {
			$errors[] = 'username already exists';
		}
	}
	// Check to see if other fields are empty
	if($username2 == ''){
		$errors[] = 'username is blank';
	}
	if($email == ''){
		$errors[] = 'Email is blank';
	}
	if($password == '' || $c_password == ''){
		$errors[] = 'Passwords are blank';
	}
	if($password != $c_password){
		$errors[] = 'Passwords do not match';
	}
	if($firstname == ''){
		$errors[] = 'firstname is blank';
	}
	if($lastname == ''){
		$errors[] = 'lastname is blank';
	}
	if($phonenumber == ''){
		$errors[] = 'Phone number is blank';
	}
	if($dob == ''){
		$errors[] = 'Date of birth is blank';
	}
	if($country == ''){
		$errors[] = 'Country is blank';
	}
	if($province == ''){
		$errors[] = 'Province is blank';
	}
	if($city == ''){
		$errors[] = 'City is blank';
	}
	if($address == ''){
		$errors[] = 'Address is blank';
	}
	// In the case that everything is correct, write the info down into the file, wwithout overwriting
	// what already exists within the file
	if(count($errors) == 0){
		// Add a new child called 'user' to existing XML file
		$newUser = $xml2->addChild('user');
		// Then, add all other info related to this new user using addChild again
		$newUser->addChild('username',$username2);
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
		$xml2->asXML('allUsers.xml');
		
		$xml = new SimpleXMLElement('<users></users>');
		$xml->addchild('password',$password);
		$xml->addchild('email',$email);
		$xml->addchild('firstname',$firstname);
		$xml->addchild('lastname',$lastname);
		$xml->addchild('phonenumber',$phonenumber);
		$xml->addchild('dob',$dob);
		$xml->addchild('country',$country);
		$xml->addchild('province',$province);
		$xml->addchild('city',$city);
		$xml->addchild('address',$address);
		$xml->asXML('users/' . $username2 . '.xml');
		header('Location:login.php');
		// Redirect to login page
		//header('Location:login.php');
	}
}
?>

<!DOCTYPE html>
<html lang = "en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Sign Up </title>
    
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

    
    <!-- Header -->
    <header class = "header">
        <h1>Planting Planets</h1>
        <p>Connecting planets, one grocery at a time</p>
    </header>

   
     <!-- "Register" Bar -->
    <h2> Register </h2></a>
    
    <!-- Button to go to Homepage -->
    <a href="frontstoreHomepage.php" class="previous">&laquo; Go to Homepage </a>
	
	<a href="login.php" class="previous" style="float: right;">Already had an account? Log in here. </a>

    <!-- Registration/Sign Up Form in transparent box-->

    <div class= "background">
        <div class="transbox">
<!--
         <h3> Do you have a Planting Planets membership card?</h3>
-->
         <!-- Radio Buttons -->
<!--		 
         <form>
             <input type= "radio" id="hasCard"
             name="hasCard" value="hasCard">
             <label for="hasCard">Yes</label><br>

             <input type= "radio" id="hasNoCard"
             name="hasNoCard" value="hasNoCard">
             <label for="hasNoCard">No. I want a planting planets membership card.</label><br>

             <input type= "radio" id="doesNotWantCard"
             name="doesNotWantCard" value="doesNotWantCard">
             <label for="doesNotWantCard">No. I do not want a planting planets membership card.</label><br>
             <hr>
         </form> 
-->
         <!-- Personal Information Section of the Form -->

         <h3>Personal Information</h3>

        <form method = "POST" action="">
				<?php
				if(count($errors)>0 ){
					echo '<u1>';
					foreach($errors as $e){
						echo '<li>' . $e . '' . '</li>';
					}
					echo '</u1>';
				}
				?>		 
            <!-- Title Select Button -->
            <label>Title</label></br>
            <select name="title" id="title">
                <option value="selectTitle">Select your title</option>
                <option value="mr">Mr.</option>
                <option value="miss">Miss</option>
                <option value="ms">Ms.</option>
                <option value="mrs.">Mrs.</option>
                <option value="other">Other</option>
            </select>
            </br></br>

           <label>First Name</label></br>
            <input type = "text" name = "firstname" placeholder ="Enter first name"/></br>
        
            </br>
            <label>Last Name</label></br>
            <input type= "text" name= "lastname" placeholder = "Enter last name"/></br>
		
			</br>
            <label>username</label></br>
            <input type= "text" name= "username2" placeholder = "Enter last name"/></br>
            </br>
			
            <label>E-mail</label></br>
            <input type = "email" name = "email" placeholder = "Enter email address"/></br>
       
            </br>
            <label>Password</label></br>
            <input type = "Password" name = "password" placeholder ="Enter password"/></br>
			
			</br>
            <label>Confirm Password</label></br>
            <input type = "Password" name = "c_password" placeholder ="Confirm password"/></br>
			
		
            </br>
            <label>Phone Number</label></br>
            <input type = "tel" name = "phonenumber" placeholder ="Enter phone number"/></br>

            </br>

            <label>Date of Birth</label></br>
            <input type = "date" name = "dob" placeholder ="Enter date of birth "/></br>
            </br>
		
            <!-- Billing Address -->
		
            <hr>
            <h3>Address</h3>

            <label>Country</label></br>
            <input type = "text" name = "country" placeholder ="Enter country "/></br>
			
			<label>Province/State</label></br>
            <input type = "text" name = "province" placeholder ="Enter Province"/></br>
			
			 </br>
            <label>City</label></br>
            <input type = "text" name = "city" placeholder ="Enter City "/></br>
			
			</br>
            <label>Building Number and Street Name</label></br>
            <input type = "text" name = "address" placeholder ="Enter address"/></br>
		
            <!-- Shipping Address -->
		<!--
            <hr>
            <h3>Shipping Address</h3>

            </br>
            <label>Building Number and Street Name</label></br>
            <input type = "text" name = "shippingAddress" placeholder ="1111 Road Name"/></br>
            
            </br>
            <label>City</label></br>
            <input type = "text" name = "shippingCity" placeholder ="Enter City "/></br>
   
            <label>Province/State</label></br>
            <input type = "text" name = "shippingProvince" placeholder ="Enter Province"/></br>
   
            <label>Country</label></br>
            <input type = "text" name = "shippingCountry" placeholder ="Enter country "/></br>
        -->
            
            <div class="center">

                <!-- Submit Button -->
                <input type="submit" value="Submit" name="register">

                 <!-- Reset Button -->
                <input type="reset" value="Reset">
            </div>

        </form>   
             

             <!-- End of Registration/Sign Up Form -->
             

        </div>
    </div>

    

    <!-- Footer -->
    <footer class = "footer">
        <h1>Copyright Planting Planets SOEN 287</h1>
    </footer>
    


</body>



</html>