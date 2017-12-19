<?php
	session_start();
?>
<!DOCTYPE HTML>
<html>
<head>
	<title>Orders Analysis</title>
	<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	<link rel="icon" href="http://localhost/PHP/kamu/files/image/kamu-logo-icon.png">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="http://localhost/PHP/kamu/files/css/style.css">
	
	
	<style type="text/css">
	
			#content {
				width:auto;
			}
			
	
		
			
			#chart-containere {
				width: 500px;
				height: 400px; 
			}
		
		
			
	</style>
	<script>
					function validateForm(input1){				
					var x =input1.value;
					
					if (x == "" ) {
					alert("Date field must be filled out");
						return false;
						}
						return true;
					}
					
				</script>


</head>
	


		<body>
		<nav class="navbar navbar-inverse ">
  <div class="container-fluid">
    <div class="navbar-header">
      <img src="http://localhost/PHP/kamu/files/image/kamu-logo-icon.png" style="width: 70px;height: 50px" class="navbar-brand">
      <p class="navbar-text" style="color: #00cc33"> <strong>Welcome <?php echo $_SESSION['name']?></strong></p>
    </div>
    <ul class="nav navbar-nav"><li><a href="../seller.php">View Orders</a></li>
    </ul>
    <ul class="nav navbar-nav"><li><a href="../manageFoods.php">Manage foods</a></li>
    </ul>
   <ul class="nav navbar-nav"><li  class="active"><a href=#>Get Analyze Report</a></li>
    </ul>
   <ul class="nav navbar-nav"><li><a href="../getFeedback.php">View Feedback</a></li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="../logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
    </ul>
  </div>
</nav>
<div class="container-fluid well" style="width:300px;height:150px;" id="mealBox">
							
	<form action="chart.php" method="post" name="mealForm">
      <select class="form-control"  name="meal">
          <option value="breakfast"> Breakfast</option>
          <option value="lunch">Lunch</option>
          <option value="dinner">Dinner</option>
      </select>
      <input type="submit" name="report" class="btn btn-success" value="OK" style="margin-left:100px; margin-top:5px;">
    </form>
    <h2 style="margin-left:20px;;"><?php echo ucwords($_SESSION['meal']);?> Orders</h2>
</div>
<?php
	extract($_POST);
	if(isset($report)){
	if($meal=="breakfast"){
		$_SESSION['meal']="breakfast";
	}
	elseif($meal=="lunch"){
		$_SESSION['meal']="lunch";
	}
	elseif ($meal=="dinner") {
		$_SESSION['meal']="dinner";
	}	
	header("Location:chart.php");
	}
?>
		
				<script src="Chart.min.js"></script>
				<script src="jquery.min.js"></script>
				<script src="app.js"></script>
				<script src="app2.js"></script>
				
			<div style="width:80%;height:80%;">
			<div id="content">
		
					<div id="chart-containers" >
					<canvas  id="mycanvase"> </canvas>
					</div>
				
						<div class="container-fluid well" style="width:300px;height:120px;">
							
								<form name="dateForm"  method="POST" id="myform" onsubmit="validateForm() " class="form-login">
										Get report for:
										<input type="text" name="Dates" id="1">
										
										
										<br>days<br>
										<input type="button" value="Submit" name="submit" id="postData" onclick="validateForm(document.dateForm.Dates)">
								</form>
						</div>
			
			</div>
			</div>
				
		</body>
</html>