<?php
$error = false;
if (isset($_POST['login'] )){
	//$username2 = preg_replace('/[^A-Za-z]/', '', $_POST['username2']);
	$username2 = $_POST['username2'];
	$password = $_POST['password'];
	if(file_exists('users/' . $username2 . '.xml')){
		$xml = new SimpleXMLElement('users/' . $username2 . '.xml', 0, true);
		if($password == $xml->password){
			session_start();
			$_SESSION['username2'] = $username2;
			if($_SESSION['username2']=='admin'){
				header('Location: admin.php');
			die;
			}else{
			header('Location: profile.php');
			die;
			}
		}
	}
	$error = true;
}

?>
<!DOCTYPE html>
<html lang = "en">
<head>
    
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title> Log in Page </title>
    
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

   
     <!-- "login" Bar -->
    <h2> Login Page</h2></a>
    
    <!-- Button to go to Homepage -->
    <a href="frontstoreHomepage.php" class="previous">&laquo; Go to Homepage </a>
	<a href="register.php" class="previous" style="float: right;">No Account? Register now! </a>  
	


    <div class= "background">
        <div class="transbox">

         <h3>Log in</h3>


        <form method = "POST" action="">


            </br>
            <label>username</label></br>
            <input type = "text" name = "username2" placeholder = "Enter your username"/></br>
       
            </br>
            <label>Password</label></br>
            <input type = "password" name = "password" placeholder ="Enter password"/></br>


            <!-- "Forget Password" Button -->
            <button type="button">Forgot Password</button>
			
			<?php
				if($error){
					echo '<p>Invalid username and/or password</p>';
				}
				?>
         
            
            <div class="center">

                <!-- Submit Button -->
                <input type="submit" value="Login" name="login">

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