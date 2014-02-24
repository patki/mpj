<?php
//include "registration.html";
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    // Connect to database.
    try {
          $conn = new PDO ( "sqlsrv:server = tcp:pocxo8zlbf.database.windows.net,1433; Database =classifieds", "sambaridly", "Butter@dosa112");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            echo "success";
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
    // Insert registration info
       echo $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		$phoneno = $_POST['phoneno'];
		$location = $_POST['location'];
		  
        // Insert data
        $sql_insert = "INSERT INTO registration (username, email, password,phoneno,location) 
                   VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
		$stmt->bindValue(4, $phoneno);
		$stmt->bindValue(5, $location);
		
        $stmt->execute();
   
    echo "<h3>Your're registered!</h3>";
    
 
   /* $sql_select = "SELECT * FROM register";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
     echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>phoneno</th>";
        echo "<th>location</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['username']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['phoneno']."</td>";
			 echo "<td>".$registrant['location']."</td></tr>";
        }
        echo "</table>";
      
    } else
	{
        echo "<h3>No one is currently registered.</h3>";
    }
	

	*/
?>