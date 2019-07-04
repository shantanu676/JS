<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<title>LogIn</title>
</head>
<body style="background-color: rgb(53,152,220);">
	<div style="position: absolute; background-color: white; left: 35%; top: 20%; height: 50%; width: 30%; border-radius: 2px;">
		<h1 style="margin-left: 5%; font-family: sans-serif;">Log In</h1>
		<h4 style="color: rgb(153,153,153); font-family: sans-serif; margin-top: -3%; margin-left: 5%;">Please fill in the details to Log In!</h4><hr style="color: rgb(242,242,242);">
		<form action="login.php" method="post">
			<input type="text" name="login-email" placeholder="E-mail Address" style="margin-top: 5%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 80%; font-size: 130%; padding-left: 10px;">
			<input type="password" name="login-pwd" placeholder="Password" style="margin-top: 5%; margin-left: 5%; border-radius: 2px; background-color: rgb(242,242,242); border-width: 0px; height: 40px; width: 80%; font-size: 130%; padding-left: 10px;">
			<button type="submit" name="login-submit" style="background-color: rgb(53,152,220); border-radius: 2px; height: 50px; width: 30%; border-width: 0px; margin-left: 5%; margin-top: 7%; color: white; font-size: 150%">Log In</button><br>
		</form>
		<h4 style="font-family: sans-serif; color: rgb(153,153,153); margin-left: 25%; margin-top: 5%;">Unregistered User? <a href="signup.php">Sign Up</a></h4>
		<?php
			if(isset($_POST["login-submit"])){
				$connection = mysqli_connect('localhost', 'root', '', 'examsystem');
				if(!$connection){
					echo "Connection Failed";
				}
				$email = $_POST["login-email"];
				$pwd = $_POST["login-pwd"];
				if (empty($email)||empty($pwd)){
					echo '<h5 style="color: red; font-family: sans-serif; margin-left: 29%;">One or more fields is empty!</h5>';
					exit();
				}
				else if(!filter_var($email, FILTER_VALIDATE_EMAIL)){
					echo '<h5 style="color: red; font-family: sans-serif; margin-left: 39%;">Invalid E-mail!</h5>';
					exit();
				}
				else{
					$sql = "SELECT * FROM users WHERE email='".$email."'";
					$result = mysqli_query($connection, $sql);
					$row = mysqli_fetch_assoc($result);
					if(($row['email'] == $email) && ($row['pwd'] == $pwd)){
						$_SESSION['user-email']=$row['email'];
						echo '<h5 style="color: green; font-family: sans-serif; margin-left: 36%; margin-top: -2%;">Log In Successful!</h5>';
						echo '<h4 style="font-family: sans-serif; margin-left: 36%; margin-top: -3%;"><a href="q1.php">Proceed to Test</a></h4>';
					}
					else{
						echo '<h5 style="color: red; font-family: sans-serif; margin-left: 18%;">Invalid E-mail or Password, please try again!</h5>';
					}
				}
			} 
		?>
	</div>
</body>
</html>