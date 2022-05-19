<?php
$phpObj = json_decode(file_get_contents("php://input"));
$jsonString = file_get_contents("php://input");
$myFile = "testFile.txt";
file_put_contents($myFile,$jsonString);
echo '{ "success": true }';
?>

