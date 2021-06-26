<?php
require_once('sql.php');
 $sql1="SELECT COUNT(*) as total FROM appuser";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data1 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM activity";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data2 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM food";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data3 = $row['total'];

 $sql1="SELECT COUNT(*) as total FROM inspiring_stories";
 $result=mysqli_query($conn,$sql1);
 $row=mysqli_fetch_array($result);
 $data4 = $row['total'];


$dataPoints = array(
	array("y" => $data1, "label" => "appuser"),
	array("y" => $data2, "label" => "activity"),
	array("y" => $data3, "label" => "food"),
	array("y" => $data4, "label" => "inspiring")
);
 
?>
<!DOCTYPE HTML>
<html>
<head>
<script>
window.onload = function () {
 
var chart = new CanvasJS.Chart("chartContainer", {
	title: {
		text: "Push-ups Over a Week"
	},
	axisY: {
		title: "Number of Push-ups"
	},
	data: [{
		type: "line",
		dataPoints: <?php echo json_encode($dataPoints, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
</body>
</html>     