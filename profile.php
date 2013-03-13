<?php
include "profile.html";
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
	
	$username=$_GET['id'];
	//retrival of database
	 $sql_select = "SELECT * FROM register where username=?";
    $prp = $conn->prepare($sql_select);
	 if($prp->execute($username) )
	{
		   $username = $prp->fetch();
			
    }
    $registrants = $stmt->fetch(); 
    if(count($registrants) > 0) {
        echo "<h2>Your account details</h2>";
     echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>department</th>";
        echo "<th>studentid</th></tr>";
        foreach($username as $registrant) {
            echo "<tr><td>".$registrant['username']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['department']."</td>";
			 echo "<td>".$registrant['studentid']."</td></tr>";
        }
        echo "</table>";
	}
		?>