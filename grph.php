<?php
include_once 'condb.php';
$sql="select grn, count(*) as number from lib where grn like '1%'"; 
$result=mysqli_query($conn,$sql);
?>
<script type="text/javascript src="http://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
google.charts.load('current',{'packages':['corechart']});
google.charts.setOnLoadCallback(drawChart);
function drawChart()
{
	var data=google.visualization.arrayToDataTable([
	['GRN','Number'],
	<?php
	while($row = $result->fetch_assoc()) 
	{
		echo "['".$row["grn"]."',".$row["number"]."],";
		echo $row["grn"],$row["number"];
	}
	?>	
	]);
	var options:{
		title:'Books issued'
	};
	var chart=new google.visualization.PieChart(document.getElementById('piechart'));
	chart.draw(data,options);
}
</script>
<body>
<div style="width:900px;">
<div id="piechart" style="width:900px; height:500px;"></div>