<?php
include "uploadimage.html";
    try {
          $conn = new PDO ( "sqlsrv:server = tcp:pocxo8zlbf.database.windows.net,1433; Database =classifieds", "sambaridly", "Butter@dosa112");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            if ($conn) {
                //echo "success";
            }
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
$image=$_POST['image'];
 $sql_insert = "INSERT INTO images (image) 
                   VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $image);
         $stmt->execute();
       




?>