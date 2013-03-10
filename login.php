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
    $registrant = $stmt->fetch(.$_POST['username']); 
 
    // print_r($registrant1);
     if(count($registrant) ==1)
      {
	Print "<table border cellpadding=3>"; 
 { 
 Print "<tr>"; 
 Print "<th>Name:</th> <td>".$registrant['department'] . "</td> "; 
 Print "<th>Pet:</th> <td>".$registrant['studentid'] . " </td></tr>"; 
 } 
 Print "</table>"; 
	  }
   }
?>