<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Classifieds</title>
 <style type="text/css">
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

      /* Main marketing message and sign up button 
      .jumbotron {
        margin: 60px 0;
        text-align: center;
      }
      .jumbotron h1 {
        font-size: 72px;
        line-height: 1;
      }
      .jumbotron .btn {
        font-size: 21px;
        padding: 14px 24px;
      }

       Supporting marketing content 
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }*/
    </style>
</head>

<body>
<div class="container-narrow">
<div class="navbar navbar-inverse">
  <div class="navbar-inner ">
    <a class="brand" href="default.html">eZeefieds</a>
      <ul class="nav navbar-nav">
        <li class=""><a href="default.html">Home</a></li>
        <li><a href="registration.html">Create Account</a></li>
        
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
        <li><a href="login.html">Sign in</a></li>
        <li><a href="postcategorypage.html">Post ad</a></li>
      </ul>
    
  </div><!-- /.container-fluid -->
</div>
<div class="row" style="height:50px">
</div>
<div class="">
<legend>Sign in to your Account !!</legend>
<form class="form-horizontal" method="post" action="uploadimage.php" enctype="multipart/form-data">
  <div class="control-group">
    <label class="control-label" for="inputEmail">username</label>
    <div class="controls">
     <input type="file" name="image" accept="image/*">
  <input type="submit">
    </div>
  </div>
</form>

</div>
</div>
</body>
</html>


<?php
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
$image=$_POST['image'];
 $sql_insert = "INSERT INTO images (image) 
                   VALUES (?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $image);
         $stmt->execute();
       




?>