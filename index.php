<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>SEA Games</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

		<!-- jQuery library -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

		<!-- Latest compiled JavaScript -->
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

		<!-- Chart JS library-->
		<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
		<script type="text/javascript">
			google.charts.load('current', {packages: ['corechart']});
			google.charts.setOnLoadCallback(drawChart);

			// function drawChart() {
			// 	// Define the chart to be drawn.
			// 	var data = new google.visualization.DataTable();
			// 	data.addColumn('string', 'Element');
			// 	data.addColumn('number', 'Percentage');
			// 	data.addRows([
			// 		['Nitrogen', 0.78],
			// 		['Oxygen', 0.21],
			// 		['Other', 0.01]
			// 	]);

			// 	// Instantiate and draw the chart.
			// 	var chart = new google.visualization.PieChart(document.getElementById('myPieChart'));
			// 	chart.draw(data, null);
			// }
		</script>

		<link href="css/main.css" rel="stylesheet">
		<script type="text/javascript" src="js/index.js" charset="utf-8"></script>
	</head>	
	<body>
		<h1 class="title">SEA GAMES OVERVIEW</h1>
		<div class="controller">
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="cabor1">
				<label class="form-check-label" for="exampleCheck1">Cabor 1</label>
			</div>
			<div class="form-check">
				<input type="checkbox" class="form-check-input" id="cabor1">
				<label class="form-check-label" for="exampleCheck2">Cabor 2</label>
			</div>
		</div>
		<div class="container">
		    <div class="table-responsive">
				<table style="width: 100%">
				<?php
					if (($handle = fopen("csv/medal.csv", "r")) !== FALSE) {
					  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { ?>
					  	<tr>
					    <?php $num = count($data);
					    for ($c=0; $c < $num; $c++) { ?>
				        <td> <?php echo $data[$c] ?> </td>
					    <?php } ?>
					    </tr>
					  <?php }
					  fclose($handle);
					}
				?>
				</table>
			</div>
		  </div>
	</body>
</html>
