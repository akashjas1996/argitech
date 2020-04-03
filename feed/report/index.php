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

  <?php
  $op_area = $_SESSION['op_area'];

  ?>
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
            </h1>

            <div class="row">
        <table class="table table-striped table-bordered">

           <?php $sl=1; ?>
  <tbody>
    <tr>
      <th scope="row">Sr No.</th>
       <th align="center"> Respondent's Name </th>
       <th align="center"> Caste </a> </th>
       <th align="center"> Village </a> </th>
       <th align="center"> Name of Interventions </th>
       <th align="center"> Base Line Income </th>
       <th align="center"> Current Year Income (<?php echo date("Y",strtotime("-1 year")); ?>) </th>
       <th align="center"> Percentage Progress </th>
    </tr>
    <?php 
    $query_fetch_family = "SELECT * FROM `family` WHERE `TSRDS_op_area`='$op_area'";
    $res_fetch_family = mysqli_query($link, $query_fetch_family);
    while($row_fetch_family = mysqli_fetch_assoc($res_fetch_family)){
      $family_id = $row_fetch_family['family_id'];
      $query_respondents = "SELECT * FROM respondent WHERE family_id='$family_id'";
      $res_respondents = mysqli_query($link, $query_respondents);
      $row_respondents = mysqli_fetch_assoc($res_respondents);
      ?>
      <tr>
      <td>
        <?php echo $sl; $sl++ ?>
      </td>

      <td>
        <?php echo $row_respondents['name'] ?>
      </td>

       <td>
        <?php echo $row_fetch_family['caste'] ?>
      </td>

      <td>
        <?php echo $row_fetch_family['village'] ?>
      </td>




        <?php 
        $sum_crop=0;
        $sum_allied=0;
        $sum_dailywage=0;
        $sum_entp=0;
        $sum_livestock=0;
        $query_b_inc_crop = "SELECT * FROM crop_cultivation WHERE family_id='$family_id' AND bsl_crop='0'";
        $query_b_inc_allied = "SELECT * FROM allied WHERE family_id='$family_id' AND bsl_allied='0'";
        $query_b_inc_livestock = "SELECT * FROM livestock WHERE family_id='$family_id' AND bsl_livestock='0'";
        $query_b_inc_dailywage = "SELECT * FROM daily_wage WHERE family_id='$family_id' AND bsl_dailywage='0'";
        $query_b_inc_enterprise = "SELECT * FROM enterprise WHERE family_id='$family_id' AND bsl_ent='0'";

        $res_b_inc_crop = mysqli_query($link, $query_b_inc_crop);
        $res_b_inc_allied = mysqli_query($link, $query_b_inc_allied);
        $res_b_inc_livestock = mysqli_query($link, $query_b_inc_livestock);
        $res_b_inc_dailywage = mysqli_query($link, $query_b_inc_dailywage);
        $res_b_inc_enterprise = mysqli_query($link, $query_b_inc_enterprise);

        while($row_b_inc_crop = mysqli_fetch_assoc($res_b_inc_crop)){
          $sum_crop+=$row_b_inc_crop['net_income'];
        }

        while($row_b_inc_allied = mysqli_fetch_assoc($res_b_inc_allied)){
          $sum_allied+= $row_b_inc_allied['net_annual'];
        }
        while($row_b_inc_livestock = mysqli_fetch_assoc($res_b_inc_livestock)){
          $sum_livestock+= $row_b_inc_livestock['net_income'];
        }
        while($row_b_inc_dailywage = mysqli_fetch_assoc($res_b_inc_dailywage)){
          $sum_dailywage+= $row_b_inc_dailywage['annual_income'];
        }
        while($row_b_inc_enterprise = mysqli_fetch_assoc($res_b_inc_enterprise)){
          $sum_entp+= $row_b_inc_enterprise['net_income'];
        }


      
        $base_linesum = $sum_crop+$sum_entp+$sum_dailywage+$sum_allied+$sum_livestock;


        ?>


      
      
       
        <?php 
        $sum_int_crop=0;
        $sum_int_allied=0;
        $sum_int_livestock=0;
        $sum_int_dailywage=0;
        $sum_int_ent=0;
        $intv_list="";
        $query_b_intv_crop = "SELECT * FROM crop_cultivation WHERE family_id='$family_id' AND intv_year='2019-20' AND bsl_crop='1'";
        $query_b_intv_allied = "SELECT * FROM allied WHERE family_id='$family_id' AND intv_year='2019-20' AND bsl_allied='1'";
        $query_b_intv_livestock = "SELECT * FROM livestock WHERE family_id='$family_id' AND intv_year='2019-20' AND bsl_livestock='1'";
        $query_b_intv_dailywage = "SELECT * FROM daily_wage WHERE family_id='$family_id' AND intv_year='2019-20' AND bsl_dailywage='1'";
        $query_b_intv_enterprise = "SELECT * FROM enterprise WHERE family_id='$family_id' AND intv_year='2019-20' AND bsl_ent='1'";

        $res_b_intv_crop = mysqli_query($link, $query_b_intv_crop);
        $res_b_intv_allied = mysqli_query($link, $query_b_intv_allied);
        $res_b_intv_livestock = mysqli_query($link, $query_b_intv_livestock);
        $res_b_intv_dailywage = mysqli_query($link, $query_b_intv_dailywage);
        $res_b_intv_enterprise = mysqli_query($link, $query_b_intv_enterprise);

        while($row_b_intv_crop = mysqli_fetch_assoc($res_b_intv_crop)){
          $sum_int_crop+= $row_b_intv_crop['net_income'];
          $intv_list = $intv_list.$row_b_intv_crop['name'].", ";
        }
        while($row_b_intv_allied = mysqli_fetch_assoc($res_b_intv_allied)){
          $sum_int_allied+= $row_b_intv_allied['net_annual'];
          $intv_list = $intv_list.$row_b_intv_allied['type'].", ";
        }
        while($row_b_intv_livestock = mysqli_fetch_assoc($res_b_intv_livestock)){
          $sum_int_livestock+= $row_b_intv_livestock['net_income'];
          $intv_list = $intv_list.$row_b_intv_livestock['name'].", ";
        }
        while($row_b_intv_dailywage = mysqli_fetch_assoc($res_b_intv_dailywage)){
          $sum_int_dailywage+= $row_b_intv_dailywage['annual_income'];

        }
        while($row_b_intv_enterprise = mysqli_fetch_assoc($res_b_intv_enterprise)){
          $sum_int_ent+= $row_b_intv_enterprise['net_income'];
          $intv_list = $intv_list.$row_b_intv_enterprise['enterprise_name'].", ";
        }
        $intv_income = $sum_int_crop+$sum_int_allied+$sum_int_livestock+$sum_int_dailywage+$sum_int_ent;
        ?>
        
        <td>
          <?php echo $intv_list; ?>
        </td>

        <td>
          <?php echo $base_linesum; ?>
        </td>

         <td>
          <?php echo $intv_income; ?>
        </td>

      </td>

      <td>
        <?php 

        if($base_linesum==0){
          echo '0%';
        }
        else{
          $percent = ($intv_income-$base_linesum)/$base_linesum*100;
          echo $percent;
          echo '%';
        }

        ?>
      </td>


    </tr>
      <?php
    }
    

    ?>
    </tr>
  </tbody>
</table>


           
      </div>
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
