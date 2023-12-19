<?php
include "../connect.php";
include "adminFunction.php";
session_start();

if (!isset($_SESSION['adminID'])) {
    header('Location: http://localhost/TES/adminFiles/adminlogin.php');
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (
        isset($_POST['adminID']) &&
        isset($_POST['username']) &&
        isset($_POST['password'])
    ) {
        $adminID = $_POST['adminID'];
        $username = $_POST['username'];
        $password = $_POST['password'];

        // Additional validation or processing can be done here

        $sql = "INSERT INTO tbladmin (adminID, username, adminpassword, status, date_created, date_updated)
                VALUES ('$adminID', '$username', '$password', '0', current_timestamp(), NULL);";

        if (mysqli_query($con, $sql)) {
            // Form submission was successful
            error_log('Data inserted successfully');
            echo 'success';
        } else {
            // Form submission failed
            error_log('Error inserting data: ' . mysqli_error($con));
            echo 'error';
        }
    } else {
        // Handle case where not all required data is received
        echo 'error';
    }
}
adminFunction();
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
 
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "admin.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/autofill/2.6.0/css/autoFill.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../scriptfiles/admin.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
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
                <input type="text" id="adminID" placeholder="Admin ID" name="adminID">
            </div>
            <div class="form-element">
                <input type="text" id="username" placeholder="Username" name="username">
            </div>
            <div class="form-element">
                <input type="password" id="password" placeholder="Password" name="password">
            </div>
            <div class="form-element">
                <input type="submit" id="add-btn" name="addbtn" value="Add">
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
</body>
</html>