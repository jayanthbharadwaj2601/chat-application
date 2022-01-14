<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<form action="#" action="POST">
		<h1>Enter the name of the room</h1>
		<input type="text" name="room">
		<input type="submit" name="submit" value="create">
	</form>
	<?php
		if($_POST)
		{
			$name=$_POST['room'];
			$conn=mysqli_connect("localhost","root","","user");
			$query="select roomname from rooms";
			$r1=mysqli_query($conn,$query);
			$c=0;
			if(mysqli_num_rows($r1))
			{
				while($row=mysqli_fetch_assoc($r1))
				{
					if($name==$row["roomname"])
					{
						$c+=1;
						break;
					}
				}
			}
			if($c==0)
			{
				$query="create table '$name' (user varchar(20),message varchar(10000))";
				mysqli_query($conn,$query);
				echo "room sucessfully created!!";
				echo "<a href='homepage.php'> Return to homepage</a>";
			}
			else
			{
				echo "Room ".$name." already exists";
			}
		}
	?>
</body>
</html>