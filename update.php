<?php

    $inf = $_GET['inf'];
    
    if (isset($inf)){
        $file = $_POST['file'.$inf];
        
        if (is_file($file)){
            unlink($file);
        }

        $vazio = 'NULL';
        //Set time zone region
        date_default_timezone_set('UTC');
        $dateAtual = date('Y-m-d H:i:s');
        
        $idlog = uniqid();

        include_once './ddb.php';
        $res = $acess->query("UPDATE sitebase set opengraf = '$vazio', opengrafOrigName = '$vazio', opengrafTypeFile = '$vazio', opengrafSize = 0, ut = '$dateAtual', id_file = '$idlog' where id = '$inf' ");
        $res = $acess->query("INSERT INTO log_change (idLog, typeLog) VALUES ('$idlog', 'del')");

        setcookie('logC', $idlog ,time() + 86400);

        echo $file;
        //header('Location: ./show_list.php');   
    }    