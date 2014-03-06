<?php
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

$sql_select = "SELECT * FROM adposts";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll(); 
    if(count($adposts) > 0) {
        echo "<h2>Ads posted</h2>";
        echo "<table>";
        echo "<tr><th>Ad title</th>";
        echo "<th>Description</th>";
        echo "<th>Price</th></tr>";
        echo "<th>Seller's name</th>";
        echo "<th>Phone no</th>";
        echo "<th>Location</th></tr>";
        foreach($adposts as $adpost) {
            echo "<tr><td>".$adpost['adtitle']."</td>";
            echo "<td>".$adpost['description']."</td>";
            echo "<td>".$adpost['price']."</td>";
            echo "<td>".$adpost['contact_name']."</td>";
            echo "<td>".$adpost['phoneno']."</td>";
            echo "<td>".$registrant['location']."</td></tr>";
        }
        echo "</table>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }


?>