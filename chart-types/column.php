<?php include '../header.php'; ?>
<?php include '../sidebar.php'; ?>
<?php include '../content.php'; ?>
<h1>Column Chart</h1>
<div id="chartContainerIntervention"></div>

<?php
    $dataPointsIntervention = array(
        array("y" => 6, "label" => "Apple"),
        array("y" => 4, "label" => "Mango"),
        array("y" => 5, "label" => "Orange"),
        array("y" => 7, "label" => "Banana"),
        array("y" => 4, "label" => "Pineapple"),
        array("y" => 6, "label" => "Pears"),
        array("y" => 7, "label" => "Grapes"),
        array("y" => 5, "label" => "Lychee"),
        array("y" => 4, "label" => "Jackfruit")
    );
?>

<script type="text/javascript">

    $(function () {
        var chart = new CanvasJS.Chart("chartContainerIntervention", {
            theme: "light2",
            animationEnabled: true,
            title: {
                text: "Column Chart in PHP using CanvasJS"
            },
            data: [
            {
                type: "column",                
                dataPoints: <?php echo json_encode($dataPointsIntervention, JSON_NUMERIC_CHECK); ?>
            }
            ]
        });
        chart.render();
    });

</script>

<?php include '../footer.php'; ?>