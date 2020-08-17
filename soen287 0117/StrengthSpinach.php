<?php
	session_start();
	
	//check hrefs

?>
<html>
	<head>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<title> Product Description Page</title>
		<style type = "text/css">

			body
			{
				background-color:white;
			}

			/* Header */
			
			.header
			{
		   
			text-align: left;
			background-image:url(https://images.unsplash.com/photo-1539321908154-04927596764d?ixlib=rb-1.2.1&auto=format&fit=crop&w=755&q=80);
			color:white;
			font-size: 20px;
			}

			.footer
			{
				position: fixed;
				left:0;
				bottom:0;
				width:100%;
				background-color:bisque;
				color:black;
				text-align:right;
				font-size:6px;
			}
			
			.button1
			{
				text-align: center;
				padding: 0px 32ps;
			}

			a
			{
				text-decoration: none;
				display: inline-block;
				padding: 8px 16px;
			}

			a:hover
			{
				background-color:blanchedalmond;
				color: black;
			}

			.previous
			{
				background-color: white;
				color: black;
			}
			
			.grid-container
			{
				display: grid;
				justify-content: space-evenly;
				grid-template-columns: auto auto;
				grid-template-rows: auto auto;
				grid-gap: 10px;
				padding: 10px;
				color:black;
			}

			.grid-container > div
			{   
			   text-align: left;
			}

			* 
			{
			 box-sizing: border-box;
			}

			#more
			{
				display: none;
			}

			ul {
				list-style-type: none;
				margin: 0;
				padding: 0;
				}

			li {
			display: inline;
			background-color: bisque;
			padding-top: 9px;
			padding-bottom: 9px;
			}
		</style>
	</head>
	<body>
		<!-- Header -->
		<header class = "header">
			<h1 style = "font-size:10vw">Planting Planets</h1>
		</header>
		
		<!-- Menu -->
		<ul>
			<li><a href="frontstoreHomepage.php">Home</a></li>
			<li><a href="register.php">Register</a></li>
			<li><a href="login.php">Log In</a></li>
			<li><a href="profile.php">Profile</a></li>
			<li><a href="ShoppingCart.php">Shopping Cart</a></li>
		</ul>
		
		<!-- Button to go to appropriate aisle -->
		<a href="FruitsandVegetablesAislePage.html" class="previous">&laquo; Go Back to Fruits and Vegetables</a>
		
		<!-- Main Body -->
		<div class = "grid-container">
			<!-- Product Image -->
			<div>
				<img src="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIREhUSEhIVFRUVFxUVFRcWFRYVFRUVFxUWFxUXFRUYHSggGBolHRUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGy0lICUtLS0wLy0tLS0tLS0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALcBEwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAEAAIDBQYBBwj/xAA7EAABAwIFAgQDBgYCAQUAAAABAAIRAwQFEiExQQZREyJhcTKBkQcUI0Kh8FJiscHR8bLhghUzcnOS/8QAGQEAAwEBAQAAAAAAAAAAAAAAAgMEAQAF/8QALBEAAgIBBAEDAwQCAwAAAAAAAAECEQMEEiExQRMiYTJRcYGRofBS0RQjM//aAAwDAQACEQMRAD8AsgEoToShaTkRCjep3BQVTCxhoFfui6FMKqrXGqe2+UGadvg9DDCol4KgCQuyFSi89VK2vKVuY3aWhvpThcqnc5dZWWWdtLplRJ2qrKdytLh2CPrU84MdvVcrBk1HsqMxClp3C7dW9SmS17SPlofYoVzV1ncMNNVXuGYY6pTBzATqSeyy9N2oC0dnjZc0s0a4CA2PiTsNbuSLWZVjSQq+DOqAmjVa4DT0n3VDdYVUpn8R3yGq2WH3GZohgYTvGmqLoUi5g8VoLtZgaR/pOeFPn7ky1U3GoswrLeOZHB7qSFeY5b020gWCBmiPdUbVPJODpluDI8kLYPXYUBVqkbq+oW7qrgxgkn9PdWj+ipGtTX0GiPGpS6GOcY9mJFWVsbfAabKLfEnxTqYJETs2E7C+khRqipUcC1moEbu4n23VH1T1AS4gHKJgHsO8JOqyShUV2yPUaimlEku3mi/IZgiRJBP6bKeldcgrMUMTt5k+JVd24/yrRl54m1MMA45+YQRzOLUX2Nhli6i+WX9viJB1Vnb3gdysqHKejWhXY9S48M2eBPo2lBwKlc9Zm0xPLurOlfB3KsjkjLoleNxLQFMLAVC2rI0TBW1RoElbbCZRPhiFDTdKkK6jLGGmEk1JaZZ59CSRKGubxrBJKSNSJarwBJWdxLFxMAqrx7qEnysKzrbgkySlTtrgfjST5NGbuUz7wqplZEU3SpXCi1SLJlwiqNyqkBOZVhBtDs0LKkpziqqjcIqlULiA0Ek7ACSfYJTQYS2pC3nSeIVnU9G+UaSefZZez6crlzDVYWNcedD9OF6JSy0WNY0aNACOONyZBq80KoOqtkS4Ant6rCY195qVT+D5ZgQNQPdbWncTAOsoO/oEOkTlAJJnX5J84cEO99xZjm0nU61BmQnxCcziNGxxPdayphLC7MAM3dLDbgvPwy3g7/6Rr7sU3AZSBy7gd57LcaUUBkXqPdJkljSLT5mgeqmuLmP7Abpl5c5YAEkn9lUWJXNSX02RMavd+UEbNHffUlNcti5FSmoqkYDHMdqtqeG57vDa/O2dgdR7xvpwrujVkA9wsrjdA1RDZJpZuAM3Jgf3KZhXV1WhSFLKwFs5XuAzBvaT2UTtq12U6XNsi/J7D09SpW9PxKr2tc7XUiQOAocV63tqWjTnP0C8wtWX195mU6lRv8R/Dpf/ALfE/JCV6XhkipWYMs5hR1Mjg1HblbLLljFJKv5f9/QDJmkzV4x1tVfsRTHE6E+zdysxUt7m6fJYY/iqeQR7blXGGU6eHUBdVWZ7mtAo0zqWtdqC6dQY/wAIht86roG+LVcCHknLSpmZ8umpHzWx06Xvm7Ytdq+WR2mC5G6uB9GeVv1GpR9Ck1ugaB++6dgmEOoF7n1M2eJaGw1pHIkyrCpbDhAopco9TFFJcqmCOYIUJapntITGuC5jkMbKkFUt2KeGJrgtTaMdMMtsXjRyNZiDXcqgq0JQzZaqYalrsTLAn0egWT5CJcsfhOOhvlcYWjbiTCJlXxmpK0RyxuLphoCSDF8O64ttA0eS4hjbW8rJ4njLqmgOirKtZztyo1OUpUImV0Li6tCRNTejLaqq8KWk+EqUbHQkXjXaKwwHBal5V8OmQIEucdmhCdP4VWvKgpUW5jyfytHdx4C9JuMCbhVAOY8uq1CG1DwRr8I4AUs04xcq6N1GoWODfkzN/hdtbRTk1HfnO0d4C2+E4xhtu1otmS8gT5SXz/M5y846kk1sw5Eq26Tok+cj9hS4ss4x3rlv+PwePPVZa77N/cXxqODnCI+EdvVTXDtYjQjQ/TZVjJJGomNQeATopsWr5Qw+YCC0kR2034Ve51uYpzbOV7ttN4JMDk/v5q5ta7arZEEHTuP9rN+PT8jywO1AGc5vUmORJ7K1sKwDg5oHhvJIA/KeRHY7rYSdh4pUylxnGzau8Onla4jzOLTAJ5yidIjusbjfUdXI5xOwOpaN9YgzyU3r/EctzV7ZvKDHYagRzusJfXz6p8ziR6mVsccpy56Hwi5v4PSui+tw8U6Vw8ZhALnzDgNte+yLpdT0ar6xDj5yRudB8OnHsvImPI2ROH3rqRlqdlxuQM9N20enPcGtlrDBIMlwEnnTVY+7oilVc0TmY+WvBkCDIgHfhE4bjTqpyFuYugAyBlAIJgnbbftpyo3MNerVgaNdUJM7gTA9eFOouLEwTg3Yczr6+LXW9QscSMrakZC2RuQND8gFF0709WJLzlqEQ6m0OjM+d3SNgszUpOdUDGiXTlAAkk9h31XsPRGA1aLWmsSwu4MSI7N3lUP3dsfk4So876woXoreJcsylzYZDmmAO0GZ9UHg/V1xbZWENexp+Fwgx2Dtwrbrd1GvcOqte6C9zBJB0ZAkdgZ0VI7Cc21Vp/8AkCD9QlxzRa5DxzS7PVcEx2heszUnQ78zHaOafbkeoR5aQvJ7HpupIex5bEQ5pOh91r7TqG4tgRdtFSkHimKwc0HMdgWEye8wkvZJ1BlMNRFumagtB3QVxbRqEezLUaHsMgqN2miB/JTF+UVnjZd11tYFE17cOVfVti3ZBbQxJMLDlBWZKipVjypgZRXZjVFNeUXSn2lao38xVs+mChKtKESk0c6ZY0cQ8okrqozUK4neuxfoI8uyLmVHeCuihKf6gPpgIanimijQhOFNc5hKAJkV10r03Wv6wpUhA3e8/Cxvc+vYcqLDsNfXqMpUxL3kNaPfk+g3Xu2HWNDCbUU2xnOr3cvfGpPp2C2Lv8C8sljRy2oW2FUBSogZvzE/E938TisdjN+6u1znHQEIfF8UNV5cTupDZvNJtNpGaocx12HAUepyOcaXR5GbI5dldc0m1nU6Q+J0R/dbGlhraTWtYNQIPvwn4P09Tt2+K8ZqoEA7hvsprasTUeTsAd+8d0rFpnCoy8ivAFe1YqDkkax6KxuYyhv8vw8gbEx81WU2zVBO27vbn+qPr081N7wNTlAHIHYepOqqhbjKQKKC6vDJDdI+HsARye+iv7CqGUA4/lB379/33VAzDjyZGYTO5Ak8ekBN69xIW9tlBgnRoHc6n6IMKe5mxt9HmXVGJGvcPce5A9gdFULpPK4rUqR60Y7UkJdauEJxatNL3AbdpkvqZDBIO+2piDvEq16Xuw9zwxjpe8mdIAJ0Gp/crICqQ0idCtF0niDaEkjQS4n2Gg/r9UpxXkkzY3TZW4xXPjueyWZXeWDq0tOhnvIXHdQ3OsVngkROY5o5g8fJC16xc4uO5JPzJlcsvDDs1SS0a5RpmPaey7aq5Q+MVt5RNbWhLfFquys/KTq95/kHb12Ub7zXTbhMv7x1Z2Z3sANGtA2a0cAIZEoXzIPbfZasvnubBIho8o1766ArdD/09lo6m38apVaXPeSTGWSMk6t0kR39l5iDGycKpiJMe6CWH/F0Lli54ZpMOxa6sTmpOL6J3B8zfZ38JXoXTnUNK9ZIhtQfEydfcdwvLMMxN1M776EHVrh2IVjZsa2qytbuFNzXAlhJykc5TxzoUvJBNe7sZDI4umerPbCjcZ3ULcQaY217J+cOUVlxDWoA7IF4LUe+Qo3CVoSYI267qXxAVytazsq6oHMKJGUmFmiEkF99XVtnUzEtYpG0l1rIRdOmmuRqQK6nKGfSIKtzRRGG4Z49anS/je1vsCdT8hJQxkE/ubj7J8CFKk6+qjVwLac8MHxO+ZH0HqprzGzUqOc4AsBIAIBBHzVx1neNs7QUqflAaGNHZoELF2jc5BJ8gAcT3JGgTdQ3FKKPD1WRykWt3hFGvTLreKNXdskljv5TPw+4QHTVifEipmD2uhwPBG4KsKbpjgA6esD/ALCtL+u2mWvDZfVDR3lzW8+uX/igxKMpXLwSt2gvG7sNp5QRJKqsOrtc15J32jedfqgcXxCcrHfmadZHldxPZNYcun8LQBE66alMlO5bzKbJPvYIMNJnc/qAB3/pordlYMpS8GBBOhHmOuVsc6qswjKBnd2lo7zqJ/U/JE3txncGZdpcZ2kwG6HsgjKo8nJUrH29y0Mc7tO+sei8p6/xnx6+QHy09P8Ay5/wtj1ji7bWgWNP4lUSB2adM36FeTOJJk7lOwrgp02O3uZxJJJPLhzddF1zyRB4TQj7amHQ+JjccTwhk65BboEbSJIEI17crSBPmgAenr67J9iSA5x779yf7okUsxB+HQkHt6+kJcpCpy5Ki5007aIdTXNQE+X4Rt6+p91Emx6HRXA8tGia4riS06hLicdk1cadVjhdvWqBxpjMGauEiY7gcqtVt03iBoVc3B0PsskuDmjT9O3DnN80iDGq0dOsWqCjaA+Zp0OoRrWiNV5klyWxSjFJD6d2CmurwhHCCo60rEzdpYtuQhbqu0hVr7jKq66v9dEStnbAx5EpKq+8EpLaDHVrQyuNZlVmNtVFVpyFlgojpAHVbn7MLRjqtWoQC5jWhvpmmSPpHzWFosLVv/spZrcO9KY/5FMwr/sQGb6GVn2v4icopwNwZ5HoqmyuQ21onlzAT77T/RDfbG8iuBwQicBsvEt6OZ0M8NhJHzke6bqVZ4mVe1P5LCjmqZQ3ygTmPHc6ewR3UAItspcWlrxDmzMbz9HR80NejK1opshsOjTbLAJ190sae84c9zjJ8pB0GkmI9NEnEk7v7E/wZejePpVQ54EOEsk6BoGhPqruniheWAGXP1cRpAjX+6xmN4w2s9hAIhjQ4T+bcx6ao3BL4vqtbw0OP7P0C53GO4dJOMTfFgnQaNl3M+hPykLt9eMpW7q9R4hrSQDoXO3A9ySEA/FqdBsvPy+ciSTwvOeqeoXXTsrZbRYfIzie/wDiUWKO/kDFB5H8FXiV++u/O8kmANTOwiB6IVJJWpJKkemkkqQkkkoWmiR+EPh4B+F3ld6digmslXGGWJcRoe5/slZZJRdi8kkkMxS0dSfldoDqDx+i7d1stGAdXQ0ejYl3+Pmttd4L95tJj8Slt3LeP0XnmIyCB2+X6KbT5PUpPtCcct9AaS6uK4rOpJJLjBw2KYukri45CT6J1TE6nuuOPScCvT4LZO2isRcyszh0ij7EKeldkLz8q9xZiVwRbVqkFJtdBPrhwTaVUbFKoa0T3LA9VFxYOGqsqjuya2v3WptHAVOjoElYB7UkVmDnCVIKSfSaFMWQl2cAXDeFt/sqgfeG/wD1n/mse9krT/ZxXy3LmH87D9WkH+kp2CXvQvMvYzOfbXbxUpv7yEzpNx+4UyDqXPbJO0EwPaAtb9sGFeLaOeBrTOb5crCdG1j9ycN8tQlo7EEO/uqdQk48njZfo/UurckFzXeYgkidMvz+f1hdr3pqipb06cmoGtLSYawyZeSTp7aax6IR+aqC6noSASToAdv37KCnS8L8KTnzfiF0wTtLuS3t/dSxtEteTO9T4eLZ5pDzFpkuiA47eXX4YAVZhuLmg4uAkluX9R/havramx1Km5jQHNac+WSMukH0EkrAFVQjGcWmW4UskOQvEMSqVjLzp24QYSXU5RUVSKVFRVI4n09CCQCJ1BmD6GCD9CEwKemQtbObLhmF0qoDqJdJEuY6DkOmmbcgmYkbDc7oSrhT2nb9+yHp18pzaz6af0XH4jVP5ylVO+BNTvhhlHDj/vQq9wwNZAcWg7fEAd/1WTdcvIgucfSTCj8LWN/rr7Slzwua5ZksTl2z3LA6ApkNdJa4RPBk6EekELA/aZgBt6viAeR8n0B5+u/1VX0tjdazdlkuon46Z2E/nZ/C7nTfnuPYsYsKeJWPlIcS0Frh3iWn991OsfpTtf37/wCxEV6c+7PnpcRr8Pc17qbtHNJbB3zAxCkssMfVOVsepJAaPcnRX71VljyJcgDWEqTwDyQEeyzGbI0mqefDa4j22WqpdMCGuLRSEF3mcC8xv6DnaUqeahU86iYQ0T2XG03HZpMbwCYXqnS+CWNXzCk57mnU1PM0+vbedFF1ldCjFOhSDQNzEAn2C71Xt3JAf8rmkjy0FG4Rb56oHA1V43z61KbX95aJPsYke6lsadvTdma0sPILiQPYld6yaG+smWVanFP5hA5o3RF/fMexoYeTPogXVZScn1Hpab/zHuqRsmG5Kjc5MJlDQ4Np3KIZWBVRKcKpCzYZZbaLqqxcFdWbWYXtCuTorGh2KpKR1Vpb15SZBNBZoTsp8FreBc0nnYOEx2Oh/qoKD0+qO62Lp2LfKo9UxO1bVpua4SHAg+xC8ItqVS1ua2HtZ5i/NT40IGs9tAvcOn7zxaDDzAB9xosR9qvTT6jW3luPxqO8bup7n5jf6r05xWSJ5OWHaZSvp+FQDIggw7vm11+sqne5xIa3iYO2YTz/ADcD2HZdwvFPvTP5wIe2fj+uzhE/VR4lFMg5pDtOxEbhwOxUW1pkKTTp9kF5dPNGqxwPncBr2b7e6xVVkEhay1GcEu0aXCI/MRv78LP4y2Kru06eyfgdSaK9O6k4gK4upKkrOLsriS447Kc1spU6ZOytsNtG5gHNcZ/hEoJzUULyZFBATAApm0A5sg7GPZaC86eqHzNYWtgbxmM7aBEP6YqUgBUcG6TlAg6999dEhztWiR541dgtrc0hS8JtOXEeZ5JBJPLQP3utt9l+IOp1HW75DHyWA7DuAfnPzKzVnYtY7KwZiBmc700ge/8AhMvcReyo00ZNZp8sCRJERHPKS5SsQpXLgk69dQOJllGmauYBtVjXFoe/gEg6ahszp5fmu2nTD6hz3WS2og6U2ntpu0nTTeST+qKwnp77q41qwNSufNlHDnGTJ2LhPsldYdd1zL3EAmfMYA9vr+i31FVIOeVN1EZXxOlS0ofhtaCGwAMxHJA1j3/VD29U12xUkydJdq4k7AD9hTVOm2U48SqJLTOhcJ7rSYXhLKTARvA1I1I0P9lyjbFtrwHYbbMoUwDDYEn98rDdS9QU3VSYDgNh/SVosQupecwBgasMw4djBVZilRsCGNpSBla1oiOZI1WynfFHR75MVcYq92ug1004QFW4c7UlaOrfODjPwjSe/oFXXF3MztxI0RwkvsWQl9kD2t2G/E3MIiZh3/anNTkGQdv+/VR3QBHwNGnAhQ29QQGxHI9e6Jq1ZXpstOvDC21ZT8yEK6KiHaehYTK5KjDkpWUcSykmZ0lphq7i1jUKGmTPqrVpB0KGq0I1CjsYmSUqiJYZ3Ve08jfsp6VRDRjRuuh7nyvZ/CZHsVrXtDhC846Vu/DrtBOjtP8AC9CY6F6umlcF8Hm51U/yePdedKPsapvLZv4R/wDcaPydzp+X+iqTeMuGzAJA537GRyffsvea1JtRpBAM6EHleV9WdBOovdcWgOU6upiTHcgcj0Go9dkWXDv5XZBlx+TLvIhgO4bpEaQT27rNdRMy1StMapIaHgAiSDMlxkg67Rp9Qs31GQ6pmGxmO6mxKsnJ2n+sqVxJOY0kgDcqsvOK7wbpqtcEBrDqYjb6k6BaXovphg/FuACdmtdqGyPijl3b3W1s8Tp0CWULVzgeYAd9NdFJk1Cvav7+CLNquaj+5lbHoRzfjIa1vxOGw9AY8x9la0LF1B2WlTDGmA5xEviQMw9SXDfZXDusWCadW2ewgg99nAgldPV1EkHytmPy7RxOxWJLu+SOTvt2RUaBpuNLJLoDjUcc0CNoPJAO3qm4rYvrEsicommRvIMD6EfQqSrjjHuk1BA0kgDMCNp+fKqv/W6oqGKpLY7jjYmEU5tKrB4HWuEkEPcYmCWN/lh0TsBIPyKMw6xptcTSaJMy46uHpmO3yQTMYquOh0ggZgDoiGYg5p4PozTiJjVJi49sy2T372UtS4Ty4+vCqr2+zQ0Pyy0GexG8+qKrXNMeaqHNE7uGk99EVRbawCC3zCRxMo+OooxGfw2kXhx8ziNJPMzrJWmsw5tNrSdQACTuUNcVhT0JGsx6D1VPinUDWNaGakmD691ybiGlYTitWmx5MSXbnfThUVxXlzy9xjLAjRA4niLnEyYAOnsqk3u5HdBtbHwxthXjMIOhMHTsoH0A4Zg4Abx/ZDVbnczqfogn3R4KbHG/BRGD8BV7UPoAg6boIUVR5O64zdURjSKIxpFxIKjqU4UYcn55CRVHoWMaYUjXqNIhabY8vSUeZJdR1no7gJXQzuozqE9lWdCoGvISZDVpchRg/VGliHuaXIXJ2bZJaV8pDuQQV6jh9wKjGuHIBXkVerpotv0RieellnVpj5K3SSptEuqh7dxsAU/MDuoGulIlegefZmOrOg6N5L2E0qupD27E/wA7NnbDXQ6brxzqnpa9tD+NSLmCYq05cwju7lvz+pX0Y2qunK7dC4pu2cuHaPk0FaLpzBajyKkho47+69k6g+zmxuiXeH4Tz+el5CT3LfhPzCoqfQdzb6U6rarRsHDI/wBtyD76JGeGRxqAOfJJxqJDheHUKetbM9zRLWHN5jtqeyPpeOQXMyQNQyYIE7ZhqFVVKlzbZS+mQWTII0cCeHbE/NF2+OMDQ4uJGwJHmB7OUigk/ejznFlq3Fy1sVaZa7gvbmA/8mDX6BBU7K2qOL6jgcx0jRrudI/2nVeprePMZ4IhD0cSsKm3k9Zy6+ye2nVSv8nUwjFLGg0ANphxdo0DV2yDw/AiynBDcxOYkt+gHoFYULqi10U6rAMmjjlzZgePRR+NclssqUyO5B2Wtxb5X7GUU+MtbbBrt3Ejy7BXr6QY0ugbSs9eWNxcZKrnU3Ma8EgTPldsV3Hb68rNLA0MYSAS3gShW1O6CpcF2KbXtYXgGdQP6KoxVjS4AN2O40A+aJw+1BqMbJDKTQCTInsNVNj1WmSGkgAAx/lMklKNnGbZc1a9U2+duYtOWee4B7wq5+E1Q9pOUhhOmZV99fZKoqUzDmHQ91d32J0ywPgh7myWnuVO1S4HbXGq8lDf21R7joIB80EcoF9nUOzSprq/drGk7oI3r+6ZBSoqhGVDK1JzdwhyIUj3k7pierXZRH5Gp9Pdd0SotkrbCXPCDAU8NULTC6XpFFg5xUb6uiT3oeoUaiDKVI74pXExJHSFbmeneNOqQqzpyoKgyxGyhqPk6LzKssqi3oVZ0K5VcNkIypI9U6lVzaHdC1R3ydq0YEqXpq98GuB+V+nzQ5qnYoa5Bb5hxqEzHJxkmdJbotM9atrlGh8rGYBiwq0g7kaOHYrQW15K9iLUlaPHnFxdMsXJpKa2pKRK0A794ITxdBDOUDwuOD6pY8Q4Ag7g6qhvuk7WpqG5D/Lp+gRDneqHfcuHK5/ILimZnEvs6a6fDrFvuJCobnoK7Zq17H+klpP1Efqt3Uv3hCVsVcEt4sb8HKLPMLy2uLY/jUnsJkAkaH2cNChTidWMud0e69HvMUL2lr2hzTuHCQfkVjcSwamSTT8noZI+R3H6qeWFLoNYr8FW3Ea0AeI6OwJVzbYhXDQ3NMd9ZVHUtKrNInmRBRmH1HUhJmfklSg/AE8La4RubW/qBhdUIOg0jZYbEsZDnuOu5G/CsquMjwy3UuM6wsx9yG5cUai5fUDh0ztuSELpoMhsmZ1Klvr41jn/AE7KA2Y4JTfun8yLYuyr0l2M8Tvqo3NHdEeEAoKrQESQSgxriFGSmkroKNIJROtbKIZ2Q4KkYUMh8KRKuFOlNhCGQuemEqd1NQwjVC5JnYSTwEllm0bZlzrkcmGpBjhJJef5K4jm1SFMHkieUklzOJKNfN7rteppBSSQm+TmGXpoPzD4To4LZUrvQOGx1XUlfpJPoi1cV2WNrfqwZcSkkrjzxxeo3uSSWHA9RyFuKkx+vquJLjAGu5V9criSFhorbgqtruSSS2OiV1d6EqOXEkAaB3uTC5JJYaMc5RuckktNInvQlR8ldSWo4YkkktMOhOCSSxhIkDk4FJJAxiY/hMLZXUkIQyEkkkRh/9k="
            style="max-width:100%" height=200px
            alt="Strength Spinach">
			</div>
			
			<!-- Product Description -->
			<div>
				<form action = "ShoppingCart.php" method ="post">
					<input type = "hidden" name = "pimg" value ="data:image/jpeg;base64,/9j/4AAQSkZJRgABAQAAAQABAAD/2wCEAAkGBxIREhUSEhIVFRUVFxUVFRcWFRYVFRUVFxUWFxUXFRUYHSggGBolHRUVITEhJSkrLi4uFx8zODMtNygtLisBCgoKDg0OGhAQGy0lICUtLS0wLy0tLS0tLS0tLS0tLSstLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLS0tLSstLf/AABEIALcBEwMBIgACEQEDEQH/xAAcAAABBQEBAQAAAAAAAAAAAAAEAAIDBQYBBwj/xAA7EAABAwIFAgQDBgYCAQUAAAABAAIRAwQFEiExQQZREyJhcTKBkQcUI0Kh8FJiscHR8bLhghUzcnOS/8QAGQEAAwEBAQAAAAAAAAAAAAAAAgMEAQAF/8QALBEAAgIBBAEDAwQCAwAAAAAAAAECEQMEEiExQRMiYTJRcYGRofBS0RQjM//aAAwDAQACEQMRAD8AsgEoToShaTkRCjep3BQVTCxhoFfui6FMKqrXGqe2+UGadvg9DDCol4KgCQuyFSi89VK2vKVuY3aWhvpThcqnc5dZWWWdtLplRJ2qrKdytLh2CPrU84MdvVcrBk1HsqMxClp3C7dW9SmS17SPlofYoVzV1ncMNNVXuGYY6pTBzATqSeyy9N2oC0dnjZc0s0a4CA2PiTsNbuSLWZVjSQq+DOqAmjVa4DT0n3VDdYVUpn8R3yGq2WH3GZohgYTvGmqLoUi5g8VoLtZgaR/pOeFPn7ky1U3GoswrLeOZHB7qSFeY5b020gWCBmiPdUbVPJODpluDI8kLYPXYUBVqkbq+oW7qrgxgkn9PdWj+ipGtTX0GiPGpS6GOcY9mJFWVsbfAabKLfEnxTqYJETs2E7C+khRqipUcC1moEbu4n23VH1T1AS4gHKJgHsO8JOqyShUV2yPUaimlEku3mi/IZgiRJBP6bKeldcgrMUMTt5k+JVd24/yrRl54m1MMA45+YQRzOLUX2Nhli6i+WX9viJB1Vnb3gdysqHKejWhXY9S48M2eBPo2lBwKlc9Zm0xPLurOlfB3KsjkjLoleNxLQFMLAVC2rI0TBW1RoElbbCZRPhiFDTdKkK6jLGGmEk1JaZZ59CSRKGubxrBJKSNSJarwBJWdxLFxMAqrx7qEnysKzrbgkySlTtrgfjST5NGbuUz7wqplZEU3SpXCi1SLJlwiqNyqkBOZVhBtDs0LKkpziqqjcIqlULiA0Ek7ACSfYJTQYS2pC3nSeIVnU9G+UaSefZZez6crlzDVYWNcedD9OF6JSy0WNY0aNACOONyZBq80KoOqtkS4Ant6rCY195qVT+D5ZgQNQPdbWncTAOsoO/oEOkTlAJJnX5J84cEO99xZjm0nU61BmQnxCcziNGxxPdayphLC7MAM3dLDbgvPwy3g7/6Rr7sU3AZSBy7gd57LcaUUBkXqPdJkljSLT5mgeqmuLmP7Abpl5c5YAEkn9lUWJXNSX02RMavd+UEbNHffUlNcti5FSmoqkYDHMdqtqeG57vDa/O2dgdR7xvpwrujVkA9wsrjdA1RDZJpZuAM3Jgf3KZhXV1WhSFLKwFs5XuAzBvaT2UTtq12U6XNsi/J7D09SpW9PxKr2tc7XUiQOAocV63tqWjTnP0C8wtWX195mU6lRv8R/Dpf/ALfE/JCV6XhkipWYMs5hR1Mjg1HblbLLljFJKv5f9/QDJmkzV4x1tVfsRTHE6E+zdysxUt7m6fJYY/iqeQR7blXGGU6eHUBdVWZ7mtAo0zqWtdqC6dQY/wAIht86roG+LVcCHknLSpmZ8umpHzWx06Xvm7Ytdq+WR2mC5G6uB9GeVv1GpR9Ck1ugaB++6dgmEOoF7n1M2eJaGw1pHIkyrCpbDhAopco9TFFJcqmCOYIUJapntITGuC5jkMbKkFUt2KeGJrgtTaMdMMtsXjRyNZiDXcqgq0JQzZaqYalrsTLAn0egWT5CJcsfhOOhvlcYWjbiTCJlXxmpK0RyxuLphoCSDF8O64ttA0eS4hjbW8rJ4njLqmgOirKtZztyo1OUpUImV0Li6tCRNTejLaqq8KWk+EqUbHQkXjXaKwwHBal5V8OmQIEucdmhCdP4VWvKgpUW5jyfytHdx4C9JuMCbhVAOY8uq1CG1DwRr8I4AUs04xcq6N1GoWODfkzN/hdtbRTk1HfnO0d4C2+E4xhtu1otmS8gT5SXz/M5y846kk1sw5Eq26Tok+cj9hS4ss4x3rlv+PwePPVZa77N/cXxqODnCI+EdvVTXDtYjQjQ/TZVjJJGomNQeATopsWr5Qw+YCC0kR2034Ve51uYpzbOV7ttN4JMDk/v5q5ta7arZEEHTuP9rN+PT8jywO1AGc5vUmORJ7K1sKwDg5oHhvJIA/KeRHY7rYSdh4pUylxnGzau8Onla4jzOLTAJ5yidIjusbjfUdXI5xOwOpaN9YgzyU3r/EctzV7ZvKDHYagRzusJfXz6p8ziR6mVsccpy56Hwi5v4PSui+tw8U6Vw8ZhALnzDgNte+yLpdT0ar6xDj5yRudB8OnHsvImPI2ROH3rqRlqdlxuQM9N20enPcGtlrDBIMlwEnnTVY+7oilVc0TmY+WvBkCDIgHfhE4bjTqpyFuYugAyBlAIJgnbbftpyo3MNerVgaNdUJM7gTA9eFOouLEwTg3Yczr6+LXW9QscSMrakZC2RuQND8gFF0709WJLzlqEQ6m0OjM+d3SNgszUpOdUDGiXTlAAkk9h31XsPRGA1aLWmsSwu4MSI7N3lUP3dsfk4So876woXoreJcsylzYZDmmAO0GZ9UHg/V1xbZWENexp+Fwgx2Dtwrbrd1GvcOqte6C9zBJB0ZAkdgZ0VI7Cc21Vp/8AkCD9QlxzRa5DxzS7PVcEx2heszUnQ78zHaOafbkeoR5aQvJ7HpupIex5bEQ5pOh91r7TqG4tgRdtFSkHimKwc0HMdgWEye8wkvZJ1BlMNRFumagtB3QVxbRqEezLUaHsMgqN2miB/JTF+UVnjZd11tYFE17cOVfVti3ZBbQxJMLDlBWZKipVjypgZRXZjVFNeUXSn2lao38xVs+mChKtKESk0c6ZY0cQ8okrqozUK4neuxfoI8uyLmVHeCuihKf6gPpgIanimijQhOFNc5hKAJkV10r03Wv6wpUhA3e8/Cxvc+vYcqLDsNfXqMpUxL3kNaPfk+g3Xu2HWNDCbUU2xnOr3cvfGpPp2C2Lv8C8sljRy2oW2FUBSogZvzE/E938TisdjN+6u1znHQEIfF8UNV5cTupDZvNJtNpGaocx12HAUepyOcaXR5GbI5dldc0m1nU6Q+J0R/dbGlhraTWtYNQIPvwn4P09Tt2+K8ZqoEA7hvsprasTUeTsAd+8d0rFpnCoy8ivAFe1YqDkkax6KxuYyhv8vw8gbEx81WU2zVBO27vbn+qPr081N7wNTlAHIHYepOqqhbjKQKKC6vDJDdI+HsARye+iv7CqGUA4/lB379/33VAzDjyZGYTO5Ak8ekBN69xIW9tlBgnRoHc6n6IMKe5mxt9HmXVGJGvcPce5A9gdFULpPK4rUqR60Y7UkJdauEJxatNL3AbdpkvqZDBIO+2piDvEq16Xuw9zwxjpe8mdIAJ0Gp/crICqQ0idCtF0niDaEkjQS4n2Gg/r9UpxXkkzY3TZW4xXPjueyWZXeWDq0tOhnvIXHdQ3OsVngkROY5o5g8fJC16xc4uO5JPzJlcsvDDs1SS0a5RpmPaey7aq5Q+MVt5RNbWhLfFquys/KTq95/kHb12Ub7zXTbhMv7x1Z2Z3sANGtA2a0cAIZEoXzIPbfZasvnubBIho8o1766ArdD/09lo6m38apVaXPeSTGWSMk6t0kR39l5iDGycKpiJMe6CWH/F0Lli54ZpMOxa6sTmpOL6J3B8zfZ38JXoXTnUNK9ZIhtQfEydfcdwvLMMxN1M776EHVrh2IVjZsa2qytbuFNzXAlhJykc5TxzoUvJBNe7sZDI4umerPbCjcZ3ULcQaY217J+cOUVlxDWoA7IF4LUe+Qo3CVoSYI267qXxAVytazsq6oHMKJGUmFmiEkF99XVtnUzEtYpG0l1rIRdOmmuRqQK6nKGfSIKtzRRGG4Z49anS/je1vsCdT8hJQxkE/ubj7J8CFKk6+qjVwLac8MHxO+ZH0HqprzGzUqOc4AsBIAIBBHzVx1neNs7QUqflAaGNHZoELF2jc5BJ8gAcT3JGgTdQ3FKKPD1WRykWt3hFGvTLreKNXdskljv5TPw+4QHTVifEipmD2uhwPBG4KsKbpjgA6esD/ALCtL+u2mWvDZfVDR3lzW8+uX/igxKMpXLwSt2gvG7sNp5QRJKqsOrtc15J32jedfqgcXxCcrHfmadZHldxPZNYcun8LQBE66alMlO5bzKbJPvYIMNJnc/qAB3/pordlYMpS8GBBOhHmOuVsc6qswjKBnd2lo7zqJ/U/JE3txncGZdpcZ2kwG6HsgjKo8nJUrH29y0Mc7tO+sei8p6/xnx6+QHy09P8Ay5/wtj1ji7bWgWNP4lUSB2adM36FeTOJJk7lOwrgp02O3uZxJJJPLhzddF1zyRB4TQj7amHQ+JjccTwhk65BboEbSJIEI17crSBPmgAenr67J9iSA5x779yf7okUsxB+HQkHt6+kJcpCpy5Ki5007aIdTXNQE+X4Rt6+p91Emx6HRXA8tGia4riS06hLicdk1cadVjhdvWqBxpjMGauEiY7gcqtVt03iBoVc3B0PsskuDmjT9O3DnN80iDGq0dOsWqCjaA+Zp0OoRrWiNV5klyWxSjFJD6d2CmurwhHCCo60rEzdpYtuQhbqu0hVr7jKq66v9dEStnbAx5EpKq+8EpLaDHVrQyuNZlVmNtVFVpyFlgojpAHVbn7MLRjqtWoQC5jWhvpmmSPpHzWFosLVv/spZrcO9KY/5FMwr/sQGb6GVn2v4icopwNwZ5HoqmyuQ21onlzAT77T/RDfbG8iuBwQicBsvEt6OZ0M8NhJHzke6bqVZ4mVe1P5LCjmqZQ3ygTmPHc6ewR3UAItspcWlrxDmzMbz9HR80NejK1opshsOjTbLAJ190sae84c9zjJ8pB0GkmI9NEnEk7v7E/wZejePpVQ54EOEsk6BoGhPqruniheWAGXP1cRpAjX+6xmN4w2s9hAIhjQ4T+bcx6ao3BL4vqtbw0OP7P0C53GO4dJOMTfFgnQaNl3M+hPykLt9eMpW7q9R4hrSQDoXO3A9ySEA/FqdBsvPy+ciSTwvOeqeoXXTsrZbRYfIzie/wDiUWKO/kDFB5H8FXiV++u/O8kmANTOwiB6IVJJWpJKkemkkqQkkkoWmiR+EPh4B+F3ld6digmslXGGWJcRoe5/slZZJRdi8kkkMxS0dSfldoDqDx+i7d1stGAdXQ0ejYl3+Pmttd4L95tJj8Slt3LeP0XnmIyCB2+X6KbT5PUpPtCcct9AaS6uK4rOpJJLjBw2KYukri45CT6J1TE6nuuOPScCvT4LZO2isRcyszh0ij7EKeldkLz8q9xZiVwRbVqkFJtdBPrhwTaVUbFKoa0T3LA9VFxYOGqsqjuya2v3WptHAVOjoElYB7UkVmDnCVIKSfSaFMWQl2cAXDeFt/sqgfeG/wD1n/mse9krT/ZxXy3LmH87D9WkH+kp2CXvQvMvYzOfbXbxUpv7yEzpNx+4UyDqXPbJO0EwPaAtb9sGFeLaOeBrTOb5crCdG1j9ycN8tQlo7EEO/uqdQk48njZfo/UurckFzXeYgkidMvz+f1hdr3pqipb06cmoGtLSYawyZeSTp7aax6IR+aqC6noSASToAdv37KCnS8L8KTnzfiF0wTtLuS3t/dSxtEteTO9T4eLZ5pDzFpkuiA47eXX4YAVZhuLmg4uAkluX9R/havramx1Km5jQHNac+WSMukH0EkrAFVQjGcWmW4UskOQvEMSqVjLzp24QYSXU5RUVSKVFRVI4n09CCQCJ1BmD6GCD9CEwKemQtbObLhmF0qoDqJdJEuY6DkOmmbcgmYkbDc7oSrhT2nb9+yHp18pzaz6af0XH4jVP5ylVO+BNTvhhlHDj/vQq9wwNZAcWg7fEAd/1WTdcvIgucfSTCj8LWN/rr7Slzwua5ZksTl2z3LA6ApkNdJa4RPBk6EekELA/aZgBt6viAeR8n0B5+u/1VX0tjdazdlkuon46Z2E/nZ/C7nTfnuPYsYsKeJWPlIcS0Frh3iWn991OsfpTtf37/wCxEV6c+7PnpcRr8Pc17qbtHNJbB3zAxCkssMfVOVsepJAaPcnRX71VljyJcgDWEqTwDyQEeyzGbI0mqefDa4j22WqpdMCGuLRSEF3mcC8xv6DnaUqeahU86iYQ0T2XG03HZpMbwCYXqnS+CWNXzCk57mnU1PM0+vbedFF1ldCjFOhSDQNzEAn2C71Xt3JAf8rmkjy0FG4Rb56oHA1V43z61KbX95aJPsYke6lsadvTdma0sPILiQPYld6yaG+smWVanFP5hA5o3RF/fMexoYeTPogXVZScn1Hpab/zHuqRsmG5Kjc5MJlDQ4Np3KIZWBVRKcKpCzYZZbaLqqxcFdWbWYXtCuTorGh2KpKR1Vpb15SZBNBZoTsp8FreBc0nnYOEx2Oh/qoKD0+qO62Lp2LfKo9UxO1bVpua4SHAg+xC8ItqVS1ua2HtZ5i/NT40IGs9tAvcOn7zxaDDzAB9xosR9qvTT6jW3luPxqO8bup7n5jf6r05xWSJ5OWHaZSvp+FQDIggw7vm11+sqne5xIa3iYO2YTz/ADcD2HZdwvFPvTP5wIe2fj+uzhE/VR4lFMg5pDtOxEbhwOxUW1pkKTTp9kF5dPNGqxwPncBr2b7e6xVVkEhay1GcEu0aXCI/MRv78LP4y2Kru06eyfgdSaK9O6k4gK4upKkrOLsriS447Kc1spU6ZOytsNtG5gHNcZ/hEoJzUULyZFBATAApm0A5sg7GPZaC86eqHzNYWtgbxmM7aBEP6YqUgBUcG6TlAg6999dEhztWiR541dgtrc0hS8JtOXEeZ5JBJPLQP3utt9l+IOp1HW75DHyWA7DuAfnPzKzVnYtY7KwZiBmc700ge/8AhMvcReyo00ZNZp8sCRJERHPKS5SsQpXLgk69dQOJllGmauYBtVjXFoe/gEg6ahszp5fmu2nTD6hz3WS2og6U2ntpu0nTTeST+qKwnp77q41qwNSufNlHDnGTJ2LhPsldYdd1zL3EAmfMYA9vr+i31FVIOeVN1EZXxOlS0ofhtaCGwAMxHJA1j3/VD29U12xUkydJdq4k7AD9hTVOm2U48SqJLTOhcJ7rSYXhLKTARvA1I1I0P9lyjbFtrwHYbbMoUwDDYEn98rDdS9QU3VSYDgNh/SVosQupecwBgasMw4djBVZilRsCGNpSBla1oiOZI1WynfFHR75MVcYq92ug1004QFW4c7UlaOrfODjPwjSe/oFXXF3MztxI0RwkvsWQl9kD2t2G/E3MIiZh3/anNTkGQdv+/VR3QBHwNGnAhQ29QQGxHI9e6Jq1ZXpstOvDC21ZT8yEK6KiHaehYTK5KjDkpWUcSykmZ0lphq7i1jUKGmTPqrVpB0KGq0I1CjsYmSUqiJYZ3Ve08jfsp6VRDRjRuuh7nyvZ/CZHsVrXtDhC846Vu/DrtBOjtP8AC9CY6F6umlcF8Hm51U/yePdedKPsapvLZv4R/wDcaPydzp+X+iqTeMuGzAJA537GRyffsvea1JtRpBAM6EHleV9WdBOovdcWgOU6upiTHcgcj0Go9dkWXDv5XZBlx+TLvIhgO4bpEaQT27rNdRMy1StMapIaHgAiSDMlxkg67Rp9Qs31GQ6pmGxmO6mxKsnJ2n+sqVxJOY0kgDcqsvOK7wbpqtcEBrDqYjb6k6BaXovphg/FuACdmtdqGyPijl3b3W1s8Tp0CWULVzgeYAd9NdFJk1Cvav7+CLNquaj+5lbHoRzfjIa1vxOGw9AY8x9la0LF1B2WlTDGmA5xEviQMw9SXDfZXDusWCadW2ewgg99nAgldPV1EkHytmPy7RxOxWJLu+SOTvt2RUaBpuNLJLoDjUcc0CNoPJAO3qm4rYvrEsicommRvIMD6EfQqSrjjHuk1BA0kgDMCNp+fKqv/W6oqGKpLY7jjYmEU5tKrB4HWuEkEPcYmCWN/lh0TsBIPyKMw6xptcTSaJMy46uHpmO3yQTMYquOh0ggZgDoiGYg5p4PozTiJjVJi49sy2T372UtS4Ty4+vCqr2+zQ0Pyy0GexG8+qKrXNMeaqHNE7uGk99EVRbawCC3zCRxMo+OooxGfw2kXhx8ziNJPMzrJWmsw5tNrSdQACTuUNcVhT0JGsx6D1VPinUDWNaGakmD691ybiGlYTitWmx5MSXbnfThUVxXlzy9xjLAjRA4niLnEyYAOnsqk3u5HdBtbHwxthXjMIOhMHTsoH0A4Zg4Abx/ZDVbnczqfogn3R4KbHG/BRGD8BV7UPoAg6boIUVR5O64zdURjSKIxpFxIKjqU4UYcn55CRVHoWMaYUjXqNIhabY8vSUeZJdR1no7gJXQzuozqE9lWdCoGvISZDVpchRg/VGliHuaXIXJ2bZJaV8pDuQQV6jh9wKjGuHIBXkVerpotv0RieellnVpj5K3SSptEuqh7dxsAU/MDuoGulIlegefZmOrOg6N5L2E0qupD27E/wA7NnbDXQ6brxzqnpa9tD+NSLmCYq05cwju7lvz+pX0Y2qunK7dC4pu2cuHaPk0FaLpzBajyKkho47+69k6g+zmxuiXeH4Tz+el5CT3LfhPzCoqfQdzb6U6rarRsHDI/wBtyD76JGeGRxqAOfJJxqJDheHUKetbM9zRLWHN5jtqeyPpeOQXMyQNQyYIE7ZhqFVVKlzbZS+mQWTII0cCeHbE/NF2+OMDQ4uJGwJHmB7OUigk/ejznFlq3Fy1sVaZa7gvbmA/8mDX6BBU7K2qOL6jgcx0jRrudI/2nVeprePMZ4IhD0cSsKm3k9Zy6+ye2nVSv8nUwjFLGg0ANphxdo0DV2yDw/AiynBDcxOYkt+gHoFYULqi10U6rAMmjjlzZgePRR+NclssqUyO5B2Wtxb5X7GUU+MtbbBrt3Ejy7BXr6QY0ugbSs9eWNxcZKrnU3Ma8EgTPldsV3Hb68rNLA0MYSAS3gShW1O6CpcF2KbXtYXgGdQP6KoxVjS4AN2O40A+aJw+1BqMbJDKTQCTInsNVNj1WmSGkgAAx/lMklKNnGbZc1a9U2+duYtOWee4B7wq5+E1Q9pOUhhOmZV99fZKoqUzDmHQ91d32J0ywPgh7myWnuVO1S4HbXGq8lDf21R7joIB80EcoF9nUOzSprq/drGk7oI3r+6ZBSoqhGVDK1JzdwhyIUj3k7pierXZRH5Gp9Pdd0SotkrbCXPCDAU8NULTC6XpFFg5xUb6uiT3oeoUaiDKVI74pXExJHSFbmeneNOqQqzpyoKgyxGyhqPk6LzKssqi3oVZ0K5VcNkIypI9U6lVzaHdC1R3ydq0YEqXpq98GuB+V+nzQ5qnYoa5Bb5hxqEzHJxkmdJbotM9atrlGh8rGYBiwq0g7kaOHYrQW15K9iLUlaPHnFxdMsXJpKa2pKRK0A794ITxdBDOUDwuOD6pY8Q4Ag7g6qhvuk7WpqG5D/Lp+gRDneqHfcuHK5/ILimZnEvs6a6fDrFvuJCobnoK7Zq17H+klpP1Efqt3Uv3hCVsVcEt4sb8HKLPMLy2uLY/jUnsJkAkaH2cNChTidWMud0e69HvMUL2lr2hzTuHCQfkVjcSwamSTT8noZI+R3H6qeWFLoNYr8FW3Ea0AeI6OwJVzbYhXDQ3NMd9ZVHUtKrNInmRBRmH1HUhJmfklSg/AE8La4RubW/qBhdUIOg0jZYbEsZDnuOu5G/CsquMjwy3UuM6wsx9yG5cUai5fUDh0ztuSELpoMhsmZ1Klvr41jn/AE7KA2Y4JTfun8yLYuyr0l2M8Tvqo3NHdEeEAoKrQESQSgxriFGSmkroKNIJROtbKIZ2Q4KkYUMh8KRKuFOlNhCGQuemEqd1NQwjVC5JnYSTwEllm0bZlzrkcmGpBjhJJef5K4jm1SFMHkieUklzOJKNfN7rteppBSSQm+TmGXpoPzD4To4LZUrvQOGx1XUlfpJPoi1cV2WNrfqwZcSkkrjzxxeo3uSSWHA9RyFuKkx+vquJLjAGu5V9criSFhorbgqtruSSS2OiV1d6EqOXEkAaB3uTC5JJYaMc5RuckktNInvQlR8ldSWo4YkkktMOhOCSSxhIkDk4FJJAxiY/hMLZXUkIQyEkkkRh/9k=" />
					<input type = "hidden" name = "pname" value ="Strength Spinach" />
					<input type = "hidden" name = "pprice" value = "8.00" />
					<p>Strength Spinach</p>
					<p>$8.00/each</p>
					
					<!-- Select Quantity -->
					<label for="quantity">Quantity:</label>
                    <select id="StrengthSpinachselect1"name="quantity">
                        <option value="0">0</option>
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                    </select>
					<p />
					
					<!-- Select Size -->
					<label for="size">Size:</label>
                    <select id="StrengthSpinachselect2"name="size">
                        <option value="Small">Small</option>
                        <option value="Medium">Medium</option>
                        <option value="Large">Large</option>
                    </select>
					<p />
					
					<!-- Select Type -->
					<label for="type">Type:</label>
                    <select id="StrengthSpinachselect3"name="type">
                        <option value="green">Green</option>
                        <option value="turquoise">Turquoise</option>
                        <option value="rainbow">Rainbow</option>>
                    </select> 
					<p />
					
					<!-- Add to Cart Button -->
					<input type ="submit" name = "addButton" value = "Add to Cart" />
				</form>
			</div>
			
			<div>
				<!-- More Description -->
				<br>
				<b>Product Description: </b><br><br>
				<p>
					So small, yet so nutritious!
                    <br>This is the spinach that Popeye himself had before any challenge!
                    <br>Take these if you want to go to the gym and show everyone how strong you are!
					
					<!-- Adding ... to text -->
					<span id = "dots">...</span>
					
					<!-- More Button -->
					<span id ="more">
						<br><br>Origin: Strength Galaxy<br>
                        Product Number: 000004
					</span>
				</p>
				
				<div>
					<button onclick="myFunction()" id="myBtn">More Description</button>
				</div>
			</div>
			<div></div>
			<div></div>
			<div></div>
			<div></div>
		</div>
		
		<!-- Footer -->
		<footer class = "footer">
			<h1>Copyright Planting Planets SOEN 287</h1>
		</footer>
		
		
		<script>
		<!--JavaScript for More Description -->
			function myFunction() {
				var dots = document.getElementById("dots");
				var moreText = document.getElementById("more");
				var btnText = document.getElementById("myBtn");

				if (dots.style.display === "none") {
					dots.style.display = "inline";
					btnText.innerHTML = "More Description"; 
					moreText.style.display = "none";
				} else {
					dots.style.display = "none";
					btnText.innerHTML = "Less Description"; 
					moreText.style.display = "inline";
				}
			}
		
		<!-- JavaScript for Page Refresh -->
var StrengthSpinachselect1 = document.getElementById('StrengthSpinachselect1');
var StrengthSpinachselect2 = document.getElementById('StrengthSpinachselect2');
var StrengthSpinachselect3 = document.getElementById('StrengthSpinachselect3');

if(!localStorage.getItem('StrengthSpinachselect1')) {
  populateStorage();
} else {
  setStyles();
}

function populateStorage() {
  localStorage.setItem('StrengthSpinachselect1', document.getElementById('StrengthSpinachselect1').value);
  localStorage.setItem('StrengthSpinachselect2', document.getElementById('StrengthSpinachselect2').value);
  localStorage.setItem('StrengthSpinachselect3', document.getElementById('StrengthSpinachselect3').value);

  setStyles();
}

function setStyles() {
  var currentStrengthSpinachselect1 = localStorage.getItem('StrengthSpinachselect1');
  var currentStrengthSpinachselect2 = localStorage.getItem('StrengthSpinachselect2');
  var currentStrengthSpinachselect3 = localStorage.getItem('StrengthSpinachselect3');

  document.getElementById('StrengthSpinachselect1').value = currentStrengthSpinachselect1;
  document.getElementById('StrengthSpinachselect2').value = currentStrengthSpinachselect2;
  document.getElementById('StrengthSpinachselect3').value = currentStrengthSpinachselect3;


}

StrengthSpinachselect1.onchange = populateStorage;
StrengthSpinachselect2.onchange = populateStorage;
StrengthSpinachselect3.onchange = populateStorage;
		</script>
	</body>
</html>
