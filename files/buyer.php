<?php
	session_start();
	if(isset($_SESSION['role'])){
		if($_SESSION['role']!='buyer')
			header('Location: login.php');
	}
?>
<html>
<head>
  <title>Buyer | Control Panel</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="icon" href="image/kamu-logo-icon.png">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

	
<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="setFeedback.php">Feedback</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>




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
					<td><input type="submit" name="order" value="Order" class="btn btn-success"></td>					
				</form>
				</tr>
			<?php
			}
			
		?>
		</tbody>
		</table>
		</div>
		</div>
</body>
</html>