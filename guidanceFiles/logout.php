<?php   
session_start();
session_destroy(); 
header("location: http://localhost/TES/guidanceFiles/index.php"); 
exit();
?>