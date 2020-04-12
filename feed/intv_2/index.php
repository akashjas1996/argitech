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

// QUERY START FOR CROP CULTIVATION

if(isset($_POST['crop_submit'])){
  $crop_category = $_POST['crop_category'];
  $crop_name = $_POST['crop_name'];
  $crop_cultivated_area = $_POST['crop_cultivated_area'];
  $crop_yield = $_POST['crop_yield'];
  $crop_total_production = $_POST['crop_production'];
  $crop_market_rate = $_POST['crop_market_rate'];
  $crop_total_income = $_POST['crop_tot_income'];
  $crop_cultivation_cost = $_POST['crop_cultivation_cost'];
  $crop_total_expenditure = $_POST['crop_total_expenditure'];
  $crop_net_income = $_POST['crop_net_income'];
  $crop_intv_year = $_GET['year'];
  $crop_intv_name = $_POST['crop_intv_name'];
  $crop_intv_qty = $_POST['crop_intv_qty'];
  $crop_intv_unit = $_POST['crop_intv_unit'];
  $crop_intv_amount = $_POST['crop_intv_amount'];


$query_crop_cultivation = "
INSERT INTO `crop_cultivation`
(`family_id`,
`cat`,
`name`,
`cultivated_area`,
`yield`,
`ttl_prod`,
`market_rate`,
`total_income`,
`cultivation_cost`,
`ttl_expenditure`,
`net_income`,
`intv_year`,
`bsl_crop`,
`intv_name`,
`intv_qty`,
`intv_unit_of_measurement`,
`value_of_intv`
)
VALUES
('$fam_id',
'$crop_category',
'$crop_name',
'$crop_cultivated_area',
'$crop_yield',
'$crop_total_production',
'$crop_market_rate',
'$crop_total_income',
'$crop_cultivation_cost',
'$crop_total_expenditure',
'$crop_net_income',
'$crop_intv_year',
'1',
'$crop_intv_name',
'$crop_intv_qty',
'$crop_intv_unit',
'$crop_intv_amount'
)";
$res_crop_cultivation = mysqli_query($link, $query_crop_cultivation);
}
// QUERY END FOR CROP CULTIVATION

// QUERY START FOR ALLIED OTHER ACTIVITIES
if(isset($_POST['allied_submit'])){
  $allied_type = $_POST['name_allied'];
  $allied_area = $_POST['area_allied'];
  $allied_prod = $_POST['production_allied'];
  $allied_ann_income = $_POST['ann_income_allied'];
  $allied_exp = $_POST['ann_exp_allied'];
  $allied_net_income = $_POST['net_inc_allied'];
  $allied_intv_name = $_POST['allied_intv_name'];
  $allied_intv_qty = $_POST['allied_intv_qty'];
  $allied_intv_unit = $_POST['allied_intv_unit'];
  $allied_intv_value = $_POST['allied_intv_value'];
  $selected_year = $_GET['year'];

  $query_allied = "
  INSERT INTO `allied`
(`family_id`,
`type`,
`area`,
`production`,
`ann_income`,
`ann_exp`,
`net_annual`,
`bsl_allied`,
`intv_name`,
`intv_qty`,
`intv_unit`,
`intv_value`,
`intv_year`
)
VALUES
('$fam_id',
'$allied_type',
'$allied_area',
'$allied_prod',
'$allied_ann_income',
'$allied_exp',
'$allied_net_income',
'1',
'$allied_intv_name',
'$allied_intv_qty',
'$allied_intv_unit',
'$allied_intv_value',
'$selected_year'
);";

$res_allied = mysqli_query($link, $query_allied);
}
// QUERY END FOR ALLIED OTHER ACTIVITIES


