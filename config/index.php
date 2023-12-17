<?php
include './db_config.php';
include './configuration.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="./style.css">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title>ImgHost Config</title>
		
		
	</head>
	<body class="background">
		<div class="layout" align="center">
			<?php
			// MySQL connection
			if ($dbExists == 0) {
				$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword);
				if (!$conn) {
					die ("CONNECTION FAIL " .mysqli_connect_error());
				}
	
				echo '<h1>' . $serverName . ' Setup</h1>
				<br />
				<h3>Initial Configuration</h3>
				<form action="initial_setup.php" method="post" enctype="multipart/form-data">
					<br />
					<p>Server Name: <input type="text" name="serverName" id="serverName" value="ImgHost" /></p>
					<p>Hostname: <input type="text" name="serverHostName" id="serverHostName" value="imghost.local"  /></p>
					<p>Uploads Directory: <input type="text" name="uploadDir" id="uploadDir" value="uploads" /></label></p>
					<p>Stylesheet: <input type="text" name="stylesheet" id="stylesheet" value="style.css" /></p>
					<p>Enable private uploads: <input type="checkbox" name="enablePrivate" id="enablePrivate" checked="false"  /></p>
					<p><input type="submit" value="Setup server" name="submit"  /></p>
				</form>';

			} else if ($dbExists == 1) {
				$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);
				if (!$conn) {
					die ("CONNECTION FAIL " .mysqli_connect_error());
				}

				if ($enablePrivate == 1) {
					$privateChecked = "checked='true'";
				} else {
					$privateChecked = "";
				}
	
				echo '<h1>' . $serverName . ' Setup</h1>
				<br />
				<h3>Configuration</h3>
				<form action="update_setup.php" method="post" enctype="multipart/form-data">
					<br />
					<p>Server Name: <input type="text" name="serverName" id="serverName" value="' . $serverName . '" /></p>
					<p>Hostname: <input type="text" name="serverHostName" id="serverHostName" value="' . $serverHostname . '"  /></p>
					<p>Uploads Directory: <input type="text" name="uploadDir" id="uploadDir" value="' . $targetDir . '" /></label></p>
					<p>Stylesheet: <input type="text" name="stylesheet" id="stylesheet" value="' . $stylesheet . '" /></p>
					<p>Enable private uploads: <input type="checkbox" name="enablePrivate" id="enablePrivate"' . $privateChecked . '   /></p>
					<p><input type="submit" value="Update configuration" name="submit"  /></p>
				</form>';

			}
			?>
			<br />
			<br />
			<hr>
			<br />
			<p><a href='../'>Home</a></p>
			<br />
			<br />
			<h6><?php echo $serverName . " - " . $serverVers; ?></h6>
		</div>
</html>
