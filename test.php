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
   echo  $cookie=$_COOKIE['username'];
    echo "<div class=container-narrow>";
    echo "<div class=panel panel-default>";
    echo "<div style=height:50px></div>";
    if($_COOKIE['username']==NULL){
          echo "user not logged in\n";
          echo "i am ending ...\n";
        }
    else {
      echo "user logged in \n";
      var_dump($_COOKIE);
      echo "\n";
      }
    $cookie=$_COOKIE['username'];
    echo "<legend>Ads related to :  ".$category."</legend>";
    $sql_select = "SELECT * FROM registration where email='$cookie'";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll();
    foreach ($adposts as $adpost) {
     echo "<input type='text' value='"+$adpost['username']+"'";
     echo $adpost['location'];
     echo $adpost['phoneno'];
  } 
echo "</div>";
echo "</div>";
echo "</body>";

?>




