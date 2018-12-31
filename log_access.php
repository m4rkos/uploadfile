<?php

include_once './ddb.php';

Class Buscar{
    public function buscarId($ac){
        $da = $ac->query("select id_ordem, idLog from log_change where id_ordem > 0 order by id_ordem desc limit 1");
        return $da;
    }
}
    
if (!isset($_GET['log'])):
    
    if(isset($_COOKIE['logC'])){
        echo $_COOKIE['logC'];
    }else{
        $r = new Buscar();
        $res = $r->buscarId($acess);

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
    }

else:
    if(isset($_GET['log']) and $_GET['log'] == 'y'){
        $id_now = $_COOKIE['logC'];

        $check = $acess->query("select * from vw_logUp where idLog = '$id_now' order by id_ordem desc limit 1");
        $ss = mysqli_num_rows($check);
        if($ss == 0){
            
            $r = new Buscar();
            $res = $r->buscarId($acess);
            $x = mysqli_fetch_row($res);
            
            echo "y ".$x[1];

        }else{
            //print_r($ss);
            echo "n ".$_COOKIE['logC'];
        }

    }else{
        echo 10;
    }
    
endif;