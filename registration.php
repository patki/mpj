<?php
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
    // Insert registration info
    if(!empty($_POST)) {
    try {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		 $studentid = $_POST['studentid'];
		  $department = $_POST['department'];
        // Insert data
        $sql_insert = "INSERT INTO register (username, email, password,studentid,department) 
                   VALUES (?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
		$stmt->bindValue(4, $studentid);
		$stmt->bindValue(5, $department);
        $stmt->execute();
    }
    catch(Exception $e) {
        die(var_dump($e));
    }
    echo "<h3>Your're registered!</h3>";
    }
    // Retrieve data
    $sql_select = "SELECT * FROM register";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
    
        echo "Name";
        echo "Email";
		echo "studentid";
		echo "department";
        foreach($registrants as $registrant) {
            echo "$registrant['username']";
            echo "$registrant['email']";
			  echo "$registrant['studentid']";
			    echo "$registrant['department']";
        }
       
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
?>