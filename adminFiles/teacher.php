<?php 
include "connect.php";
include "adminFunction.php";
session_start();
teacherFunction();
importTeacherRecords();

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "teacher.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Admin - Teacher</title>
</head>
<body>
    <div class="teacher">
        <h2>Teacher</h2>
        <span>Home / Manage Teacher</span>
    </div>
    <div class="left">
        <button id="addTeacher">Add New Teacher</button>
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form" >
        <h2>Teacher</h2>
        <form method="POST" name="uploadCsv" enctype="multipart/form-data">
            <div class="form-element">
                <label for="firstname" class="choose">Choose CSV File</label>
                <input type="file" class="uploadfile" name="file" accept=".csv">
                <button type="submit" class="import" name="import">Import</button>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Teacher ID" id="teacherID" name="t_ID" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="First Name" id="firstname" name="fname" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Last Name" id="lastname" name="lname" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Email Address" id="email" name="emailAdd" required>
            </div>
            <div class="form-element">
                <input type="password" placeholder="Password" id="password" name="pass">
            </div>
            <div class="form-element">
                <button id="add-btn" name="addbtn">Add</button>
            </div>
        </form>
        </div>
        </div>
        </form>
    <center>
        <div class="container">
        <table id="example" class="display" style="width:100%">
            <thead>
                <tr>
                    <th>Teacher ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
            <?php
             get_teacher_Records();
            ?>
        </table>
    </div>
    <script type="text/javascript" src="../scriptfiles/teacherAdmin.js"></script>
</body>
</html>