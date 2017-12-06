<?php
	session_start();
	include('conn.php');
	if($_SESSION['role']!='seller')
		header("Location: ../index.html");
?>

<!DOCTYPE html>
<html>
<head>
	<title>Add Foods</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<div class="container">
		<form action="addFoods.php" method="GET">
			<div class="form-group">
				<label>Food Name</label>
				<input type="text" name="txtfood" class="form-control" placeholder="Food Name">
			</div>
			<div class="form-group">
				<label>Food Type</label>
				<select name='type' class="form-control">
					<option value='Non-Veg' selected>Non-Veg</option>
					<option value='Veg'>Veg</option>	
				</select>
			
			</div>
			<div class="form-group">
				<label>Price</label>
				<input type='number' name='txtprice' placeholder='Food Price' class="form-control">
			</div>
			<input type='submit' name='btnAdd' value='Add' class="form-control btn btn-info">
			<a href='manageFoods.php' class='btn btn-warning form-control'>Back</a>
		</form>
	</div>
</body>
</html>


<?php
	if(isset($_GET['btnAdd'])){
		
		$sql="insert into food (foodName,type,price) values ('{$_GET['txtfood']}','{$_GET['type']}',{$_GET['txtprice']})";
		$result=mysqli_query($con,$sql);

			//if(!$result)
				//echo "failed".mysqli_error($con);
	}
?>
