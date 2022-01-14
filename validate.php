<!DOCTYPE html>
<html>
<head>
	<title></title>
	<style type="text/css">
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
		a
		{
			color: skyblue;
		}
	</style>
</head>
<body>
	<?php
		$username=$_POST['username'];
		$password=$_POST['password'];
		// echo "".$username." ".$password;
		$conn= mysqli_connect("localhost","root","","user");
		$query1="insert into login values('$username','$password')";
		$query2="select username from login";
		$result=mysqli_query($conn,$query2);
		$g=array();
		if (mysqli_num_rows($result))
		{
			while($row=mysqli_fetch_assoc($result))
			{
				array_push($g,$row["username"]);
			}
		}
		$c=0;
		for($i=0;$i<sizeof($g);$i++)
		{
			if($g[$i]==$username)
			{
				$c+=1;
			}
		}
		if($c==0)
		{
			mysqli_query($conn,$query1);
			echo "<h1>User Created Successfully!!<br>";
			echo "<a href='login.html'>Click here to login </a></h1>";
		}
		else
		{
			echo "<h1>Username Already exists!! ";
			echo "<a href='signup.html'>Sign up Again </a></h1>";
		}
		// echo "".$g;
		// mysqli_query($conn,$query);
	?>
</body>
</html>