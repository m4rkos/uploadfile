<?php

    include_once './ddb.php';
    
    $res = $acess->query('select nomeSite, urlBase, domin, opengraf, opengrafTypeFile, opengrafSize, id from sitebase where opengraf <> "" and opengraf <> "NULL" ');

    $v = mysqli_num_rows($res);

    if ($v > 0){

        if ($v > 1)
            echo "<h2>There are $v files</h2>";
        else
            echo "<h2>There is $v file</h2>";

        echo '<div class="row" >';
        while ($a = mysqli_fetch_array($res)) {
            echo '<div class="col-3"><img src="'.$a[3].'" width="300px" >';
            echo '<form method="post" id="a'.$a[6].'" name="a'.$a[6].'" onsubmit="deleteFile('.$a[6].'); return false" enctype="multipart/form-data" >
                <input type="hidden" id="id'.$a[6].'" name="id'.$a[6].'" value="'.$a[6].'" />
                <input type="hidden" id="file'.$a[6].'" name="file'.$a[6].'" value="'.$a[3].'" />
                <button type="submit" name="del'.$a[6].'">
                    DELETE
                </button>
            </form></div>';
        }
        echo '</div>';
    }else{
        //header('Location: ./'); 
        echo "there aren't files";
    }