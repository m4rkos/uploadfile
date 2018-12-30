<?php

include_once './ddb.php';
    
if (!isset($_GET['log'])):
    
    $res = $acess->query('select id_ordem, idLog from log_change where id_ordem > 0 order by id_ordem desc limit 1');
    
    $v = mysqli_num_rows($res);

    if ($v > 0){

        while ($a = mysqli_fetch_array($res)) {
            echo $a[1];
        }

    }else{ 
        $id_l = uniqid();
        $acess->query("INSERT INTO log_change (idLog) VALUES ('$id_l')");

        echo $id_l;
    }

else:

endif;