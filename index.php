<?php include 'header.php'; ?>
<?php include 'sidebar.php'; ?>
<?php include 'content.php'; ?>

<style>
    .canvasjs-chart-credit{
        display: none;
    }
    .br{
        border:1px solid black;
    }

    .chart_margin{
        margin-top: 10px;
        margin-left: 10px;
        margin-right: 10px;
        height: 425px;
    }
</style>
<h1></h1>

<div class="container-fluid">
    <div class=row>
        <center> <h1> <b> Overview </b> </h1> </center>
        <hr>
    </div>
    <div class="row">
        <div class="col-lg-6">
            <div class="chart_margin" id="chartContainer"></div>
        </div>
        <div class="col-lg-4">
            <div class="chart_margin" id="chartContainer_2"></div>
        </div>
         <div style="height: 425px; background-color: lightblue" class="col-lg-2">
            <center> 
                <br><br>
                <div style="margin-top: 20px">
                    <p> <b> New Benificiaries (Today) </b> </p><h1> 31 </h1>
                </div>
                <hr>
                 <div style="margin-top: 20px">
                    <p>  <b> Total Benificiaries </b> </p> <h1> 131 </h1>
                </div>
                <hr>
                 <div style="margin-top: 20px">
                    <div class="row">
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> Districts </b> </p><p> 131 </p>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> GPs </b> </p><p> 131 </p>
                        </div>
                        <div class="col-lg-4 col-xs-4">
                            <p> <b> Villages </b> </p><p> 131 </p>
                        </div>
                    </div>
                </div>
            </center>
        </div>
    </div>
    <br><br> <hr> <br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="chart_margin" id="chartContainerProgress"></div>
        </div>
    </div>
    <br><br> <hr> <br><br>
    <div class="row">
        <div class="col-lg-12">
            <div class="chart_margin" id="chartContainerlocation"></div>
        </div>
    </div>

</div>


