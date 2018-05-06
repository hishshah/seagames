<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta http-equiv="x-ua-compatible" content="ie=edge">
		<title>SEA Games</title>
		<!-- Latest compiled and minified CSS -->
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
		<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">

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
		<div class="container-wrap">
			<h1 class="title">SEA GAMES OVERVIEW</h1>
			<div class="row">
				<div class="col-md-10 content">
					<div id="cabor">
					</div>
					<div class="col-xs-10 scroll">
						<?php include 'drawChart.php'; ?>
						<script type="text/javascript">
						  getData();
						</script>
						<table class="main-table">
							<tr class="table-header">
								<?php
									for ($i = 1; $i < 12; $i++) {
											echo '<th id='.$i.'></th>';
									}
								?>
								</tr>
								<tr>
								<?php
										for ($idx = 1; $idx < 12; $idx++) {
											echo '<td>
												    	<div id="barchart_values_'.$idx.'" class="table-content"></div>
													</td>';
										}
								?>
							</tr>
						</table>
					</div>
				</div>
				<div class="col-md-1">
					<div class="fixed">
						<div class="row filter">
							<form action="JavaScript:getData()">
								<b>Year:</b> <br />
								<select id="year" name="year" class="form-control">
								  <option value="2017">2017</option>
								  <option value="2015">2015</option>
								  <option value="2013">2013</option>
								  <option value="2011">2011</option>
								  <option value="2009">2009</option>
								  <option value="2007">2007</option>
								  <option value="2005">2005</option>
								</select>

								<br/>

								<b>Sort Country By:</b> <br />
								<div class="radio">
									<label><input type="radio" name="sort-country" value="best-medalist" checked>Best Medalist</label>
								</div>
								<div class="radio">
								  <label><input type="radio" name="sort-country" value="alphabet">Alphabet</label>
								</div>

								<b>Show Medal:</b> <br />

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
								<div class="button-wrapper">
									<input type="submit" value="Apply" class="btn btn-success button">
								</div>
							</form>
						</div>
						<div class="row top-medalist">
							<br />
							<center><b>Overall Medal Count</b></center>
							<div id="piechart"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
