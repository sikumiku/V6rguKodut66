<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>

<title>
8. nädala kodune töö (POST ja GET)
</title>

  <?php
	
	$bg_color="#ffcce6";
	if (isset($_POST['bg_color']) && $_POST['bg_color']!="") {
    $bg_color=htmlspecialchars($_POST['bg_color']);}
	
	$text="Siia tuleb sinu tekst.";
	if (!empty($_POST["text"])) {
    $text=htmlspecialchars($_POST["text"]);}
	
	$text_color="#b3005c";
	if (!empty($_POST["text_color"])) {
    $text_color=htmlspecialchars($_POST["text_color"]);}
	
	$border_style="solid";
	if (!empty($_POST["border_style"])) {
    $border_style=htmlspecialchars($_POST["border_style"]);}
	
	$border_color="#b3005c";
	if (!empty($_POST["border_color"])) {
    $border_color=htmlspecialchars($_POST["border_color"]);}
	
	$border_width="2px";
	if (!empty($_POST["border_width"])) {
    $border_width=htmlspecialchars($_POST["border_width"]);}
	
	$border_radius="0px";
	if (!empty($_POST["border_radius"])) {
    $border_radius=htmlspecialchars($_POST["border_radius"]);}
	
  ?>

	<style>
	
		body {
			font-family: Tahoma, Geneva, sans-serif;
			font-size: 14px;
			margin-left: 100px;
			background-image: url(portal-background.png);
			background-repeat: no-repeat;
			background-attachment: fixed;
  		}
		
        #kast {
			width: 400px;
			height: 300px;
			margin-top: 50px;
			margin-bottom: 30px;
			padding: 20px;
			background-color: <?php echo $bg_color; ?>;
			color: <?php echo $text_color; ?>;
			border-style: <?php echo $border_style; ?>;
			border-color: <?php echo $border_color; ?>;
			border-width: <?php echo $border_width; ?>;
			border-radius: <?php echo $border_radius; ?>;
        }
		
        #piirjoon {
			border: 2px solid black;
			margin-top: 10px;
			padding-top: 15px;
			padding-left: 15px;
			position: relative;
			width: 440px;
        }
		
		hr {
			margin-left: 0px;
			width: 440px;
		}
		
        label {
			display: block;
			position: absolute:
			top: 200px;
			left: 200px;
          }
  			
		input, select {
  			margin-right: 15px;
  		}
		
		textarea {
			margin-top: 20px;
			margin-bottom: 20px;
		}
		p {
			position: absolute;
			display: inline-block;
			font-size: 18px;
			background: #f8f7fc;
			padding: 5px;
			top: -35px;
			left: 15px;
		}
		
		#saada {
			margin-top: 20px;
		}
		
		a {
			color: #5e6168;
		}

		a:hover {
			color: orange;
			text-shadow: 1px 1px #ff0000;
		}
      </style>

  </head>

<body>
	<div id = kast>
	<?php echo $text; ?>
	</div>
	<hr/>

	<form method="post">
	
	<textarea name="text" rows="5" cols="60" placeholder="Siia tuleb kirjutada."></textarea><br/>
	
	<label><input type="color" name="bg_color" />Taustavärvus</label><br/>
	<label><input type="color" name="text_color" />Tekstivärvus</label><br/>

	<div id="piirjoon">
	
		<p>Piirjoon</p>
		
		<label><input type="number" name="border_width" min="0" max="20" />Piirjoone laius (0-20px)</label><br/>
		
		<label><select name="border_style">
			<option value="solid">solid</option>
			<option value="dotted">dotted</option>
			<option value="dashed">dashed</option>
			<option value="double">double</option>
			<option value="groove">groove</option>
			<option value="ridge">ridge</option>
			<option value="inset">inset</option>
			<option value="outset">outset</option>
			<option value="none">none</option>
		</select>
		Piirjoone stiil
		</label><br/>

		<label><input type="color" name="border_color" />Piirjoone värvus</label><br/>
		
		<label><input type="number" name="border_radius" min="0" max="100" />Piirjoone nurga raadius (0-100px)</label><br/>
	
	</div>
	
	<input id="saada" type="submit" value="Esita" />
	
	</form>
	
	</br>
	<a href="http://enos.itcollege.ee/~saasma/Kodut661/homepage.html">Tagasi kodulehele</a>
</body>
</html>