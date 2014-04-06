<?php
include 'login.html';
// set the expiration date to one hour ago
setcookie("username", "", time()-3600);
?>