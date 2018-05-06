<?php include 'filterMedal.php'; ?>
<script type="text/javascript">
	function Comparator(a, b) {
		if (a[1] > b[1]) return -1;
		if (a[1] < b[1]) return 1;
		return 0;
	}

	function getData() {
		// GET MEDAL VALUE
		var checkedMedal = getMedalFilterValue();

		// filter year
		<?php include 'filteryear.php'; ?>

		var country = ["Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];

		var year = getYear()

		// CABOR COLUMN
		var cabor = '<div class="col-xs-1 cabor" id="cabor">';
		for (var i = 0; i < cabor_year[year][0].length; i++) {
			cabor += cabor_year[year][0][i];
			cabor += '<br />';
		}
		cabor += '</div>';

		$('#cabor').replaceWith(cabor);
		var sort = $('input[name=sort-country]:checked').val();

		if (typeof sort === "undefined" || sort === "best-medalist") {
			var top_country = {"2005": ["Philippines", "Thailand", "Vietnam", "Malaysia", "Indonesia", "Singapore", "Myanmar", "Laos", "Brunei", "Cambodia", "Timor-Leste"], "2007": ["Thailand", "Malaysia", "Vietnam", "Indonesia", "Singapore", "Philippines", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"], "2009": ["Thailand", "Vietnam", "Indonesia", "Malaysia", "Philippines", "Singapore", "Laos", "Myanmar", "Cambodia", "Brunei", "Timor-Leste"], "2011": ["Indonesia", "Thailand", "Vietnam", "Malaysia", "Singapore", "Philippines", "Myanmar", "Laos", "Cambodia", "Timor-Leste", "Brunei"], "2013": ["Thailand", "Myanmar", "Vietnam", "Indonesia", "Malaysia", "Singapore", "Philippines", "Laos", "Cambodia", "Timor-Leste", "Brunei"], "2015": ["Thailand", "Singapore", "Vietnam", "Malaysia", "Indonesia", "Philippines", "Myanmar", "Cambodia", "Laos", "Brunei", "Timor-Leste"], "2017": ["Malaysia", "Thailand", "Vietnam", "Singapore", "Indonesia", "Philippines", "Myanmar", "Cambodia", "Laos", "Brunei", "Timor-Leste"]};
			country = top_country[year];
		} else {
			country.sort();
		}

		var total = [];
		// LOOP
		id = 0;
		country.forEach(function(current_country) {
			// filter medal
			var total_cabor = [];
  		var sumgold = 0;
  		var sumsilver = 0;
  		var sumbronze = 0;
  		var sum = 0;
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
				sumgold += cabor_array[1];
				sumsilver += cabor_array[2];
				sumbronze += cabor_array[3];
			}
			sum = sumgold + sumsilver + sumbronze;
			total_cabor.push(current_country);
    	// total_cabor.push(sumgold);
    	// total_cabor.push(sumsilver);
    	// total_cabor.push(sumbronze);
    	total_cabor.push(sum);
    	total.push(total_cabor);
    	// console.log(total)

			// chart
			google.charts.load("current", {packages:["corechart"]});
			google.charts.setOnLoadCallback(drawChart);

			var header = [["Country", "Gold", "Silver", "Bronze"]];
			var d = header.concat(country_array[current_country]);

			function drawChart() {
			  var data = google.visualization.arrayToDataTable(d);
			  var view = new google.visualization.DataView(data);
			  var chartAreaHeight = data.getNumberOfRows() * 18;
				var chartHeight = chartAreaHeight;
			  var options = {
					title: current_country,
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
		        chartArea: {"height": chartAreaHeight, "width":"90%"},
		        height: chartHeight,
			  };
				id++;
				$("#"+id).text(current_country);
				$("#"+id).css("text-align", "center");
				$("#"+id).css("padding-bottom", "8px");

			  var chart = new google.visualization.BarChart(document.getElementById("barchart_values_" + id));
			  chart.draw(view, options);
			}
		});

		// draw rank chart
		google.charts.load("current", {packages:['corechart']});
	    google.charts.setOnLoadCallback(drawRankChart);
	    function drawRankChart() {
	      var dataArray = [];
	      var dataArray = [];
	      console.log(total);
	      total = total.sort(Comparator);
	      // total.splice(3, 8);
	      // for (var i = 0; i < total.length; i++) {
	      // 	x = total[i];
	      // 	x.splice(4, 1);
	      // }
				
				var header = [["Country", "Gold", "Silver", "Bronze"]];
				var header = [["Country", "Total"]];
				var dataArray = header.concat(total);
				// console.log(dataArray);
	      var data = google.visualization.arrayToDataTable(dataArray);

	      var view = new google.visualization.DataView(data);
	      // view.setColumns([0, 1,
	      //                  { calc: "stringify",
	      //                    sourceColumn: 1,
	      //                    type: "string",
	      //                    role: "annotation" },
	      //                  2]);

	      var options = {
	        legend: { position: "none" },
	        pieSliceText: 'label',
	        isStacked: true,
	        colors: [
	        					'#085b8d', 
	        					'#1f6997', 
	        					'#3679a3', 
	        					'#4886ad', 
	        					'#5d95b8',
	        					'#6ea1c2', 
	        					'#7caccb', 
	        					'#8db8d4', 
	        					'#9ac2db', 
	        					'#a8cce3',
	        					'#b5d6ec',
	        				],
	        chartArea: {"height": "95%", "width":"95%"},
	        animation: {
            duration: 1000,
            startup: true
	        },
	        pieStartAngle: 320,
	      };
	      var chart = new google.visualization.PieChart(document.getElementById("piechart"));
	      chart.draw(view, options);
	  }

	}
</script>
