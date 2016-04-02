<?php

//Setting up the webpage
echo '<html>';
echo '<head>';
echo '<title>Browse - Meme Machine</title>';
echo '<style>img {width:100%;max-width:300px;;padding:7px;}</style>';
echo '</head>';
echo '<body>';
echo '<div align="center">';
echo '<h1>Meme Machine</h1>';

$dir = "../uploads";
$fileType = array(
	'jpg',
	'jpeg',
	'png',
	'gif'
);
$servername = "localhost";
$username = "root";
$password = "Flamingh0m()";
$dbname = "memes";
$count = 0;

$conn = mysqli_connect($servername, $username, $password, $dbname);

if (!$conn) {
	die ("CONNECTION FAIL " .mysqli_connect_error());
} else {
}

if(isset($_POST["browse"])) {
	echo '<h2>Category: ' . $_POST["memeCategory"] . '</h2>';
	$memeCategory = mysqli_real_escape_string($conn, $_POST["memeCategory"]);
	$browse = "SELECT * FROM memes WHERE category = \"$memeCategory\"";
	$result = mysqli_query($conn, $browse);	

	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$count++;
			echo '<img src="' . $dir . '/' . $row["fileName"] . '" alt="' . $row["name"] . '" />';
			if ($count == 3) {
				echo '<br />';
			}
		}
	} else {
		echo "This category is empty. Please choose another or start uploading";
		?>
        <p>&nbsp;</p>
        <a href="./">Back</a>
        <?php
	}
} else {
	echo '<h2>Category: all</h2>';
	$browse = "SELECT * FROM memes";
	$result = mysqli_query($conn, $browse);	
	//browse all code goes here
	if (mysqli_num_rows($result) > 0) {
		while($row = mysqli_fetch_assoc($result)) {
			$count++;
			echo '<img src="' . $dir . '/' . $row["fileName"] . '" alt="' . $row["name"] . '" />';
			if ($count == 3) {
				echo '<br />';
			}
		}
	} else {
		echo "Shit, something broke. Try again! Or if the problem persists contact the system administrator";
		?>
        <p>&nbsp;</p>
        <a href="./">Back</a>
        <?php
	}
}

echo '</body>';
echo '</html>';
?>
