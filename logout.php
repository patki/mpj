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

<script type="text/javascript" src="js/cookies.js"></script>
<script>
var username="";
var password="";


function login()
{
  username=document.getElementById('email').value;
  setCookie("username",username,1); 
}
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
    
  </div>
</nav>
<div class="container">
<div class="row" style="height:50px">
</div>
<div class="">
<legend>Sign in to your Account !!</legend>
<form class="form-horizontal" method="post" action="profile.php" enctype="multipart/form-data">
  <div class="control-group">
    <label class="control-label" for="inputEmail">Email</label>
    <div class="controls">
      <input type="email" id="email" placeholder="Email-id" name="email" required>
    </div>
  </div>
   <div class="control-group">
    <label class="control-label" for="inputPassword">Password</label>
    <div class="controls">
      <input type="password" id="password" placeholder="Password" name="password" required>
    </div>
  </div>
  <div class="control-group">
    <div class="controls">
      <button type="submit" class="btn" onClick="login();">Sign in</button>
    </div>
  </div>
 
</form>

</div>
</div>
</body>
</html>
<?php
//include 'login.html';
// set the expiration date to one hour ago
setcookie("username", "", time()-3600);
?>