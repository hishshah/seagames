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
		var cabor = '<div class="col-xs-1" style="font-size: 8px; padding-top: 15px; line-height: 1.5; text-align:right; white-space:nowrap; overflow:hidden; padding-right: 0; width:120px" id="cabor">';
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
			  	animation: {
            duration: 1000,
            startup: true
	        },
			    legend: { position: "none" },
			    hAxis: { textPosition: "none"},
			    vAxis: { textPosition: "none"},
			    isStacked: true,
			    series: {
		          0:{color:"gold"},
		          1:{color:"silver"},
		          2:{color:"brown"},
		        },
		        chartArea: {"height": "100%", "width":"100%"},
			  };
			  var chart = new google.visualization.BarChart(document.getElementById("barchart_values_" + current_country));
			  chart.draw(view, options);
			}
		});
		
		// draw rank chart
		google.charts.load("current", {packages:['corechart']});
	    google.charts.setOnLoadCallback(drawRankChart);
	    function drawRankChart() {
	      var dataArray = [];
	      if (year == 2017){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Malaysia", 145, 90, 86 ],
					        ["Thailand", 71, 84, 88 ],
					        ["Vietnam", 59, 49, 60 ]
					    ];
	      } else if (year == 2015){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Thailand", 95, 83, 69 ],
					        ["Singapore", 84, 73, 102 ],
					        ["Vietnam", 73, 53, 60 ]
					    ];
	      } else if (year == 2013){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Thailand", 108, 94, 82 ],
					        ["Myanmar", 84, 63, 84 ],
					        ["Vietnam", 74, 85, 86 ]
					    ];
	      } else if (year == 2011){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Indonesia", 182, 151, 143 ],
					        ["Thailand", 109, 101, 119 ],
					        ["Vietnam", 96, 92, 100 ]
					    ];
	      } else if (year == 2009){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Thailand", 86, 83, 97 ],
					        ["Vietnam", 83, 75, 57 ],
					        ["Indonesia", 43, 53, 74 ]
					    ];
	      } else if (year == 2007){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Thailand", 183, 123, 103 ],
					        ["Malaysia", 68, 52, 96 ],
					        ["Vietnam", 64, 58, 82 ]
					    ];
	      } else if (year == 2005){
	      	dataArray = [
					        ["Country", "Gold", "Silver", "Bronze" ],
					        ["Philippines", 112, 85, 93 ],
					        ["Thailand", 87, 79, 117 ],
					        ["Vietnam", 71, 71, 86 ]
					    ];
	      }
	      var data = google.visualization.arrayToDataTable(dataArray);

	      var view = new google.visualization.DataView(data);
	      // view.setColumns([0, 1,
	      //                  { calc: "stringify",
	      //                    sourceColumn: 1,
	      //                    type: "string",
	      //                    role: "annotation" },
	      //                  2]);

	      var options = {
	        title: "Top Medalist",
	        bar: {groupWidth: "95%"},
	        legend: { position: "none" },
	        isStacked: true,
	        series: {
	          0:{color:"gold"},
	          1:{color:"silver"},
	          2:{color:"brown"},
	        },
	        chartArea: {"height": "50%", "width":"70%", "left": "10%"},
	        animation: {
            duration: 1000,
            startup: true
	        },
	      };
	      var chart = new google.visualization.ColumnChart(document.getElementById("columnchart_values"));
	      chart.draw(view, options);
	  }

	}
</script>
