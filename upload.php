<?php 

    if(isset($_GET['up']) and $_GET['up'] == 'yes'){
        
        $arq = $_FILES['file'];
        
        $upFile = up($arq);
        
        if($upFile == "You cannot upload files of this type!"):
            echo 1;
            
        else:
            include_once './ddb.php';

            $url = $_SERVER['REQUEST_URI'];
            $site = 'Teste Upload';
            $domin = 'localhost';
            $opg = $upFile[0];
            $opt = $upFile[1];
            $ops = $upFile[2];
            $opo = $upFile[3];

            $idlog = uniqid();

            $acess->query("INSERT into sitebase (nomeSite, urlBase, domin, opengraf, opengrafTypeFile, opengrafSize, opengrafOrigName) 
                values ('$site', '$url', '$domin', '$opg', '$opt', '$ops', '$opo')");
            
            $acess->query("INSERT INTO log_change (idLog, typeLog) VALUES ('$idlog', 'add')");

            setcookie('logC', $idlog ,time() + 86400);            

        endif;

    }else{
        echo "<h2>Não possue acesso á essa àrea!</h2>";
    }
        
    function up($arq){

        $fName = $arq['name'];
        $fType = $arq['type'];
        $fTmpN = $arq['tmp_name'];
        $fSize = $arq['size'];
        $fErro = $arq['error'];

        $extensionF = explode('.', $fName );
        $extF = strtolower(end($extensionF));

        $allowed = ['jpg', 'jpeg', 'png', 'gif', 'pdf'];

        $byte = 1048576;        
        // Value in MB
        $maxS = 5;

        if (in_array($extF, $allowed)){
            if($fErro === 0){
                if ($fSize < ($maxS * $byte)){
                    $fNewName = uniqid('', true).'.'.$extF;
                    $foldesN = 'uploads';
                    if (!is_dir($foldesN)){
                        mkdir($foldesN, 0777);
                    }                 
                    $foldesN .= '/'.$fNewName;
                    move_uploaded_file($fTmpN, $foldesN);
                    
                    return [$foldesN, $fType, $fSize, $fName];
                }else{
                    echo 'This file is too big!';
                }
            }else{
                echo 'There was an error uploading you file!';
            }
        }else{
            $resp = 'You cannot upload files of this type!';
            //echo $resp;
            return $resp;
        }
    }