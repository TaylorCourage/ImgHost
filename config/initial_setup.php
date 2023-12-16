<?php

include './db_config.php';
include './configuration.php';


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

// Create the table, if doesn't exit
$tableSetup = "CREATE TABLE IF NOT EXISTS $tablename (
    imgID CHAR(12),
    fileType VARCHAR(4),
    mimeType VARCHAR(20),
    isPrivate BOOLEAN,
    uploadDate DATETIME DEFAULT CURRENT_TIMESTAMP,
    editDate DATETIME DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
    )";

echo "Preparing table with command - " . $tableSetup . "<br>";

if (mysqli_query($conn, $tableSetup)) {
    echo "Table successfully prepared!<br>";
} else {
    echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
}

echo "Preparing images folder...<br>";

$directory = "../" . $targetDir;
echo $directory. "<br>";
mkdir ($directory);

echo "Initial setup complete! Enjoy!<br>"

?>

<a href="../">Homepage</a>