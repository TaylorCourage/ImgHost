<?php
include './db_config.php';


echo "Configuration started...<br>";
echo "$sqlServer<br>";
echo "$sqlUsername<br>";
echo "$sqlPassword<br>";

$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword);

echo "Sql connection attempt<br>";
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Sql connection successful!<br>";

// Create the database, if it doesn't exist
$dbSetup = "CREATE DATABASE IF NOT EXISTS $dbname";
echo "Preparing database with command - " . $dbSetup . "<br>";

if (mysqli_query($conn, $dbSetup)) {
    echo "Database successfully prepared!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}


echo "Reconnecting to new database...<br>";
$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
} 
echo "Sql connection successful!<br>";

// Create the table for storing image data, if doesn't exit
$tableSetup = "CREATE TABLE IF NOT EXISTS $tablename (
    imgID CHAR(12),
    fileType VARCHAR(4),
    mimeType VARCHAR(20),
    isPrivate BOOLEAN,
    uploadDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    editDate DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

echo "Preparing images database table with command - " . $tableSetup . "<br>";

if (mysqli_query($conn, $tableSetup)) {
    echo "Images table successfully prepared!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}

// Create the table to store server settings
$settingsSetup = "CREATE TABLE IF NOT EXISTS $settingstable (
    serverName VARCHAR(100),
    serverHostName VARCHAR(100),
    stylesheet VARCHAR(100),
    uploadDir VARCHAR(100),
    privateEnable BOOLEAN,
    loggingEnable BOOLEAN,
    genesisDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    editDate DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
)";

echo "Preparing settings database table with command - " . $settingstable . "<br>";

if (mysqli_query($conn, $settingsSetup)) {
    echo "Settings table successfully prepared!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}

echo "Writing settings to database...<br>";

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
    $targetDir = $_POST["uploadDir"];
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
}

// TODO setup logging IP addresses
$enableLogging = 0;



$settingsApply = "INSERT INTO $settingstable (
    serverName,
    serverHostName,
    stylesheet,
    uploadDir,
    privateEnable,
    loggingEnable
) VALUES (
    '$serverName',
    '$serverHostName',
    '$stylesheet',
    '$targetDir',
    '$enablePrivate',
    '$enableLogging'
)";

echo "Preparing to write settings with command - " . $settingsApply . "<br>";


if (mysqli_query($conn, $settingsApply)) {
    echo "Settings table successfully written!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}




// Prepare uploads directory
echo "Preparing directories...<br>";



$directory = "../" . $targetDir;
echo $directory. "<br>";
mkdir ($directory);

echo "Initial setup complete! Enjoy!<br>"

?>

<a href="../">Homepage</a>