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
<body>

  <?php $op_area = $_SESSION['op_area'] ?>


  <?php 
    if(isset($_GET['src'])){
    $search_data = $_GET['src'];
    $query_ben = "
    SELECT
    *
    FROM
  respondent
  INNER JOIN family on respondent.family_id = family.family_id
  WHERE
  (
    respondent.name LIKE '$search_data%'
    OR respondent.res_id LIKE '$search_data%'
  )
  AND family.TSRDS_op_area = '$op_area'
";

    // $query_ben1 = "SELECT * FROM respondent WHERE name LIKE '$search_data%' OR res_id LIKE '$search_data%' AND op";
    }
            else{
              $search_data = "";
              // $query_ben = "SELECT * FROM respondent INNER JOIN family on respondent.family_id=family.family_id WHERE family.TSRDS_op_area='$op_area'";
              $query_ben = "SELECT * FROM respondent";
            }
  ?>
  <div style="height: 100vh">
    <div class="container">
      <div class="row">
        <div class="col-lg-3">
        </div>
        <div class="col-lg-6">
          <br>
            <center>
             <form action="" method="GET" class="form-inline md-form mr-auto mb-4">
  <input value='<?php echo $search_data;
  ?>' name="src" style="width: 75%" class="form-control mr-sm-4" type="text" placeholder="Search" aria-label="Search">
  <button class="btn btn-outline-success btn-rounded btn-sm my-0" type="submit">Search</button>
</form>
            </center>
          <br><br>


           <?php
            
            $res_ben = mysqli_query($link, $query_ben);
            while($row_ben = mysqli_fetch_assoc($res_ben)){ 
              $fam_id = $row_ben['family_id']; ?>
               <div class="col-lg-12 col-md-6 mb-4">
        <h4 class="font-weight-bold mb-3">
          <i class="fas fa-user green-text pr-2"></i> 

          <a style="color: black" href=../intv/?res_id=<?php echo $row_ben['res_id'] ?>>
          <?php 
            echo $row_ben['name'];
          ?>
        </a>
        </h4>
        <?php 
          $query_loc_details = "SELECT * FROM `family` WHERE family_id='$fam_id'";
          $res_loc_details = mysqli_query($link, $query_loc_details);
          $row_loc_details = mysqli_fetch_assoc($res_loc_details);
        ?>
        <b><p style="line-height: 10px"> 
          <i class="fas fa-phone blue-text pr-2"></i> <?php echo $row_ben['res_id']; ?>
        &nbsp;&nbsp; 
        <i class="fas fa-users blue-text pr-2"></i>
        <?php 
        $q_count_mem="SELECT count(*) as members from `family_member` WHERE `family_id`='$fam_id'";
        $res_count_mem=mysqli_query($link,$q_count_mem);
        $data=mysqli_fetch_assoc($res_count_mem);
        echo $data['members'];?> &nbsp;&nbsp;
        <i class="fas fa-calendar blue-text pr-2"></i>
        <?php echo $row_loc_details['date'] ?>
      </p></b>
        <p class="text-muted mb-lg-0">
          <?php echo '<b>'.$row_loc_details['TSRDS_op_area'].'</b>, '.
                     $row_loc_details['village'].', '.
                     $row_loc_details['block'].', '.
                     $row_loc_details['dist'].', '.
                     $row_loc_details['state'].', '
                     ;
           ?>
        </p>
        <div>
          <a href="../nav/?res=<?php echo $row_ben['res_id'] ?>"> <button style="margin: 10px" type="button" class="btn-sm btn-success">Baseline</button> </a>
          <a href="../intv/?res_id=<?php echo $row_ben['res_id'] ?>"><button type="button" class="btn-sm btn-success">Intervention</button> </a>
        </div>
      </div>
      <hr>
              <?php
            }
          ?>
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
