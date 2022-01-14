<!DOCTYPE html>
<html>
<head>
	<style type="text/css">
		body
		{
			background-image: url('background_chat_program.jpg');
			background-size:2000px;
			background-attachment: fixed;
		}
		h1
		{
			color: white;
			background-color: black;
			width: 40%;
			padding: 1% 1%;
			font-family: arial;
			border-radius: 10px;
			box-shadow: 5px 5px 5px grey;
		}
		#joining
		{
			color: white;
			background-color: black;
			font-family: arial;
			font-weight: bold;
			/*font-size: 20px;*/
			top: 100px;
			width: 34.6%;
			padding: 2% 1%;
		}
		#creation
		{
			color: white;
			background-color: black;
			width: 34.6%;
			font-family: arial;
			font-weight: bold;
			/*font-size: 20px;*/
			top: 90px;
			padding: 1% 1%;
		}
		table
		{
			width: 33%;
			font-family: arial;
			font-size: 20px;
			border-style: thick;
			background-color: white;
			font-family: arial;
		}
	</style>
</head>
<body>
	<?php
		$username=$_POST['username'];
		$password=$_POST['password'];
		$x='join group ';
		$conn=mysqli_connect("localhost","root","","user");
		$query="select password from login where username='$username'";
		$result=mysqli_query($conn,$query);
		$c=0;
		if(mysqli_num_rows($result))
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($password==$row["password"])
				{
					$c+=1;
					break;
				}
			}
		}
		if($c>0)
		{
			echo"<h1>Welcome ".$username."</h1>";
			echo"<form action='create.html' method='POST' id='buttons'>
		<input type='submit' name='submit' value='Create new Group' id='creation'>
	</form>
	<form action='join.php' method='POST'>
		<input type='submit' name='submit' value='$x.$username' id='joining'>
	</form><br>";
		$conn=mysqli_connect("localhost","root","","user");
		$query="select * from rooms";
		$result=mysqli_query($conn,$query);
		if(mysqli_num_rows($result))
		{
			echo "<table border=4>";
			echo"<tr><th> Active rooms: </th></tr>";
			while($row=mysqli_fetch_assoc($result))
			{
				echo"<tr><td>".$row["roomname"]."</td></tr>";
			}
			echo "</table>";
		}
		}
		else
		{
			echo "<h1>Incorrect username/Password</h1>";
		}

	?>
</body>
</html>