<?php
	session_start();
	if($_SESSION['role']!='seller')
		header("Location: ../index.html");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Manage Foods</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

</body>
</html>

<?php
	
	include('conn.php');
	extract($_POST);
	global $con;
	mysqli_select_db($con,"kamu");
	
	$q1="select * from food";
	$result=mysqli_query($con,$q1);
	
	echo "<div class='container-fluid'>";
	echo "<table border='1' class='table table-stripped'>";
		echo "<tr>";
			echo "<th>Food Name</th>";
			echo "<th>Type</th>";
			echo "<th>Price</th>";
			echo "<th>Action</th>";
		echo "</tr>";
		
		while($row=mysqli_fetch_assoc($result))
		{
			echo "<tr>";
				echo "<td>{$row['foodName']}</td>";
				echo "<td>{$row['type']}</td>";
				echo "<td>{$row['price']}</td>";
				echo "<td>";
					echo "<form action='deleteFood.php' method='GET'>";
						echo "<input type='hidden' name='foodId' value=".$row['foodId'].">";
						echo "<input type='submit' name='btndelete' value='Delete' class='btn btn-success btn-block'>";
					echo "</form>";
				echo "</td>";
			echo "</tr>";
		}
	
	echo "</table>";
	echo "</div>";
		//To Navigation Bar
	echo "<a href='addFoods.php' class='btn btn-success'>Add New Food</a>";
	echo "<a href='seller.php' class='btn btn-info'>Seller Page</a>";
?>
