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
                if(isset($_GET['res_id'])){
                  $mob = $_GET['res_id'];


                  $query_mob = "SELECT * FROM respondent WHERE res_id='$mob'";
    $res_mob = mysqli_query($link, $query_mob);
    $row_mob = mysqli_fetch_assoc($res_mob);
    $fam_id = $row_mob['family_id'];


                  $query_choose = "SELECT * FROM respondent WHERE res_id='$mob'";
                  $res_choose = mysqli_query($link, $query_choose);
                  $row_choose = mysqli_fetch_assoc($res_choose);
                  echo $row_choose['name'];
                  echo '\'s Interventions';
                }
                else{
                  echo "Hello";
                }
              ?>
            </h1></center>
          <br><br><br>


           <button data-toggle="modal" data-target="#modalcropCultivation" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-seedling"></i> &nbsp; Crop Cultivation Details</button>

                <br>

                <?php 
                $query_fetch_cult = "SELECT * FROM crop_cultivation WHERE family_id='$fam_id'";
                $res_fetch_cult = mysqli_query($link, $query_fetch_cult);
                $count_cult_fetch = mysqli_num_rows($res_fetch_cult);
                if($count_cult_fetch==0){
                  // echo "Enter Crop Details.";
                }
                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Category </th> <th> Year </th> <th> Name </th> <th> Cultivated Area (acre) </th> <th> Yield (Qtl/acre) </th> <th> Intervention </th> <th> Net Income (₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
                  echo '</tr>';
                  while($row_Cult_fetch = mysqli_fetch_assoc($res_fetch_cult)){
                    echo '<tr>';
                    echo '<td>';
                      echo $row_Cult_fetch['cat'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_Cult_fetch['name'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_Cult_fetch['cultivated_area'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_Cult_fetch['yield'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_Cult_fetch['net_income'];
                    echo '</td>';

                    echo '<td>';
                    $entry_id_crop = $row_Cult_fetch['entry_id'];
                    ?>

                    <button onclick="del_obj('<?php echo $row_Cult_fetch['entry_id']; ?>', 'crop')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>

                    <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                  echo '</table>';
                } ?>
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
