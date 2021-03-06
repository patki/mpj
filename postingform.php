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


    if(!empty($_POST['choosen_category'])&&!empty($_POST['adtitle'])&&!empty($_POST['contact_name'])&&!empty($_POST['phoneno'])) {
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
        $timedate = date("Y-m-d H:i:s");
		  
        // Insert data

        $sql_insert = "INSERT INTO adposts (choosen_category,adtitle,topic_category,description,price,contact_name,email,phoneno,location,timedate) 
                   VALUES (?,?,?,?,?,?,?,?,?,?)";
        $stmt = $conn->prepare($sql_insert);
        $stmt->bindValue(1, $choosen_category);
        $stmt->bindValue(2, $adtitle);
		$stmt->bindValue(3, $topic_category);
		$stmt->bindValue(4, $description);
		$stmt->bindValue(5, $price);
        $stmt->bindValue(6, $contact_name);
        $stmt->bindValue(7, $email);
        $stmt->bindValue(8, $phoneno);
        $stmt->bindValue(9, $location);
        $stmt->bindValue(10,$timedate);
        $stmt->execute();
       }
        catch(Exception $e) {
        die(var_dump($e));
    }
    echo "<h3>Your ad posted successfully!</h3>";
    }
 
  
?>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<link href="css/bootstrap.css" rel="stylesheet" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>ezeefieds</title>
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
    </style>
<script type="text/javascript" src="js/cookies.js"></script>
</head>

<body><nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="navbar-inner ">
    <a class="brand" href="index.php">ezeefieds</a>
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
        <li><a href="postcategorypage.html">Post ad</a></li>
       <li></li>
        <li></li>
        <li><a href="index.php">Browse ad's</a></li> 
        
      </ul>
      
      <ul class="nav navbar-nav pull-right">
          
        <li><a href="profile.php"><?php 
        if($_COOKIE['username']!=NULL)
        {echo $_COOKIE['username'];}
        else{ echo "Hi,Guest";} ?></a></li>
         <li><a href="logout.php?id=logout">Logout</a></li>
      </ul>
    
  </div>
</nav>
<div class="container-fluid container-narrow">

<div class="row" style="height:60px">
</div>
<div class="">
<legend class="lead"><b>Post a free Ad-Select a Category!!</b></legend>
<form class="form-horizontal" method="post" action="postingform.php" enctype="multipart/form-data">
   <div class="control-group">
   <label class="control-label" for="inputEmail">Choosen category</label>
     <div class="controls">
      <input type="text" id="inputEmail" placeholder="" value="<?php echo $_GET['id'];?>" name="choosen_category">
      
    </div>
  </div>
  <div class="control-group">
<label class="control-label" for="inputEmail">Ad title</label>
    <div class="controls">
      <input type="text" id="inputEmail" placeholder="" name="adtitle">
    </div>
  </div>
  <div class="control-group">
    <label class="control-label" for="inputEmail">Type</label>
    <div class="controls">
       <select class="span3" name="topic_category">
          <option value="0">Select your type</option>
          <option value="1">Travel</option>
          <option value="2">Home</option>
          <option value="3">Management</option>
          <option value="4">Education</option>
        </select>
    </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="inputEmail">Description of your Ad</label>
    <div class="controls">
      <textarea rows="4" cols="50" maxlength="150" name="description" style="width:400px;resize:none">
    </textarea>
  </div>
</div>
  <div class="control-group">
<label class="control-label" for="inputEmail">Price in Rs</label>
    <div class="controls">
      <input type="number" id="inputEmail" placeholder="" name="price">
      <input type="checkbox" id="inputEmail" value="free" name="price" > Free
    </div>
  </div>
<p></p>


