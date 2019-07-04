<!DOCTYPE html>
<html>
<head>
	<title>Question 3</title>
</head>
<body>
	<div style="background-color: rgb(242,242,242); color: rgb(153,153,153); font-family: sans-serif; padding: 2px;">
		<h2>Question 3</h2>
	</div>
	<p style="margin-left: 3%; font-size: 200%;">Q3. ABCDEFGHIGKLMNOPQRSTUVWXYZ</p>
	<form method="post" action="radio.php" style="margin-left: 10%; font-size: 150%;">
		<input type="radio" name="option" value="option-1">Option 1<br><br>
		<input type="radio" name="option" value="option-2">Option 2<br><br> 
		<input type="radio" name="option" value="option-3">Option 3<br><br> 
		<input type="radio" name="option" value="option-4">Option 4<br><br>
		<a href="q4.php"><button type="submit" name="submit-q3" style="background-color: rgb(0,152,70); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 5%;">Submit and Next</button></a>
	</form>
	<a href="q2.php"><button style="background-color: rgb(30,77,179); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 15%; margin-left: 15%;">Previous</button></a>
	<a href="q4.php"><button style="background-color: rgb(30,77,179); color: white; font-size: 100%; padding: 5px; border-width: 0px; border-radius: 2px; margin-top: 15%; margin-left: 2%; width: 5%;">Next</button></a>
	<?php
		include "radio.php"
	?>
</body>
</html>