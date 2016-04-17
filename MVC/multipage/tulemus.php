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
	<h3>Valiku tulemus</h3>
	<p>
	<?php 
		if(!empty($_GET["pilt"])){
			echo "Aitäh valiku eest! :)";
		} else {
			echo "Sa ei ole valinud veel.";
		}
	?>
	
	</p>

<?php
	require_once("foot.html");
?>