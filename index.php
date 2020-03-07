<?php 
session_start();

function redirect($url)
{
    if (!headers_sent())
    {    
        header('Location: '.$url);
        exit;
        }
    else
        {  
        echo '<script type="text/javascript">';
        echo 'window.location.href="'.$url.'";';
        echo '</script>';
        echo '<noscript>';
        echo '<meta http-equiv="refresh" content="0;url='.$url.'" />';
        echo '</noscript>'; exit;
    }
}


if(isset($_POST['login_pressed'])){
  $username = $_POST['username'];
  $password =  $_POST['password'];

  if($username=='admin' && $password =="tata123"){
    $_SESSION['userid'] = "admin_tata";
    redirect('reg/');
  }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>AgriTech</title>
  <!-- MDB icon -->
  <link rel="icon" href="img/mdb-favicon.ico" type="image/x-icon">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.2/css/all.css">
  <!-- Google Fonts Roboto -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
  <!-- Bootstrap core CSS -->
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="css/style.css">

  <style>

  </style>
</head>
<body  style="background-image: url('img/bg.jpeg'); background-size: cover;">

  <!-- Start your project here-->  
  <div style="height: 100vh">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <br><br><br><br><br><br>
          <!-- Default form login -->
<form style="background-color: #416422; border-radius: 20px; opacity:0.85" class="text-center p-5" method="POST">

    <p style="color: white" class="h4 mb-4">LOGIN</p>

    <!-- Email -->
    <input type="text" id="defaultLoginFormEmail" name="username" class="form-control mb-4" placeholder="USERNAME">

    <!-- Password -->
    <input type="password" id="defaultLoginFormPassword" name="password" class="form-control mb-4" placeholder="PIN">


    <!-- Sign in button -->
    <button class="btn btn-success btn-block my-4" name="login_pressed" type="submit">LOGIN</button>
    <!-- Register -->
</form>
<!-- Default form login -->
        </div>
        <div class="col-lg-3">
        </div>
      </div>
    </div>
  </div>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

</body>
</html>
