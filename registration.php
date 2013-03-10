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
     echo "<table>";
        echo "<tr><th>Name</th>";
        echo "<th>Email</th>";
        echo "<th>department</th>";
        echo "<th>studentid</th></tr>";
        foreach($registrants as $registrant) {
            echo "<tr><td>".$registrant['username']."</td>";
            echo "<td>".$registrant['email']."</td>";
            echo "<td>".$registrant['department']."</td>";
			 echo "<td>".$registrant['studentid']."</td></tr>";
        }
        echo "</table>";
       
    } else {
        echo "<h3>No one is currently registered.</h3>";
    }
	
	
	$uploadDir = 'images/'; //Image Upload Folder
if(isset($_POST['Submit']))
{
$fileName = $_FILES['Photo']['name'];
$tmpName  = $_FILES['Photo']['tmp_name'];
$fileSize = $_FILES['Photo']['size'];
$fileType = $_FILES['Photo']['type'];
$filePath = $uploadDir . $fileName;
$result = move_uploaded_file($tmpName, $filePath);
if (!$result) {
echo "Error uploading file";
exit;
}
if(!get_magic_quotes_gpc())
{
    $fileName = addslashes($fileName);
	$filePath = addslashes($filePath);
}
$query = "INSERT INTO $register ( Image ) VALUES ('$filePath')";
mysql_query($query) or die('Error, query failed'); 
}


$query = "SELECT * FROM $register WHERE username = '$username'";
$result = mysql_query($query) or die(mysql_error());
	while($row = mysql_fetch_array($result))
	{
echo "<img border=\"0\" src=\"".$row['Image']."\" width=\"102\" alt=\"Your Name\" height=\"91\">";
}
?>