<?php
	session_start();
?>
<html>
<body>
<?php
	include "conn.php";
	if(isset($_POST['login']))
	{
		$email=$_POST['username'];
		$password=$_POST['password'];

		$query="select * from user where username='".$email."'";

		$result=mysqli_query($con,$query);
		$row=mysqli_fetch_assoc($result);
		echo $row['role'];
		if(md5($password)==$row['password'])
			{
				echo("Login Successful");
				$_SESSION['username']=$email;
				$_SESSION['role']=$row['role'];
				$_SESSION['eid']=$row['eid'];
				$_SESSION['name']=$row['name'];
			}
			else
			{
				header("Location:../invalid.html"); /* Redirect browser */
				exit();
			}
		if($row['role']=="admin")
		{
			header("Location:admin.php");
		}
		else if($row['role']=="buyer")
		{
			header("Location:buyer.php");
		}
		else if($row['role']=="seller")
		{
			header("Location:seller.php");
		}	
		
	}
	else
		header("Location: ..");
?>
</body>
</html>