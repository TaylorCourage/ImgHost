<?php
include './config/db_config.php';
include './config/configuration.php';
// Create a random 12-character hex ID number for the pictures
$randBytes = random_bytes(6);
$imageID = bin2hex($randBytes);

$uppedFile = basename($_FILES["fileToUpload"]["name"]);
$isPrivate = 0;

$imageFileType = pathinfo($uppedFile,PATHINFO_EXTENSION);
$fileName = $imageID . "." . $imageFileType;
$target_file = $targetDir . $fileName;

$mimeType = $_FILES['fileToUpload']['type'];

$uploadOk = 1;


$conn = mysqli_connect($sqlServer, $sqlUsername, $sqlPassword, $dbname);

$imageDir = mysqli_real_escape_string($conn, basename($_FILES["fileToUpload"]["name"]));

if (!$conn) {
	die ("CONNECTION FAIL " .mysqli_connect_error());
} 

// Check if private flag is active
if (isset($_POST["isPrivate"])) {
    $isPrivate = 1;
}


$insert = "INSERT INTO $tablename (imgID, fileType, mimeType, isPrivate) VALUES ('$imageID', '$imageFileType', '$mimeType', '$isPrivate')";


// Check file mimetype to ensure it's actually an image
if (isset($_POST["submit"])) {
    if (in_array($mimeType, $supportedFileTypes)){
        $uploadOk = 1;
    } else {
        echo "File is not a valid image.";
        $uploadOk = 0;
    }
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 75000000) {
    echo "Sorry, your image is too large (75 MB limit).";
    $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
	echo "<br />";
    echo "There was an error. Double check your submission and try again.";
                ?>
        <p>&nbsp;</p>
        <a href="./">Back</a>
        <?php
// if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "<p>The image ". $fileName . " has been uploaded.<p><br>";
        if ($isPrivate != 0) {
            echo "<p>You have chosen to make this image private - it will not appear in the public gallery.</p>";
        }
        echo "<p><a href=" . $targetDir . $fileName .">View image</a></p>";
        ?>
        <p>&nbsp;</p>
        <a href="./">Back</a>
        <?php
        
        if (mysqli_query($conn, $insert)) {
        } else {
			echo "Database Error " . $sql . "<br>" . mysqli_error($conn);
		}
    } else {
        echo "Sorry, there was an error uploading your file.";
                ?>
        <p>&nbsp;</p>
        <a href="./">Back</a>
        <?php
    }
}
?> 
