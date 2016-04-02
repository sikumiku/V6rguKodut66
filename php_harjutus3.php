<?php

	ini_set("display_errors", 1);

	$videom2ngud = array(
	array("nimi"=>"Half-Life2", "tyyp"=>"seiklusmäng", "aasta"=>2004, "arendaja"=>"Valve", "reiting"=>9.2),
	array("nimi"=>"Grand Theft Auto V", "tyyp"=>"seiklusmäng", "aasta"=>2015, "arendaja"=>"Rockstar North", "reiting"=>7.8),	
	array("nimi"=>"The Orange Box", "tyyp"=>"mängude kogumik", "aasta"=>2007, "arendaja"=>"Valve", "reiting"=>9.3),	
	array("nimi"=>"Half-Life", "tyyp"=>"seiklusmäng", "aasta"=>1998, "arendaja"=>"Valve", "reiting"=>9.1),
	array("nimi"=>"Bioshock", "tyyp"=>"seiklusmäng", "aasta"=>2007, "arendaja"=>"Irrational Games", "reiting"=>9.3),
	array("nimi"=>"Portal 2", "tyyp"=>"seiklusmäng", "aasta"=>2011, "arendaja"=>"Valve", "reiting"=>8.8),
	);
	
	foreach($videom2ngud as $inner){
	include("m2ngud.html");
}

?>