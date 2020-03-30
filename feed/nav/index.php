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



if(isset($_POST['allied_submit'])){
  $allied_type = $_POST['name_allied'];
  $allied_area = $_POST['area_allied'];
  $allied_prod = $_POST['production_allied'];
  $allied_ann_income = $_POST['ann_income_allied'];
  $allied_exp = $_POST['ann_exp_allied'];
  $allied_net_income = $_POST['net_inc_allied'];

  $query_allied = "
  INSERT INTO `allied`
(`family_id`,
`type`,
`area`,
`production`,
`ann_income`,
`ann_exp`,
`net_annual`)
VALUES
('$fam_id',
'$allied_type',
'$allied_area',
'$allied_prod',
'$allied_ann_income',
'$allied_exp',
'$allied_net_income');";
$res_allied = mysqli_query($link, $query_allied);
}

if(isset($_POST['livestock_submit'])){
  $livestock_name = $_POST['name_livestock'];
  $livestock_num = $_POST['number_livestock'];
  // $livestock_qty = $_POST['qty_livestock'];
  // $livestock_sp = $_POST['rate_livestock'];
  $livestock_annualIncome = $_POST['ann_income_livestock'];
  $livestock_cost = $_POST['rearing_cost_livestock'];
  $livestock_net_income = $_POST['net_income_livestock'];


 $query_livestock= "INSERT INTO `livestock`
(`family_id`,
`name`,
`number`,
`annual_income`,
`cost`,
`net_income`)
VALUES
('$fam_id',
'$livestock_name',
'$livestock_num',
'$livestock_annualIncome',
'$livestock_cost',
'$livestock_net_income')";

echo $query_livestock;
$res_livestock = mysqli_query($link, $query_livestock);


}

if(isset($_POST['enterprise_submit'])){
  $enterprise_name = $_POST['name_ent_enterprise'];
  $enterpreneur_name = $_POST['name_person_enterprise'];
  $person_employed = $_POST['person_enterprise'];
  $annual_exp = $_POST['ann_exp_enterprise'];
  $annual_income = $_POST['annual_income_enterprise'];
  $net_income = $_POST['net_income_enterprise'];
  $reg_status = $_POST['reg_status_enterprise'];

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
`person_employed`)
VALUES
('$fam_id',
'$enterprise_name',
'$enterpreneur_name',
'$annual_exp',
'$annual_income',
'$net_income',
'$reg_status',
'$person_employed');";
$res_enterprise = mysqli_query($link, $query_enterprise);
}


if(isset($_POST['dailywage_submit']) && isset($_POST['mem_dailywage']) && isset($_POST['days_dailywage']) && isset($_POST['place_dailywage']) && isset($_POST['wage_dailywage']) && isset($_POST['income_dailywage'])){
  $no_of_mem = $_POST['mem_dailywage'];
  $days_dailywage = $_POST['days_dailywage'];
  $place = $_POST['place_dailywage'];
  $distance = $_POST['distance_dailywage'];
  $wage = $_POST['wage_dailywage'];
  $annual_income_wage = $_POST['income_dailywage'];

  $clear_dailywage = "DELETE FROM daily_wage WHERE family_id='$fam_id'";
  $res_clear_dailywage = mysqli_query($link, $clear_dailywage);

  $query_dailywage = "INSERT INTO daily_wage(`family_id`, `members_count`, `days_involved`, `place`, `distance`, `wage`, `annual_income`) VALUES('$fam_id', '$no_of_mem', '$days_dailywage', '$place', '$distance', '$wage', '$annual_income_wage')";

  $res_dailywage = mysqli_query($link, $query_dailywage);

}

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
`net_income`)
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
'$crop_net_income')";



 $res_crop_cultivation = mysqli_query($link, $query_crop_cultivation);

}

if(isset($_POST['geninfo_submit'])){
  $caste_gen = $_POST['caste_gen'];
  $house_gen = $_POST['house_gen'];
  $toilet_gen = $_POST['toilet_gen'];
  $year_gen = $_POST['year_BLS'];
  $date_gen = $_POST['date_survey'];

  $query_gen_info = "
  UPDATE `family`
SET
`house_type` = '$house_gen',
`toilet` = '$toilet_gen',
`caste` = '$caste_gen',
`year_of_BLS` = '$year_gen',
`date` = '$date_gen'
WHERE `family_id` = '$fam_id';
";


$res_geninfo = mysqli_query($link, $query_gen_info);


}

