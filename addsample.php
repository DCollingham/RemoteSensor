<?Php

//Add a sample reading to the database
require_once 'classes/dbh.php';
require_once 'classes/sensor.php';

$json = '{"ID": "xHkvX", "T": "10.9"}';
$phpObj = json_decode($json, true);
echo gettype(floatval(($phpObj['T'])));

$sensor = new Sensor();
$msg = $sensor->addReading('S01', 10.13);
echo $msg;
exit();
