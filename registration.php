<?php
//include "registration.html";
    // DB connection info
    //TODO: Update the values for $host, $user, $pwd, and $db
    //using the values you retrieved earlier from the portal.
    // Connect to database.
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
    // Insert registration info
    if(!empty($_POST['username'])&&!empty($_POST['email'])&&!empty($_POST['password'])&&!empty($_POST['phoneno'])) {
    try {
        $username = $_POST['username'];
        $email = $_POST['email'];
        $password = $_POST['password'];
		$phoneno = $_POST['phoneno'];
        $address=$_POST['address'];
		$location = $_POST['location'];
		  
        // Insert data

        $sql_insert = "INSERT INTO registration (username,email,password,phoneno,location,address) 
                   VALUES (?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $username);
        $stmt->bindValue(2, $email);
        $stmt->bindValue(3, $password);
		$stmt->bindValue(4, $phoneno);
		$stmt->bindValue(5, $location);
        $stmt->bindValue(6, $address);
		
        $stmt->execute();
       }
        catch(Exception $e) {
        die(var_dump($e));
    }
    //if ($stmt) {
       // header('Location:login.html');
        echo "<h3>Your're registered!</h3>";
    //}
    
    }
 
?>