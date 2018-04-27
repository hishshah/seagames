<!DOCTYPE html>
<html>
<head>
	<title></title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <!-- <script src="./PapaParse-4.4.0/papaparse.min.js"></script> -->
</head>
<body>
	<div class="container">
    <div class="table-responsive">
			<table style="width: 100%">
			<?php
				if (($handle = fopen("medal.csv", "r")) !== FALSE) {
				  while (($data = fgetcsv($handle, 1000, ",")) !== FALSE) { ?>
				  	<tr>
				    <?php $num = count($data);
				    for ($c=0; $c < $num; $c++) { ?>
			        <td> <?php echo $data[$c] ?> </td>
				    <?php } ?>
				    </tr>
				  <?php }
				  fclose($handle);
				}
			?>
			</table>
		</div>
  </div>
</body>
</html>