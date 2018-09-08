<?php

    $inf = $_GET['inf'];
    if (isset($_POST['del'.$inf])){
        $file = $_POST['file'.$inf];
        
        if (is_file($file)){
            unlink($file);
        }

        include_once './ddb.php';
        $res = $acess->query("UPDATE sitebase set opengraf = '', opengrafOrigName = '', opengrafTypeFile = '', opengrafSize = '' where id = '$inf' ");

        header('Location: ./show_list.php');   
    }    