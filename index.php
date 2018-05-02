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
		<div class="container">
			<h1 class="title">SEA GAMES OVERVIEW</h1>
			<div class="row">
				<div class="col-md-9">
							<?php include 'drawChart.php'; ?>
							<script type="text/javascript">
							  getData();
							</script>
							<table style="table-layout: fixed; width:100%">
								<tr>
									<th>Thailand</th>
									<th>Indonesia</th>
									<th>Malaysia</th>
									<th>Philippines</th>
									<th>Singapore</th>
									<th>Vietnam</th>
									<th>Myanmar</th>
									<th>Laos</th>
									<th>Cambodia</th>
									<th>Brunei</th>
									<th>East Timor</th>
								</tr>
								<tr>
									<?php
										$country = ["", "Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];
										for ($i = 1; $i < 12; $i++) {
											echo '<td>
												    	<div id="barchart_values_'. $country[$i] .'" style="height: 500px; width= 100%"></div>
													</td>';
										}
									?>
								</tr>
							</table>
				</div>
				<div class="col-md-3">
					<div class="controller">
						<form action="JavaScript:getData()">
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

							<br/><br/><br/>

							Year: <br />
							<select id="year" name="year" class="form-control" style="width: 30%">
							  <option value="2017">2017</option>
							  <option value="2015">2015</option>
							  <option value="2013">2013</option>
							  <option value="2011">2011</option>
							  <option value="2009">2009</option>
							  <option value="2007">2007</option>
							  <option value="2005">2005</option>
							</select>
							<br />
							<input type="submit" value="Apply" class="btn btn-success">
						</form>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
