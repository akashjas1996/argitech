<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>


<head>
    <style>
        .chart_margin{
        margin-left: 10px;
        margin-right: 10px;
        height: 425px;
    }
        .canvasjs-chart-credit{
        display: none;
    }
    </style>
</head>

<h1>
	<?php 
		if(isset($_GET['field'])){
			$val = (int)$_GET['field'];
            $val = $val*1;
            $query_crop = "SELECT * FROM crop_types WHERE crop_id='$val'";
            $res_crop = mysqli_query($link, $query_crop);
            $row_crop = mysqli_fetch_assoc($res_crop);
            $crop_name = $row_crop['crop_name'];
            echo $crop_name;
			// echo $val;
		}
    $dataPointsCrops1 = array();
    $query_crops = "SELECT DISTINCT name FROM crop_cultivation";
    $res_crop = mysqli_query($link, $query_crops);
    while($row_crop = mysqli_fetch_assoc($res_crop)){
        $crop_name = $row_crop['name'];
        if(isset($_GET['time'])){
            if($_GET['time']=='baseline')
            {
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name' AND bsl_crop='0'";
            }
            else if($_GET['time']=='2019-20'){
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name' AND bsl_crop='1' AND intv_year='2019-20'";
            }
            else{
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name'";
            }
        }
        else{
            $query_crop_area = "SELECT * FROM crop_cultivation";
        }
        $res_crop_area = mysqli_query($link, $query_crop_area);
        $crop_sum=0;
        while($row_crop_area=mysqli_fetch_assoc($res_crop_area)){
            $crop_sum+=  $row_crop_area['cultivated_area'];
        }
        array_push($dataPointsCrops1, array("y" => "$crop_sum", "legendText" => "$crop_name", "label" => "$crop_name"));
    }
	?>



    <?php 
        if(isset($_GET['field'])){
            $val = (int)$_GET['field'];
            $val = $val*1;
            $query_crop = "SELECT * FROM crop_types WHERE crop_id='$val'";
            $res_crop = mysqli_query($link, $query_crop);
            $row_crop = mysqli_fetch_assoc($res_crop);
            $crop_name = $row_crop['crop_name'];
            echo $crop_name;
            // echo $val;
        }
    $dataPointsIncome = array();
    $query_crops = "SELECT DISTINCT name FROM crop_cultivation";
    $res_crop = mysqli_query($link, $query_crops);
    while($row_crop = mysqli_fetch_assoc($res_crop)){
        $crop_name = $row_crop['name'];
        if(isset($_GET['time'])){
            if($_GET['time']=='baseline')
            {
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name' AND bsl_crop='0'";
            }
            else if($_GET['time']=='2019-20'){
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name' AND bsl_crop='1' AND intv_year='2019-20'";
            }
            else if($_GET['time']=='2020-21'){
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name' AND bsl_crop='1' AND intv_year='2020-21'";
            }
            else{
                $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name'";
            }
        }
        $res_crop_area = mysqli_query($link, $query_crop_area);
        $crop_income=0;
        while($row_crop_area=mysqli_fetch_assoc($res_crop_area)){
            $crop_income+=  $row_crop_area['net_income'];
        }
        array_push($dataPointsIncome, array("y" => "$crop_income", "legendText" => "$crop_name", "label" => "$crop_name"));
    }
    ?>



</h1>

<center><h2>Crop Report</h2></center>
<br><br>

<p>
<div style="display: flex; justify-content: center;">
<a href="../crop/?time=baseline"> <button style="margin: 5px;" class="btn btn-default">Baseline</i></button> </a>
<a href="../crop/?time=2019-20"> <button style="margin: 5px;" class="btn btn-default">2019-20</i></button> </a>
</div>
</p>
<br>
<div class="row">
    <div class="col-lg-12 chart_margin">
        <div id="chartContainerCrops"></div>
    </div>
</div>
<br><br>
<div class="row">
    <div class="col-lg-12">
        <div id="chartContainerIncome"></div>
    </div>
</div>



<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainerCrops", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Crops Vs Area(in Acre)"
            },
            data: [
            {
                type: "column",                
                dataPoints: <?php echo json_encode($dataPointsCrops1, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });

     $(function () {
        var chart = new CanvasJS.Chart("chartContainerIncome", {
            theme: "light1",
            animationEnabled: true,
            title: {
                text: "Crops Vs Income (in ₹)"
            },
            data: [
            {
                type: "column",                
                dataPoints: <?php echo json_encode($dataPointsIncome, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>
<?php include '../footer.php'; ?>