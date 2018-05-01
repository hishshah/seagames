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
		<h1 class="title">SEA GAMES OVERVIEW</h1>
		<div class="controller">
			<form action="JavaScript:getData()">
				<input type="radio" id="medal" name="medal" value="gold" /> Gold<br/>
				<input type="radio" id="medal" name="medal" value="silver" /> Silver<br/>
				<input type="radio" id="medal" name="medal" value="brown" /> Bronze<br/>
				<input type="submit" value="Apply" class="btn btn-info">
			</form>
		</div>
  	<table style="width: 100%">
			<?php include 'drawChart.php'; ?>
			<div id="barchart_values" style="width: 900px; height: 500px;"></div>
		</table>
	</body>
</html>
