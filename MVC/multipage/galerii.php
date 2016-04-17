<?php 
	require_once("head.html");
	
?>

<h3>Fotod</h3>
<div id="gallery">
<?php 

	$pildid=array(
		array("src"=>"pildid/nameless1", "alt"=>"nimetu1"),
		array("src"=>"pildid/nameless2", "alt"=>"nimetu2"),
		array("src"=>"pildid/nameless3", "alt"=>"nimetu3"),
		array("src"=>"pildid/nameless4", "alt"=>"nimetu4"),
		array("src"=>"pildid/nameless5", "alt"=>"nimetu5"),
		array("src"=>"pildid/nameless6", "alt"=>"nimetu6"),
	);

	foreach ($pildid as $pilt){
		echo "<img src=\"{$pilt["src"]}\" alt=\"{$pilt["alt"]}\"></img>";
	
	}

?>
</div>
<?php
	require_once("foot.html");
?>