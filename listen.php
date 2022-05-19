<?php
$phpObj = json_decode(file_get_contents("php://input"));
$jsonString = file_get_contents("php://input");
$myFile = "testFile.txt";
file_put_contents($myFile, $jsonString);
$phpObj = json_decode($jsonString, true);
$temp = floatval($phpObj['T']);


require_once 'classes/dbh.php';
require_once 'classes/sensor.php';

$sensor = new Sensor();
$sqlstatus = $sensor->addReading('S02', $temp);
echo $sqlstatus;





