<?php


function connect_db(){
	global $connection;
	$host="localhost";
	$user="test";
	$pass="t3st3r123";
	$db="test";
	$connection = mysqli_connect($host, $user, $pass, $db) or die("ei saa ühendust mootoriga- ".mysqli_error());
	mysqli_query($connection, "SET CHARACTER SET UTF8") or die("Ei saanud baasi utf-8-sse - ".mysqli_error($connection));
}

function logi(){
	// siia on vaja funktsionaalsust (13. nädalal)

	if (isset($_POST['user'])) {
		include_once('views/puurid.html');
	}

	if (isset($_SERVER['REQUEST_METHOD'])) {
		if ($_SERVER['REQUEST_METHOD'] == 'POST') {
			$errorview = array();
			if (empty($_POST['user'])) {
				$errorview[] = "Palun sisesta kasutajanimi ka.";
			}
			if (empty($_POST['pass'])) {
				$errorview[] = "Palun sisesta parool ka.";
			}

			if (empty($errorview)){
				global $connection;
				$user = mysqli_real_escape_string($connection, $_POST["user"]);
				$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
				$sql = "SELECT username, passw, roll FROM saasma_kylastajad WHERE username='$user' AND passw=SHA1('$pass')";
				$result = mysqli_query($connection, $sql) or die ("Sellist kasutajat ei ole, sorri.");
				$rida = mysqli_num_rows($result);
				if ($rida > 0) {
					$roll = $rida['roll'];
					$_SESSION['roll'] = $roll;
					$_SESSION['user'] = $user;
					header("Location: ?page=loomad");
				} 
			}
		}
	}

	include_once('views/login.html');
}

function logout(){
	$_SESSION=array();
	session_destroy();
	header("Location: ?");
}

function kuva_puurid(){
	if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
	}

	global $connection;
	$puurid = array();
	$sql = "SELECT DISTINCT puur FROM saasma_loomaaed";
	$result = mysqli_query($connection, $sql) or die("$sql - ".mysqli_error($connection));
    while ($rida = mysqli_fetch_assoc($result)) {
      $puur_query = "SELECT id, nimi, liik, puur FROM saasma_loomaaed WHERE puur =".$rida["puur"];
      $result2 = mysqli_query($connection, $puur_query) or die("$puur_query - ".mysqli_error($connection));
      while ($loomad = mysqli_fetch_assoc($result2)) {
        $puurid[$rida["puur"]][] = $loomad;
      }
    }
	include_once('views/puurid.html');
	
}

function lisa(){
	// siia on vaja funktsionaalsust (13. nädalal)

	if (empty($_SESSION['user']) || $_SESSION['roll'] != 'admin') {
		header("Location: ?page=login");
	}

	if (isset($_SERVER['REQUEST_METHOD']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		$errorview = array();
		if (empty($_POST['nimi'])) {
			$errorview[] = "Palun sisesta looma nimi ka.";
		}
		if (empty($_POST['puur'])) {
			$errorview[] = "Vali puurinumber ka.";
		}
		$pilt = upload("liik");
		if ($pilt == "") {
			$errorview[] = "Palun vali pilt ka.";
		} 

		if (empty($errorview)) {
			global $connection;
			$user = mysqli_real_escape_string($connection, $_POST["user"]);
			$pass = mysqli_real_escape_string($connection, $_POST["pass"]);
			$sql = "INSERT INTO saasma_loomaaed (nimi, liik, puur) VALUES ('$nimi', '$liik', '$puur')";
			$result = mysqli_query($connection, $sql) or die ("Proovi uuesti.");

			if ($result) {
				if (mysqli_insert_id($connection) > 0) {
					header("Location: ?page=loomad");
					exit(0);
				}
			}
		}
		else print_r($errorview);
	}
	
	include_once('views/loomavorm.html');
	
}

function muuda(){

global $connection;

	if (empty($_SESSION['user'])) {
		header("Location: ?page=login");
	}
	if (empty($_SESSION['admin'])) {
		header("Location: ?page=loomad");
	}

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && isset($_GET['id']) && $_GET['id'] != "") {
		$id=$_GET['id'];
		$loom=hangi_loom(mysqli_real_escape_string($connection, $id));
	} else {
		header("Location: ?page=loomad");
	}

	if (isset($_POST['muuda']) && $_SERVER['REQUEST_METHOD'] == 'POST') {
		$errorview = array();
		if (empty($_POST['nimi'])) {
			$errorview[] = "Palun sisesta looma nimi ka.";
		}
		if (empty($_POST['puur'])) {
			$errorview[] = "Vali puurinumber ka.";
		}
		
		if (empty($errorview)) {
			$id = $_POST['muuda'];
			$loom = hangi_loom(mysqli_real_escape_string($connection, $id));

			$loom['nimi'] = mysqli_real_escape_string($connection, $_POST["nimi"]);
			$loom['puur'] = mysqli_real_escape_string($connection, $_POST["puur"]);
			$liik = upload("liik");
			if ($liik != ""){
				$loom['liik'] = $liik;
			}

			$sql= "UPDATE saasma_loomaaed SET nimi='".$loom['nimi']."', puur='".$loom['puur']."', liik='".$loom['liik']."' WHERE id=".$id;
			$result = mysqli_query($connection, $sql) or die ("Loomaaia tabeli uuendamine ei toimunud.");

			hearder("Location: ?page=loomad");
		}
	}
	
	include_once('views/editvorm.html');
	
}

function upload($name){
	$allowedExts = array("jpg", "jpeg", "gif", "png");
	$allowedTypes = array("image/gif", "image/jpeg", "image/png","image/pjpeg");
	$extension = end(explode(".", $_FILES[$name]["name"]));

	if ( in_array($_FILES[$name]["type"], $allowedTypes)
		&& ($_FILES[$name]["size"] < 100000)
		&& in_array($extension, $allowedExts)) {
    // fail õiget tüüpi ja suurusega
		if ($_FILES[$name]["error"] > 0) {
			$_SESSION['notices'][]= "Return Code: " . $_FILES[$name]["error"];
			return "";
		} else {
      // vigu ei ole
			if (file_exists("pildid/" . $_FILES[$name]["name"])) {
        // fail olemas ära uuesti lae, tagasta failinimi
				$_SESSION['notices'][]= $_FILES[$name]["name"] . " juba eksisteerib. ";
				return "pildid/" .$_FILES[$name]["name"];
			} else {
        // kõik ok, aseta pilt
				move_uploaded_file($_FILES[$name]["tmp_name"], "pildid/" . $_FILES[$name]["name"]);
				return "pildid/" .$_FILES[$name]["name"];
			}
		}
	} else {
		return "";
	}
}


function hangi_loom($id) {
	global $connection;
	$sql = "SELECT * FROM saasma_loomaaed WHERE id=".$id;
	$result = mysqli_query($connection, $sql) or die("Ei ole looma.");
	if ($loominfo = mysqli_fetch_assoc($result)) {
		return $loominfo;
	}
	else {
		header("Location: ?page=loomad");
	}
}

?>