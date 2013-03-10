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
	  $check=false;
   
   $stmt1 ="Select * from register where username=?";
 $prp1 = $conn->prepare($stmt1);
  if($prp1->execute($_GET['username']) )
 {
  $registrant1 = $prp1->fetch();
    // print_r($registrant1);
     if(count($registrant1) >0)
      {
		  $tmp = $registrant1['username'];
		  
		  if($tmp->password==$_GET['password'])
		  {
			  $check=true;
			  print '<script>';
		      print'alert("Success!!cool!!")';
		      print '</script>';
		  }
		  else
		  {
			  print '<script>';
		      print'alert("Wrong password!!")';
		      print '</script>';
			  
		}
		if($check&&isset($_GET['but']))
	    {
			
            header("Location: www.google.com") ;
		}	
				  		  
      }
	  else
	  {
		print '<script>';
		print'alert("You are not registered!")';
		print '</script>';
	  }
}


?>