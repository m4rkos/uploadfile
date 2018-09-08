<?php 

// DB
    function conn(){
        $db = 'site';
        $host = 'localhost';
        $usr = 'root';
        $pass = '';

        $conn = new mysqli($host, $usr, $pass, $db);
        if ($conn == false){
            $error = 'error on your DB connection!';
            return $error;
        }else{
            return $conn;
        }
    }

// Var for access to connection DB
    $acess = conn();

    //print_r($acess->query('select * from sitebase'));


