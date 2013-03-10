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
   
echo   $stmt1 ="Select * from register;" ;
 if($prp1 = $conn->query($stmt1))
 {
$registrant1 = $prp1->fetch();
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
 else
 die("couldnt connect....");
?>