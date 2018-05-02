<script type="text/javascript">
	function getData() {
		// READ CSV FILE
		var year = $("#year").val();
		
		<?php include 'readcsv.php'; ?>
		
		var medal = $("input:radio[name=medal]:checked").val();
		// console.log(medal);

		// PHP array to JS array
		// console.log("loop" + element);
		<?php
			$php_country_array = $country_array;
			$js_country_array = json_encode($php_country_array);
			echo "var country_array = ". $js_country_array . ";\n";
		?>	
		
		var country = ["Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];

		var count = 0;
		country.forEach(function(current_country) {
			// filtering
			for (var i = 0; i < country_array[current_country].length; i++) {
				var cabor_array = country_array[current_country][i];
				for (var j = 1; j < cabor_array.length; j++) { // string to int
					cabor_array[j] = parseInt(cabor_array[j]);
				}
	
				if (medal == "gold") {
					cabor_array[2] = 0;
					cabor_array[3] = 0;
					// cabor_array.splice(2, 2);
				} else if (medal == "silver") {
					// cabor_array.splice(1, 1);
					// cabor_array.splice(2, 1);
					cabor_array[1] = 0;
					cabor_array[3] = 0;
				} else if (medal == "bronze") {
					// cabor_array.splice(1, 2);
					cabor_array[1] = 0;
					cabor_array[2] = 0;
				}
				
				cabor_array.push(medal);
			}
			// console.log(country_array);
	
			// chart
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);
	
			var header = [["Country", "Gold", "Silver", "Bronze", { role: "style" }]];
			var d = header.concat(country_array[current_country]);

			// console.log(d);
			count++;
			if (count == 1) {
		  	var textPosition = "out";
		  } else {
		  	var textPosition = "none";
		  }

			function drawChart() {
				// console.log("drawChart" + element);
			  var data = google.visualization.arrayToDataTable(d);

			  var view = new google.visualization.DataView(data);
			  
			  // if (medal == null) {
			  // 	var isStacked = "percent";
			  // } else {
			  // 	var isStacked = "absolute";
			  // }
			  // console.log(count);

			  var options = {
			    legend: { position: "none" },
			    hAxis: { textPosition: "none"},
			    vAxis: { textPosition: "none"},
			    isStacked: true,
			    series: {
		          0:{color:"gold"},
		          1:{color:"silver"},
		          2:{color:"brown"},
		        },
		        chartArea: {"height": "100%"},
			  };
				// console.log(current_country);
			  var chart = new google.visualization.BarChart(document.getElementById("barchart_values_" + current_country));
			  chart.draw(view, options);
			}
		});
	}
</script>