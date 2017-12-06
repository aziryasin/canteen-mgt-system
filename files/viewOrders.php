<?php
	session_start();
?>
<html>
<head>
	<title><?php echo $_SESSION['name'];?>'s Orders</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
    <!-- Optional Bootstrap theme -->
    <link rel="stylesheet" href="css/bootstrap-theme.min.css">
    <link rel="stylesheet" type="text/css" href="css/style.css">
</head>
<body>
	<?php
		include "conn.php";
		if($_SESSION['role']=="buyer")
		{?>
		<div class="container-fluid">
		<div class="table-responsive">
		<table  class="table table-striped">
		<thead>
		<tr>
			<th>Order ID</th>
			<th>Date</th>
			<th>Meal</th>
			<th>Food Name</th>
			<th>Quantity</th>
			<th>Price</th>
			<th>Total</th>			
		</tr>
		</thead>
		<tbody>
	<?php
		
			$eid=$_SESSION['eid'];
			$query="select * from orderInfo where eid=".$eid;
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				?>
				<tr>
					<td><?php echo $row['orderId'];?></td>
					<td><?php echo $row['orderDate'];?></td>
					<td><?php echo $row['meal'];?></td>
					<td><?php echo $row['foodName'];?></td>
					<td><?php echo $row['qty'];?></td>
					<td><?php echo "Rs.".$row['price'];?></td>
					<td><?php echo "Rs.".$row['total'];?></td>
				</tr>
			<?php
			}?>
		</tbody>
		</table>
		</div>
		</div>
			<?php
					$query="select SUM(total) as due from orderInfo where eid=".$eid;
					$result=mysqli_query($con,$query);
					$row=mysqli_fetch_assoc($result);
			?>

			
				<h2 style="font-family: 'Source Sans Pro', sans-serif; color: #f45642; text-align:center;">Your Total Due is Rs.<?php echo $row['due'];?></h2>
			
			

		<?php
		}

		if($_SESSION['role']=="seller")
		{?>
		<div class="container-fluid">
		<div class="table-responsive">
		<table  class="table table-striped">
		<thead>
		<tr>
			<th>Order ID</th>
			<th>Ordered by</th>
			<th>Date</th>
			<th>Meal</th>
			<th>Food Name</th>
			<th>Quantity</th>			
		</tr>
		</thead>
		<tbody>
	<?php
		
			$eid=$_SESSION['eid'];
			$query="select orderId,name,orderDate,meal,foodName,qty from orderInfo,user where user.eid=orderInfo.eid";
			$result=mysqli_query($con,$query);
			while($row=mysqli_fetch_assoc($result))
			{
				?>
				<tr>
					<td><?php echo $row['orderId'];?></td>
					<td><?php echo $row['name'];?></td>
					<td><?php echo $row['orderDate'];?></td>
					<td><?php echo $row['meal'];?></td>
					<td><?php echo $row['foodName'];?></td>
					<td><?php echo $row['qty'];?></td>
				</tr>
			<?php
			}?>
		</tbody>
		</table>
		</div>
		</div>
		<?php
		}
		
		?>

</body>
</html>
</html>