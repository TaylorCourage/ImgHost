<?php
	include '../credentials.php';
	$dir = "../uploads";   // Directory for file uploads
//Setting up the webpage
echo '<html>';
echo '<head>';
echo '<title>Browse - Meme Machine</title>';
echo '<style>img {width:100%;max-width:300px;;padding:7px;}</style>';
echo '</head>';
echo '<body>';
echo '<div align="center">';
echo '<h1>Meme Machine</h1>';
	
	$count = 0;
	//Connect to MySQL
	$conn = mysqli_connect($servername, $username, $password, $dbname);

	if (!$conn) {
		die ("CONNECTION FAIL " .mysqli_connect_error());
	} else {
	}
	
	$words = $_POST['term'];
	
	
	$parts=explode(" ",trim($words));
	$clauses=array();
	foreach ($parts as $part){
		$clauses[]="'%" . $part . "%'";
	}
	$clause .= implode(' OR ' ,$clauses);
	
	$sql = "SELECT * FROM memes WHERE name LIKE $clause OR category LIKE $clause";
	if(isset($_POST['search']) && $words){
		echo "You searched for: " . $words . "<br />";
		
		$result = mysqli_query($conn, $sql);	
		
		if (mysqli_num_rows($result) > 0) {
			while($row = mysqli_fetch_assoc($result)) {
				$count++;
				echo '<img src="' . $dir . '/' . $row["fileName"] . '" alt="' . $row["name"] . '" />';
				if ($count == 3) {
					echo '<br />';
				}
			}
		} else {
			echo "Your search returned no results. Please go back and try again";
			?>
			<p>&nbsp;</p>
			<a href="./">Back</a>
			<?php
	}
		
		
	} else {
		?>
		<h1>Please go back and enter a search query</h1>
		<br />
		<br />
		<a href="./">Back</a>
		<?php
	}
echo '<br>';
echo '<a href="./">Back</a>';
echo '</body>';
echo '</html>';
?>
