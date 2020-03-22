<?php 
session_start();

include '../inc/dbconnection.php';
include '../inc/header.php';

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

if(isset($_POST['login_pressed'])){
  $username = $_POST['username'];
  $password =  $_POST['password'];
  if($username=='admin' && $password =="tata123"){
    $_SESSION['userid'] = "admin_tata";
  }
}

if(isset($_POST['land_holding']) && isset($_POST['owned_land'])){
  $owned_land = $_POST['owned_land'];
  $irrigated_land = $_POST['irrigated_land'];
  $total_land = $_POST['total_land'];

  if(isset($_POST['irrigation_source']))
    $irrigation_source = $_POST['irrigation_source'];

  if(isset($_POST['irrigation_source'])){
     foreach($_POST['irrigation_source'] as $irra_source) { 
                $query_irr_source = "INSERT INTO irrigation_source(`family_id`, `irrigation_source`) VALUES('$fam_id', '$irra_source')";
                $res_irr_source = mysqli_query($link, $query_irr_source);
        } 
  }
 

  $query_land = "INSERT INTO land_holding(`family_id`, `land_owned`, `land_category`,`irrigated_land`) VALUES('$fam_id', '$total_land', '$owned_land', '$irrigated_land')";
  $res_land = mysqli_query($link, $query_land);
}

if(isset($_POST['income_save'])){
  $occupation_inc = $_POST['occupation_inc'];
  $category_inc = $_POST['category_inc'];
  $days_engaged_inc = $_POST['days_inc'];
  $fam_inv_inc = $_POST['fam_inv_inc'];
  $annual_inc = $_POST['annual_inc'];

  $query_income = "INSERT INTO income_details(`family_id`, `type`, `members_involved`, `annual_income`, `engagement_days`, `primary_secondary`) VALUES('$fam_id', '$occupation_inc', '$fam_inv_inc', '$annual_inc', '$days_engaged_inc', '$category_inc')";

    $res_income = mysqli_query($link, $query_income);
}
if(isset($_POST['member_add'])){
  $mem_name = $_POST['mem_name'];
  $age_mem = $_POST['age_mem'];
  $gender = $_POST['gender'];
  $edu_status = $_POST['edu_status'];
  $skills = $_POST['skills'];
  $mob_no = $_POST['mob_no'];

  $query_member_add = "INSERT INTO family_member(`family_id`, `name`, `age`, `sex`, `ed_status`, `skill`, `mobile`) VALUES('$fam_id', '$mem_name', '$age_mem', '$gender', '$edu_status', '$skills', '$mob_no')";

  $res_member_add = mysqli_query($link, $query_member_add);

}

