<?php
//include "default.html";
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
 $category=$_GET['id'];
echo "<link href='css/bootstrap.css' rel='stylesheet' />";
echo "<body>";
echo "<nav class=navbar navbar-default navbar-fixed-top role=navigation>
  <div class=navbar-inner>
    <a class=brand href=index.php>ezeefieds</a>
      <ul class=nav navbar-nav>
        <li class=""><a href=index.php>Home</a></li>
        <li><a href=registration.html>Create Account</a></li>
        
      </ul>
      
      <ul class=nav navbar-nav navbar-right>
        <li><a href=login.html>Sign in</a></li>
        <li><a href=postcategorypage.html>Post ad</a></li>
      </ul>
    
  </div><!-- /.container-fluid -->
</nav>";
$sql_select = "SELECT * FROM adposts where choosen_category='$category'";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll(); 
    if(count($adposts) > 0) {
        echo "<div class=container-narrow>";
        echo "<div class=panel panel-default>";
        echo "<legend>Ads posted</legend>";
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
        echo "<h3></h3>";
    }

echo "</body>";
?>