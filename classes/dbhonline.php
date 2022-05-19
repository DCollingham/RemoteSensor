<?php

class Dbh {
    //Allows extended classses to access connect function
    protected function connect(){      
        try {
            $username = "fishtan2_dylan";
            $password = "UkbW(83E-h";
            $Dbh = new PDO('mysql:host=localhost;charset=utf8mb4;dbname=fishtan2_sensor', $username, $password);
            $Dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $Dbh->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
            return $Dbh;
        }
        //Catch error as variable e and display error message
        catch (PDOException $e) {
            //show error
            echo '<p class="bg-danger">' . $e->getMessage() . '</p>';
            exit;
        }
    }
}