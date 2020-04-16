<?php session_start(); ?>
<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<?php include '../dbconnection.php'; ?>
<!-- <h1>Stacked Column Chart</h1> -->

<!-- VERIFY LOGIN START -->
<?php 
    $_SESSION['role'] = "CRP";
    $_SESSION['userid'] = $row_login['entry_id'];
    $_SESSION['name'] = $row_login['name'];
    $_SESSION['op_area'] = $row_login['op_area'];
    ?>
<!-- VERIFY LOGIN END -->

<br><br><br><br><br>
<p>
    <?php 
    $query_bsl = "SELECT * FROM family";
    $res_bsl = mysqli_query($link, $query_bsl);
    $count_total_ben = mysqli_num_rows($res_bsl);
    echo 'Total no. of Benificiaries:'.$count_total_ben;
    ?>


</p>
<div style="height: 400px" id="chartContainerIncomeAnlysisBenCount"></div>
<br><br><br>
<div style="height: 400px" id="chartContainerIncomeAnlysis"></div>
<br>

<?php
$dataPoints1_ben=array();
$dataPoints2_ben=array();
$yearly_target = array("7000000", "9000000", "9600000", "12400000", "12000000");
$label = array("2019-20", "2020-21", "2021-22", "2022-23", "2023-24");
$year_string = array("2019-20", "2020-21", "2021-22", "2022-23", "2023-24");
$ben_count_arr = array();
for($i=0; $i<5;$i++){
    $query_year = "SELECT * FROM family WHERE year_of_BLS='$year_string[$i]'";
    $res_year = mysqli_query($link, $query_year);
    $count_year_wise = mysqli_num_rows($res_year);
    $ben_count_arr[$i] = $count_year_wise;
    $count_year_wise = $count_year_wise*1000;
    $target_left = $yearly_target[$i]-$count_year_wise;
    array_push($dataPoints1_ben, array("y" => "$count_year_wise", "label" => "$label[$i]"));
    array_push($dataPoints2_ben, array("y" => "$target_left", "label" => "$label[$i]"));
}
?>
<!-- FETCH DATA FOR INCOME ANALYSIS STARTS -->
<?php
 $unit_name = array('Jamshedpur', 'Noamundi', 'West Bokaro', 'Jamadoba', 'Kaling Nagar', 'Gomardih', 'Sukinda', 'Bamnipal', 'Joda', 'Gopalpur');
 for($j=0;$j<10;$j++){
    $query_BSLincome = "SELECT * FROM family WHERE TSRDS_op_area='$unit_name[$j]'";
    $res_BSLincome = mysqli_query($link, $query_BSLincome);
    while($row_BSLincome = mysqli_fetch_assoc($res_BSLincome)){
        $sum_crop=0;
        $sum_livestock=0;
        $sum_allied=0;
        $sum_daliywage=0;
        $sum_enterprise=0;
        $temp_family_id = $row_BSLincome['family_id'];
        
        $query_inc_crop = "SELECT * FROM crop_cultivation WHERE family_id='$temp_family_id' AND bsl_crop='0' AND intv_year='2019-20'";
        $query_inc_livestock = "SELECT * FROM livestock WHERE family_id='$temp_family_id' AND bsl_livestock='0' AND intv_year='2019-20'";
        $query_inc_allied = "SELECT * FROM allied WHERE family_id='$temp_family_id' AND bsl_allied='0' AND intv_year='2019-20'";
        $query_inc_dailywage = "SELECT * FROM daily_wage WHERE family_id='$temp_family_id' AND bsl_dailywage='0' AND intv_year='2019-20'";
        $query_inc_enterprise = "SELECT * FROM enterprise WHERE family_id='$temp_family_id' AND bsl_ent='0' AND intv_year='2019-20'";


        $res_inc_crop = mysqli_query($link, $query_inc_crop);
        $res_inc_livestock = mysqli_query($link, $query_inc_livestock);
        $res_inc_allied = mysqli_query($link, $query_inc_allied);
        $res_inc_dailywage = mysqli_query($link, $query_inc_dailywage);
        $res_inc_enterprise = mysqli_query($link, $query_inc_enterprise);


        while($row_inc_crop = mysqli_fetch_assoc($res_inc_crop)){
            $sum_crop+=$row_inc_crop['net_income'];
        }
        while($row_inc_livestock = mysqli_fetch_assoc($res_inc_livestock)){
            $sum_livestock+=$row_inc_livestock['annual_income'];
        }
        while($row_inc_allied = mysqli_fetch_assoc($res_inc_allied)){
            $sum_allied+=$row_inc_allied['net_annual'];
        }
        while($row_inc_dailywage = mysqli_fetch_assoc($res_inc_dailywage)){
            $sum_daliywage+=$row_inc_dailywage['annual_income'];
        }
        while($row_inc_enterprise = mysqli_fetch_assoc($res_inc_enterprise)){
            $sum_enterprise+=$row_inc_enterprise['net_income'];
        }
        $sumbaseline = $sum_crop+$sum_livestock+$sum_allied+$sum_daliywage+$sum_enterprise;
        $datapoints_BSLIncome = array();
        array_push($datapoints_BSLIncome, array("y" => "$sumbaseline", "label" => "$unit_name[$j]"));


    }
    echo '<br>';
    // echo $query_BSLincome;
 }

 for($j=0;$j<10;$j++){
    $query_BSLincome = "SELECT * FROM family WHERE TSRDS_op_area='$unit_name[$j]'";
    $res_BSLincome = mysqli_query($link, $query_BSLincome);
    while($row_BSLincome = mysqli_fetch_assoc($res_BSLincome)){
        $sum_crop=0;
        $sum_livestock=0;
        $sum_allied=0;
        $sum_daliywage=0;
        $sum_enterprise=0;
        $temp_family_id = $row_BSLincome['family_id'];
        
        $query_inc_crop = "SELECT * FROM crop_cultivation WHERE family_id='$temp_family_id' AND bsl_crop='1' AND intv_year='2019-20'";
        $query_inc_livestock = "SELECT * FROM livestock WHERE family_id='$temp_family_id' AND bsl_livestock='1' AND intv_year='2019-20'";
        $query_inc_allied = "SELECT * FROM allied WHERE family_id='$temp_family_id' AND bsl_allied='1' AND intv_year='2019-20'";
        $query_inc_dailywage = "SELECT * FROM daily_wage WHERE family_id='$temp_family_id' AND bsl_dailywage='1' AND intv_year='2019-20'";
        $query_inc_enterprise = "SELECT * FROM enterprise WHERE family_id='$temp_family_id' AND bsl_ent='1' AND intv_year='2019-20'";


        $res_inc_crop = mysqli_query($link, $query_inc_crop);
        $res_inc_livestock = mysqli_query($link, $query_inc_livestock);
        $res_inc_allied = mysqli_query($link, $query_inc_allied);
        $res_inc_dailywage = mysqli_query($link, $query_inc_dailywage);
        $res_inc_enterprise = mysqli_query($link, $query_inc_enterprise);


        while($row_inc_crop = mysqli_fetch_assoc($res_inc_crop)){
            $sum_crop+=$row_inc_crop['net_income'];
        }
        while($row_inc_livestock = mysqli_fetch_assoc($res_inc_livestock)){
            $sum_livestock+=$row_inc_livestock['annual_income'];
        }
        while($row_inc_allied = mysqli_fetch_assoc($res_inc_allied)){
            $sum_allied+=$row_inc_allied['net_annual'];
        }
        while($row_inc_dailywage = mysqli_fetch_assoc($res_inc_dailywage)){
            $sum_daliywage+=$row_inc_dailywage['annual_income'];
        }
        while($row_inc_enterprise = mysqli_fetch_assoc($res_inc_enterprise)){
            $sum_enterprise+=$row_inc_enterprise['net_income'];
        }
        $sumbaseline = $sum_crop+$sum_livestock+$sum_allied+$sum_daliywage+$sum_enterprise;
        $dataPoints_2019_20 = array();
        array_push($dataPoints_2019_20, array("y" => "$sumbaseline", "label" => "$unit_name[$j]"));


    }
    echo '<br>';
    // echo $query_BSLincome;
 }


 // $datapoints_BSLIncome = array(
 //    array("y" => 243, "label" => "France"),
 //    array("y" => 273, "label" => "Great Britain"),
 //    array("y" => 525, "label" => "Soviet Union"),
 //    array("y" => 1118, "label" => "USA")
 //    );
    
    // $dataPoints_2019_20 = array(
    // array("y" => 272, "label" => "France"),
    // array("y" => 299, "label" => "Great Britain"),
    // array("y" => 419, "label" => "Soviet Union"),
    // array("y" => 896, "label" => "USA")
    // );
    // ADD NEXT YEAR INCOME DATA HERE 
