<?php   
session_start();
session_destroy(); 
header("location: http://localhost/TES/adminFiles/adminlogin.php"); 
exit();
?>