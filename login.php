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
   if(!empty($_POST["username"])&&!empty($_POST["password"]))
   {
  $sql_select = "SELECT * FROM register where username='".$_POST['username']. "' and password='".$_POST['password']."';";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
 
    // print_r($registrant1);
     if(count($registrants) ==1)
      {
		echo "signed inn!!" ;
		
		echo .$registrant['username']."<br>";
            echo .$registrant['email']."<br>";
            echo .$registrant['department']."<br>";
			 echo .$registrant['studentid']."<br>";
		
	  }
		  else
		  {
			 echo "error ";
			  
		}
 
   }
?>