<?php
    $dataPoints = array(
        array("y" => 37, "label" => "January"),
        array("y" => 40, "label" => "February"),
        array("y" => 50, "label" => "March"),
        array("y" => 70, "label" => "April"),
        array("y" => 40, "label" => "May"),
        array("y" => 37, "label" => "June"),
        array("y" => 40, "label" => "July"),
        array("y" => 50, "label" => "August"),
        array("y" => 70, "label" => "September"),
        array("y" => 40, "label" => "october"),
        array("y" => 37, "label" => "November"),
        array("y" => 40, "label" => "December"),

    );

    $dataPoints_2 = array(
    array("y" => 72.48, "legendText" => "Crop", "label" => "Crop"),
    array("y" => 10.39, "legendText" => "Agriculture", "label" => "Agriculture"),
    array("y" => 7.78, "legendText" => "Micro", "label" => "Micro"),
    array("y" => 7.14, "legendText" => "Skill Development", "label" => "Skill Development"),
    array("y" => 2.21, "legendText" => "Daily Wage Labour", "label" => "Daily Wage Labour"),
    );

    $SourceofIncome1 = array(
    array("y" => 11133, "label" => "Bamnipal"),
    array("y" => 49088, "label" => "Gomardih"),
    array("y" => 62200, "label" => "Gopalpur"),
    array("y" => 90085, "label" => "Jamadoba"),
    array("y" => 38600, "label" => "Jamshedpur"),
    array("y" => 48750, "label" => "Joda"),
    array("y" => 11138, "label" => "Kalinga Nagar"),
    array("y" => 49088, "label" => "Unit 8"),
    array("y" => 62200, "label" => "Unit 9"),
    array("y" => 90085, "label" => "Bamnipal0"),
    array("y" => 38600, "label" => "Bamnipal1"),
    array("y" => 48750, "label" => "Bamnipal2"),
    array("y" => 11133, "label" => "Bamnipal3"),
    array("y" => 49088, "label" => "Bamnipal4"),
    array("y" => 62200, "label" => "Bamnipal5"),
    array("y" => 90085, "label" => "Bamnipal6"),
    array("y" => 38600, "label" => "Bamnipal7"),
    array("y" => 48750, "label" => "Bamnipal8")
);


    $SourceofIncome2 = array(
    array("y" => 94500, "label" => "Bamnipal"),
    array("y" => 107922, "label" => "Gomardih"),
    array("y" => 52300, "label" => "Gopalpur"),
    array("y" => 3360, "label" => "Jamadoba"),
    array("y" => 39900, "label" => "Jamshedpur"),
    array("y" => 0, "label" => "Joda"),
    array("y" => 135305, "label" => "Kalinga Nagar"),
    array("y" => 107922, "label" => "Unit 8"),
    array("y" => 52300, "label" => "Unit 9"),
    array("y" => 3360, "label" => "Bamnipal0"),
    array("y" => 39900, "label" => "Bamnipal1"),
    array("y" => 0, "label" => "Bamnipal2"),
    array("y" => 135305, "label" => "Bamnipal3"),
    array("y" => 107922, "label" => "Bamnipal4"),
    array("y" => 52300, "label" => "Bamnipal5"),
    array("y" => 3360, "label" => "Bamnipal6"),
    array("y" => 39900, "label" => "Bamnipal7"),
    array("y" => 0, "label" => "Bamnipal8")
    );

    $dataPoints1location = array(
    array("y" => 3, "label" => "Bamnipal"),
    array("y" => 5, "label" => "Gomardih"),
    array("y" => 3, "label" => "Gopalpur"),
    array("y" => 6, "label" => "Jamadoba"),
    array("y" => 7, "label" => "Jamshedpur"),
    array("y" => 5, "label" => "Joda"),
    array("y" => 5, "label" => "Kalinga Nagar"),
    array("y" => 7, "label" => "Unit 8"),
    array("y" => 9, "label" => "Unit 8"),
    array("y" => 8, "label" => "Bamnipal0"),
    array("y" => 12, "label" => "Bamnipal1")
    );
    $dataPoints2location = array(
    array("y" => 0.5, "label" => "Bamnipal"),
    array("y" => 1.5, "label" => "Gomardih"),
    array("y" => 1, "label" => "Gopalpur"),
    array("y" => 2, "label" => "Jamadoba"),
    array("y" => 2, "label" => "Jamshedpur"),
    array("y" => 2.5, "label" => "Joda"),
    array("y" => 1.5, "label" => "Kalinga Nagar"),
    array("y" => 1, "label" => "Unit 8"),
    array("y" => 2, "label" => "Unit 9"),
    array("y" => 2, "label" => "Bamnipal0"),
    array("y" => 3, "label" => "Bamnipal1")
    );
    $dataPoints3location = array(
    array("y" => 2, "label" => "Bamnipal"),
    array("y" => 3, "label" => "Gomardih"),
    array("y" => 3, "label" => "Gopalpur"),
    array("y" => 3, "label" => "Jamadoba"),
    array("y" => 4, "label" => "Jamshedpur"),
    array("y" => 3, "label" => "Joda"),
    array("y" => 4.5, "label" => "Kalinga Nagar"),
    array("y" => 4.5, "label" => "Unit 8"),
    array("y" => 6, "label" => "Unit 9"),
    array("y" => 3, "label" => "Bamnipal0"),
    array("y" => 6, "label" => "Bamnipal1")
    );
    $dataPoints4location = array(
    array("y" => 2, "label" => "Bamnipal"),
    array("y" => 3, "label" => "Gomardih"),
    array("y" => 6, "label" => "Gopalpur"),
    array("y" => 4, "label" => "Jamadoba"),
    array("y" => 4, "label" => "Jamshedpur"),
    array("y" => 8, "label" => "Joda"),
    array("y" => 8, "label" => "Kalinga Nagar"),
    array("y" => 8, "label" => "Unit 8"),
    array("y" => 4, "label" => "Unit 9"),
    array("y" => 11, "label" => "Bamnipal0"),
    array("y" => 6, "label" => "Bamnipal1")
    );
    $dataPoints5location = array(
    array("y" => 2, "label" => "Bamnipal"),
    array("y" => 3, "label" => "Gomardih"),
    array("y" => 6, "label" => "Gopalpur"),
    array("y" => 4, "label" => "Jamadoba"),
    array("y" => 4, "label" => "Jamshedpur"),
    array("y" => 8, "label" => "Joda"),
    array("y" => 8, "label" => "Kalinga Nagar"),
    array("y" => 8, "label" => "Unit 8"),
    array("y" => 4, "label" => "Unit 9"),
    array("y" => 11, "label" => "Bamnipal0"),
    array("y" => 6, "label" => "Bamnipal1")
    );
    

