
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

      /* Main marketing message and sign up button */
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

      /* Supporting marketing content */
      .marketing {
        margin: 60px 0;
      }
      .marketing p + h4 {
        margin-top: 28px;
      }
      body{
       /* border:5px solid;*/
      }
    </style>
    <script type="text/javascript" src="js/cookies.js"></script>
<script>
var loggeduser=getCookie("username");
</script>
  </head>

<body>
  <nav class="navbar navbar-default navbar-fixed-top" role="navigation">
  <div class="navbar-inner ">
    <a class="brand" href="index.php">ezeefieds</a>
      <ul class="nav navbar-nav">
        <li class=""><a href="index.php">Home</a></li>
      </ul>
      
      <ul class="nav navbar-nav navbar-right">
       <li><a href="postcategorypage.html">Post ad</a></li>
       <li><a href="index.php">Browse ad's</a></li>
      </ul>
        <ul class="nav navbar-nav navbar-right">
        <!--<input type="hidden" value="//<?php //echo $category=$_GET[id];?>">-->
        <li><a href="/search.php?mid=mostrecent">Most Recent</a></li>
        <li><a href="/search.php?mid=low_to_high">Price:Low to high</a></li>
        <li><a href="/search.php?mid=high_to_low">Price:High to low</a></li>
        </ul>
        <ul class="nav navbar-nav navbar-right">      
        <li><a href="profile.php"><?php echo $_COOKIE['username']?></a></li>
        </ul>
    
   </div><!-- /.container-fluid -->
  </nav>
<div class="container-narrow">
<div style="height:100px"></div>
<div class="tabbable tabs-left">
    <ul id="tabs" class="nav nav-tabs" data-tabs="tabs">
        <li class="active"><a href="#personal" data-toggle="tab">Personal info</a></li>
        <li><a href="#professional" data-toggle="tab">Ad's posted</a></li>
        <li><a href="#address" data-toggle="tab">Address</a></li>
        <li><a href="#contact" data-toggle="tab">Contact</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane active" id="personal">
            <h1 style="color:#330066">about me</h1>
            <p style="color:#603" id="name"></p>
            <p id="age" style="color:#603"></p>
            <p id="gender" style="color:#603"></p>
            <p id="status" style="color:#603"></p>
        </div>
        <div class="tab-pane" id="professional">
            <h1 style="color:#330066">what I do</h1>
            <p id="company" style="color:#603"></p>
         <p id="as" style="color:#603"></p>
          <p id="college" style="color:#603"></p>
           <p id="school" style="color:#603"></p>
        </div>
        <div class="tab-pane" id="address">
           <h1 style="color:#330066">I live at</h1>
           <p id="homeadd" style="color:#603"></p>
           <p id="office" style="color:#603"></p>
        </div>
        <div class="tab-pane" id="contact">
            <h1 style="color:#330066">reach me @</h1>
           <p id="pphone" style="color:#603"></p>
         <p id="ophone" style="color:#603"></p>
         <p id="rphone" style="color:#603"></p>
         <p id="pemail" style="color:#603"></p>
         <p id="profemail" style="color:#603"></p>
        </div>
    </div>
    </div>
</div>
</div>
</div>

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
	
     $cookieid=$_COOKIE['username'];
                $sql_select = "SELECT * FROM adposts where email='$cookieid'";
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
                }
                else{
                    echo "<div style=height:50px></div>";
                    echo "<legend>There are no ads posted by you</legend>";
                } 
            
?>