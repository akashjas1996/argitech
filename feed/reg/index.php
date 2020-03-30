<?php 
session_start();
include '../inc/dbconnection.php';
$error="";
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
if(!isset($_SESSION['role'])){
  echo "<h1>BAD</h1>";
}
if(!isset($_SESSION['role'])=='CRP'){
  echo $_SESSION['role'];
  redirect('../');
}

if(isset($_POST['reg_pressed'])){
  $respondent_name = $_POST['res'];
  $respondent_mobile = $_POST['res_mobile'];
  $age = $_POST['age'];
  $check_unq = "SELECT * FROM respondent WHERE res_id='$respondent_mobile'";
  $res_unq = mysqli_query($link, $check_unq);
    if(mysqli_num_rows($res_unq)>0)
    {
      $error = '<div class="alert alert-danger" role="alert">
  The benificiary is already present.
</div>';
    }

    else{
          $query_reg = "INSERT INTO respondent(`name`, `res_id`, `age`) VALUES('$respondent_name', '$respondent_mobile', '$age')";
  mysqli_query($link, $query_reg);

  redirect('../nav/?res='.$respondent_mobile);
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
  <link rel="stylesheet" href="../css/bootstrap.min.css">
  <!-- Material Design Bootstrap -->
  <link rel="stylesheet" href="../css/mdb.min.css">
  <!-- Your custom styles (optional) -->
  <link rel="stylesheet" href="../css/style.css">
  <style>
  </style>
</head>
<body onload="getLocation()">



  <?php include '../inc/header.php' ?>
  <!-- Start your project here-->  
  <?php echo $error; ?>
  <div style="height: 100vh">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <br><br><br>
          <br><br><br>

            <!-- Default form subscription -->
<form style="border-radius: 20px; background-color: #416422; opacity: 0.9" class="text-center border border-light p-5" method="POST" action="">
    <p style="color: white" class="h4 mb-4">Register</p>
    <p style="color: white">Enter name of the respondent.</p>
    <!-- Name -->
    <input type="text" name="res" class="form-control mb-4" placeholder="Name">

    <input type="number" name="age" class="form-control mb-4" placeholder="Age">

     <input type="number" name="res_mobile"  class="form-control mb-4" placeholder="Mobile No">
    <!-- Email -->
    <!--input type="email" id="defaultSubscriptionFormEmail" class="form-control mb-4" placeholder="E-mail"-->
    <!-- Sign in button -->
    <button name="reg_pressed" class="btn btn-success btn-block" type="submit">Continue</button>
</form>
<!-- Default form subscription -->
          <br>
        </div>
        <div class="col-lg-3">
        </div>  
      </div>
    </div>
  </div>
  <!-- End your project here-->

  <!-- jQuery -->
  <script type="text/javascript" src="../js/jquery.min.js"></script>
  <!-- Bootstrap tooltips -->
  <script type="text/javascript" src="../js/popper.min.js"></script>
  <!-- Bootstrap core JavaScript -->
  <script type="text/javascript" src="../js/bootstrap.min.js"></script>
  <!-- MDB core JavaScript -->
  <script type="text/javascript" src="../js/mdb.min.js"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript"></script>

  <script>


var x = document.getElementById("location");
function getLocation() {
  if (navigator.geolocation) {
    navigator.geolocation.getCurrentPosition(showPosition);
  } else {
    x.innerHTML = "Geolocation is not supported by this browser.";
  }
}

function showPosition(position) {
  x.innerHTML = "Latitude: " + position.coords.latitude +
  "<br>Longitude: " + position.coords.longitude;
}
</script>


</body>
</html>
