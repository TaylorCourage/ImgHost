<?php
include '../config/db_config.php';
include '../config/configuration.php';


//Setting up the webpage
echo '<html>';
echo '<head>';
echo '<link rel="stylesheet" href="../config/' . $stylesheet . '">';
echo '<meta charset="UTF-8">';
echo '<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no">';
echo '<title>Browse - ' . $serverName . '</title>';
echo '</head>';
echo '<body class="background">';
echo '<div class="layout" align="center">';
echo '<h1>' . $serverName . '</h1>';


$count = 0;

//Connect to MySQL
$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);

if (!$conn) {
	die ("CONNECTION FAIL " . mysqli_connect_error());
} else {
}

echo '<h3>All public photos</h3>';
$browse = "SELECT * FROM $tablename WHERE isPrivate = 0";
$result = mysqli_query($conn, $browse);	
//browse all code goes here
if (mysqli_num_rows($result) > 0) {
	while($row = mysqli_fetch_assoc($result)) {
		$file = $row["imgID"] . "." . $row["fileType"];
		$count++;
		echo '<a href="../' . $targetDir . $file . '"><img src="../' . $targetDir . $file . '" alt="' . $row["imgID"] . '" /></a>';
		if ($count == 3) {  // Change this number based on how many pictures across you want on the page
			echo '<br />';
		}
	}
} else {
	echo "Shit, something broke. Try again! Or if the problem persists contact the system administrator";
	?>
    <p>&nbsp;</p>
    <a href="./">Home</a>
    <?php
}


echo '</body>';
echo '</html>';
?>
