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
        $query_crop_area = "SELECT * FROM crop_cultivation WHERE name='$crop_name'";
        $res_crop_area = mysqli_query($link, $query_crop_area);
        $crop_sum=0;
        while($row_crop_area=mysqli_fetch_assoc($res_crop_area)){
            $crop_sum+=  $row_crop_area['cultivated_area'];
        }

        array_push($dataPointsCrops1, array("y" => "$crop_sum", "legendText" => "$crop_name", "label" => "$crop_name"));

    }

	?>
</h1>



<div class="row">
    <div class="col-lg-12 chart_margin">
        <div id="chartContainerCrops"></div>
    </div>
</div>
<br>
<div class="row">
    <div class="col-lg-4">
        <div id="chartContainerCategories"></div>
    </div>
    <div class="col-lg-5">
        <div id="chartContainer"></div>
    </div>
    <div class="col-lg-1">
    </div>
     <div class="col-lg-2" style="height: 375px; background-color: lightblue" >
            <center> 
                <br><br>
                <div style="margin-top: 20px">
                    <p> <b> New <?php echo $crop_name ?> Benificiaries (Today) </b> </p><h1> 

                        <?php 
                            $query_count1 = "SELECT * FROM crop_types WHERE crop_id='$val'";
                            $res_count1 = mysqli_query($link, $query_count1);
                            $row_count1 = mysqli_fetch_assoc($res_count1);
                            echo $row_count1['new_ben'];
                        ?>

                     </h1>
                </div>
                <hr>
                 <div style="margin-top: 20px">
                    <p>  <b> Total  <?php echo $crop_name ?> Benificiaries </b> </p> <h1> <?php echo $row_count1['tot_ben']; ?> </h1>
                <hr>
                 <div style="margin-top: 20px">
                    <div class="row">
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> Districts </b> </p><p> <?php echo $row_count1['dist']; ?> </p>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> GPs </b> </p><p> <?php echo $row_count1['GPs']; ?> </p>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> Villages </b> </p><p> <?php echo $row_count1['vill']; ?> </p>
                        </div>
                    </div>
                </div>
            </center>
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

    $dp_categories_query = "SELECT * FROM crop_sub WHERE crop_id='$val'";
    $dp_categories_res = mysqli_query($link, $dp_categories_query);
    $dataPointsCategories = array();
    while($dp_categories_row = mysqli_fetch_assoc($dp_categories_res)){
        $num_val = $dp_categories_row['dummy_percentage'];
        $crop_name = $dp_categories_row['crop_sub'];
        array_push($dataPointsCategories, array("y" => "$num_val", "legendText" => "$crop_name", "label" => "$crop_name"));
    }

         $dataPointsCrops = array(
        array("y" => 60, "label" => "January"),
        array("y" => 41, "label" => "February"),
        array("y" => 53, "label" => "March"),
        array("y" => 74, "label" => "April"),
        array("y" => 42, "label" => "May"),
        array("y" => 68, "label" => "June"),
        array("y" => 76, "label" => "July"),
        array("y" => 51, "label" => "August"),
        array("y" => 44, "label" => "September")
    );

?>



<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Monthly Yield",
                fontSize: 25
            },
            axisX: {
                valueFormatString: "MMM",
                interval: 1,
                intervalType: "month"

            },
            axisY: {
                title: "Yield (in Kg)"
            },

            data: [
            {
                type: "area",
                xValueType: "dateTime",
                dataPoints: <?php echo json_encode($dataPoints); ?>
            }
            ]
        });

        chart.render();
    });

    $(function () {
        var chart = new CanvasJS.Chart("chartContainerCategories", {
            theme: "light2",
            title: {
                text: "Categories"
            },
            animationEnabled: true,
            legend: {
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "doughnut",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPointsCategories, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });

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