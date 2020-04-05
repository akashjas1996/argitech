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
        $res_crop_area = mysqli_query($link, $query_crop_area);
        $crop_sum=0;
        while($row_crop_area=mysqli_fetch_assoc($res_crop_area)){
            $crop_sum+=  $row_crop_area['cultivated_area'];
        }
        array_push($dataPointsCrops1, array("y" => "$crop_sum", "legendText" => "$crop_name", "label" => "$crop_name"));
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

<div class="row">
    <!-- <div class="col-lg-4">
        <div id="chartContainerCategories"></div>
    </div> -->
    <div class="col-lg-5">
        <div id="chartContainer"></div>
    </div>
     
</div>


<?php
    $dataPoints = array(
	array("x" => 1325356200000, "y" => 2600),
	array("x" => 1328034600000, "y" => 3800),
	array("x" => 1330540200000, "y" => 4300),
	array("x" => 1333218600000, "y" => 2900),
	array("x" => 1335810600000, "y" => 4100),
	array("x" => 1338489000000, "y" => 4500),
	array("x" => 1341081000000, "y" => 8600),
	array("x" => 1343759400000, "y" => 6400),
	array("x" => 1346437800000, "y" => 5300),
	array("x" => 1349029800000, "y" => 6000)
    );
      $dataPointsCategories = array();

   
        

?>


<script type="text/javascript">
   

    // $(function () {
    //     var chart = new CanvasJS.Chart("chartContainerCategories", {
    //         theme: "light2",
    //         title: {
    //             text: "Categories"
    //         },
    //         animationEnabled: true,
    //         legend: {
    //             fontSize: 20,
    //             fontFamily: "Helvetica"
    //         },
    //         theme: "light2",
    //         data: [
    //         {
    //             type: "doughnut",
    //             indexLabelFontFamily: "Garamond",
    //             indexLabelFontSize: 20,
    //             indexLabel: "{label} {y}%",
    //             startAngle: -20,
    //             showInLegend: true,
    //             toolTipContent: "{legendText} {y}%",
    //             dataPoints: <?php echo json_encode($dataPointsCategories, JSON_NUMERIC_CHECK); ?>
    //         }
    //         ]
    //     });
    //     chart.render();
    // });

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
</script>
<?php include '../footer.php'; ?>