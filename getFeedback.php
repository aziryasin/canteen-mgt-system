<?php
  session_start();
  if($_SESSION['role']!='seller')
    header("Location: ../index.html");
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Feedback</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body style="background-image: url('image/kamu-bg.png'); background-repeat:repeat; background-attachment: fixed;">
 
<div class="container" style="margin-top: 20px">

  <div class="panel-group">
    
    <?php 
      include('conn.php');

      $sql = "SELECT * FROM feedback";
      $result = mysqli_query($con,$sql);

      while($row=mysqli_fetch_assoc($result)){
        $id=$row['fId'];
        $name=$row['name'];

        echo "<div class='panel panel-primary'>";
          echo "<div class='panel-heading'>";
            echo "<strong>".$row['name']."</strong> | <small>".$row['date']."</small>";
          echo "</div>";
          echo "<div class='panel-body'>";
            echo $row['comment'];
            if($row['reply']!=null){
              //New Panel for Reply
              echo "<div class='panel panel-warning' style='margin-top: 15px'>";
                  echo "<div class='panel-heading'>";
                    echo "Reply :";
                  echo "</div>";
                  echo "<div class='panel-body'>";
                    echo $row['reply'];
                  echo "</div>";
                  echo "<div class='panel-footer'>";
                    echo "<form action='feedback_response.php' method='POST'><input type='submit' name='btn_edit' value='Edit' class='btn btn-danger'>
                    <input type='hidden' name='id' value='{$id}'>
                    <input type='hidden' name='name' value='{$name}'>
                    </form>";
                  echo "</div>";
              echo "</div>";
            }
          echo "</div>";
          echo "<div class='panel-footer'>";
            if($row['reply']==null){
              echo "<form action='feedback_response.php' method='POST'><input type='submit' name='btn_reply' value='Reply' class='btn btn-success'>
              <input type='hidden' name='id' value='{$id}'>
              <input type='hidden' name='name' value='{$name}'>
              </form>";
          }
          echo "</div>";
        echo "</div>";
      }
     ?>
  </div>
</div>

</body>
</html>