if(isset($_POST['land_holding']) && isset($_POST['owned_land'])){
  $owned_land = $_POST['owned_land'];
  $irrigated_land = $_POST['irrigated_land'];
  $total_land = $_POST['total_land'];
  $irr_percentage = $_POST['irrigated_percentage'];
  $irr_percentage = rtrim($irr_percentage, "%");
  $ownership_type = $_POST['ownership_type'];

  if(isset($_POST['irrigation_source']))
    $irrigation_source = $_POST['irrigation_source'];

  if(isset($_POST['irrigation_source'])){
     foreach($_POST['irrigation_source'] as $irra_source) { 
                $query_irr_source = "INSERT INTO irrigation_source(`family_id`, `irrigation_source`) VALUES('$fam_id', '$irra_source')";
                $res_irr_source = mysqli_query($link, $query_irr_source);
        } 
  }
 

  $query_land = "INSERT INTO land_holding(`family_id`, `land_owned`, `land_category`,`irrigated_land`, `irrigated_percentage`, `ownership_type`) VALUES('$fam_id', '$total_land', '$owned_land', '$irrigated_land', '$irr_percentage', '$ownership_type')";
  echo $query_land;
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
  $other_edu = $_POST['other_edu'];

  $query_member_add = "INSERT INTO family_member(`family_id`, `name`, `age`, `sex`, `ed_status`, `skill`, `mobile`, `edu_other`) VALUES('$fam_id', '$mem_name', '$age_mem', '$gender', '$edu_status', '$skills', '$mob_no', '$other_edu')";

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

  $in_loc = "INSERT INTO family(`family_id`, `TSRDS_op_area`, `gp`, `block`, `dist`, `state`, `village`) VALUES('$fam_id', '$op_area', '$gp', '$block', '$district', '$state','$village')";

  if($count_loc==0){
    $res_loc = mysqli_query($link, $in_loc);
  }
  else{
    $query_del_location_info = "DELETE FROM `family` WHERE family_id='$fam_id'";
    $res_del_location_info = mysqli_query($link, $query_del_location_info);
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


          <!-- MODAL START FOR LIVESTOCK -->
          <form action="" method="POST">
          <div class="modal fade" id="modallivestock" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Livestock Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <select name="name_livestock" class="browser-default custom-select">
            <option selected>Name of the Livestock</option>
            <option value="Cow">Cow</option>
            <option value="Ox">Ox</option>
            <option value="Buffallow">Buffallow</option>
            <option value="Goat">Goat</option>
            <option value="Sheep">Sheep</option>
            <option value="Pig">Pig</option>
            <option value="Hen">Hen</option>
            <option value="Duck">Duck</option>
            <option value="Others">Others</option>
          </select>
        </div>

        <div class="md-form mb-4">
          <input name="number_livestock" type="number" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Numbers</label>
        </div>

         <div class="md-form mb-4">
          <input onchange="cal_net_livestock()" name="ann_income_livestock" type="number" id="orangeForm-income_livestock" class="form-control">
          <label for="orangeForm-income_livestock">Annual Income(₹)</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_net_livestock()" name="rearing_cost_livestock" type="number" id="orangeForm-cost_livestock" class="form-control">
          <label for="orangeForm-cost_livestock">Cost of rearing(₹)</label>
        </div>

        <div class="md-form mb-4">
          <input readonly="readonly" name="net_income_livestock" type="number" id="orangeForm-netincome_livestock" class="form-control">
          <label for="orangeForm-netincome_livestock">Net Annual Income(₹)</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="livestock_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>

          <!-- MODAL END FOR LIVESTOCK -->

          <!-- MODAL START FOR ALLIED -->
          <form action="" method="POST">
          <div class="modal fade" id="modalallied" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Allied Activities</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <select name="name_allied" class="browser-default custom-select">
            <option disabled="disabled" selected>Allied Activity</option>
            <option value="Apiculture">Apiculture</option>
            <option value="Floriculture">Fishery</option>
            <option value="Floriculture">Floriculture</option>
            <option value="Horticulture">Horticulture(Fruits)</option>
            <option value="Pisciculture">Pisciculture</option>
            <option value="Sericulture">Sericulture</option>
            <option value="Tasar">Tasar</option>
            <option value="Lac">LAC</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="md-form mb-4">
          <input step="0.1" name="area_allied" type="number" id="orangeForm-passcultarea" class="form-control">
          <label for="orangeForm-passcultarea">Area Under Cultivation (in acre)</label>
        </div>

        <div class="md-form mb-4">
          <input name="production_allied" type="number" id="orangeForm-prod_allied" class="form-control">
          <label for="orangeForm-prod_allied">Production (in Qtl.)</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_net_allied()" name="ann_income_allied" type="number" id="orangeForm-sp_ann_income_allied" class="form-control">
          <label for="orangeForm-sp_ann_income_allied">Annual Income(₹)</label>
        </div>

         <div class="md-form mb-4">
          <input onchange="cal_net_allied()" name="ann_exp_allied" type="number" id="orangeForm-annualexp_allied" class="form-control">
          <label for="orangeForm-annualexp_allied">Annual Expenditure(₹)</label>
        </div>

        <div class="md-form mb-4">
          <input readonly="readonly" name="net_inc_allied" type="number" id="orangeForm-netannual_allied" class="form-control">
          <label for="orangeForm-netannual_allied">Net Annual(₹)</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="allied_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>

          <!-- MODAL END FOR ALLIED -->


          <!-- MODAL START FOR GENERAL INFO -->
          <form action="" method="POST">
          <div class="modal fade" id="modalgeninfo" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">General Info</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-4">
          <select name="caste_gen" class="browser-default custom-select">
            <option disabled="disabled" selected>Caste</option>
            <option value="SC">SC</option>
            <option value="ST">ST</option>
            <option value="OBC">OBC</option>
            <option value="General">General</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div class="md-form mb-4">
           <select name="house_gen" class="browser-default custom-select">
            <option disabled="disabled" selected>House Type</option>
            <option value="Kutcha House">Kutcha House</option>
            <option value="Pucca House">Pucca House</option>
          </select>
        </div>

        <div class="md-form mb-4">
         <select name="toilet_gen" class="browser-default custom-select">
            <option disabled="disabled" selected>Toilet available</option>
            <option value="Yes">Yes</option>
            <option value="No">No</option>
          </select>
        </div>

         <div class="md-form mb-4">
         <select name="year_BLS" class="browser-default custom-select">
            <option disabled="disabled" selected>Year of BLS</option>
            <option value="2019-20">2019-20</option>
            <option value="2020-21">2020-21</option>
            <option value="2020-21">2021-22</option>
            <option value="2020-21">2022-23</option>
            <option value="2020-21">2023-24</option>
          </select>
        </div>

         <div class="md-form mb-4">
          <input type="Date" name="date_survey" type="text" id="orangeForm-pass" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass">Baseline Survey Date</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="geninfo_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR GENERAL INFO -->

<!-- MODAL START FOR DAILY WAGE -->
          <form action="" method="POST">
          <div class="modal fade" id="modaldailyWage" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Daily Wage(₹)</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

         <div class="md-form mb-4">
          <input onchange="cal_wage()" name="mem_dailywage" type="number" id="orangeForm-passdays" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdays">No. of family Members doing wage labour</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_wage()" name="days_dailywage" type="number" id="orangeForm-passdailywage1" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage1">No. of days involved</label>
        </div>

        <div class="md-form mb-4">
          <input name="place_dailywage" type="text" id="orangeForm-passdailywage2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage2">Place of work</label>
        </div>

        <div class="md-form mb-4">
          <input name="distance_dailywage" type="number" id="orangeForm-passdailywage3" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage3">Distance (in KM)</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_wage()" name="wage_dailywage" type="number" id="orangeForm-passdailywage4" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage4">Wage(₹)</label>
        </div>

        <div class="md-form mb-4">
          <input name="income_dailywage" type="number" id="orangeForm-passdailywage5" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage5">Annual Income(₹)</label>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="dailywage_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR DAILY WAGE -->

<!-- MODAL START FOR ENTERPRISE -->
          <form action="" method="POST">
          <div class="modal fade" id="modalenterprise" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Enterprise / Business details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

         <div class="md-form mb-4">
          <input name="name_ent_enterprise" type="text" id="orangeForm-passdays" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdays">Micro Enterprice Name</label>
        </div>

        <div class="md-form mb-4">
          <input name="name_person_enterprise" type="text" id="orangeForm-passdailywage1" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage1">Name of the Enterpreneur</label>
        </div>

        <div class="md-form mb-4">
          <input name="person_enterprise" type="number" id="orangeForm-passdailywage2" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passdailywage2">No. of person employed</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_net_enterprise()" name="ann_exp_enterprise" type="number" id="orangeForm-passenterpriseexp" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-passenterpriseexp">Annual Expediture</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_net_enterprise()" name="annual_income_enterprise" type="number" id="orangeForm-passentinc" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-passentinc">Annual Income(₹)</label>
        </div>

        <div class="md-form mb-4">
          <input readonly="readonly" name="net_income_enterprise" type="number" id="orangeForm-passentnet" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-passentnet">Net Income(₹)</label>
        </div>

         <div class="md-form mb-4">
         <select name="reg_status_enterprise" class="browser-default custom-select">
            <option disabled="disabled" selected>Registration</option>
            <option value="Yes">Registered</option>
            <option value="No">Non-Registered</option>
          </select>
        </div>

        <div class="md-form mb-4">
         <select name="group_enterprise" class="browser-default custom-select">
            <option disabled="disabled" selected>Part of any group</option>
            <option value="SHG">SHG</option>
            <option value="Farmer's Group">Farmer's Group</option>
            <option value="Co-operative">Co-operative</option>
            <option value="FPO">FPO</option>
            <option value="None">None</option>
          </select>
        </div>

      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="enterprise_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR ENTERPRISE -->
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
            <option disabled="disabled" selected>TSRDS Operational Area</option>
            <option value="Jamshedpur">Jamshedpur</option>
            <option value="Noamundi">Noamundi</option>
            <option value="West Bokaro">West Bokaro</option>
            <option value="Jamadoba">Jamadoba</option>
            <option value="Kaling Nagar">Kalinga Nagar</option>
            <option value="Kaling Nagar">Gomardih</option>
            <option value="Sukinda">Sukinda</option>
            <option value="Bamnipal">Bamnipal</option>
            <option value="Joda">Joda</option>
            <option value="Gopalpur">Gopalpur</option>
          </select>
        </div>

        <div class="md-form mb-5">
           <select name="state" class="browser-default custom-select">
            <option disabled="disabled" selected>State</option>
            <option value="Jharkhand">Jharkhand</option>
            <option value="Odisha">Odisha</option>
          </select>
        </div>

        <div class="md-form mb-4">
         <select name="district" class="browser-default custom-select">
            <option disabled="disabled" selected>District</option>
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

<!-- MODAL START FOR CROP CULTIVATION -->
          <form action="" method="POST">
          <div class="modal fade" id="modalcropCultivation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Crop Cultivation Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">

        <div class="md-form mb-5">
          <select name="crop_category" class="browser-default custom-select">
            <option disabled="disabled" selected>Crop Category</option>
            <option value="Kharif">Kharif</option>
            <option value="Rabi">Rabi</option>
            <option value="Rabi">Zaid</option>
          </select>
        </div>


         <div class="md-form mb-4">
          <input name="crop_name" type="text" id="orangeForm-pass_crop_name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_crop_name">Crop Name</label>
        </div>

        <div class="md-form mb-4">
          <input step='0.1' onchange="cal_total_expenditure()" name="crop_cultivated_area" type="number" id="orangeForm-pass_cul_area" class="form-control">
          <label for="orangeForm-pass_cul_area">Cultivated Area (acre)</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_total_income(), cal_yield()" name="crop_production" type="number" id="total_production" class="form-control">
          <label data-error="wrong" data-success="right" for="total_production">Total Production(in acre)</label>
        </div>

        <div class="md-form mb-4">
          <input readonly="readonly" step="0.1" name="crop_yield" type="number" id="orangeForm-pass_yield" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_yield">Yield Qtl/acre</label>
        </div>

        

        <div class="md-form mb-4">
          <input onchange="cal_total_income()" step="0.1" name="crop_market_rate" type="number" id="market_rate" class="form-control">
          <label data-error="wrong" data-success="right" for="market_rate">Market Rate (₹/Qtl)</label>
        </div>

        <div class="md-form mb-4">
          <input name="crop_tot_income" type="number" id="total_income_field" class="form-control">
          <label data-error="wrong" data-success="right" for="total_income_field">Total Income(₹)</label>
        </div>

         <div class="md-form mb-4">
          <input onchange="cal_net_total(), cal_costofcult()" name="crop_total_expenditure" type="number" id="total_expenditure_field" class="form-control">
          <label data-error="wrong" data-success="right" for="total_expenditure_field">Total Expediture(₹)</label>
        </div>

         <div class="md-form mb-4">
          <input readonly="readonly" onchange="cal_total_expenditure(); cal_net_total()" name="crop_cultivation_cost" type="number" id="orangeForm-pass_cost" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_cost">Cost of cultivation (₹/acre)</label>
        </div>


        <div class="md-form mb-4">
          <input readonly="readonly" name="crop_net_income" type="number" id="orangeForm-pass_netincome" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_netincome">Net Income(₹)</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input type="submit" name="crop_submit" class="btn btn-deep-orange"></button>
      </div>
    </div>
  </div>
</div>
</form>

<!-- MODAL END FOR CROP CULTIVATION -->

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

        <div class="md-form mb-4">
          <select name="ownership_type" class="browser-default custom-select">
            <option value="Land_owned" selected>Ownership Type</option>
            <option value="Leased">Leased</option>
            <option value="Owned">Owned</option>
          </select>
        </div>

        <div class="md-form mb-4">
          <select name="owned_land" class="browser-default custom-select">
            <option value="Land_owned" disabled="disabled" selected>Farmer Category</option>
            <option value="big">Big (More than 10 acre)</option>
            <option value="medium">Medium (5 to 10 acre)</option>
            <option value="small">Small (2.5 to 5 acre)</option>
            <option value="marginal">Marginal (0 to 2.5 acre)</option>
            <option value="landless">Landless</option>
          </select>
        </div>
        
         <div class="md-form mb-4">
          <input step="0.1" onchange="cal_irr_land()" name="total_land" type="number" id="total_land_count" class="form-control">
          <label for="orangeForm-pass_irr">Total land (in acre)</label>
        </div>

        <div class="md-form mb-4">
          <input step="0.1" onchange="cal_irr_land()" name="irrigated_land" type="number" id="irrigated_land_count" class="form-control">
          <label for="orangeForm-pass_irr1">Irrigated land (in acre)</label>
        </div>

        <div class="md-form mb-4">
          <p> <b> Irrigation Sources </b> </p>
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
          <input id="irrigated_land_percentage" readonly="readonly" name="irrigated_percentage" type="text"  class="form-control validate" placeholder="Percentage of Irrigated land">
          <!-- <label data-error="wrong" data-success="right" for="irrigated_land_percentage"></label> -->
        </div>
       
      
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input name="land_holding" type="submit" class="btn btn-deep-orange"></button>
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
          <select onchange="otheredu(this.value)" style="width: 100%" name="edu_status">
            <option disabled="disabled">Educational Status</option>
            <option value="Primary">Primary</option>
            <option value="Secondary">Secondary</option>
            <option value="Under Graduated">Under Graduated</option>
            <option value="Graduated">Graduated</option>
            <option value="Other">Other</option>
          </select>
        </div>

        <div id="otherEduField" style="display: none" class="md-form mb-4">
          <i class="fas fa-book prefix grey-text"></i>
          <input name="other_edu" type="text" id="orangeForm-pass-othereducation" class="form-control validate" value="-">
          <label data-error="wrong" data-success="right" for="orangeForm-pass-othereducation">Other Education</label>
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

<!-- MODAL START FOR INCOME -->
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
          <label data-error="wrong" data-success="right" for="orangeForm-email3">Annual Income(₹)</label>
        </div>
      </div>
      <div class="modal-footer d-flex justify-content-center">
        <input name="income_save" type="submit" class="btn btn-deep-orange">
      </div>
    </div>
  </div>
</div>
</form>
<!-- MODAL END FOR INCOME -->


<div class="text-center">
<!--   <a href="" class="btn btn-default btn-rounded mb-4" data-toggle="modal" data-target="#modalRegisterForm">Launch
    Modal Register Form</a> -->
</div>

<button data-toggle="modal" data-target="#modalfamilyleader" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-map-marker"></i> &nbsp; Location</button>
          <br>
            <?php 
            $query_loc_data = "SELECT * FROM family WHERE family_id='$fam_id'";
                $res_loc_data = mysqli_query($link, $query_loc_data);
                $row_loc_data = mysqli_fetch_assoc($res_loc_data);
                if($count_loc==0){
                // echo "ADD LOCATION DETAILS";
              }
              else{
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
          
          <button data-toggle="modal" data-target="#modalgeninfo" type="button" class="btn btn-success btn-lg btn-block"><i class="fas fa-address-book"></i> &nbsp; General Info</button>
          <?php 
                if($count_loc==0){
                // echo "ADD LOCATION DETAILS";
              }
              else{
                echo '<table class="table">';

                echo '<tr>';
                echo '<td>';
                  echo 'Year of BLS:';
                echo '</td>';
                echo '<td>';
                  echo $row_loc_data['year_of_BLS'];
                echo '</td>';
                echo '</tr>';

                 echo '<tr>';
                echo '<td>';
                  echo 'Date of BLS:';
                echo '</td>';
                echo '<td>';
                  echo $row_loc_data['date'];
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                  echo 'Caste:';
                echo '</td>';
                echo '<td>';
                  echo $row_loc_data['caste'];
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                  echo 'House Type:';
                echo '</td>';
                echo '<td>';
                  echo $row_loc_data['house_type'];
                echo '</td>';
                echo '</tr>';

                echo '<tr>';
                echo '<td>';
                  echo 'Toilet:';
                echo '</td>';
                echo '<td>';
                  echo $row_loc_data['toilet'];
                echo '</td>';
                echo '</tr>';

                echo '</table>';
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
              // echo "No Family Members Added";
            }

            else{
              echo '<table class="table">
                <tr>  <th>Name</th> <th>Age</th>  <th>Education</th> <th>Skills</th> <th> <i class="fas fa-trash-alt"></i> </th> </tr>';
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
                    if($row_members['ed_status']=='Other'){
                      echo $row_members['edu_other'];
                    }
                    else{
                      echo $row_members['ed_status'];
                    }
                    echo '</td>
                    <td>';
                    echo $row_members['skill'];
                    echo '</td>';
                    echo '<td>';
                    $entry_id_member = $row_members['member_id'];
                    ?>
                    <button onclick="del_obj('<?php echo $row_members['member_id']; ?>', 'member')"  name="del_member" type="submit">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>
                    <p id="result"> </p>

                    <?php
                    echo '</td>';
                    echo '</tr>';
              }
              echo '</table>';

            }
            ?>
            <br>
            <button data-toggle="modal" data-target="#modaloccupation" type="button" class="btn btn-success btn-lg btn-block">
              <i class="fa fa-money-bill-alt"></i> &nbsp; Income Details</button>
           <br>
           <?php
            $total_income=0;
            $query_income = "SELECT * FROM income_details WHERE family_id='$fam_id'";
            $res_income = mysqli_query($link, $query_income);
            $count_income = mysqli_num_rows($res_income);
            if($count_income==0){
              // echo "ADD INCOME DETAILS.";
            }
            else{
              echo '<table class="table">';
              echo '<th>Occupation</th>  <th>Type</th> <th>Days Engaged</th> <th>Annual Income </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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
                    $total_income+=$row_income['annual_income'];
                  echo "</td>";
                  echo '<td>';
                    $entry_id_income = $row_income['entry_id'];
                    ?>
                   
                     <button onclick="del_obj('<?php echo $row_income['entry_id']; ?>', 'income')"  name="del_member" type="submit">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>
                    <p id="result"> </p>

                    <?php
                    echo '</td>';


                echo "</tr>";
              }
              echo '<tr>';
              echo '<td colspan="2">';
                echo '<b> Estimated Income: '.$total_income;
              echo '</b> </td>';
               echo '<td colspan="2">';
               echo '<b> Calculated Income';
              echo '</b> </td>';
              echo '<tr>';
              echo '</table>';
            }
           ?>
           <br>

             <button data-toggle="modal" data-target="#modallandholding" type="button" class="btn btn-success btn-lg btn-block">
              <i class="fas fa-tractor"></i> &nbsp; Land Holding</button>
             <br>
             <?php 
             $query_check_land = "SELECT * FROM land_holding WHERE family_id='$fam_id'";
             $res_check_land = mysqli_query($link, $query_check_land);
             $count_check_land = mysqli_num_rows($res_check_land);
             if($count_check_land==0){
              // echo "ENTER LAND DETAILS";
             }
             else{
              echo '<table class="table">';
              echo "<th> Ownership Type </th> <th> Farmer Type </th> <th> Total Land (in acre) </th> <th>Irrigated Land (in acre)</th> <th> % of Irrigated Land </th> <th> <i class='fas fa-trash-alt'></i> </th>";
              while($row_check_land = mysqli_fetch_assoc($res_check_land)){
                echo "<tr>";

                echo "<td>";
                  echo $row_check_land['ownership_type'];
                echo "</td>";

                echo "<td>";
                  echo $row_check_land['land_category'];
                echo "</td>";

                 echo "<td>";
                 echo $row_check_land['land_owned'];
                echo "</td>";

                 echo "<td>";
                 echo $row_check_land['irrigated_land'];
                echo "</td>";

                echo "<td>";
                 echo $row_check_land['irrigated_percentage'];
                 echo '%';
                echo "</td>";


                 echo '<td>';
                    $entry_id_land = $row_check_land['entry_id'];
                    ?>

                    <button onclick="del_obj('<?php echo $row_check_land['entry_id']; ?>', 'land')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>
                    <p id="result"> </p>

                    <?php
                    echo '</td>';

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
             <br><br>
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
                  echo '<th> Category </th> <th> Name </th> <th> Cultivated Area (acre) </th> <th> Yield (Qtl/acre) </th> <th> Net Income (₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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
                }
              ?>
            <br>

           

          <button data-toggle="modal" data-target="#modallivestock" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-coffee"></i> &nbsp; Agri Allied - Livestock</button>
                <br>
                <?php
                $query_fetch_livestock = "SELECT * FROM livestock WHERE family_id='$fam_id'";
                $res_fetch_livestock = mysqli_query($link, $query_fetch_livestock);
                $count_livestock_fetch = mysqli_num_rows($res_fetch_livestock);
                if($count_livestock_fetch==0){
                  // echo "Enter Livestock Details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Livestock </th> <th> Count </th> <th> Annual Income(₹) </th> <th> Net Income(₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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

                    echo '<td>';
                    ?>

                      <button onclick="del_obj('<?php echo $row_livestock_fetch['entry_id']; ?>', 'livestock')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>


                    <?php
                    echo '</td>';

                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <br>

                 <button data-toggle="modal" data-target="#modalallied" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-apple-alt"></i> &nbsp; Agri Allied - Others</button>
                <br>
                <?php
                $query_fetch_allied = "SELECT * FROM allied WHERE family_id='$fam_id'";
                $res_fetch_allied = mysqli_query($link, $query_fetch_allied);
                $count_allied_fetch = mysqli_num_rows($res_fetch_allied);
                if($count_allied_fetch==0){
                  // echo "Enter Allied Activity Details.";
                }
                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Activity </th> <th> Area (in acre) </th> <th> Production </th> <th> Net Annual Income (₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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
                      echo $row_allied_fetch['net_annual'];
                    echo '</td>';

                    echo '<td>';
                    ?>

                    <button onclick="del_obj('<?php echo $row_allied_fetch['entry_id']; ?>', 'allied')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>

                    <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
                <br>

                <button data-toggle="modal" data-target="#modaldailyWage" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-sign-language"></i> &nbsp; daily Wage/Labour Details</button>
                <?php
                $query_fetch_dailywage = "SELECT * FROM daily_wage WHERE family_id='$fam_id'";
                $res_fetch_dailywage = mysqli_query($link, $query_fetch_dailywage);
                $count_dailywage_fetch = mysqli_num_rows($res_fetch_dailywage);
                if($count_dailywage_fetch==0){
                  // echo "Enter Daily Wage details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Members Involved </th> <th> Days Involved </th> <th> Place </th> <th> Wage(₹) </th> <th> Annual Income(₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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

                    echo '<td>';
                      ?>

                    <button onclick="del_obj('<?php echo $row_dailywage_fetch['entry_id']; ?>', 'dailywage')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>

                      <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
          <br>

          <button data-toggle="modal" data-target="#modalenterprise" type="button" class="btn btn-success btn-lg btn-block">
                <i class="fas fa-industry"></i> &nbsp; Enterprise Business Details</button><br>
                <?php
                $query_fetch_ent = "SELECT * FROM enterprise WHERE family_id='$fam_id'";
                $res_fetch_ent = mysqli_query($link, $query_fetch_ent);
                $count_ent_fetch = mysqli_num_rows($res_fetch_ent);
                if($count_ent_fetch==0){
                  // echo "Enter Enterprise Details.";
                }

                else{
                  echo '<table class="table">';
                  echo '<tr>';
                  echo '<th> Enterprise </th> <th> Enterpreneur </th> <th> Net Income(₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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

                    echo '<td>';
                    ?>
                      <button onclick="del_obj('<?php echo $row_ent_fetch['entry_id']; ?>', 'enterprise')">
                      <i style="color:red" class="fas fa-times"> </i> 
                    </button>
                    <?php
                    echo '</td>';
                    echo '</tr>';
                  }
                  echo '</table>';
                }
                ?>
          <br>
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

function cal_total_income(){
  production = document.getElementById('total_production').value;
  rate = document.getElementById('market_rate').value;
  document.getElementById('total_income_field').value=production*rate;
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


function cal_irr_land(){
  console.log("Irrigated Land Percentage");
  tot_land = document.getElementById('total_land_count').value;
  irrigated_land = document.getElementById('irrigated_land_count').value;
  console.log(tot_land);
  console.log(irrigated_land);
  percentage_irr_land = (irrigated_land/tot_land*100);
  percentage_irr_land = parseFloat(percentage_irr_land).toFixed(2);
  document.getElementById('irrigated_land_percentage').value=percentage_irr_land+'%';
}

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

function cal_wage(){
  a = document.getElementById('orangeForm-passdays').value;
  b = document.getElementById('orangeForm-passdailywage1').value;
  c = document.getElementById('orangeForm-passdailywage4').value;
  document.getElementById('orangeForm-passdailywage5').value=a*b*c;
}

function cal_income_enterprise(){
  income_ent = document.getElementById('').value;
  expense_ent = document.getElementById('').value;
  document.getElementById('').value=income_ent-expense_ent;

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
  document.getElementById('orangeForm-netincome_livestock').value = net_income;
}

function cal_net_enterprise(){
  ann_income_ent = document.getElementById('orangeForm-passentinc').value;
  ent_exp = document.getElementById('orangeForm-passenterpriseexp').value;
  net_income_ent = ann_income_ent-ent_exp;
  document.getElementById('orangeForm-passentnet').value = net_income_ent;
}

function otheredu(a){
  if(a=='Other'){
    document.getElementById('otherEduField').style.display="block";
  }
  else{
    document.getElementById('otherEduField').style.display="none";
  }
}

function del_obj(entry_id, category) {
  var txt;
  var r = confirm("Are you sure you want to delete?");
  if (r == true) {
    del_obj1(entry_id, category);
  }
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
