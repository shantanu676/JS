<!DOCTYPE html>
<html>
<head>
	<title>SignUp</title>
</head>
<body style="background-color: rgb(53,152,220);">
	<div style="position: absolute; background-color: white; left: 35%; top: 10%; height: 65%; width: 30%; border-radius: 2px;">
		<h1 style="margin-left: 5%; font-family: sans-serif;">Sign Up</h1>
		<h4 style="color: rgb(153,153,153); font-family: sans-serif; margin-top: -3%; margin-left: 5%;">Please fill in the form to create an account!</h4>
		<hr style="color: rgb(242,242,242);">
		<form action="signup.php" method="post">
			<input type="text" name="signup-fname" placeholder="First Name" style="margin-top: 3%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 36%; font-size: 130%; padding-left: 10px;">
			<input type="text" name="signup-lname" placeholder="Last Name" style="margin-top: 3%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 36%; font-size: 130%; padding-left: 10px;">
			<input type="text" name="signup-email" placeholder="E-mail Address" style="margin-top: 5%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 80%; font-size: 130%; padding-left: 10px;">
			<input type="password" name="signup-pwd" placeholder="Password" style="margin-top: 5%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 80%; font-size: 130%; padding-left: 10px;">
			<input type="password" name="signup-pwd-confirm" placeholder="Confirm Password" style="margin-top: 5%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 80%; font-size: 130%; padding-left: 10px;">
			<button type="submit" name="signup-submit" style="background-color: rgb(53,152,220); border-radius: 2px; height: 50px; width: 30%; border-width: 0px; margin-left: 5%; margin-top: 7%; color: white; font-size: 150%">Sign Up</button><br>
		</form>
		<h4 style="font-family: sans-serif; color: rgb(153,153,153); margin-left: 25%;">Already a member? <a href="login.php">Log In</a></h4>
		<?php
			if(isset($_POST["signup-submit"])){
				$connection = mysqli_connect('localhost', 'root', '', 'examsystem');
				if(!$connection){
					echo "Connection Failed";
				}
				$fname = $_POST["signup-fname"];
				$lname = $_POST["signup-lname"];
				$email = $_POST["signup-email"];
				$pwd = $_POST["signup-pwd"];
				$rpwd = $_POST["signup-pwd-confirm"];
				if (empty($fname)||empty($lname)||empty($email)||empty($pwd)||empty($rpwd)){
					echo '<h5 style="color: red; font-family: sans-serif; margin-left: 27%;">One or more fields is empty!</h5>';
					exit();
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo '<h5 style="color: red; font-family: sans-serif; margin-left: 36%;">Invalid E-mail!</h5>';
					exit();
				}
				else if ($pwd !== $rpwd){
					echo('<h5 style="color: red; font-family: sans-serif; margin-left: 30%;">Passwords do not match!</h5>');
					exit();
				}
				else{
					$sql = "INSERT INTO users (fname, lname, email, pwd) VALUES ('$fname', '$lname', '$email', '$pwd')";
					mysqli_query($connection, $sql);
					echo '<h5 style="color: green; font-family: sans-serif; margin-left: 32%;">Sign Up Successful!</h5>';
					echo '<h4 style="font-family: sans-serif; margin-left: 32%; margin-top: -3%;"><a href="login.php">Proceed to Login</a></h4>';
				}
			}
		?>
	</div>
</body>
</html>