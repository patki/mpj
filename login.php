<?php
include "login.html";
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
	  $check=false;
   
echo  $sql_select = "SELECT * FROM register where username='".$_POST['username']. "' and password='".$_POST['password']."';";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
 if(count($registrants) > 0) {
        echo "<h2>People who are registered:</h2>";
		
    // print_r($registrant1);
     if(count($registrant1) ==1)
      {
		echo "signed inn!!" ;
	  }
		  else
		  {
			 echo "error ";
			  
		}
 }
?>