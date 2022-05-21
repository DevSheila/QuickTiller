
<!DOCTYPE html>
<html>
<head>
	<title>User Registration | PHP</title>
	<link rel="stylesheet" type="text/css" href="style2.css" >
</head>
<body>
	

<center>
	
		<form action="login.php" onsubmit="return validation" method="post">
			

				<center>
				
						
							<h1>The Automatic Quick Tiller</h1>
							<h2>Create Your Profile</h2>
							<p>All your shopping e-reciepts are sent to your mobile & email.<br>
						All your data is safe with us</p>

						
						
						<div>
							<label for="fullname"><p>Full Name</p> </label> 
						<input class="form control" type="text" name="fullname" required>
						

						<label for="mobilenumber"><p>Mobile Number</p> </label> 
						<input class="form control" type="text" name="mobilenumber" required>
					

						<label for="emailaddress"><p>Email Address</p> </label> 
						<input class="form control" type="text" name="emailaddress" required>
						<br>

						<label for="Password"><p>Password</p> </label>
						<input class="form control" type="Password" name="Password" required>
						<br>

						<br class="mb-3">

						<input class="one" type="submit" name="create" value="Save and Proceed">
						

						<p>Already a Member? <a href="login.php">Log In</p>
						</div>

						
					<br>
						
				</center>
				
		</form>

</center>
	

</body>
</html>