// QUERY START FOR LIVESTOCK
if(isset($_POST['livestock_submit'])){
  $livestock_name = $_POST['name_livestock'];
  $livestock_num = $_POST['number_livestock'];
  $livestock_annualIncome = $_POST['ann_income_livestock'];
  $livestock_cost = $_POST['rearing_cost_livestock'];
  $livestock_net_income = $_POST['net_income_livestock'];
  $livestock_intv_name = $_POST['livestock_intv_name'];
  $livestock_intv_qty = $_POST['livestock_intv_qty'];
  $livestock_intv_unit = $_POST['livestock_intv_unit'];
  $livestock_intv_value = $_POST['livestock_intv_value'];
  $intv_year = $_GET['year'];


 $query_livestock= "INSERT INTO `livestock`
(`family_id`,
`name`,
`number`,
`annual_income`,
`cost`,
`net_income`,
`bsl_livestock`,
`intv_name`,
`intv_qty`,
`intv_unit`,
`intv_value`,
`intv_year`
)
VALUES
('$fam_id',
'$livestock_name',
'$livestock_num',
'$livestock_annualIncome',
'$livestock_cost',
'$livestock_net_income',
'1',
'$livestock_intv_name',
'$livestock_intv_qty',
'$livestock_intv_unit',
'$livestock_intv_value',
'$intv_year'
)";

$res_livestock = mysqli_query($link, $query_livestock);


}
// QUERY END FOR LIVESTOCK
// QUERY START FOR DAILY WAGE
if(isset($_POST['dailywage_submit']) && isset($_POST['mem_dailywage']) && isset($_POST['days_dailywage']) && isset($_POST['place_dailywage']) && isset($_POST['wage_dailywage']) && isset($_POST['income_dailywage'])){
  $no_of_mem = $_POST['mem_dailywage'];
  $days_dailywage = $_POST['days_dailywage'];
  $place = $_POST['place_dailywage'];
  $distance = $_POST['distance_dailywage'];
  $wage = $_POST['wage_dailywage'];
  $annual_income_wage = $_POST['income_dailywage'];
  $intv_year = $_GET['year'];

  $clear_dailywage = "DELETE FROM daily_wage WHERE family_id='$fam_id'";
  $res_clear_dailywage = mysqli_query($link, $clear_dailywage);

  $query_dailywage = "INSERT INTO 
daily_wage(
`family_id`,
`members_count`,
`days_involved`,
`place`,
`distance`,
`wage`,
`annual_income`,
`bsl_dailywage`,
`intv_year`
)
VALUES
('$fam_id',
'$no_of_mem',
'$days_dailywage',
'$place',
'$distance',
'$wage',
'$annual_income_wage',
'1',
'$intv_year'
)";
$res_dailywage = mysqli_query($link, $query_dailywage);
}
// QUERY END FOR DAILY WAGE

