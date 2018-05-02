<script type="text/javascript">
	function getData() {
		// READ CSV FILE
		var year = $("#year").val();
		
		<?php include 'readcsv.php'; ?>
		
		var medal = $("input:radio[name=medal]:checked").val();
		// console.log(medal);

		// PHP array to JS array
		<?php
			$php_array = $country_array['Thailand'];
			$js_array = json_encode($php_array);
			echo "var country_array = ". $js_array . ";\n";
		?>

		// filtering
		for (var i = 0; i < country_array.length; i++) {
			var cabor_array = country_array[i];
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
			} else if (medal == "brown") {
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
		var d = header.concat(country_array);
		// console.log(d);

		function drawChart() {
		  var data = google.visualization.arrayToDataTable(d);

		  var view = new google.visualization.DataView(data);
		  
		  if (medal == null) {
		  	var isStacked = "percent";
		  } else {
		  	var isStacked = "absolute";
		  }

		  var options = {
		    legend: { position: "none" },
		    hAxis: { textPosition: "none"},
		    // vAxis: { textPosition: "none"},
		    isStacked: isStacked,
		    series: {
	          0:{color:"gold"},
	          1:{color:"silver"},
	          2:{color:"brown"},
	        },
	        chartArea: {"height": "100%"},
		  };
		  var chart = new google.visualization.BarChart(document.getElementById("barchart_values"));
		  chart.draw(view, options);
		}
	}
</script>