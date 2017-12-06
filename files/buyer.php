<?php
	session_start();
?>
<html>
<head>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Hello <?php echo $_SESSION['name'];?></title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" href="css/style.css">
    
</head>
<body>
	<?php
		include 'conn.php';
		
		?>
		<div class="container-fluid">
		<div class="table-responsive">
		<table  class="table table-striped">
		<thead>
		<tr>
			<th>Meal</th>
			<th>Food</th>
			<th>Type</th>
			<th>Price</th>
			<th>Quantity</th>
			<th></th>
					
		</tr>
		</thead>
		<tbody>
		<?php
			
			$sql="select * from food";
			$result=mysqli_query($con,$sql);
	
			while($row=mysqli_fetch_assoc($result))
			{
				?><tr> <form action=orderFood.php method="post">
					<input type="hidden" name="foodId" value="<?php echo $row['foodId'];?>">
					<input type="hidden" name="price" value="<?php echo $row['price'];?>">
					<input type="hidden" name="foodName" value="<?php echo $row['foodName'];?>">
					<td><select name="meal" class="form-control">
						<option value="Breakfast">Breakfast</option>
						<option value="Lunch">Lunch</option>
						<option value="Dinner">Dinner</option>
					</select></td>
					<td><?php echo $row['foodName']; ?></td>
					<td><?php echo $row['type']; ?></td>
					<td><?php echo "Rs.".$row['price']; ?></td>
					<td><input type="number" name="qty" min=1 value="1"></td>
					<td><input type="submit" name="order" value="Order" class="btn btn-success"></td>					</form>
				</tr>
			<?php
			}
			
		?>
		</tbody>
		</table>
		</div>
		</div>

		<a href="setFeedback.php" class="btn btn-warning">Set Feedback</a>
</body>
</html>