?>
<!-- FETCH INCOME FOR DATA ANALYSIS ENDS -->

<!-- CHART CONTAINER FOR BENIFICIARY COUNT STARTS -->
<script type="text/javascript">
    $(function () {
        var chart = new CanvasJS.Chart("chartContainerIncomeAnlysisBenCount", {
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
                dataPoints: <?php echo json_encode($dataPoints1_ben, JSON_NUMERIC_CHECK); ?>
            }, {
                type: "stackedColumn",
                legendText: "Target",
                showInLegend: "true",
                indexLabel: "#total",
                yValueFormatString: "#0.#,.",
                indexLabelFormatString: "#0.#,.",
                indexLabelPlacement: "outside",
                dataPoints: <?php echo json_encode($dataPoints2_ben, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });
</script>

<script type="text/javascript">
<!-- CHART CONTAINER FOR BENIFICIARY ENDS -->

<!-- CHART CONTAINER FOR INCOME ANALYSIS STARTS -->
  $(function () {
        var chart = new CanvasJS.Chart("chartContainerIncomeAnlysis", {
            title: {
                text: "Income Analysis Unit wise"
            },
            subtitles: [
                {
                    text: "Click on Legends to Enable/Disable Data Series"
                }
            ],
            animationEnabled: true,
            legend: {
                cursor: "pointer",
                itemclick: function (e) {
                    if (typeof (e.dataSeries.visible) === "undefined" || e.dataSeries.visible) {
                        e.dataSeries.visible = false;
                    }
                    else {
                        e.dataSeries.visible = true;
                    }
                    chart.render();
                }
            },
            axisY: {
                title: "Income in (₹)"
            },
            toolTip: {
                shared: true,
                content: function (e) {
                    var str = '';
                    var total = 0;
                    var str3;
                    var str2;
                    for (var i = 0; i < e.entries.length; i++) {
                        var str1 = "<span style= 'color:" + e.entries[i].dataSeries.color + "'> " + e.entries[i].dataSeries.name + "</span>: <strong>" + e.entries[i].dataPoint.y + "</strong> <br/>";
                        total = e.entries[i].dataPoint.y + total;
                        str = str.concat(str1);
                    }
                    str2 = "<span style = 'color:DodgerBlue; '><strong>" + e.entries[0].dataPoint.label + "</strong></span><br/>";
                    str3 = "<span style = 'color:Tomato '>Total: </span><strong>" + total + "</strong><br/>";

                    return (str2.concat(str)).concat(str3);
                }

            },
            data: [
            {
                type: "bar",
                showInLegend: true,
                name: "Baseline",
                color: "gold",
                dataPoints: <?php echo json_encode($datapoints_BSLIncome, JSON_NUMERIC_CHECK); ?>
            },
            {
                type: "bar",
                showInLegend: true,
                name: "Current Year",
                color: "silver",
                dataPoints: <?php echo json_encode($dataPoints_2019_20, JSON_NUMERIC_CHECK); ?>
            }

            ]
        });

        chart.render();
    });
  </script>
<!-- CHART CONTAINER FOR INCOME ANALYSIS ENDS -->

<?php include '../footer.php'; ?>