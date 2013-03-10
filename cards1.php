<pre>
<?php
include "registration.html";
error_reporting(E_ALL); // or E_STRICT
ini_set("display_errors",1);
//ini_set("memory_limit","1024M");
//print_r($_FILES['photo']);
print_r($_POST);
//print_r($_POST['photo']);
	try {
    $conn = new PDO ( "sqlsrv:server = tcp:pvp6ee8yc7.database.windows.net,1433; Database = database", "vishwas", "HelloWorld12");
    $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
    }
   catch ( PDOException $e ) {
   print( "Error connecting to SQL Server." );
   die(print_r($e));
   }
class User {
    public $name = "";
    public $email  = "";
	 public $studentid= "";
	  public $department= "";
	public $imagepath;
	public $password;
}
 try 
	{
		//This is the directory where images will be saved 
        // $target = "userdata/"; 
        // $target = $target.basename($_FILES['photo']['name']); 
		 $c = uniqid (rand (),true);
		 $ext = pathinfo($_FILES['photo']['name']);
		 echo $ext;
		 $extn = $ext['extension'];
		 $c = $c .".".$extn;
		 if(move_uploaded_file($_FILES['photo']['tmp_name'],$c)) 
		 { 
		 //Tells you if its all ok 
		 echo "Image ". $_FILES['photo']['name']."has been uploaded to http://sroom.azurewebsites.net/".$c; 
		 } 
		 else { 
		 //Gives and error if its not 
		 echo "Sorry, there was a problem uploading your file."; 
		 echo "<br>".$_FILES['photo']['error'];
		 } 
		 $user = new User();
		 //echo $_FILES["photo"]["name"];
		  $user->name = $_POST["username"];
		  $user->email  = $_POST["email"];
		  $user->department  = $_POST["depatment"];
		  $user->studentid  = $_POST["studentid"];
		  $user->imagepath = $c;
		  $user->password=$_POST["password"];
		  $string=json_encode($user);
		  echo $string;
		  echo "<br>";
		  $insert = "INSERT into json(username,email,password,studentid,department) VALUES (?,?,?,?,?)";
		  $stmt=$conn->prepare($insert);
		  $stmt->bindValue(1,$string);
		  $stmt->bindValue(2,$user->username);
		  $stmt->execute();
		  echo "<br>inserted data";
		  //Writes the photo to the server 
		  
		  
		  $sql_select = "SELECT * FROM json where username=?";
    $stmt = $conn->query($sql_select);
    $registrants = $stmt->fetchAll(); 
    if(count($registrants) > 0) {
		 $tmp = json_decode($registrant1['photo']);
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
		
    }
    catch(Exception $e)
    {
        //die( mssql_POST_last_message());
		die(var_dump($e));
		if($e->getCode()==23000)//code for primary key 23000
		{
		echo "primary key voilation :(";
		}
    }
    ?>
</pre>