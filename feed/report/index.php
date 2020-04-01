<?php 
session_start();

include '../inc/dbconnection.php';
include '../inc/header.php';

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


<?php 
if(isset($_GET['res_id'])){
  $mob = $_GET['res_id'];
  $query_mob = "SELECT * FROM respondent WHERE res_id='$mob'";
  $res_mob = mysqli_query($link, $query_mob);
  $row_mob = mysqli_fetch_assoc($res_mob);
  $fam_id = $row_mob['family_id'];
}


?>
<body>

  <!--?php include '../inc/header.php'?-->

  <!-- Start your project here-->  
  <div style="height: 100vh">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <br><br>
            <center> <h1> 
              <?php 
                if(isset($_GET['res_id'])){
                  $query_choose = "SELECT * FROM respondent WHERE res_id='$mob'";
                  $res_choose = mysqli_query($link, $query_choose);
                  $row_choose = mysqli_fetch_assoc($res_choose);
                  echo $row_choose['name'];
                  echo '\'s Report';
                  echo '</center>';
                  echo '<br><br>';
                }
                else{
                  echo "<center>Hello</center>";
                }
              ?>
            </h1>

            <table class="table table-striped table-bordered">
              <tr>
                <th><b>Occupation</b></th>
                <th colspan="5"><center><b>Income</b></center> </th>
              </tr>
              <tr>
                <th>Occupation</th>
                <th style="background-color:lightgreen">2019-20(BSL)</th>
                <th>2020-21</th>
                <th>2021-22</th>
                <th>2022-23</th>
                <th>2023-24</th>
              </tr>
              <tr>
                <td>Crop Cultivation</td>
                <td style="background-color:lightgreen"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

               <tr>
                <td>Agri Allied - Livestock</td>
                <td style="background-color:lightgreen"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

               <tr>
                <td>Agri Allied - Others</td>
                <td style="background-color:lightgreen"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

               <tr>
                <td>Daily Wages</td>
                <td style="background-color:lightgreen"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

              <tr>
                <td>Enterprise</td>
                <td style="background-color:lightgreen"></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
              </tr>

              <tr style="background-color:lightblue ">
                <td><b> Total </b></td>
                <td style="background-color:lightgreen"></td>
                <td><b></b></td>
                <td><b></b></td>
                <td><b></b></td>
                <td><b></b></td>
              </tr>
            </table>

            <br><br>

            <center> <h3>TSRDS SUPPORT</h3> </center>
            <br>
            <table class="table table-striped table-bordered">
              <tr>
                <th>Occupation</th>
                <th>Year</th>
                <th>Intervention</th>
                <th>Qty.</th>
                <th>Amount</th>
              </tr>

              <tr>
                <td>
                  Occ. Name
                </td>

                <td>
                  2019-20
                </td>

                <td>
                  Seeds
                </td>

                <td>
                  2kg
                </td>

                <td>
                  2800
                </td>
              </tr>

               <tr style="background-color: lightblue ">
                <th colspan="4">Total Amount</th>
                <th>2800</th>
              </tr>
            </table>

           
      </div>
      <hr>
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

</script>


</body>
</html>
