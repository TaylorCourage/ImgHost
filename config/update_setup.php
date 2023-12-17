<?php
include './db_config.php';
include './configuration.php';

$oldServerName = $serverName;
$oldDir = $targetDir;

echo "Configuration update started...<br>";
echo "$sqlServer<br>";
echo "$sqlUsername<br>";
echo "$sqlPassword<br>";

echo "Connecting to database...<br>";
$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Sql connection successful!<br>";

// Grab details entered by user
if (isset($_POST["serverName"])) {  //Server name
    $serverName = $_POST["serverName"];
}
if (isset($_POST["serverHostName"])) {  //Hostname
    $serverHostName = $_POST["serverHostName"];
}
if (isset($_POST["stylesheet"])) {  //Custom CSS
    $stylesheet = $_POST["stylesheet"];
}
if (isset($_POST["uploadDir"])) {  //Directory
    $targetDir = rtrim($_POST["uploadDir"], '/');
}

// Set defaults for any fields left blank
if ($serverName == ''){
    $serverName = "ImgHost";
}
if ($serverHostName == ''){
    $serverHostName = "imghost.local";
}
if ($stylesheet == ''){
    $stylesheet = "style.css";
}
if ($targetDir == ''){
    $targetDir = "uploads";
}

// Check if private flag is active
if (isset($_POST["enablePrivate"])) {
    $enablePrivate = 1;
} else {
    $enablePrivate = 0;
}

// TODO setup logging IP addresses
$enableLogging = 0;


// SQL command that will update our settings
$settingsApply = "UPDATE $settingstable SET 
    serverName = '$serverName',
    serverHostName = '$serverHostName',
    stylesheet = '$stylesheet',
    uploadDir = '$targetDir',
    privateEnable = '$enablePrivate',
    loggingEnable = '$enableLogging'
WHERE serverName = '$oldServerName'";

echo "Preparing to write settings with command - " . $settingsApply . "<br>";

// Apply the settomgs
if (mysqli_query($conn, $settingsApply)) {
    echo "Settings successfully updated!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}


// Prepare uploads directory if the user changed it

if ($targetDir != $oldDir) {
    echo "Preparing directories...<br>";
    $directory = "../" . $targetDir;
    echo $directory. "<br>";
    mkdir ($directory);
}

echo "<br>Configuration update complete! Going back in 3 seconds, or click below for the home page.<br><br>";
echo "<meta http-equiv='refresh' content='3;url=./' />";

?>

<a href="../">Homepage</a>