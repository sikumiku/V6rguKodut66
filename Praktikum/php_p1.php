<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="mystyle.css">
    <title>tere maailm</title>
    <script src="myscript.js"></script> <!-- laeb skripti sisse kuskilt-->
    <script src="time.js"></script>
</head>
<body onload="startTime()">
    <h1>Esimese praktikumi HTML</h1>
    <p>disainitud tekst</p>
  	<h2 class="pealkirjad"><b>Tere tulemast 1. praktikumi lehele</b></h2>
			<h3 class="alapealkiri">Part</h3>
			
		</td>
		<td class="table-padding2"></td>
		
	  </tr>
	  <tr>
		<td class="table-padding"></td>
		<td class="pildiveerg">
			
			<img class="karakterportree" src = "https://media.cyberduck.io/img/cyberduck-icon-384.png" alt="nunnu part">
			
		</td>
		<td class="kirjeldus">
		
			<p><b>Kummipart</b> on väga nunnu ja kollane ning kindlasti miski, mida võiks endale tulevikuks hankida. </p>
			</div>
		</td>
		<td class="table-padding2"></td>
	 </tr>   
    <br>

    <p2>oled lehel viibinud:</p2>
    <br>
    <label id="minutes">00</label>:<label id="seconds">00</label>

    <br>
    <p.normal>sinu arvuti kell on:</p.normal><br>
    <div id="txt"></div>

    <?php
    //siia saab kirjutda PHP koodi
        include("counter.php");
	//$ip =  "tere";  
	
	//Test if it is a shared client
if (!empty($_SERVER['HTTP_CLIENT_IP'])){
  $ip=$_SERVER['HTTP_CLIENT_IP'];
//Is it a proxy address
}elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])){
  $ip=$_SERVER['HTTP_X_FORWARDED_FOR'];
}else{
  $ip=$_SERVER['REMOTE_ADDR'];
}
//The value of $ip at this point would look something like: "192.0.34.166"
//$ip = ip2long($ip);

//var_dump($ip);
//The $ip would now look something like: 1073732954
    
    
    $host = "localhost";
    $user = "test";
    $pass = "t3st3r123";
    $db = "test";

$sql= 'insert into PriitSigridIPTable(IP) values ("'.$ip.'") ';
//echo $sql;

    $l = mysqli_connect($host, $user, $pass, $db);
    mysqli_query($l, $sql) or
            die("Error: " . mysqli_error($l) . " -- " . $sql);
    
    echo "<br>";
    echo "viimased külastajad lehel:<br>";
    
	$sqlselect='select PriitSigridIPTable.IP,PriitSigridIPTable.Timestamp as time from PriitSigridIPTable where Timestamp>= DATE_SUB(NOW(),INTERVAL 5 MINUTE) ';
	
if ($result=mysqli_query($l,$sqlselect))
  {
  // Fetch one and one row
  while ($row=mysqli_fetch_row($result))
    {
    printf ("%s (%s)<br>",$row[0],$row[1]);
    }
  // Free result set
  mysqli_free_result($result);
}
    
    
    //echo mysqli_;
    
    mysqli_close($l);
    
    
?>

    <script type="text/javascript"> //skript kohe htmli sees
        var minutesLabel = document.getElementById("minutes");
        var secondsLabel = document.getElementById("seconds");
        var totalSeconds = 0;
        setInterval(setTime, 1000);

        function setTime()
        {
            ++totalSeconds;
            secondsLabel.innerHTML = pad(totalSeconds%60);
            minutesLabel.innerHTML = pad(parseInt(totalSeconds/60));
        }

        function pad(val)
        {
            var valString = val + "";
            if(valString.length < 2)
            {
                return "0" + valString;
            }
            else
            {
                return valString;
            }
        }
    </script>

</body>
</html>