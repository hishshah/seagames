<?php
	// final form
	// {
	// 	"country": "Thailand",
	// 	"data": [["cabor_name1", "gold", "silver", "bronze"], ["cabor_name2", "gold", "silver", "bronze"], ...]
	// }
	$year = ["2005", "2007", "2009", "2011", "2013", "2015", "2017"];
	$year_array = array ("2005" => [],"2007" => [],"2009" => [],"2011" => [],"2013" => [],"2015" => [],"2017" => []);
	$cabor_year = array ("2005" => [],"2007" => [],"2009" => [],"2011" => [],"2013" => [],"2015" => [],"2017" => []);
	
	for ($yr=0; $yr < sizeof($year); $yr++) { 
		$country = ["Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];
		$country_array = array ("Thailand" => [],"Indonesia" => [],"Malaysia" => [],"Philippines" => [],"Singapore" => [],"Vietnam" => [],"Myanmar" => [],"Laos" => [],"Cambodia" => [],"Brunei" => [],"Timor-Leste" => []);
		
		$cabor = [];

		$file = "csv/" . $year[$yr] . ".csv";

		if (($handle = fopen($file, "r")) !== FALSE) {
			$i = 0;
		  	while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) {  // baca dari csv per row
		  		$cabor_array = [];			// exmpl:"cabor_name1", "gold", "silver", "bronze"
		  		if ($i > 0) {	
		  			$cabor_name = $data[0];		// current row cabor name
		  			array_push($cabor, $cabor_name);
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
			array_push($year_array[$year[$yr]], $country_array);
			array_push($cabor_year[$year[$yr]], $cabor);
		}

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

	// print_r($year_array['2015']);
?>