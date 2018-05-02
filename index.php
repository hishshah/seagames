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
		<!-- <script type="text/javascript" src="js/index.js" charset="utf-8"></script> -->
	</head>	
	<body>
		<div class="container">
			<h1 class="title">SEA GAMES OVERVIEW</h1>
			<div class="row">
				<div class="col-md-9">
					<div class="container-fluid">
						<div class="row flex-row flex-nowrap">
							<?php include 'drawChart.php'; ?>
							<script type="text/javascript">
							  getData();
							</script>
							<?php
								$country = ["", "Thailand", "Indonesia", "Malaysia", "Philippines", "Singapore", "Vietnam", "Myanmar", "Laos", "Cambodia", "Brunei", "Timor-Leste"];
								for ($i = 1; $i < 12; $i++) {
									echo '<div class="col-md-3">
													<div id="barchart_values_'. $country[$i] .'" style="height: 100%; width= 100%"></div>
													<p>a</p>
												</div>';
								}
							?>
						</div>
					</div>
				</div>
				<div class="col-md-3">
					<div class="controller">
						<form action="JavaScript:getData()">
							Medal: <br />
							<label class="radio-inline">
								<input type="radio" name="medal" id="medal" value="gold">Gold
							</label>
							<label class="radio-inline">
								<input type="radio" name="medal" id="medal" value="silver">Silver
							</label>
							<label class="radio-inline">
								<input type="radio" name="medal" id="medal" value="bronze">Bronze
							</label>
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
