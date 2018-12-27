<?php

    $inf = $_GET['inf'];
    if (isset($inf)){
        $file = $_POST['file'.$inf];
        
        if (is_file($file)){
            unlink($file);
        }

        include_once './ddb.php';
        $res = $acess->query("UPDATE sitebase set opengraf = '', opengrafOrigName = '', opengrafTypeFile = '', opengrafSize = '' where id = '$inf' ");

        echo $file;
        //header('Location: ./show_list.php');   
    }    