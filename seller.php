<?php 
	session_start();
	if(isset($_SESSION['role'])){
		if($_SESSION['role']!='seller')
			header('Location: login.php');
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Seller</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
		<a href="manageFoods.php" class="btn btn-info">Manage Food Item</a>
		<a href="viewOrders.php" class="btn btn-info">View Orders</a>
		<a href="getFeedback.php" class="btn btn-info">View Feedback</a>
		<a href="report.php" class="btn btn-info">Get Analyze Report</a>
</body>
</html>