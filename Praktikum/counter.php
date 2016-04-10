<?php
$file = 'count.txt';
// Open the file to get existing content
$current = file_get_contents($file);
// Append a new info
//$current .= "John Smith\n";
//echo $current;
//$current++;
$current=$current+1;
echo "Lehe külastajate arv on:" . $current;
// Write the contents back to the file
file_put_contents($file, $current);
?>