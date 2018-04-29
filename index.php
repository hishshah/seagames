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

		<link href="css/main.css" rel="stylesheet">
		<!-- <script type="text/javascript" src="js/index.js" charset="utf-8"></script> -->
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
					<!-- READ CSV FILE -->
					<?php include 'readcsv.php'; ?>

					<script type="text/javascript">
						// PHP array to JS array
						<?php
							$php_array = $country_array['Thailand'];
							$js_array = json_encode($php_array);
							echo "var country_array = ". $js_array . ";\n";
						?>

						// string to int (for gold, silver, and bronze col)
						for (var i = 0; i < country_array.length; i++) {
							var cabor_array = country_array[i];
							for (var j = 1; j < cabor_array.length; j++) {
								cabor_array[j] = parseInt(cabor_array[j]);
							}
						}
						// console.log(country_array);

						// chart
						google.charts.load("current", {packages:["corechart"]});
						google.charts.setOnLoadCallback(drawChart);

						var header = [["Country", "Gold", "Silver", "Bronze"]];
						var d = header.concat(country_array);
						// console.log(d);

						function drawChart() {
						  var data = google.visualization.arrayToDataTable(d);

						  var view = new google.visualization.DataView(data);
						  
						  var options = {
						    legend: { position: "none" },
						    hAxis: { textPosition: "none" },
						    vAxis: { textPosition: "none" },
						  };
						  var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
						  chart.draw(view, options);
						}
					</script>

					<div id="barchart_values" style="width: 900px; height: 500px;"></div>
				</table>
			</div>
		  </div>
	</body>
</html>
