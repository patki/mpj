<html>
<head>
<link rel="stylesheet" href="profile.css" />

</head>
<body>
<?php
session_start();
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    // Connect to database.
    try {
          $conn = new PDO ( "sqlsrv:server = tcp:j66k9fh59y.database.windows.net,1433; Database = database", "vishwas", "HelloWorld12");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
	
	//$username=$_GET['id'];
	//retrival of database
	 echo $sql_select = "SELECT * FROM register where username='".$_SESSION["username"]."'";
     
     $stmt = $conn->query($sql_select);
	  $registrants = $stmt->fetchAll();
	  
	 echo count($registrants);
	 echo "<h2>People who are registered:</h2>";
        echo "<table class='table'>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>password</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['username']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['password']."</td></tr>";
        }
        echo "</table>";
    
	
		?>
		
        </body>
</html>