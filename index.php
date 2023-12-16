<!--
     ImgHost - An open source image databasing and hosting system
     A project by Taylor Courage (http://taylorcourage.net)
     Latest Release: v0.4.0-beta (Dec 16, 2023)
-->
<?php 
	include './config/configuration.php';
?>
<html>
	<head>
		<link rel="stylesheet" href="./config/<?php echo $stylesheet; ?>">
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">
		<title><?php echo $serverName; ?></title>
		
		
	</head>
	<body class="background">
		<div class="layout" align="center">
			<h1><?php echo $serverName; ?></h1>
			<br />
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<br />
				<p><input type="file" name="fileToUpload" id="fileToUpload" /></p>
				<p><input type="checkbox" name="isPrivate" id="isPrivate" value="1"  /><label for="isPrivate"> Private</label></p>
				<p>Private images will not be shown in the public gallery, but will still be accessible by visiting the provided link.</p>
				<p>All links are generated at random, and are virtually impossible to guess. "Security" through obscurity!</p>
				<p><input type="submit" value="Upload Your Image" name="submit"  /></p>
			</form>
			<br />
			<p>Accepted file formats: .gif, .png, .jpg/jpeg, .webp</p>
			<br />
			<hr>
			<br />
			<input type="submit" value="Browse Public Images" onclick="window.location='./browse';" />
			<br />
			<br />
			<br />
			<h6>ImgHost (v0.4.0-beta)</h6>
		</div>
</html>
