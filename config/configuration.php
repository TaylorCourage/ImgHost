<?php
include "./db_config.php";

mysqli_report(MYSQLI_REPORT_OFF);

/************ CONFIGURATION FILE ***********/
/** This file is used for general server  **/
/** configuration. It is not recommended  **/
/** to change things here unless you      **/
/** know what you are doing; use the      **/
/** /config webpage to edit server        **/
/** settings.                             **/


//Connect to MySQL to grab data
$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword);

if (!$conn) {
	die ("CONNECTION FAIL " . mysqli_connect_error());
}
$checkQuery = "SHOW DATABASES LIKE '$dbname'";
$checkDB = mysqli_query($conn, $checkQuery);
$check = mysqli_fetch_assoc($checkDB);

// The name and version that will appear on the pages of the server
$serverName = "ImgHost";
$serverVers = "0.5.0-alpha";


// Hostname of the server
$serverHostname = "imghost.local";


// Directory where the images will be stored
$targetDir = "uploads";


// Filename of the style sheet (found in config foler)
$stylesheet = "style.css";


// Set private enable flag`
$enablePrivate = 0;


// Enable logging
// FUTURE FEATURE NOT YET IMPLEMENTED
$enableLogging = 1;

if (!$check) {
    echo "DB not found! Using defaults!<br>Try re-initializing the server if this persists!<br>";
    $dbExists = 0;
} else {
    $conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);
    $getSettings = "SELECT * FROM $settingstable";
    $settings = mysqli_query($conn, $getSettings);
    $data = mysqli_fetch_assoc($settings);
    $dbExists = 1;
    
    if (!$settings){
        echo "db connect bad, using defaults";
    
    } else {


        // The name and version that will appear on the pages of the server
        $serverName = $data["serverName"];
    
    
        // Hostname of the server
        $serverHostname = $data["serverHostName"];
    
    
        // Directory where the images will be stored
        $targetDir = $data["uploadDir"] . "/";
    
    
        // Filename of the style sheet (found in config foler)
        $stylesheet = $data["stylesheet"];


        // Set private enable flag`
        $enablePrivate = $data["privateEnable"];


        // Enable logging
        // FUTURE FEATURE NOT YET IMPLEMENTED
        $enableLogging = $data["loggingEnable"];
    }
}


// Supported file types
$supportedFileTypes = array (
    "image/jpeg",
    "image/png",
    "image/gif",
    "image/webp",
    "image/avif",
    "image/apng",
    "image/svg"
);

?>