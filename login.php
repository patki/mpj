
<?php
include "nav.html";
    try {
          
          $conn = new PDO ( "sqlsrv:server = tcp:pocxo8zlbf.database.windows.net,1433; Database =classifieds", "sambaridly", "Butter@dosa112");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
	$cookieid=$_COOKIE['username'];
    $email=$_POST['email'];
    $password=$_POST['password'];
         $sql_select = "SELECT username FROM registration where email='$email'and password='$password'";
         $stmt = $conn->query($sql_select);
         $myprofile = $stmt->fetchAll();
         if(count($myprofile)==1){
            echo "<div style=height:50px></div>";
            echo "<h2>Welcome</h2>".$cookieid;
            //header('Location: http://ezeefieds.azurewebsites.net/profile.php?id='.$cookieid);
        }
        else{
            echo "<div style=height:50px></div>";
            echo "<h2>Invalid username or password</h2>";
        }
?>
