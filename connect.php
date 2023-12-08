<?php
    $server = "localhost";
    $username = "root";
    $password = "";
    $database = "teacheval_db";

    $con = new mysqli($server,$username,$password,$database);
		if ($con->connect_error) {
		//echo "not connected" ;
		}
		else{
		//echo "CONNECTED <br>";
		}
?>