<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8"/>

<title>
PHP Harjutus 1
</title>
</head>
<body>
<?php

ini_set("display_errors", 1);

function tagurpidi($string) {
    $len = strlen($string);

    for ($i = 0, $j = $len-1; $i < ($len / 2); $i++, $j--) {
		$k = $string[$i];
		$string[$i] = $string[$j];
		$string[$j] = $k;
    }

    return $string;
}

print tagurpidi("suvaline lause mille v2lja valisin");


?>

<h2>Kood pildis</h2>

<p><img src="php_harjutus1.PNG"></img></p>

</body>
</html>



