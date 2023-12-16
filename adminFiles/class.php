<?php 
    include "../connect.php";
    include "adminFunction.php";
    session_start();
    insertClassRecord();
    if (!isset($_SESSION['adminID'])) {
        header('Location: http://localhost/TES/adminFiles/adminlogin.php');
        exit();
    }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <link href= "class.css" rel= "stylesheet">
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
   
    <title>Admin - Class</title>
</head>
<body>
    <div class="dashboard">
        <h2>Class</h2>
        <span>Home / Manage Class</span>
    </div>
    <div class="left">
                  <button id="addClass">Add New Class</button>
    </div>
    <?php
        myClassFunction();
    ?>
    <center>
    <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Class ID</th>
                    <th>Class Code</th>
                    <th>Class Name</th>
                    <th>Teacher Name</th>
                    <th>Subject Name</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        <?php
            get_class_Records();
        ?>
        </table>
    <script type="text/javascript" src="../scriptfiles/classAdmin.js"></script>
   
</body>
</html>