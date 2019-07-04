<!DOCTYPE html>
<?php
	session_start();
?>
<html>
<head>
	<title>Question 1</title>
</head>
<body>
	<div style="background-color: rgb(242,242,242); color: rgb(153,153,153); font-family: sans-serif; padding: 2px;">
		<h2>Question 1</h2>
	</div>
	<p style="margin-left: 3%; font-size: 200%;">Q1. ABCDEFGHIGKLMNOPQRSTUVWXYZ</p>
	<form method="post" action="q1.php" style="margin-left: 10%; font-size: 150%;">
		<input type="radio" name="option" value="option-1">Option 1<br><br>
		<input type="radio" name="option" value="option-2">Option 2<br><br>
		<input type="radio" name="option" value="option-3">Option 3<br><br>
		<input type="radio" name="option" value="option-4">Option 4<br><br>
		<button type="submit" name="submit-q1" style="background-color: rgb(0,152,70); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 5%;">Submit</button>
		<?php
			if(isset($_SESSION['user-email'])){
				if(isset($_POST['submit-q1'])){
					if(isset($_POST['option'])){
						$connection = mysqli_connect('localhost', 'root', '', 'examsystem');
						if(!$connection){
							echo "Connection Failed";
						}
						if($_POST['option'] == 'option-1'){
							$score1=1;
						}
						else{
							$score1=(-0.5);
						}
					}
					$temp_variable=$_SESSION['user-email'];
					echo($temp_variable);
					$sql = "INSERT INTO users (Q1) VALUES ('$score1') WHERE email='".$temp_variable."'";
					mysqli_query($connection, $sql);
				}
			}
		?>
	</form>
	<button style="background-color: rgb(118,144,201); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 15%; margin-left: 15%;">Previous</button>
	<a href="q2.php"><button style="background-color: rgb(30,77,179); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 15%; margin-left: 2%; width: 5%;">Next</button></a>
</body>
</html>
