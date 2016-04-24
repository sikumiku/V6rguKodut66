<?php
	session_start();
	
	require_once("head.html");

	$pildid=array(
		1=>array("src"=>"pildid/nameless1", "id"=>"p1", "value"=>"1", "alt"=>"nimetu1"),
		2=>array("src"=>"pildid/nameless2", "id"=>"p2", "value"=>"2", "alt"=>"nimetu2"),
		3=>array("src"=>"pildid/nameless3", "id"=>"p3", "value"=>"3", "alt"=>"nimetu3"),
		4=>array("src"=>"pildid/nameless4", "id"=>"p4", "value"=>"4", "alt"=>"nimetu4"),
		5=>array("src"=>"pildid/nameless5", "id"=>"p5", "value"=>"5", "alt"=>"nimetu5"),
		6=>array("src"=>"pildid/nameless6", "id"=>"p6", "value"=>"6", "alt"=>"nimetu6"),
	);
	
	$page="pealeht";
	if (isset($_GET['page']) && $_GET['page']!=""){
	$page=htmlspecialchars($_GET['page']);
	}
	
	switch($page){
		case "pealeht":
			include ("pealeht.html");
		break;
		case "galerii":
			include ("galerii.html");
		break;
		case "vote":
			if(!empty($_SESSION["pilt"])){
				header("Location: ?page=jubavalitud");
				exit(0);
			} else{
				include("vote.html");
			}
		break;
		case "jubavalitud":
			$id=false;
			if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
			$id=htmlspecialchars($_POST['pilt']);
			include ("jubavalitud.html");
		break;
		case "tulemus":
			$id=false;
			if (isset($_POST['pilt']) && isset($pildid[$_POST['pilt']]))
				$id=htmlspecialchars($_POST['pilt']);
			include("tulemus.html");
		break;
		case "l6petasessioon":
			$_SESSION = array();
			if (isset($COOKIE[session_name()])){
				setcookie(session_name(), '', time()-40000, '/');
			}
			session_destroy();
			header("Location: ?page=vote");
			exit(0);
			break;
		default:
			include("pealeht.html");
		break;
	}
	
	require_once("foot.html");
?>