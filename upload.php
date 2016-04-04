<?php
include './credentials.php';
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

$conn = mysqli_connect($servername, $username, $password, $dbname);

$memeDir = mysqli_real_escape_string($conn, basename($_FILES["fileToUpload"]["name"]));
$memeName = mysqli_real_escape_string($conn, $_POST["memeName"]);
$memeCategory = mysqli_real_escape_string($conn, $_POST["memeCategory"]);

if (!$conn) {
	die ("CONNECTION FAIL " .mysqli_connect_error());
} else {
}

$insert = "INSERT INTO memes (name, category, fileName) VALUES ('$memeName', '$memeCategory', '$memeDir')";

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
    $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
        echo "File is not an image.";
        $uploadOk = 0;
    }
}
if ($memeCategory == '') {
	$uploadOk = 0;
	echo "Choose a category";
}

// Check if file already exists
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}
// Check file size
if ($_FILES["fileToUpload"]["size"] > 75000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
    echo "Only JPG, JPEG, PNG & GIF files are allowed.";
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
        echo "The meme ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.";
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
