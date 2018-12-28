<?php 

// DB
    function conn(){
        $db = 'site';
        $host = 'localhost';
        $usr = 'root';
        $pass = 'M88212045$m';

        $conn = new mysqli($host, $usr, $pass, $db);
        if ($conn == false){
            $error = 'error on your DB connection!';
            return $error;
        }else{
            return $conn;
        }
    }

// Access to connection DB
    $acess = conn();
