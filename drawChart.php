<?php include 'filterMedal.php'; ?>
<script type="text/javascript">
	
	function getData() {
		// GET MEDAL VALUE
		var checkedMedal = getMedalFilterValue();
		// console.log("checkedMedal", checkedMedal);

		// filter year
		<?php include 'filteryear.php'; ?>

		var count = 0;
		var country = ["Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];

		var year = getYear()
		
		// CABOR COLUMN
		var cabor = '<div class="col-xs-2" style="font-size: 12px; padding-top: 15px; line-height: 1.5; text-align:right; white-space:nowrap; overflow:hidden;" id="cabor">';
		for (var i = 0; i < cabor_year[year][0].length; i++) {
			cabor += cabor_year[year][0][i];
			cabor += '<br />';
		}
		cabor += '</div>';

		$('#cabor').replaceWith(cabor);


		// LOOP
		country.forEach(function(current_country) {
			// filter medal
			for (var i = 0; i < country_array[current_country].length; i++) {
				var cabor_array = country_array[current_country][i];
				for (var j = 1; j < cabor_array.length; j++) { // string to int
					cabor_array[j] = parseInt(cabor_array[j]);
				}
				if (!checkedMedal.includes("0")) {
					if (!checkedMedal.includes("1")) {
							cabor_array[1] = 0;
					}
					if (!checkedMedal.includes("2")) {
							cabor_array[2] = 0;
					}
					if (!checkedMedal.includes("3")) {
							cabor_array[3] = 0;
					}
				}
			}

			// chart
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);

			var header = [["Country", "Gold", "Silver", "Bronze"]];
			var d = header.concat(country_array[current_country]);

			count++;
			if (count == 1) {
		  	var textPosition = "out";
		  } else {
		  	var textPosition = "none";
		  }

			function drawChart() {
			  var data = google.visualization.arrayToDataTable(d);
			  var view = new google.visualization.DataView(data);
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
			  var chart = new google.visualization.BarChart(document.getElementById("barchart_values_" + current_country));
			  chart.draw(view, options);
			}
		});
	}
</script>
