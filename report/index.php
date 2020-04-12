<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>
<head>

<link rel="stylesheet" href="
https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

</head>
<style>
    .canvasjs-chart-credit{
        display: none;
    }
</style>
<h1></h1>

<?php 

  if(isset($_GET['state'])){
    $region = 'State';
    $name = $_GET['state'];
  }
  else if(isset($_GET['dist'])){
    $region = 'dist';
    $name = $_GET['dist'];
  }
  else if(isset($_GET['block'])){
    $region = 'block';
    $name = $_GET['block'];
  }
  else if(isset($_GET['GP'])){
    $region = 'GP';
    $name = $_GET['GP'];
  }
  else if(isset($_GET['vill'])){
    $region = 'Village';
    $name = $_GET['vill'];
  }
  else if(isset($_GET['op'])){
    $region = 'TSRDS_op_area';
    $name = $_GET['op'];
  }

?>

<?php
if($region=='TSRDS_op_area'){
  $print_region = 'Operational Area';
}
else if($region=='block'){
  $print_region = 'Block';
}
else if($region=='dist'){
  $print_region = 'District';
}
else{
  $print_region = $region;
}
?>
<div class="container-fluid">
  <center> <h2><?php echo $print_region.' - '.$name ?></h2> </center>
  <br>
    <div class="row">
        <table class="table table-striped table-bordered">
  <!-- <thead class="thead-dark">
    <tr>
      <th scope="col">#</th>
      <th scope="col">State</th>
      <th scope="col">District</th>
      <th scope="col">Block</th>
      <th scope="col">GP</th>
      <th scope="col">Village</th>
      <th scope="col">Unit</th>

    </tr>
  </thead> -->
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
       <th align="center"> Intervention </th>
    </tr>
    <?php 
    $query_fetch_family = "SELECT * FROM `family` WHERE `$region`='$name'";
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



      <td>
        <?php 

        if($base_linesum==0){
          echo '0%';
        }
        else{
          $percent = ($intv_income-$base_linesum)/$base_linesum*100;
          $percent = round($percent,2);
          echo $percent;
          echo '%';
        }

        ?>
      </td>

        <td>
      	<a href="../feed/intv_2/?res_id=<?php echo $row_respondents['res_id'] ?>"> <button>Details</button> </a>
      </td>


    </tr>
      <?php
    }
    

    ?>
    </tr>
  </tbody>
</table>
<br>
<hr>


<br>
<style type="text/css">
  .btn{
    margin:5px;
  }

</style>
<div style="display: flex; justify-content: center;">
<a href="../report/?op=Bamnipal"> <button class="btn btn-default">Bamnipal</i></button> </a>
<a href="../report/?op=Gomardih"> <button class="btn btn-default">Gomardih</i></button> </a>
<a href="../report/?op=Gopalpur"> <button class="btn btn-default">Gopalpur</i></button> </a>
<a href="../report/?op=Jamadoba"> <button class="btn btn-default">Jamadoba</i></button> </a>
<a href="../report/?op=Jamshedpur"> <button class="btn btn-default">Jamshedpur</i></button> </a>
<a href="../report/?op=Joda"> <button class="btn btn-default">Joda</i></button> </a>
<a href="../report/?op=Kalinga Nagar"> <button class="btn btn-default">Kalinga Nagar</i></button> </a>
<a href="../report/?op=Noamundi"> <button class="btn btn-default">Noamundi</i></button> </a>
<a href="../report/?op=Sukinda"> <button class="btn btn-default">Sukinda</i></button> </a>
<a href="../report/?op=West Bokaro"> <button class="btn btn-default">West Bokaro</i></button> </a>
</div>
    </div>
</div>

<script type="text/javascript">

</script>

<?php include '../footer.php'; ?>