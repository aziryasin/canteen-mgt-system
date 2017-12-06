<?php
  session_start();
  if($_SESSION['role']!='seller')
    header("Location: ../index.html");
	include('conn.php');	
	$date = date("Y/m/d");

	$id=false;
	$name=false;

	$id=$_POST['id'];
	$name=$_POST['name'];
	$query = "SELECT reply FROM feedback WHERE fId={$id} LIMIT 1";
	$result=mysqli_query($con,$query);
	$row=mysqli_fetch_assoc($result);
	$comment=$row['reply'];
?>

<!DOCTYPE html>
<html>
<head>
	<title>Feedback Response</title>
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <meta name="language" content="en">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('image/kamu-bg.png'); background-repeat:repeat; background-attachment: fixed;">
	<form action="feedback_response.php" method="POST" style="margin: 5%">
		<div class="panel panel-primary">
			<div class="panel-heading">
				<?php echo "Feedback Response | ".$_SESSION['username']." to ".$name; ?>
			</div>
			<div class="panel-body">
				<textarea name='txtcomment' rows="10" style="width: 100%" maxlength="200" class="form-control" id="txtarea"><?php 
					if($comment!="")
						echo $comment;
				?>
				</textarea>
			</div>
			<div class="panel-footer">
				<input type="submit" name="btn_comment" value="Update" class="btn btn-success">
				<input type="hidden" name="uid" value="<?php echo $id; ?>" class="btn btn-success">
				<h5 class="pull-right" id="remaining"></h5>
				<script type="text/javascript">
					var txtmax = 200;
					$('#txtarea').keyup(function(){
						var txtlen = $('#txtarea').val().length;
						var rem_num = txtmax - txtlen;
						$('#remaining').html(rem_num + ' Characters Remaining');
						if(rem_num<=10)
							$('#remaining').css("color","red");
						else
							$('#remaining').css("color","black");
					});
				</script>
			</div>
		</div>
	</form>
</body>
</html>

<?php 
	if(isset($_POST['btn_comment'])){
		$re_comment = mysqli_real_escape_string($con,$_POST['txtcomment']);
		$id=$_POST['uid'];
		$sql="UPDATE feedback SET reply='{$re_comment}' WHERE fId={$id}";
		mysqli_query($con,$sql);
		header("Location: getFeedback.php");
	}
 ?>