<?php  
if($_COOKIE['username']==NULL){
?>
<legend><b>Seller Information</b></legend>
        <div class="control-group">
           <label class="control-label" for="inputEmail">Contact name*</label>
             <div class="controls">
              <input type="text" id="inputEmail" placeholder="" name="contact_name" required>
            </div>
        </div>
        <div class="control-group">
           <label class="control-label" for="inputEmail">Email*</label>
            <div class="controls">
              <input type="email" id="inputEmail" placeholder="" name="email" required>
            </div>
        </div>
 
      <div class="control-group">
        <label class="control-label" for="inputEmail">Phone No*</label>
        <div class="controls">
          <input type="text" id="inputPassword" placeholder="" name="phoneno" required>
        </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="inputEmail">Location*</label>
    <div class="controls">
      <select class="span3" name="location" required>
        <option value="select your Location">select your Location</option>
        <option value="Andaman and Nicobar Islands">Andaman and Nicobar Islands</option>
        <option value="Andhra Pradesh">Andhra Pradesh</option>
        <option value="Arunachal Pradesh">Arunachal Pradesh</option>
        <option value="Assam">Assam</option>
        <option value="Bihar">Bihar</option>
        <option value="Chandigarh">Chandigarh</option>
        <option value="Chhattisgarh">Chhattisgarh</option>
        <option value="Dadra and Nagar Haveli">Dadra and Nagar Haveli</option>
        <option value="Daman and Diu">Daman and Diu</option>
        <option value="Delhi">Delhi</option>
        <option value="Goa">Goa</option>
        <option value="Gujarat">Gujarat</option>
        <option value="Haryana">Haryana</option>
        <option value="Himachal Pradesh">Himachal Pradesh</option>
        <option value="Jammu and Kashmir">Jammu and Kashmir</option>
        <option value="Jharkhand">Jharkhand</option>
        <option value="Karnataka">Karnataka</option>
        <option value="Kerala">Kerala</option>
        <option value="Lakshadweep">Lakshadweep</option>
        <option value="Madhya Pradesh">Madhya Pradesh</option>
        <option value="Maharashtra">Maharashtra</option>
        <option value="Manipur">Manipur</option>
        <option value="Meghalaya">Meghalaya</option>
        <option value="Mizoram">Mizoram</option>
        <option value="Nagaland">Nagaland</option>
        <option value="Orissa">Orissa</option>
        <option value="Pondicherry">Pondicherry</option>
        <option value="Punjab">Punjab</option>
        <option value="Rajasthan">Rajasthan</option>
        <option value="Sikkim">Sikkim</option>
        <option value="Tamil Nadu">Tamil Nadu</option>
        <option value="Tripura">Tripura</option>
        <option value="Uttaranchal">Uttaranchal</option>
        <option value="Uttar Pradesh">Uttar Pradesh</option>
        <option value="West Bengal">West Bengal</option>
      </select>
    </div>
  </div>
<?php 
}
else{
    $cookie=$_COOKIE['username'];
    $sql_select = "SELECT * FROM registration where email='$cookie'";
    $stmt = $conn->query($sql_select);
    $adposts = $stmt->fetchAll();
    foreach ($adposts as $adpost) {
?>
<legend><b>Seller Information</b></legend>
<div class="control-group">
   <label class="control-label" for="inputEmail">Contact name*</label>
     <div class="controls">
      <input type="text" id="inputEmail" placeholder="" name="contact_name" value="<?php echo $adpost['username']?>" required>
    </div>
  </div>
  <div class="control-group">
<label class="control-label" for="inputEmail">Email*</label>
    <div class="controls">
      <input type="email" id="inputEmail" placeholder="" name="email" value="<?php echo $adpost['email']?>"required>
    </div>
  </div>
 
  <div class="control-group">
    <label class="control-label" for="inputEmail">Phone No*</label>
    <div class="controls">
      <input type="text" id="inputPassword" placeholder="" name="phoneno" value="<?php echo $adpost['phoneno']?>"required>
    </div>
  </div>
  <div class="control-group">
   <label class="control-label" for="inputEmail">Location*</label>
    <div class="controls">
      <input type="text" name="location" value="<?php echo $adpost['location']?>" required>
    
    </div>
  </div>
<?php 
 
 }
}
?> 

  <div class="control-group">
    <div class="controls; offset2">
      <button type="submit" class="btn  btn-success">Submit</button>
    </div>
  </div>
</form>
</div>
</div>
</body>
</html>
