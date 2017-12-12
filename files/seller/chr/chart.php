
<!DOCTYPE HTML>
<html>
<head>
	<title>ChartJS - BarGraph</title>
	
	
	
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
		
		
				<script src="Chart.min.js"></script>
				<script src="jquery.min.js"></script>
				<script src="app.js"></script>
				<script src="app2.js"></script>
				
			
			<div id="content">
		
					<div id="chart-containere" >
					<canvas  id="mycanvase"> </canvas>
					</div>
				
						
						
								<form name="dates"  method="POST" id="myform" onsubmit="validateForm()">
										Dates:
										<input type="text" name="Dates" id="1">
										
										
										<br><br>
										<input type="button" value="Submit" name="submit" id="postData" onclick="validateForm(document.dates.Dates)">
								</form>
					
			
			</div>
				
		</body>
</html>