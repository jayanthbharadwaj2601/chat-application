<?php
	$conn=mysqli_connect("localhost","root","","user");
	$query="insert into r1 values('19951A1235','Hello') ";
	$g=mysqli_query($conn,$query);
	if($g)
		echo "table exists";
	else
		echo "failure".mysqlierror();
	// $query2="select user,message from r1";
	// $result=mysqli_query($conn,$query2);
	// if(mysqli_num_rows($result)>0)
	// {
	// 	while($row=mysqli_fetch_assoc($result))
	// 	{
	// 		echo $row["user"];
	// 	}
	// }
?>