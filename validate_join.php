<!DOCTYPE html>
<html>
<head>
	<script>
/* source of the function down below: https://www.encodedna.com/javascript/auto-refresh-page-every-10-second-using-javascript-setInterval-method.htm*/
    window.setInterval('refresh()', 12000); 	// Call a function every 10000 milliseconds (OR 10 seconds).
    // Refresh or reload page.
    function refresh() {
    	sessionStorage.setItem("name",document.getElementById('y1').value);
        window .location.reload();
    }
    window.onload = function()
    {
    	var name = sessionStorage.getItem("name");
    	if (name !== null) document.getElementById('y1').value=name;
    	document.getElementById('y1').focus();
    }
//     function erase()
//     {
//     	sessionStorage.setItem("name","");
//     }
//     window.onpopstate = function(event) {
//     if(event){
//         window.location.href = 'https://www.google.com/';
//         // Code to handle back button or prevent from navigation
//     }
}
</script>
<style type="text/css">
	body
	{
		color: white;
		background-image: url('background_chat_program.jpg');
		background-size: 2000px;
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
	#r1
	{
		background-color: lightgrey;
		max-width: 200px;
		padding: 1% 1%;
		word-wrap: break-word;
		font-family: arial;
		/*font-size: 18px;*/
		font-weight: bold;
		color: black;
		border-radius: 10px;
		box-shadow: 5px 5px 5px grey;
	}
	#x1
		{
			border-radius: 10px;
			color: #0D98BA;
			background-color: #0D98BA;
			font-weight: bold;
			font-family: arial;
			font-size: 20px;
			box-shadow: 5px 5px 5px grey;
			text-align: left;
		}
	#y1
		{
			padding: 1% 1%;
			font-family: arial;
			font-size: 18px;
			color:black;
			font-weight: bold;
			box-shadow: 5px 5px 5px grey;
		}
	h3
	{
		color: black;
		font-family: arial;
	}
</style>
</head>
<body>
	<?php
		$x=explode(" ",$_GET['room']);
		$name=$x[0];
		$o=0;
		$username11='';
		if(sizeof($x)>1)
			$o=intval($x[1]);
		else
		{	$o=0;
			$con1=mysqli_connect("localhost","root","","user");
			$query="select id from messages";
			$result=mysqli_query($con1,$query);
			if(mysqli_num_rows($result))
			{
				while($row=mysqli_fetch_assoc($result))
				{
					if($row["id"]=='0')
						$o=intval($row["id"])+1;
					else
					{
						$h=7;
						$g='';
						while($h<strlen($row["id"]) and $row["id"][$h]!='(')
						{
							$g.=$row["id"][$h];
							$h+=1;
						}
						$o=intval($g)+1;
					}
				}
			}
		}
		if(sizeof($x)>2)
		{
			$username11=$x[2];
		}
		else
		{
			$h=explode(".",$_GET['submit']);
			$username11=$h[1];
		}
	?>
	<?php
		// echo $o;
		if(array_key_exists('message', $_GET))
		{
			$message=$_GET['message'];
		}
		else
		{
			$message='';
		}
		// echo $message."<br>";
		$conn=mysqli_connect("localhost","root","","user");
		$query="select roomname from rooms";
		$result=mysqli_query($conn,$query);
		$c=0;
		$g=0;
		$d=$_SERVER['REQUEST_TIME'];
		if(mysqli_num_rows($result)>0)
		{
			while($row=mysqli_fetch_assoc($result))
			{
				if($name==$row["roomname"])
				{
					echo $name."<br>";
					$c+=1;
				}
			}
		}
		// echo $c."<br>";
		if($c>0)
		{	echo "<h1> Welcome to ".$name."</h1>";
			// echo "room exists";
			if ($message!='')
			{	$u=$username11." ".strval($o+1);
				// echo $message;
				$query="insert into messages values('$d','strval($o).$username11.$name','$name','$username11','$message')";
				mysqli_query($conn,$query);
				$message='';
			}
			$query2="select roomname,username,message from messages where roomname='$name' order by time";
			$result=mysqli_query($conn,$query2);
			if(mysqli_num_rows($result)>0)
			{
				while($row=mysqli_fetch_assoc($result))
				{
					echo "<div id='r1'>".$row["username"].":".$row["message"]."</div>"."<br>";
				}
			}
			
		}
		else
			echo "<h1>"."room does not exist"."</h1>";
		// echo"<script>document.location='validate_join.php';</script>";
	// unset($_POST['message']);
	?>
	<form action="#" method="GET">
		<h3> Enter your message down below:</h3>
		<input type="text" name="message" id="y1">
		<br>
		<h3>Message(Click the Button Down below):</h3>
		<input type="submit" name="room" value='<?php echo $name." ".($o+1)." ".$username11;?>' id="x1" onclick="erase()">
	</form>
</body>
</html>
