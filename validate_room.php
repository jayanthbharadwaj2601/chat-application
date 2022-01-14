<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
		body
		{
			color: white;
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
	</style>
</head>
<body>
	<?php
		$name=$_POST['room'];
		// echo $name;
		$conn=mysqli_connect("localhost","root","","user");
		$query="select roomname from rooms";
		$result=mysqli_query($conn,$query);
		$c1=0;
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{	
				if($name==$row["roomname"])
				{
					// echo $row["roomname"];
					$c1+=1;
				}
			}
		}
		echo $c1."<br>";
		if($c1==0)
		{
			$query2="insert into rooms values('$name')";
			mysqli_query($conn,$query2);
			echo "<h1>room sucessfully created!!";
			echo "Go back to homepage</h1>";
		}
		else
		{
			echo "<h1>Room ".$name." already exists</h1>";
		}
?>
</body>
</html>