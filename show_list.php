<?php

    include_once './ddb.php';
    
    $res = $acess->query('select nomeSite, urlBase, domin, opengraf, opengrafTypeFile, opengrafSize, id from sitebase where opengraf <> "" ');

    $v = mysqli_num_rows($res);

    if ($v > 0){

        if ($v > 1)
            echo "<h2>There are $v files</h2>";
        else
            echo "<h2>There is $v file</h2>";

        while ($a = mysqli_fetch_array($res)) {
            echo '<img src="'.$a[3].'" width="300px" >';
            echo '<form action="./update.php?inf='.$a[6].'" method="POST" enctype="multipart/form-data" >
                <input type="hidden" name="file'.$a[6].'" value="'.$a[3].'" >
                <button type="submit" name="del'.$a[6].'">
                    DELETE
                </button>
            </form>';
        }
    }else{
        header('Location: ./'); 
    }