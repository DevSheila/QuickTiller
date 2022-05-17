<!DOCTYPE html>
<html>
<head>
	<title>Log in</title>
	<link rel="stylesheet" type="text/css" href="style3.css">
</head>

<body>
	<h1>Login</h1>
	<div>
		<form action="authentication.php" onsubmit="return validation" method="post">
			<label for="fullname"><p>Full Name</p></label> 
			<input class="form control" type="text" name="fullname" required> 

			<label for="Password"><p>Password</p></label>
			<input class="form control" type="Password" name="Password" required> 
			<br>
			


			<p><a href="authentication.php">Log In</p>

			<p>Dont have an account?</p>
			<p2><a href="registration.php"> Sign Up</p2>


	</div>

</body>
</html>