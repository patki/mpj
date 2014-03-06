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
    //
    if(!empty($_POST['choosen_category']&&$_POST['adtitle']&&$_POST['contact_name']&&$_POST['phoneno']) {
    try {
        $choosen_category = $_POST['choosen_category'];
        $adtitle = $_POST['adtitle'];
        $topic_category = $_POST['topic_category'];
		$description = $_POST['description'];
		$price = $_POST['price'];
        $contact_name = $_POST['contact_name'];
        $email = $_POST['email'];
        $phoneno = $_POST['phoneno'];
        $location = $_POST['location'];
		  
        // Insert data

        $sql_insert = "INSERT INTO adposts (choosen_category,adtitle,photo,topic_category,description,price,contact_name,email,phoneno,location) 
                   VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $choosen_category);
        $stmt->bindValue(2, $adtitle);
        $stmt->bindValue(3, $photo);
		$stmt->bindValue(4, $topic_category);
		$stmt->bindValue(5, $description);
		$stmt->bindValue(6, $price);
        $stmt->bindValue(7, $contact_name);
        $stmt->bindValue(8, $password);
        $stmt->bindValue(9, $phoneno);
        $stmt->bindValue(10, $location);
        $stmt->execute();
       }
        catch(Exception $e) {
        die(var_dump($e));
    }
    echo "<h3>Your ad posted successfully!</h3>";
    }
 
  
?>