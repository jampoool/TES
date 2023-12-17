<?php   
session_start();
session_destroy(); 
header("location: http://localhost/TES/studentFiles/studentLogin.php"); 
exit();
?>