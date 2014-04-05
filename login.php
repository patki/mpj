
<?php

    try {
          
          $conn = new PDO ( "sqlsrv:server = tcp:pocxo8zlbf.database.windows.net,1433; Database =classifieds", "sambaridly", "Butter@dosa112");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
	  $check=false;
    $sql_select = "SELECT password FROM registration where email='".$_POST['email']."'AND password='".$_POST['password']."';";
    $stmt = $conn->query($sql_select);
    $registrant = $stmt->fetchAll(); 
    if($registrant ==$_GET['password']){
      $check=true;
		  
	  }
	
   }
?>
