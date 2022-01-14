<!DOCTYPE html>
<html>
<head>
	<style>
		body
		{
			background-image: url('background_chat_program.jpg');
			background-size:2000px;
			background-attachment: fixed;
		}
		h1
		{
			color: white;
			font-family: arial;
			background-color: black;
			max-width: 700px;
			padding: 1% 1%;
			border-radius: 10px;
			box-shadow: 5px 5px 5px grey;
		}
		#x1
		{
			padding: 1% 1%;
			font-family: arial;
			font-size: 18px;
			color:black;
			font-weight: bold;
			box-shadow: 5px 5px 5px grey;
		}
		#submit
		{
			padding: 2% 1%;
			border-radius: 10px;
			color: white;
			background-color: #0D98BA;
			font-weight: bold;
			font-family: arial;
			font-size: 20px;
			box-shadow: 5px 5px 5px grey;
			text-align: left;
		}
	</style>
</head>
<body>
	<h1> Enter name of the Group</h1>
	<?php
	$p=explode('.',$_POST['submit']);
	$x=$p[1];
	// echo $x;
	echo"<form action='validate_join.php' method='GET'>
		<input type='text' name='room' id='x1'><br><br>
		<input type='submit' name='submit' value='join.$x' id='submit'>
	</form>";
	?>
</body>
</html>