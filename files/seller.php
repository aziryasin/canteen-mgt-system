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
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>

<div class="jumbotron">
	<h2 style="text-align:center; ">Seller Dashboard</h2>
	<div class="container">
		<p>
			<a href="manageFoods.php" class="btn btn-info btn-lg btn-block">Manage Food Item</a>
			<a href="viewOrders.php" class="btn btn-info btn-lg btn-block">View Orders</a>
			<a href="getFeedback.php" class="btn btn-info btn-lg btn-block">View Feedback</a>
			<a href="report.php" class="btn btn-info btn-lg btn-block">Get Analyze Report</a>
		</p>
	</div>
</div>
		
</body>
</html>