?>

<script type="text/javascript">

     // $(document).ready(function() {
     //        alert("Current data is for demonstration Purpose only.");
     //    });


    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Intervention"
            },
            data: [
            {
                type: "column",                
                dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer_2", {
            title: {
                text: "Occupation"
            },
            animationEnabled: true,
            legend: {
                verticalAlign: "center",
                horizontalAlign: "left",
                fontSize: 20,
                fontFamily: "Helvetica"
            },
            theme: "light2",
            data: [
            {
                type: "pie",
                indexLabelFontFamily: "Garamond",
                indexLabelFontSize: 20,
                indexLabel: "{label} {y}%",
                startAngle: -20,
                showInLegend: true,
                toolTipContent: "{legendText} {y}%",
                dataPoints: <?php echo json_encode($dataPoints_2, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });

    $(function () {
        var chart = new CanvasJS.Chart("chartContainerProgress", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Unit wise Baseline Income"
            },
            axisY: {
                title: "Progress (in percentage)",
                valueFormatString: "#0.#,."
            },
            data: [
            {
                type: "stackedColumn",
                legendText: "Crop Cultivation",
                yValueFormatString: "#0.#,.",
                showInLegend: "true",
                dataPoints: <?php echo json_encode($SourceofIncome1, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "stackedColumn",
                legendText: "Allied - Livestock",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($SourceofIncome2, JSON_NUMERIC_CHECK); ?>
            },

            {
                type: "stackedColumn",
                legendText: "Allied - Others",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($SourceofIncome2, JSON_NUMERIC_CHECK); ?>
            },

            {
                type: "stackedColumn",
                legendText: "Daily Wages",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($SourceofIncome2, JSON_NUMERIC_CHECK); ?>
            },

            {
                type: "stackedColumn",
                legendText: "Enterprise",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($SourceofIncome2, JSON_NUMERIC_CHECK); ?>
            },
            ]
        });
        chart.render();
    });

    $(function () {
        var chart = new CanvasJS.Chart("chartContainerlocation", {
            theme: "light2",
            title: {
                text: "Unit wise Benificiaries"
            },
            animationEnabled: true,
            axisY2: {
                valueFormatString: " 0 k"
            },
            toolTip: {
                shared: true
            },
            legend: {
                verticalAlign: "top",
                horizontalAlign: "center"
            },

            data: [
            {
                type: "stackedBar",
                showInLegend: true,
                name: "Big (10 Acres +)",
                axisYType: "secondary",
                color: "#7E8F74",
                dataPoints: <?php echo json_encode($dataPoints1location, JSON_NUMERIC_CHECK); ?>
            },
            {
                type: "stackedBar",
                showInLegend: true,
                name: "Medium (5 to 10 Acres)",
                axisYType: "secondary",
                color: "#F0E6A7",
                dataPoints: <?php echo json_encode($dataPoints2location, JSON_NUMERIC_CHECK); ?>
            },
            {
                type: "stackedBar",
                showInLegend: true,
                name: "Small (2.5 to 5 Acre)",
                axisYType: "secondary",
                color: "#EBB88A",
                dataPoints: <?php echo json_encode($dataPoints3location, JSON_NUMERIC_CHECK); ?>
            },
            {
                type: "stackedBar",
                showInLegend: true,
                name: "Marginal (0 to 0.25 Acre)",
                axisYType: "secondary",
                color: "#DB9079",
                // indexLabel: "$#total",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints4location, JSON_NUMERIC_CHECK); ?>
            },

             {
                type: "stackedBar",
                showInLegend: true,
                name: "Landless",
                axisYType: "secondary",
                color: "#DB90af",
                indexLabel: "#total",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints5location, JSON_NUMERIC_CHECK); ?>
            }


            ]
        });
        chart.render();
    });

    
    
</script>

<?php include 'footer.php'; ?>