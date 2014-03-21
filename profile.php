<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>eZeefieds</title><style type="text/css">
      body {
        padding-top: 20px;
        padding-bottom: 40px;
      }

      /* Custom container */
      .container-narrow {
        margin: 0 auto;
        max-width: 900px;
      }
      .container-narrow > hr {
        margin: 30px 0;
      }
          </style>
</head>

<body><nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="navbar-inner ">
    <a class="brand" href="index.php">ezeefieds</a>
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="registration.html">Create Account</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html">Sign in</a></li>
        <li><a href="postcategorypage.html">Post ad</a></li>
      </ul>
    
  </div><!-- /.container-fluid -->
</nav>
<p>vbnnbbbbbbbbbnv</p>
<?php
//session_start();
    try {
          $conn = new PDO ( "sqlsrv:server = tcp:pocxo8zlbf.database.windows.net,1433; Database =classifieds", "sambaridly", "Butter@dosa112");      
            $conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
            if ($conn) {
                echo "success";
            }
    }
    
    catch(Exception $e){
        die(var_dump($e));
    }
	echo "progilre";
    if(!empty($_POST['email'])){
        $email=$_POST['email'];
        $password=$_POST['password'];
         $sql_select = "SELECT * FROM registration where email='$email'and password='$password'";
         $stmt = $conn->query($sql_select);
         $myprofile = $stmt->fetchAll();
         //$username=$stmt->fetch('username');
         if(count($myprofile)==1){
            echo "Logged user:"$username;
            $sql_select = "SELECT * FROM adposts where email='$email'";
                $stmt = $conn->query($sql_select);
                $adposts = $stmt->fetchAll(); 
                if(count($adposts) > 0) {
                    echo "<div class=container-narrow>";
                    echo "<div class=panel panel-default>";
                    echo "<div style=height:50px></div>";
                    echo "<legend>Ads posted</legend>";
                    echo "<table class='table table-bordered'>";
                    echo "<tr><th>Ad title</th>";
                    echo "<th>Description</th>";
                    echo "<th>Price</th>";
                    echo "<th>Seller's name</th>";
                    echo "<th>Phone no</th>";
                    echo "<th>Location</th></tr>";
                    foreach($adposts as $adpost) {
                        echo "<tr><td>".$adpost['adtitle']."</td>";
                        echo "<td>".$adpost['description']."</td>";
                        echo "<td>".$adpost['price']."</td>";
                        echo "<td>".$adpost['contact_name']."</td>";
                        echo "<td>".$adpost['phoneno']."</td>";
                        echo "<td>".$adpost['location']."</td></tr>";
                    }
                    echo "</table>";
                    echo "</div>";
                    echo "</div>";
                } else {
                    echo "<h3></h3>";
                }
            
         }

    }
?>
</body>
</html>