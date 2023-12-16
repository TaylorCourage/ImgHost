<?php 
	include './configuration.php';
    include './db_config.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="./<?php echo $stylesheet; ?>">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title><?php echo $serverName; ?> Config</title>
		
		
	</head>
	<body class="background">
		<div class="layout" align="center">
			<h1><?php echo $serverName; ?></h1>
			<br />
			<form action="initial_setup.php" method="post" enctype="multipart/form-data">
				<br />
				<p><input type="submit" value="Setup databases" name="submit"  /></p>
			</form>
		</div>
		<div align="center">
			<br />
			<br />
			<hr>
			<br />

		</div>
		<div align="center">
			<br />
			<br />
			<br />
			<h6>ImgHost (v0.4.0-beta)</h6>
		</div>
</html>
