<?php 
    include "connect.php";
    include "adminFunction.php";
    session_start();
    adminFunction();

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "admin.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.dataTables.min.css" rel="stylesheet">
    <title>TES - Manage Admin</title>
</head>
<body>
    <div class="admin">
        <h2>Admin</h2>
        <span>Home / Manage Admin</span>
    </div>
    <div class="left">
        <button id="addAdmin">Add New Admin</button>
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <form method="POST">
            <h2>Admin</h2>
            <div class="form-element">
                <input type="text" id="adminID" placeholder="Admin ID" name="adminID" required>
            </div>
            <div class="form-element">
                <input type="text" id="username" placeholder="Username" name="username" required>
            </div>
            <div class="form-element">
                <input type="password" id="password" placeholder="Password" name="password" required>
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
                        <th>Admin ID</th>
                        <th>Username</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
            <?php
                get_Admin_Records();
            ?>
            </table>
    <script type="text/javascript" src="../scriptfiles/admin.js"></script>
</body>
</html>