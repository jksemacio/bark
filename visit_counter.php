<?php
$fileRead = fopen("counter.txt", "r");
$data = fread($fileRead, 512);
$count = (int)$data + 1;
fclose($fileRead);
echo $count;

$fileWrite = fopen("counter.txt", "w");
fwrite($fileWrite, (string)$count);
fclose($fileWrite);
?>
