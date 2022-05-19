<?php


class Sensor extends Dbh {
    //Adds new category to comp_category
    
    function addReading($name, $temp){
        $stmt = $this->connect()->prepare('INSERT INTO reading (sensor_name, sensor_reading, sensor_timestamp)
                                           VALUES (?, ?, ?);');

        date_default_timezone_set('Europe/London');
        $now = date("Y-m-d H:i:s");
        if(!$stmt->execute(array($name, $temp, $now,))){
            return $stmt->errorCode();
        }
        return 'success';
    }

    function getReading(){
        $stmt = $this->connect()->prepare('SELECT * FROM reading ORDER BY sensor_timestamp DESC;');

        if(!$stmt->execute()){
            print_r($stmt->errorInfo());
            //header("location: ../index.php?error=sqlfail");
            //exit();
        }
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }
}