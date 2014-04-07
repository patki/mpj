<?php
include "nav.html";
echo "<link href='css/bootstrap.css' rel='stylesheet' />";
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
    $cookie=$_COOKIE['username'];
    echo "<div class=container-narrow>";
    echo "<div class=panel panel-default>";
    echo "<div style=height:50px></div>";
    echo "<legend>Ads related to :  ".$category."</legend>";
    $sql_select = "SELECT * FROM registration where email='$cookie'";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll(); 
    foreach($adposts as $adpost) {
            echo "cnme" .$contact_name=$adpost['adtitle'];
            echo "<td>".$adpost['description']."</td>";
            echo "<td>".$adpost['price']."</td>";
            echo "<td>".$adpost['contact_name']."</td>";
            echo "<td>".$adpost['phoneno']."</td>";
            echo "<td>".$adpost['location']."</td></tr>";
        }
  
echo "</div>";
echo "</div>";
echo "</body>";

?>