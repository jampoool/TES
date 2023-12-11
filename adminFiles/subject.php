<?php
include "../connect.php";
include "adminFunction.php";
session_start();
subjectFunction();
importSubjectRecords();
if (!isset($_SESSION['adminID'])) {
    header('Location: http://localhost/TES/adminFiles/adminlogin.php');
    exit();
}     
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
    <link href= "subject.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <title>Admin - Subject</title>
</head>
<body>
    <div class="subject">
        <h2>Subject</h2>
        <span>Home / Manage Subject</span>
    </div>
    <div class="left">
        <button id="addSubject">Add New Subject</button>
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">

            <h2>Subject</h2>
            <form method="POST" name="uploadCsv" enctype="multipart/form-data">
            <div class="form-element">
                <label for="firstname" class="choose">Choose CSV File</label>
                <input type="file" class="uploadfile" name="file" accept=".csv">
                <button type="submit" class="import" name="import">Import</button>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Subject ID" id="firstname" name="s_ID" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Subject Code" id="lastname" name="code" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Subject Name" id="lastname" name="name" required>
            </div>
            <div class="form-element">
                <button id="add-btn" name="addbtn">Add</button>
            </div>
            </form>
        </div>
    </div>
    <center>
        <div class="container">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Subject ID</th>
                        <th>Subject Code</th>
                        <th>Subject Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    get_subject_records();
                  ?>
            </table>
    <script type="text/javascript" src="../scriptfiles/subjectAdmin.js"></script>
</body>
</html>