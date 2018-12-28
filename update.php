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
        
        include_once './ddb.php';
        $res = $acess->query("UPDATE sitebase set opengraf = '$vazio', opengrafOrigName = '$vazio', opengrafTypeFile = '$vazio', opengrafSize = 0, ut = '$dateAtual' where id = '$inf' ");

        echo $file;
        //header('Location: ./show_list.php');   
    }    