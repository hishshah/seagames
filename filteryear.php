<?php 
	// READ CSV
	include 'readcsv.php';

	// PHP ARRAY TO JAVASCRIPT
	$php_temp = $year_array;
	$js_temp = json_encode($php_temp);
	echo "var year_array = ". $js_temp . ";\n";

	$php_cabor_temp = $cabor_year;
	$cabor_js_temp = json_encode($php_cabor_temp);
	echo "var cabor_year = ". $cabor_js_temp . ";\n";
?>

// GET YEAR VALUE
function getYear() {
	var temp = $("#year").val();
	if (temp != null) {
		var year = temp;
	} else {
		var year = '2017';
	}

	return year;
}
// console.log(year);

var year = getYear();
var country_array = year_array[year][0];