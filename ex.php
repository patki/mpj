<?php 
echo "edanna rave ne amma \n";
var_dump($_COOKIE);
try
{
echo "\nhere 1 ..cookie: "+$_COOKIE['username'];
if($_COOKIE['username']==NULL){
  echo "user not logged in\n";
  echo "i am ending ...\n";
}
else {
  echo "user logged in \n";
  $cookie=$_COOKIE['username'];
  include "test.php";
  /*   <!--<div class=control-group>
     <label class=control-label for=inputEmail>Contact name*</label>
       <div class=controls>
        <input type=text id=inputEmail placeholder='' name=contact_name value='"+$adpost['username']+"' required>
      </div>
    </div>
    <div class=control-group>
    <label class=control-label for=inputEmail>Email*</label>
      <div class=controls>
        <input type=email id=inputEmail placeholder='' name=email value='"+$adpost['email']+"' required>
      </div>
    </div>
 
    <div class=control-group>
      <label class=control-label for=inputEmail>Phone No*</label>
      <div class=controls>
        <input type=text id=inputPassword placeholder='' value='"+$adpost['phoneno']+"' name=phoneno required>
      </div>
    </div>
    <div class=control-group>
     <label class=control-label for=inputEmail>Location*</label>
      <div class=controls>
         <input  type=text   name= location value='"+$adpost['location']+"' required>
          
      </div>
    </div>";*/
  }
}

}
catch(exception $e) 
{
  die($e);
}


?>
