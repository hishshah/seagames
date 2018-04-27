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
				// final form
				// {
				// 	"country": "Thailand",
				// 	"data": [["cabor_name1", "gold", "silver", "bronze"], ["cabor_name2", "gold", "silver", "bronze"], ...]
				// }
					$country = ["Thailand", "Indonesia", "Malaysia", "Filipina", "Singapore", "Vietnam", "Myanmar", "Laos", "Kamboja", "Brunei", "Timor Timur"];
					$country_array = array ("Thailand" => [],"Indonesia" => [],"Malaysia" => [],"Filipina" => [],"Singapore" => [],"Vietnam" => [],"Myanmar" => [],"Laos" => [],"Kamboja" => [],"Brunei" => [],"Timor Timur" => []);
					if (($handle = fopen("csv/medal.csv", "r")) !== FALSE) {
						$i = 0;
					  	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  // baca dari csv per row
					  		$cabor_array = [];			// exmpl:"cabor_name1", "gold", "silver", "bronze"
					  		if ($i > 0) {	
					  			$cabor_name = $data[0];		// current row cabor name
						    	$col_num = count($data);		// row num exclude cabor

						    	$medal_divider = 0;				// divide cabor per country
						    	$country_counter = 0;
						    	for ($col = 1; $col < $col_num; $col++) {
						    		// echo $data[$col];
						    		if ($medal_divider == 0) {
						    			array_push($cabor_array, $cabor_name);
						    			array_push($cabor_array, $data[$col]);
						    		} else if ($medal_divider < 3) {
						    			array_push($cabor_array, $data[$col]);
						    		}
						    		// print_r($cabor_array);
						    		$medal_divider++;

						    		if ($medal_divider == 4) {
						    			$medal_divider = 0;
						    			array_push($country_array[$country[$country_counter]], $cabor_array);
						    			$cabor_array = [];
						    			$country_counter++;
						    			// echo $country_counter;
						    			if ($col == 45) {
						    				$country_counter = 0;
						    			}
						    		}
						    	}
					  		}
							$i += 1;
					  	}
						fclose($handle);
				    	// foreach ($country_array as $key1 => $country_temp) {
				    	// 	echo $key1;
				    	// 	echo "<br>";
				    	// 	foreach ($country_temp as $key2 => $value) {
				    	// 		foreach ($value as $haha) {
				    	// 			echo $haha;
				    	// 			echo ", ";
				    	// 		}
				    	// 		echo "<br>";
				    	// 	}
				    	// echo "<br><br>";
				    	// }
					}
				?>
				</table>
			</div>
		  </div>
	</body>
</html>
