<!--
     The Meme Machine - An open source image databasing system
     A project by Taylor Courage (http://taylorcourage.net)
     Latest Release: v0.3.6-beta (April 7, 2016)
-->
<html>
	<head>
		<title>Meme Machine</title>
		
		<style>
			layout {
				width:950px;
			}
			
		</style>
		
	</head>
	<body>
		<div id="layout" align="center">
			<h1>The Meme Machine</h1>
			<form action="upload.php" method="post" enctype="multipart/form-data">
				<p>Name/Description of meme: <input type="input" name="memeName" id="memeName" /></p>
				<h4>Category:
				<select name="memeCategory">
					<option value="" default>-- Choose A Category --</option>
					<option value="alcohol">Alcohol</option>
					<option value="animals">Animals</option>
					<option value="beashame">Be A Shame If...</option>
					<option value="canada">Canada</option>
					<option value="cats">Cats</option>
					<option value="coolstory">Cool Story (Bro)</option>
					<option value="cringe">Cringe</option>
					<option value="dealwithit">Deal With It</option>
					<option value="didntread">Didn't Read</option>
					<option value="disgust">Disgust</option>
					<option value="downvote">Downvote</option>
					<option value="boners">Erections/Fapping</option>
					<option value="fail">Fail</option>
					<option value="frank">Filthy Frank</option>
					<option value="fiteme">Fite Me</option>
					<option value="fuck">Fuck!</option>
					<option value="fuckthis">Fuck This</option>
					<option value="fuckyeah">Fuck Yeah</option>
					<option value="fuckyou">Fuck You</option>
					<option value="games">Games/Gaming</option>
					<option value="guns">Guns</option>
					<option value="haters">Haters Gonna Hate</option>
					<option value="history">History</option>
					<option value="hitler">Hitler/Nazi's/Holocaust</option>
					<option value="impressed">Impressed</option>
					<option value="infograph">Infograph</option>
					<option value="insults">Insults</option>
					<option value="joancornella">Joan Cornella</option>
					<option value="killyourself">Kill Yourself</option>
					<option value="laugh">Laugh/Laughing</option>
					<option value="lolwut">lolwut</option>
					<option value="memberspecific">Member-Specific</option>
					<option value="meta">Meta</option>
					<option value="military">Military</option>
					<option value="mindblown">Mind Blown</option>
					<option value="misc">Misc</option>
					<option value="morbid">Morbid</option>
					<option value="murica">'Murica</option>
					<option value="muslims">Muslims/Terrorists</option>
					<option value="nope">Nope</option>
					<option value="nsfw">NSFW</option>
					<option value="partyhard">Party Hard</option>
					<option value="pepe">Pepe</option>
					<option value="pokemon">Pokemon</option>
					<option value="polandball">Poland Ball</option>
					<option value="political">Political</option>
					<option value="racist">Racist</option>
					<option value="ricky">Ricky Comic</option>
					<option value="rip">RIP in piece</option>
					<option value="sanic">Sanic</option>
					<option value="scary">Scary</option>
					<option value="shocked">Shocked</option>
					<option value="spongebob">Spongebob</option>
					<option value="stfu">STFU/Shut Up</option>
					<option value="thinking">Thinking</option>
					<option value="thissucks">This Sucks</option>
					<option value="umad">UMAD BRO?</option>
					<option value="upvote">Upvote</option>
					<option value="visser">Visser</option>
					<option value="wtf">WTF</option>
				</select>
				</h4>
				<br />
				<p><input type="file" name="fileToUpload" id="fileToUpload" /></p>
				<p><input type="submit" value="Upload Your Meme" name="submit"  /></p>
			</form>
		</div>
		<div align="center">
			<br />
			<p>Accepted file formats: .gif, .png, .jpg, .jpeg</p>
			<br />
			<hr>
			<br />
			<input type="submit" value="Browse Memes" onclick="window.location='./browse';" />

		</div>
		<div align="center">
			<br />
			<br />
			<br />
			<h6>Meme Machine v0.3.6-beta</h6>
		</div>
</html>