// QUERY START FOR ENTERPRISE
if(isset($_POST['enterprise_submit'])){
  $enterprise_name = $_POST['name_ent_enterprise'];
  $enterpreneur_name = $_POST['name_person_enterprise'];
  $person_employed = $_POST['person_enterprise'];
  $annual_exp = $_POST['ann_exp_enterprise'];
  $annual_income = $_POST['annual_income_enterprise'];
  $net_income = $_POST['net_income_enterprise'];
  $reg_status = $_POST['reg_status_enterprise'];
  $intv_name = $_POST['ent_intv_name'];
  $intv_qty = $_POST['ent_intv_qty'];
  $intv_unit = $_POST['ent_intv_unit'];
  $intv_value = $_POST['ent_intv_value'];
  $intv_year = $_GET['year'];

  $query_enterprise = "
  INSERT INTO `enterprise`
(
`family_id`,
`enterprise_name`,
`enterpreneur_name`,
`annual_exp`,
`annual_income`,
`net_income`,
`reg_status`,
`person_employed`,
`bsl_ent`,
`intv_year`,
`intv_name`,
`intv_qty`,
`intv_unit`,
`intv_value`
)
VALUES
('$fam_id',
'$enterprise_name',
'$enterpreneur_name',
'$annual_exp',
'$annual_income',
'$net_income',
'$reg_status',
'$person_employed',
'1',
'$intv_year',
'$intv_name',
'$intv_qty',
'$intv_unit',
'$intv_value'
);";

$res_enterprise = mysqli_query($link, $query_enterprise);
}
// QUERY END FOR ENTERPRISE
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
          <br><br><br>
            <center> <h1> 
              <?php 
                if(isset($_GET['res_id'])){
                  $query_choose = "SELECT * FROM respondent WHERE res_id='$mob'";
                  $res_choose = mysqli_query($link, $query_choose);
                  $row_choose = mysqli_fetch_assoc($res_choose);
                  echo $row_choose['name'];
                  echo '\'s Interventions';
                  echo '</center>';
                  echo '<br><br>';

                  $q_sum_base_crop = "SELECT net_income FROM crop_cultivation WHERE family_id='$fam_id' AND bsl_crop='0'";
                  $q_sum_base_allied = "SELECT net_annual FROM allied WHERE family_id='$fam_id' AND bsl_allied='0'";
                  $q_sum_base_livestock = "SELECT net_income FROM livestock WHERE family_id='$fam_id' AND bsl_livestock='0'";
                  $q_sum_base_dailywage = "SELECT annual_income FROM daily_wage WHERE family_id='$fam_id' AND bsl_dailywage='0'";
                  $q_sum_base_ent = "SELECT net_income FROM enterprise WHERE family_id='$fam_id' AND bsl_ent='0'";

                  $res_sum_base_crop = mysqli_query($link, $q_sum_base_crop);
                  $res_sum_base_allied = mysqli_query($link, $q_sum_base_allied);
                  $res_sum_base_livestock = mysqli_query($link, $q_sum_base_livestock);
                  $res_sum_base_dailywage = mysqli_query($link, $q_sum_base_dailywage);
                  $res_sum_base_ent = mysqli_query($link, $q_sum_base_ent);

                  while($row_sum_base_crop = mysqli_fetch_assoc($res_sum_base_crop)){
                    $sum_b_crop+= $row_sum_base_crop['net_income'];
                  }
                  while($row_sum_base_allied = mysqli_fetch_assoc($res_sum_base_allied)){
                    $sum_b_allied+= $row_sum_base_allied['net_annual'];
                  }
                  while($row_sum_base_livestock = mysqli_fetch_assoc($res_sum_base_livestock)){
                    $sum_b_livestock+= $row_sum_base_livestock['net_income'];
                  }
                  while($row_sum_base_dailywage = mysqli_fetch_assoc($res_sum_base_dailywage)){
                    $sum_b_dailywage+= $row_sum_base_dailywage['annual_income'];
                  }
                  while($row_sum_base_ent = mysqli_fetch_assoc($res_sum_base_ent)){
                    $sum_b_ent+= $row_sum_base_ent['net_income'];
                  }

                  $baseline_income = $sum_b_crop+$sum_b_allied+$sum_b_livestock+$sum_b_dailywage+$sum_int_livestock;
                  echo 'TOTAL BASELINE INCOME: &nbsp;';
                  echo $baseline_income;
                  echo '<br>';

                  if(isset($_GET['year']))
                    $selected_year = $_GET['year'];
                  else
                    $selected_year="";

                  $q_sum_intv_crop = "SELECT net_income FROM crop_cultivation WHERE family_id='$fam_id' AND bsl_crop='1' AND intv_year='$selected_year'";
                  $q_sum_intv_allied = "SELECT net_annual FROM allied WHERE family_id='$fam_id' AND bsl_allied='1' AND intv_year='$selected_year'";
                  $q_sum_intv_livestock = "SELECT net_income FROM livestock WHERE family_id='$fam_id' AND bsl_livestock='1' AND intv_year='$selected_year'";
                  $q_sum_intv_dailywage = "SELECT annual_income FROM daily_wage WHERE family_id='$fam_id' AND bsl_dailywage='1' AND intv_year='$selected_year'";
                  $q_sum_intv_ent = "SELECT net_income FROM enterprise WHERE family_id='$fam_id' AND bsl_ent='1' AND intv_year='$selected_year'";



                  

                  $res_sum_intv_crop = mysqli_query($link, $q_sum_intv_crop);
                  $res_sum_intv_allied = mysqli_query($link, $q_sum_intv_allied);
                  $res_sum_intv_livestock = mysqli_query($link, $q_sum_intv_livestock);
                  $res_sum_intv_dailywage = mysqli_query($link, $q_sum_intv_dailywage);
                  $res_sum_intv_ent = mysqli_query($link, $q_sum_intv_ent);

                  while($row_sum_intv_crop = mysqli_fetch_assoc($res_sum_intv_crop)){
                    $sum_int_crop+= $row_sum_intv_crop['net_income'];;
                  }
                  while($row_sum_intv_allied = mysqli_fetch_assoc($res_sum_intv_allied)){
                    $sum_int_allied+= $row_sum_intv_allied['net_annual'];
                  }
                  while($row_sum_intv_livestock = mysqli_fetch_assoc($res_sum_intv_livestock)){
                    $sum_int_livestock+= $row_sum_intv_livestock['net_income'];
                  }
                  while($row_sum_intv_dailywage = mysqli_fetch_assoc($res_sum_intv_dailywage)){
                    $sum_int_dailywage+= $row_sum_intv_dailywage['annual_income'];
                  }
                  while($row_sum_intv_ent = mysqli_fetch_assoc($res_sum_intv_ent)){
                    $sum_int_ent+= $row_sum_intv_ent['net_income'];
                  }

                  $intvline_income = $sum_int_crop+$sum_int_allied+$sum_int_livestock+$sum_int_dailywage+$sum_int_ent;

                  echo 'TOTAL CURRENT YEAR INCOME: &nbsp;';
                  
                  if(isset($_GET['year']))
                    echo $intvline_income;

                }
                else{
                  echo "<center>Hello</center>";
                }
              ?>
            </h1>
          <br><br>
           <select onchange="set_year(this.value)" class="browser-default custom-select">
            <option value=" ">Year</option>
            <option value="2019-20">2019-20</option>
            <option value="2020-21">2020-21</option>
            <option value="2021-22">2021-22</option>
            <option value="2022-23">2022-23</option>
            <option value="2023-24">2023-24</option>
          </select>
          <br><br>

        







  
  <?php 
  if(isset($_GET['year'])){ 
    $selected_year = $_GET['year'];?>


     <!-- BUTTON START FOR CROP CULTIVATION -->
    <button data-toggle="modal" data-target="#modalcropCultivation" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-seedling"></i> &nbsp; Crop Intervention Cultivation</button>
                <br>
                <?php 
                $query_fetch_cult = "SELECT * FROM crop_cultivation WHERE family_id='$fam_id' AND bsl_crop='1' AND intv_year='$selected_year'";
                $res_fetch_cult = mysqli_query($link, $query_fetch_cult);
                $count_cult_fetch = mysqli_num_rows($res_fetch_cult);
                if($count_cult_fetch==0){
                  // echo "Enter Crop Details.";
                }
                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Crop </th>  <th> Yield (Qtl/acre) </th> <th> Interv. </th> <th> Qty <th> Value(₹) </th> </th> <th>Net Income</th>';
                  echo '</tr>';
                  while($row_Cult_fetch = mysqli_fetch_assoc($res_fetch_cult)){
                    echo '<tr>';

                    echo '<td>';
                      echo $row_Cult_fetch['name'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_Cult_fetch['yield'];
                    echo '</td>';

                    echo '<td>';
                       echo $row_Cult_fetch['intv_name'];
                    echo '</td>';

                     echo '<td>';
                       echo $row_Cult_fetch['intv_qty'];
                       echo $row_Cult_fetch['intv_unit_of_measurement'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_Cult_fetch['value_of_intv'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_Cult_fetch['net_income'];
                    echo '</td>';

                    echo '</tr>';
                  }
                  echo '</table>';
                } ?>
                <!-- BUTTON END FOR CROP CULTIVATION -->

                <!-- BUTTON START FOR AGRI ALLIED - OTHERS -->

                <button data-toggle="modal" data-target="#modalallied" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-apple-alt"></i> &nbsp; Agri Allied - Others</button>
                <br>
                <?php
                $query_fetch_allied = "SELECT * FROM allied WHERE family_id='$fam_id' AND `bsl_allied`='1' AND `intv_year`='$selected_year'";
                $res_fetch_allied = mysqli_query($link, $query_fetch_allied);
                $count_allied_fetch = mysqli_num_rows($res_fetch_allied);
                if($count_allied_fetch==0){
                  // echo "Enter Allied Activity Details.";
                }
                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Activity </th> <th> Area<br> (in acre) </th> <th> Prod. </th> <th>Intv.</th> <th>Qty</th> <th>Value</th> <th> Net Annual<br> Income (₹) </th>';
                  echo '</tr>';
                  while($row_allied_fetch = mysqli_fetch_assoc($res_fetch_allied)){
                    echo '<tr>';
                    echo '<td>';
                      echo $row_allied_fetch['type'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_allied_fetch['area'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_allied_fetch['production'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_allied_fetch['intv_name'];
                    echo '</td>';


                    echo '<td>';
                      echo $row_allied_fetch['intv_qty'];
                      echo $row_allied_fetch['intv_unit'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_allied_fetch['intv_value'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_allied_fetch['net_annual'];
                    echo '</td>';

                    
                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <!-- BUTTON END FOR AGRI ALLIED - OTHERS -->
                <br>

                <!-- BUTTON START FOR LIVESTOCK -->

                <button data-toggle="modal" data-target="#modallivestock" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-coffee"></i> &nbsp; Agri Allied - Livestock</button>
                <br>
                <?php
                $query_fetch_livestock = "SELECT * FROM livestock WHERE family_id='$fam_id' AND bsl_livestock='1' AND intv_year='$selected_year'";
                $res_fetch_livestock = mysqli_query($link, $query_fetch_livestock);
                $count_livestock_fetch = mysqli_num_rows($res_fetch_livestock);
                if($count_livestock_fetch==0){
                  // echo "Enter Livestock Details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Livestock </th> <th> Count </th> <th> Annual Income(₹) </th> <th> Net Income(₹) </th> <th> </th>';
                  echo '</tr>';
                  while($row_livestock_fetch = mysqli_fetch_assoc($res_fetch_livestock)){
                    echo '<tr>';
                    echo '<td>';
                      echo $row_livestock_fetch['name'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_livestock_fetch['number'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_livestock_fetch['annual_income'];
                    echo '</td>';

                      echo '<td>';
                      echo $row_livestock_fetch['net_income'];
                    echo '</td>';

                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <br>
                <!-- BUTTON END FOR LIVESTOCK -->

                <!-- BUTTON STAT FOR DAILYWAGE -->
                <button data-toggle="modal" data-target="#modaldailyWage" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-sign-language"></i> &nbsp; daily Wage/Labour Details</button>
                 <br>
                <?php
                $query_fetch_dailywage = "SELECT * FROM daily_wage WHERE family_id='$fam_id' AND intv_year='$selected_year' AND bsl_dailywage='1'";
                $res_fetch_dailywage = mysqli_query($link, $query_fetch_dailywage);
                $count_dailywage_fetch = mysqli_num_rows($res_fetch_dailywage);
                if($count_dailywage_fetch==0){
                  // echo "Enter Daily Wage details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Members Involved </th> <th> Days Involved </th> <th> Place </th> <th> Wage(₹) </th> <th> Annual Income(₹) </th>';
                  echo '</tr>';
                  while($row_dailywage_fetch = mysqli_fetch_assoc($res_fetch_dailywage)){
                    echo '<tr>';
                    echo '<td>';
                      echo $row_dailywage_fetch['members_count'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_dailywage_fetch['days_involved'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_dailywage_fetch['place'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_dailywage_fetch['wage'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_dailywage_fetch['annual_income'];
                    echo '</td>';

                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <!-- BUTTON END FOR DAILYWAGE -->
                <!-- BUTTON START FOR ENTERPRISE -->
                <button data-toggle="modal" data-target="#modalenterprise" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-industry"></i> &nbsp; Enterprise Business Details</button><br>
                <?php
                $query_fetch_ent = "SELECT * FROM enterprise WHERE family_id='$fam_id' AND bsl_ent='1' AND intv_year='$selected_year'";
                $res_fetch_ent = mysqli_query($link, $query_fetch_ent);
                $count_ent_fetch = mysqli_num_rows($res_fetch_ent);
                if($count_ent_fetch==0){
                  // echo "Enter Enterprise Details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Enterprise </th> <th> Enterpreneur </th> <th> Net Income(₹) </th>';
                  echo '</tr>';
                  while($row_ent_fetch = mysqli_fetch_assoc($res_fetch_ent)){
                    echo '<tr>';
                    echo '<td>';
                      echo $row_ent_fetch['enterprise_name'];
                    echo '</td>';

                    echo '<td>';
                      echo $row_ent_fetch['enterpreneur_name'];
                    echo '</td>';
                    
                    echo '<td>';
                      echo $row_ent_fetch['net_income'];
                    echo '</td>';

                  
                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <!-- BUTTON END FOR ENTERPRISE -->

<?php
  }
  else{
    echo "SELECT YEAR";
  }
?>

<!-- MODAL END FOR CROP CULTIVATION -->
           
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

    function cal_yield(){
  total_production = document.getElementById('total_production').value;
  cultivated_area = document.getElementById('orangeForm-pass_cul_area').value;
  yeild = total_production/cultivated_area;
  yeild = parseFloat(yeild).toFixed(2);
  document.getElementById('orangeForm-pass_yield').value=yeild;
}

function cal_costofcult(){
  total_expense = document.getElementById('total_expenditure_field').value;
  total_land = document.getElementById('orangeForm-pass_cul_area').value;
  document.getElementById('orangeForm-pass_cost').value=total_expense/total_land;
}

function cal_total_expenditure(){
  area = document.getElementById('orangeForm-pass_cul_area').value;
  cost = document.getElementById('orangeForm-pass_cost').value;
  document.getElementById('total_expenditure_field').value=area*cost;

  cal_net_total();
}

function cal_net_total(){
  console.log("Hello World");
  expenditure = document.getElementById('total_expenditure_field').value;
  income = document.getElementById('total_income_field').value;
  console.log(expenditure);
  console.log(income);
  document.getElementById('orangeForm-pass_netincome').value=income-expenditure;
}

function cal_total_income(){
  production = document.getElementById('total_production').value;
  rate = document.getElementById('market_rate').value;
  document.getElementById('total_income_field').value=production*rate;
}

function del_obj(entry_id, category) {
  var txt;
  var r = confirm("Are you sure you want to delete?");
  if (r == true) {
    del_obj1(entry_id, category);
  }
}

function cal_net_allied(){
  ann_income_allied_act = document.getElementById('orangeForm-sp_ann_income_allied').value;
  ann_exp_allied_act = document.getElementById('orangeForm-annualexp_allied').value;
  net_income_allied_act = ann_income_allied_act-ann_exp_allied_act;
  document.getElementById('orangeForm-netannual_allied').value = net_income_allied_act;
}

function cal_net_livestock(){
  ann_income_livestock = document.getElementById('orangeForm-income_livestock').value;
  rearing_exp = document.getElementById('orangeForm-cost_livestock').value;
  net_income = ann_income_livestock-rearing_exp;
  console.log(ann_income_livestock);
  console.log(rearing_exp);
  console.log(net_income);
  document.getElementById('orangeForm-netincome_livestock').value = net_income;
}
function cal_wage(){
  a = document.getElementById('orangeForm-passdays').value;
  b = document.getElementById('orangeForm-passdailywage1').value;
  c = document.getElementById('orangeForm-passdailywage4').value;
  document.getElementById('orangeForm-passdailywage5').value=a*b*c;
}
function cal_net_enterprise(){
  ann_income_ent = document.getElementById('orangeForm-passentinc').value;
  ent_exp = document.getElementById('orangeForm-passenterpriseexp').value;
  net_income_ent = ann_income_ent-ent_exp;
  document.getElementById('orangeForm-passentnet').value = net_income_ent;
}

function set_year(a){
  console.log(a)
  var loc = window.location;
     window.location = loc.protocol + '//' + loc.host + loc.pathname + loc.search+'&year='+a;
    console.log(loc.search);
}



function del_obj1(entry_id, category) {
               // alert(status);
                //alert(empid);
                $.ajax({
                    url: "delete_row.php",
                    method: "POST",
                    data: {
                        entry_id: entry_id,
                        category: category
                    },
                    success: function(data) {
                        // $('#result').html(data);
                        // window.location = window.location();
                        window.location.href = window.location.href
                        console.log(data);
                    }
                });
            }
</script>


</body>
</html>
