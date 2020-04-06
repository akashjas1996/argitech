<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>
<!-- <h1>Stacked Column Chart</h1> -->
<br><br><br><br><br>
<p>
    <?php 
    $query_bsl = "SELECT * FROM family";
    $res_bsl = mysqli_query($link, $query_bsl);
    $count_total_ben = mysqli_num_rows($res_bsl);
    echo 'Total no. of Benificiaries:'.$count_total_ben;
    ?>


</p>
<!-- <div id="chartContainer"></div> -->
<?php
$dataPoints1=array();
$dataPoints2=array();
$yearly_target = array("7000000", "9000000", "9600000", "12400000", "12000000");
$label = array("2019-20", "2020-21", "2021-22", "2022-23", "2023-24");
$year_string = array("2019-20", "2020-21", "2021-22", "2022-23", "2023-24");
$ben_count_arr = array();
for($i=0; $i<5;$i++){
    $query_year = "SELECT * FROM family WHERE year_of_BLS='$year_string[$i]'";
    echo $query_year;
    $res_year = mysqli_query($link, $query_year);
    $count_year_wise = mysqli_num_rows($res_year);
    $ben_count_arr[$i] = $count_year_wise;
    $count_year_wise = $count_year_wise*1000;
    $target_left = $yearly_target[$i]-$count_year_wise;
    array_push($dataPoints1, array("y" => "$count_year_wise", "label" => "$label[$i]"));
    array_push($dataPoints2, array("y" => "$target_left", "label" => "$label[$i]"));
}
?>

<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainer", {
            animationEnabled: true,
            title: {
                text: "Baseline Benificiary Count per year"
            },
            axisY: {
                title: "Number of Benificiries",
                valueFormatString: "#0.#,."
            },
            data: [
            {
                type: "stackedColumn",
                legendText: "Achieved",
                yValueFormatString: "#0.#,.",
                showInLegend: "true",
                dataPoints: <?php echo json_encode($dataPoints1, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "stackedColumn",
                legendText: "Target",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints2, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>

<?php include '../footer.php'; ?>