if(isset($_POST['location_submit'])){
  $op_area =  $_POST['op_area'];
  $state =  $_POST['state'];
  $district =  $_POST['district'];
  $block =  $_POST['block'];
  $gp =  $_POST['gp'];
  $village = $_POST['village'];
  $date = $_POST['date'];

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
            <option value="East Singhbhum">East Singhbhum</option>
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



<!-- MODAL START FOR LAND HODLING -->
  
  <form action="" method="POST">
          <div class="modal fade" id="modallandholding" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Land Holding</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <select name="owned_land" class="browser-default custom-select">
            <option value="Land_owned" disabled="disabled" selected>Land Owned</option>
            <option value="big">Big (More than 10 acre)</option>
            <option value="medium">Medium (5 to 10 acre)</option>
            <option value="small">Small (2.5 to 5 acre)</option>
            <option value="marginal">Marginal (0 to 2.5 acre)</option>
            <option value="landless">Landless</option>
          </select>
        </div>
        
         <div class="md-form mb-4">
          <input name="total_land" type="number" id="orangeForm-pass_irr" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_irr">Total land</label>
        </div>

        <div class="md-form mb-4">
          <input name="irrigated_land" type="number" id="orangeForm-pass_irr1" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_irr1">Irrigated land</label>
        </div>

        <div class="md-form mb-4">
          <Select  multiple size=5 name="irrigation_source[]" id="orangeForm-pass4" class="form-control validate">
            <option value = "Pond">Pond</option>
            <option value = "Well">Well</option>
            <option value = "Borewell">Borewell</option>
            <option value = "Canal">Canal</option>
            <option value = "Lift irrigation">Lift Irrigation</option>
            <option value = "Other">Any Other</option>
          </Select>
        </div>

        <div class="md-form mb-4">
          <input disabled="disabled" name="irrigated_percentage" type="text" id="orangeForm-pass12" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass12">Perentage of Irrigated land</label>
        </div>
       
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input name="land_holding" type="submit" name="irrigation_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>


<!-- MODAL END FOT LAND HOLDING -->


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
          <input name="mem_name" type="text" id="orangeForm-name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-name">Name</label>
        </div>
       

        <div class="md-form mb-4">
          <i class="fas fas fa-birthday-cake prefix grey-text"></i>
          <input name="age_mem" type="number" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Age</label>
        </div>
        <div class="md-form mb-4">
        
        
          <select style="width: 100%" name="gender">
            <option disabled="disabled">Gender</option>
            <option value="male">Male</option>
            <option value="female">Female</option>
          </select>
        </div>

        <div class="md-form mb-4">
          <i class="fas fa-book prefix grey-text"></i>
          <input name="edu_status" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Educational Status</label>
        </div>
        <div class="md-form mb-4">
          <i class="fas fa-paint-brush prefix grey-text"></i>
          <input name="skills" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Any Skills</label>
        </div>

          <div class="md-form mb-4">
          <i class="fas fa-mobile prefix grey-text"></i>
          <input name="mob_no" type="number" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Mobile No.</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input name="member_add" type="submit" class="btn btn-deep-orange"></button>
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
        <h4 class="modal-title w-100 font-weight-bold">Income Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          
          <select name="occupation_inc" id="orangeForm-name" class="form-control validate">
            <option value="def" selected disabled="disabled">Occupation</option>
            <option value="Small Business">Small Business</option>
            <option name="Micro enterprise">Micro enterprise</option>
            <option value="Agriculture and Allied">Agriculture and Allied</option>
            <option value="Wage Labour">Wage Labour</option>
            <option value="Skill / Art">Skill / Art</option>
            <option value="Any Other">Any Other</option>
          </select>

         
        </div>
        <div class="md-form mb-5">
          <select name="category_inc" type="text" id="orangeForm-name" class="form-control validate" placeholder="Occupation">
            <option value="def" selected disabled="disabled">Category</option>
            <option value="primary">Primary</option>
            <option value="secondary">Secondary</option>
          </select>
        </div>


        <div class="md-form mb-5">
          <i class="fas fa-calendar prefix grey-text"></i>
          <input name="days_inc" type="number" id="orangeForm-email1" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email1">No. of days Engaged</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-users prefix grey-text"></i>
          <input name="fam_inv_inc" type="number" id="orangeForm-email2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email2">No. of family members involved</label>
        </div>

        <div class="md-form mb-5">
          <i class="fas fa-rupee-sign prefix grey-text"></i>
          <input name="annual_inc" type="number" id="orangeForm-email3" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-email3">Annual Income</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input name="income_save" type="submit" class="btn btn-deep-orange">
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
            <?php 
              if($count_loc==0){
                echo "ADD LOCATION DETAILS";
              }
              else{
                $query_loc_data = "SELECT * FROM family WHERE family_id='$fam_id'";
                $res_loc_data = mysqli_query($link, $query_loc_data);
                $row_loc_data = mysqli_fetch_assoc($res_loc_data);
                echo '
                <table class="table">
                  <tr>
                    <td>
                    Unit:
                    </td>
                    <td>';
                    echo $row_loc_data['TSRDS_op_area'];
                    echo '</td>
                  </tr>

                  <tr>
                    <td>
                    State:
                    </td>
                    <td>';
                    echo $row_loc_data['state'];
                    echo '</td>
                  </tr>

                  <tr>
                    <td>
                    District:
                    </td>
                    <td>';
                    echo $row_loc_data['dist'];
                    echo '</td>
                  </tr>

                  <tr>
                    <td>
                    Block:
                    </td>
                    <td>';
                    echo $row_loc_data['block'];
                    echo '</td>
                  </tr>

                  <tr>
                    <td>
                    GP:
                    </td>
                    <td>';
                    echo $row_loc_data['gp'];
                    echo '</td>
                  </tr>

                  <tr>
                    <td>
                    Village:
                    </td>
                    <td>';
                    echo $row_loc_data['village'];
                    echo '</td>
                  </tr>
                </table>
                ';
              }
             ?>
          <br>
            <button data-toggle="modal" data-target="#modalfamilymember" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-users"></i> &nbsp; Add Family Member</button>
            <br>
            <?php 
            $query_member = "SELECT * FROM family_member WHERE family_id='$fam_id'";
            $res_member = mysqli_query($link, $query_member);
            $count_members = mysqli_num_rows($res_member);
            if($count_members==0){
              echo "No Family Members Added";
            }

            else{
              echo '<table class="table">
                <tr>  <th>Name</th> <th>Age</th>  <th>Education</th> <th>Skills</th> </tr>';
              while($row_members = mysqli_fetch_assoc($res_member)){
                echo '
                <tr>
                    <td>';
                    echo $row_members['name'];
                    echo '</td>
                    <td>';
                    echo $row_members['age'];
                    echo '</td>
                    <td>';
                    echo $row_members['ed_status'];
                    echo '</td>
                    <td>';
                    echo $row_members['ed_status'];
                    echo '</td>
                    </tr>';
              }
              echo '</table>';

            }
            ?>
            <br>
            <br>
            <button data-toggle="modal" data-target="#modaloccupation" type="button" class="btn btn-success btn-lg btn-block">
              <i class="fa fa-money-bill-alt"></i> &nbsp; Income Details</button>
           <br>
           <?php 
            $query_income = "SELECT * FROM income_details WHERE family_id='$fam_id'";
            $res_income = mysqli_query($link, $query_income);
            $count_income = mysqli_num_rows($res_income);
            if($count_income==0){
              echo "ADD INCOME DETAILS.";
            }
            else{
              echo '<table class="table">';
              echo '<th>Occupation</th>  <th>Type</th> <th>Days Engaged</th> <th>Annual Income</th>';
              while($row_income = mysqli_fetch_assoc($res_income)){
                echo "<tr>";
                  echo "<td>";
                    echo $row_income['type'];
                  echo "</td>";

                   echo "<td>";
                    echo $row_income['primary_secondary'];
                  echo "</td>";

                  echo "<td>";
                    echo $row_income['engagement_days'];
                  echo "</td>";

                    echo "<td>";
                    echo $row_income['annual_income'];
                  echo "</td>";
                echo "</tr>";
              }

              echo '</table>';
            }
           ?>
           <br>
           <br>

             <button data-toggle="modal" data-target="#modallandholding" type="button" class="btn btn-success btn-lg btn-block">
              <i class="fas fa-tractor"></i> &nbsp; Land Holding</button>
             <br>
             <?php 
             $query_check_land = "SELECT * FROM land_holding WHERE family_id='$fam_id'";
             $res_check_land = mysqli_query($link, $query_check_land);
             $count_check_land = mysqli_num_rows($res_check_land);
             if($count_check_land==0){
              echo "ENTER LAND DETAILS";
             }
             else{
              echo '<table class="table">';
              echo "<th> Type of Land Holding </th> <th> Total Land Holding </th> <th>Irrigated Land Holding</th>";
              while($row_check_land = mysqli_fetch_assoc($res_check_land)){
                echo "<tr>";
                echo "<td>";
                  echo $row_check_land['land_category'];
                echo "</td>";

                 echo "<td>";
                 echo $row_check_land['land_owned'];
                echo "</td>";

                 echo "<td>";
                 echo $row_check_land['irrigated_land'];
                echo "</td>";

                echo "</tr>";
              }
              echo '</table>';

              echo '<p><u> Irrigation Sources Present : </u></p>';
              $query_fetch_irr_src = "SELECT * FROM irrigation_source WHERE family_id='$fam_id'";
              $res_fetch_irr_src = mysqli_query($link, $query_fetch_irr_src);
              while($row_fetch_irr_src = mysqli_fetch_assoc($res_fetch_irr_src)){
                echo $row_fetch_irr_src['irrigation_source'];
                echo ', ';
              }
             }
             ?>
             <br>
             <br>
               <button data-toggle="modal" data-target="#modalfamilymember" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-seedling"></i> &nbsp; Crop Cultivation Details</button>
               <br>
                 <button data-toggle="modal" data-target="#modalfamilymember" type="button" class="btn btn-success btn-lg btn-block">
                  <i class="fas fa-business-time"></i> &nbsp; Enterprise Business Details</button>
            <br>
              <button data-toggle="modal" data-target="#modalfamilymember" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-sign-language"></i> &nbsp; daily Wage/Labour Details</button>
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
