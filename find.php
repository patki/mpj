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
  echo  $category=$_POST['link'];
$sql_select = "SELECT * FROM adposts where choosen_category='$category'";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll(); 
    if(count($adposts) > 0) {
        echo "<div class=container-narrow>";
        echo "<div class=panel panel-default>";
        echo "<h2>Ads posted</h2>";
        echo "<table class='table table-bordered'>";
        echo "<tr><th>Ad title</th>";
        echo "<th>Description</th>";
        echo "<th>Price</th>";
        echo "<th>Seller's name</th>";
        echo "<th>Phone no</th>";
        echo "<th>Location</th></tr>";
        foreach($adposts as $adpost) {
            echo "<tr><td>".$adpost['adtitle']."</td>";
            echo "<td>".$adpost['description']."</td>";
            echo "<td>".$adpost['price']."</td>";
            echo "<td>".$adpost['contact_name']."</td>";
            echo "<td>".$adpost['phoneno']."</td>";
            echo "<td>".$adpost['location']."</td></tr>";
        }
        echo "</table>";
        echo "</div>";
        echo "</div>";
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
?>