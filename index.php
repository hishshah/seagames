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
		<!-- <script type="text/javascript" src="js/filter.js" charset="utf-8"></script> -->
	</head>
	<body>
		<!-- <div class="cont"> -->
			<h1 class="title">SEA GAMES OVERVIEW</h1>
			<div class="row">
				<div class="col-md-10">
					<div class="col-xs-2" id="cabor">
					</div>
					<div class="col-xs-10" style="overflow-x:scroll; overflow-y:hidden">
						<?php include 'drawChart.php'; ?>
						<script type="text/javascript">
						  getData();
						</script>
						<table style="table-layout: fixed; width:200%;">
								<tr style="font-size: 11px; white-space:nowrap; overflow:hidden;">
								<?php
									$country = ["", "Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];
									// sort($country);
									for ($i = 1; $i < 12; $i++) {
											echo '<th><center>'.$country[$i].'</center></th>';
									}
								?>
								</tr>
								<tr>
								<?php
										for ($i = 1; $i < 12; $i++) {
											echo '<td>
												    	<div id="barchart_values_'. $country[$i] .'" style="height: 550px; width= 100%"></div>
													</td>';
										}
								?>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-1">
					<div class="row">
						<div class="controller">
							<form action="JavaScript:getData()">
								<b>Year:</b> <br />
								<select id="year" name="year" class="form-control" style="width: 100%">
								  <option value="2017">2017</option>
								  <option value="2015">2015</option>
								  <option value="2013">2013</option>
								  <option value="2011">2011</option>
								  <option value="2009">2009</option>
								  <option value="2007">2007</option>
								  <option value="2005">2005</option>
								</select>

								<br/><br/>

								<b>Medal:</b> <br />

								<div class="checkbox">
								  <label><input type="checkbox" name="medal" id="medal-0" value="0" checked>All</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" name="medal" id="medal-1" value="1" checked>Gold</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" name="medal" id="medal-2" value="2" checked>Silver</label>
								</div>
								<div class="checkbox">
								  <label><input type="checkbox" name="medal" id="medal-3" value="3" checked>Bronze</label>
								</div>

								<!-- <br/><br/><br/> -->

								<!-- <b>Sort country by:</b> <br />
								<div class="radio">
								  <label><input type="radio" name="sort-country" value="alphabet" checked>Alphabet</label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="sort-country" value="alphabet">Best Medalist</label>
								</div> -->
								<br />
								<input type="submit" value="Apply" class="btn btn-success">
								<br/>
							</form>
						</div>
					</div>
					<div class="row" style="width: 220px;">
						<div id="columnchart_values" style="height: 300px;"></div>
					</div>
				</div>
			</div>
		<!-- </div> -->
	</body>
</html>
