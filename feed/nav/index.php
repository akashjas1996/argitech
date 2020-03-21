<?php 
session_start();

include '../inc/dbconnection.php';
if(isset($_POST['login_pressed'])){
  $username = $_POST['username'];
  $password =  $_POST['password'];
  if($username=='admin' && $password =="tata123"){
    $_SESSION['userid'] = "admin_tata";
  }
}

if(isset($_POST['location_submit'])){
  $op_area =  $_POST['op_area'];
  $state =  $_POST['state'];
  $district =  $_POST['district'];
  $block =  $_POST['block'];
  $gp =  $_POST['gp'];
  $village = $_POST['village'];
  $date = $_POST['date'];

  if(isset($_GET['res'])){
    $res_id = $_GET['res'];
    $query_mob = "SELECT * FROM respondent WHERE res_id='$res_id'";
    $res_mob = mysqli_query($link, $query_mob);
    $row_mob = mysqli_fetch_assoc($res_mob);
    $fam_id = $row_mob['family_id'];
  }

  $query_check_loc_details = "SELECT * FROM family WHERE family_id='$fam_id'";
  $res_loc = mysqli_query($link, $query_check_loc_details);
  $count_loc = mysqli_num_rows($res_loc);

  if($count_loc==0){
    $in_loc = "INSERT INTO family(`family_id`, `TSRDS_op_area`, `gp`, `block`, `dist`, `state`, `village`, `date`) VALUES('$fam_id', '$op_area', '$gp', '$block', '$district', '$state','$village', '$date')";
    $res_loc = mysqli_query($link, $in_loc);
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

  <!--?php include '../inc/header.php'?-->

  <!-- Start your project here-->  
  <div style="height: 100vh">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <br><br><br>
            <center> <h1> 
              <?php 
                if(isset($_GET['res'])){
                  $mob = $_GET['res'];
                  $query_choose = "SELECT * FROM respondent WHERE res_id='$mob'";
                  $res_choose = mysqli_query($link, $query_choose);
                  $row_choose = mysqli_fetch_assoc($res_choose);
                  echo $row_choose['name'];
                  echo '\'s Profile';
                }
                else{
                  echo "Hello";
                }
              ?>
            </h1></center>
          <br><br><br>
          <!-- MODAL FOR LOCATION -->
          <form action="" method="POST">
          <div class="modal fade" id="modalfamilyleader" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Location</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <select name="op_area" class="browser-default custom-select">
            <option selected>TSRDS Operation Area</option>
            <option value="Jamshedpur">Jamshedpur</option>
            <option value="Wesbook">Wesbook</option>
            <option value="Nuamundi">Nuamundi</option>
          </select>
        </div>

        <div class="md-form mb-5">
           <select name="state" class="browser-default custom-select">
            <option selected>State</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Odisha">Odisha</option>
          </select>
        </div>

        <div class="md-form mb-4">
         <select name="district" class="browser-default custom-select">
            <option selected>District</option>
            <option value="District 1">District 1</option>
            <option value="District 2">District 2</option>
            <option value="District 3">District 3</option>
            <option value="District 4">District 4</option>
            <option value="District 5">District 5</option>
            <option value="District 6">District 6</option>
          </select>
        </div>
        
        <div class="md-form mb-4">
          <input name="block" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Block</label>
        </div>
        <div class="md-form mb-4">
          <input name="gp" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">GP</label>
        </div>

        <div class="md-form mb-4">
          <input name="village" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Village</label>
        </div>
        <div class="md-form mb-4">
          <input disabled="disabled" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Date - <?php echo date("d/m/Y") ?></label>
          <input type="hidden" name="date" vale="<?php echo date('D/M/Y') ?>">
        </div>
        <div class="md-form mb-4">
          <p id="location"> Hello </p>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="location_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR LOCATION -->

<!-- MODAL START FOR FAMILY MEMBER -->
<form action="" method="POST">
<div class="modal fade" id="modalfamilymember" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Family Member Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
        </div>
       

        <div class="md-form mb-4">
          <i class="fas fas fa-birthday-cake prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Age</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-venus-mars prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Gender</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-book prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Educational Status</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-paint-brush prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Any Skills</label>
        </div>

          <div class="md-form mb-4">
          <i class="fas fa-mobile prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Mobile No.</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR FAMILY MEMBER -->

<!-- MODAL START FOR OCCUPATION -->
<form action="" method="POST">
<div class="modal fade" id="modaloccupation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Family Member Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-user prefix grey-text"></i>
          <input type="text" id="orangeForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
        </div>
        <div class="md-form mb-5">
          <i class="fas fa-street-view prefix grey-text"></i>
          <input type="text" id="orangeForm-email" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email">Caste</label>
        </div>


        <div class="md-form mb-4">
          <i class="fas fas fa-birthday-cake prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Age</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-venus-mars prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Gender</label>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-book prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Educational Status</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-paint-brush prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Any Skills</label>
        </div>

          <div class="md-form mb-4">
          <i class="fas fa-mobile prefix grey-text"></i>
          <input type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Mobile No.</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <button class="btn btn-deep-orange">Save</button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR OCCUPATION -->


<div class="text-center">
<!--   <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Launch
    Modal Register Form</a> -->
</div>


          <button data-toggle="modal" data-target="#modalfamilyleader" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-map-marker"></i> &nbsp; Location</button>
          <br>
            <button data-toggle="modal" data-target="#modalfamilymember" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-users"></i> &nbsp; Family</button>
            <br>
            <button data-toggle="modal" data-target="#modaloccupation" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-map-marker"></i> &nbsp; Occupation</button>
          <br>


<!-- Default form login -->
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
