<?php
session_start();
if(!file_exists('users/' . $_SESSION['username2'] . '.xml')){
	header('Location: login.php');
	die;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" 
	"http://www.w3.org/TR/xhtml/DTD/xhtml-transitional.dtd">
	
<html xmlns="http://www.w3.org/1999/xhtml">

<head>

	<title>Admin Page</title>
	</head>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<style>
		* {
				box-sizing: border-box;
			}

			.row::after {
				content: "";
				clear: both;
				display: table;
			}

			[class*="col-"] {
				float: left;
				padding: 15px;
			}

			html {
				color: #a0afa0;
				font-family: 'Times New Roman', serif;
				background-color: #d3ffd3;
			}

			/*header*/
			.header {
				background-color: #e9ffd3;
				text-align: center;
				padding: 15px;
			}

			/*navigation bar*/
			.nav ul {
				list-style-type: none;
				overflow: hidden;
				background-color: #a0afa0;
				padding: 0;
				margin: 0;
			}
				
			.nav li a {
				display: block;
				float: left;
				text-align: center;
				text-decoration: none;
				color: #f6f4f2;
				background-color: #a0afa0;
				padding: 5px;
			}
						
			.nav li a:hover{
				background-color: #ceb599;
			}
			
			/*aisle title*/
			.aislename {
				text-align: left;
				color: #546254;
				font-size: large;
				font-family: 'Lucida Sans Unicode', sans-serif;
				margin-left: 20px;
			}
			
			/*product preview container*/
			.products {
				display: grid;
				grid-template-columns: auto auto;
				word-break: break-word;
				grid-gap: 5px;
				margin: 5px;
			}
			
			.products > a {
				display: block;
				text-decoration: none;
			}
			
			.products > a > div {
				display: grid;
				grid-template-columns: 30% auto;
				grid-gap: 5px;
				background-color: #e7ffe7;
				padding: 10px;
			
			}
			
			.products > a > div:hover {
				background-color: #c0ffc0;
			}
			
			/*footer*/
			.footer {
				position: fixed;
				bottom: 0;
				left: 0;
				right: 0;
				width: 100%;
				color: white;
				background-color: black;
				text-align: right;
				font-size: smaller;
				padding: 0;
			}
			
			/* for phones*/
			[class*="col-"] {
				width: 100%;
			}
			
			@media only screen and (max-width: 767px) {
				/*for mobile*/
				.products {
					display: block;
				}
				
				.aislename {
					text-align: center;
					font-size: xx-large;
				}
				
				.pname {
					font-size: large;
				}

			}
			
			@media only screen and (min-width: 768px) and (max-width: 1023px) {
				/*for tablets*/
				.products {
					display: block;
					margin: 2px;
				}
				
				.pname {
					font-size: xx-large;
				}
				
				.pinfo {
					font-size: x-large;
				}
				
				.aislename {
					text-align: center;
					font-size: xx-large;
				}
			}
			
			
			@media only screen and (min-width: 1024px) {
				/* for desktop: */
				.col-1 {width: 8.33%;}
				.col-2 {width: 16.66%;}
				.col-3 {width: 25%;}
				.col-4 {width: 33.33%;}
				.col-5 {width: 41.66%;}
				.col-6 {width: 50%;}
				.col-7 {width: 58.33%;}
				.col-8 {width: 66.66%;}
				.col-9 {width: 75%;}
				.col-10 {width: 83.33%;}
				.col-11 {width: 91.66%;}
				.col-12 {width: 100%;}
				
				.pname {
					font-size: xx-large;
				}
				
				.pinfo {
					font-size: x-large;
				}
				
				.aislename {
					font-size: xx-large;
				}
			}
			
			.pimage img { /*product image*/
				height: auto;
				max-width: 100%;
				padding: 2px;
			}
			
			.pname { /*product name*/
				color: #546254;
			}
			
			.pinfo { /*product info*/
				color: #ceb599;
			}
			
			/*next/last page buttons*/
			.pages input[type=button] {
				border: none;
				text-align: center;
				color: #f6f4f2;
				background-color:#a0afa0;
				margin-top: 10px;
				padding: 10px;
			}
			
			.pages input[type=button]:hover {
				background-color: #b5c1b5;
			}
			
			/*aisle menu*/
			.menu {
				background-color: #f6f4f2;
				padding: 10px;
				margin: 20px;
			}
			
			.menu ul {
				list-style-type: none;
				margin: 0;
				padding:5px;
			}
			
			.menu li {
				margin-bottom: 5px;
			}
			
			.menu li a {
				text-decoration:none;
				color: #546254;
				font-size: larger;
				padding: 5px;
			}
			
			.menu li a:hover{
				color: #ceb599;
			}
			
			/* Next button */
			
			.next
			{
				background-color:grey;
				color:white;
				padding: 8px 16px;
			}

			a:hover
			{
				background-color: gainsboro;
			}
	</style>
	<body>
				<div class="header">
				<h1>Planting Planets</h1>
			</div>
			
		<h1>Admin Page</h1>
		<h2>Welcome, <?php echo $_SESSION['username2'] ?> </h2>
		<table>
			
			<?php
				$file = 'users/' . $_SESSION['username2'] . '.xml';
				
					$xml = new SimpleXMLElement($file, 0, true);
					echo '
					
					<a href="Userlist.php" input type = "button" class="next" style="float:right;background-color: #555555;" size="20";>Go to Backstore</a>
					<br>
					<br>
					<a href="frontstoreHomepage.php" input type = "button" class="next" style="float:right;background-color: #555555;" size="20";>Go to Homepage</a>
					<br>
					
					<tr>
						<th>username</th>
						<td>' . basename($file, '.xml') . '</td>
						
					</tr>
					<tr>
						<th>Email</th>
						<td>' . $xml->email . '</td>
					</tr>
					<tr>
						<th>Firstname</th>
						<td>' . $xml->firstname . '</td>
					</tr>
					<tr>
						<th>Lastname</th>
						<td>' . $xml->lastname . '</td>
					</tr>
					<tr>
						<th>Phone number</th>
						<td>' . $xml->phonenumber . '</td>
					</tr>
					<tr>
						<th>Date of birth</th>
						<td>' . $xml->dob . '</td>
					</tr>
					<tr>
						<th>Country</th>
						<td>' . $xml->country . '</td>
					</tr>
					<tr>
						<th>province</th>
						<td>' . $xml->province . '</td>
					</tr>
					<tr>
						<th>City</th>
						<td>' . $xml->city . '</td>
					</tr>
					<tr>
						<th>Address</th>
						<td>' . $xml->address . '</td>
					</tr>
					'; 
				
			?>
		</table>
		<hr />
		<a href="changepassword.php">Change Password</a>
		<br>
		<a href="logout.php">Logout</a>
			
	</body>
</html>