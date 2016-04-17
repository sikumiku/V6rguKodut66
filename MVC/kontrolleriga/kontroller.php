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
	
	if(!empty($GET_MODE["page"])) {
		$page = $_GET["page"];
	} else {
		$page = "pealeht";
	}
	
	switch($page){
		case "pealeht":
			include ("pealeht.php");
		break;
		case "galerii":
			include ("galerii.php");
		break;
		case "vote":
			include ("vote.php");
		break;
		default:
			include("pealeht.php");
		break;
	}
	
	require_once("foot.html");
?>