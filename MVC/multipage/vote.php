<?php 
	require_once("head.html");
	
	$pildid=array(
		array("src"=>"pildid/nameless1", "id"=>"p1", "value"=>"1", "alt"=>"nimetu1"),
		array("src"=>"pildid/nameless2", "id"=>"p2", "value"=>"2", "alt"=>"nimetu2"),
		array("src"=>"pildid/nameless3", "id"=>"p3", "value"=>"3", "alt"=>"nimetu3"),
		array("src"=>"pildid/nameless4", "id"=>"p4", "value"=>"4", "alt"=>"nimetu4"),
		array("src"=>"pildid/nameless5", "id"=>"p5", "value"=>"5", "alt"=>"nimetu5"),
		array("src"=>"pildid/nameless6", "id"=>"p6", "value"=>"6", "alt"=>"nimetu6"),
	);
?>
<h3>Vali oma lemmik :)</h3>

<form action="tulemus.php" method="GET">
	
	<?php

	foreach ($pildid as $pilt) {
	
		echo "
			<p>
				<label for=\"{$pilt["id"]}\">
				<img src=\"{$pilt["src"]}\" alt=\"{$pilt["alt"]}\" height=\"100\"></img>
				</label>
				<input type=\"radio\" value=\"{$pilt["value"]}\" id=\"{$pilt["id"]}\" name=\"pilt\">

		";
	}
	?>
	<br/>

	<input type="submit" value="Valin!"/>
</form>

<?php
	require_once("foot.html");
?>