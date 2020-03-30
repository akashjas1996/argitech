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
  $trsds_support = $_POST['crop_tsrds_supp'];

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
`value_of_intv`,
`tsrds_support`
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
'$crop_intv_amount',
'$trsds_support'
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
  $allied_intv_tsrds_supp = $_POST['allied_tsrds_supp'];
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
`tsrds_supp`,
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
'$allied_intv_tsrds_supp',
'$selected_year'
);";

$res_allied = mysqli_query($link, $query_allied);
}
// QUERY END FOR ALLIED OTHER ACTIVITIES

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
                }
                else{
                  echo "Hello";
                }
              ?>
            </h1></center>
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



          <!-- MODAL START FOR CROP CULTIVATION -->
          <form action="" method="POST">
          <div class="modal fade" id="modalcropCultivation" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Crop 
        Intervention Details</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">


        <div class="md-form mb-4">
          <select name="crop_category" class="browser-default custom-select">
            <option disabled="disabled" selected>Crop Category</option>
            <option value="Kharif">Kharif</option>
            <option value="Rabi">Rabi</option>
            <option value="Rabi">Zaid</option>
          </select>
        </div>

        <div class="md-form mb-4">
          <input name="crop_intv_name" type="text" id="orangeForm-pass_crop_name" class="form-control validate">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_crop_name">Name of the Intervention</label>
        </div>

        <div class="md-form mb-4">
          <input step='0.1' onchange="cal_total_expenditure()" name="crop_intv_qty" type="number" id="orangeForm-pass_cul_area" class="form-control">
          <label for="orangeForm-pass_cul_area">Qty. of intervention</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_total_expenditure()" name="crop_intv_unit" type="text" id="orangeForm-pass_cul_area" class="form-control">
          <label for="orangeForm-pass_cul_area">Unit of measurement</label>
        </div>

        <div class="md-form mb-4">
          <input step='0.1' onchange="cal_total_expenditure()" name="crop_intv_amount" type="number" id="orangeForm-pass_cul_area" class="form-control">
          <label for="orangeForm-pass_cul_area">Value of Intervention</label>
        </div>

        <div class="md-form mb-4">
          <input onchange="cal_total_expenditure()" name="crop_tsrds_supp" type="text" id="orangeForm-pass_cul_area" class="form-control">
          <label for="orangeForm-pass_cul_area">TSRDS Support</label>
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
          <input  onchange="cal_total_income(), cal_yield()" name="crop_production" type="number" id="total_production" class="form-control">
          <label data-error="wrong" data-success="right" for="total_production">Total Production(in Qtl.)</label>
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
          <label for="orangeForm-pass_netincome">Net Income(₹)</label>
        </div>

        <?php 
        $crop_base_income=0;
      $query_base_income = "SELECT * FROM crop_cultivation WHERE family_id='$fam_id' AND bsl_crop='0'";
      $res_base_income = mysqli_query($link, $query_base_income);
      while($row_base_income = mysqli_fetch_assoc($res_base_income)){
        $crop_base_income = $crop_base_income+$row_base_income['net_income'];
      }
      ?>
        <div class="md-form mb-4">
          <input readonly="readonly" name="crop_base_income" type="number" id="orangeForm-pass_netincome" class="form-control">
          <label data-error="wrong" data-success="right" for="orangeForm-pass_netincome">Base Income(₹) = <?php echo $crop_base_income; ?></label>
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
            <option value="Fishery">Fishery</option>
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
          <input step="0.1" name="allied_intv_name" type="text" id="orangeForm-passcultarea" class="form-control">
          <label for="orangeForm-passcultarea">Name of Intervention</label>
        </div>

        <div class="md-form mb-4">
          <input step="0.1" name="allied_intv_qty" type="number" id="orangeForm-passcultarea" class="form-control">
          <label for="orangeForm-passcultarea">Qty. of Intervention</label>
        </div>

        <div class="md-form mb-4">
          <input name="allied_intv_unit" type="text" id="orangeForm-passcultarea" class="form-control">
          <label for="orangeForm-passcultarea">Unit of Measurement</label>
        </div>

        <div class="md-form mb-4">
          <input name="allied_intv_value" type="number" id="orangeForm-prod_allied" class="form-control">
          <label for="orangeForm-prod_allied">Value of Intervention</label>
        </div>

        <div class="md-form mb-4">
          <input name="allied_tsrds_supp" type="text" id="orangeForm-prod_allied" class="form-control">
          <label for="orangeForm-prod_allied">TSRDS Support</label>
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
                  echo '<th> Crop </th>  <th> Yield (Qtl/acre) </th> <th> Interv. </th> <th> Qty <th> Value(₹) </th> </th> <th>Net Income</th> <th>  <i class="fas fa-trash-alt"></i> </th> ';
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
                  echo '<th> Activity </th> <th> Area<br> (in acre) </th> <th> Prod. </th> <th>Intv.</th> <th>Qty</th> <th>Value</th> <th> Net Annual<br> Income (₹) </th> <th> <i class="fas fa-trash-alt"></i> </th>';
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
                <!-- BUTTON END FOR AGRI ALLIED - OTHERS -->
                <br>



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
