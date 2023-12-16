<?php
    include "../connect.php";
    include "adminFunction.php";
    session_start();
    crudStudentClasses();
    if (!isset($_SESSION['adminID'])) {
        header('Location: http://localhost/TES/adminFiles/adminlogin.php');
        exit();
    }     
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "student-class.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <title>Admin - Student Class</title>
</head>
<body>
    <div class="student-class">
        <h2>Student Class</h2>
        <span>Home / Manage Student Class</span>
    </div>
    <div class="left">
        <button id="addStudentClass">Add New Student Class</button>
    </div>
    <?php myStudentClassesFunction(); ?>
    <center>
        <div class="container">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Class Code</th>
                        <th>Class Name</th>
                        <th>Student Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                   <?php get_studentClass_Records(); ?>
            </table>
    <script type="text/javascript" src="../scriptFiles/studentClasses.js"></script>
</body>
</html>