<?php 
    include "../connect.php";
    include "adminFunction.php";
    session_start();
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Check if the form fields are set and not empty
        if (
            isset($_POST['guidanceID']) &&
            isset($_POST['firstname']) &&
            isset($_POST['lastname']) &&
            isset($_POST['username']) &&
            isset($_POST['password'])
        ) {
            $adminId = $_SESSION['adminID'];
    
            $guidanceID = $_POST['guidanceID'];
            $firstname = $_POST['firstname'];
            $lastname = $_POST['lastname'];
            $email = $_POST['username'];
            $pass = $_POST['password'];
    
            // Additional validation or processing can be done here
    
            $sql = "INSERT INTO tblguidancestaff (guidance_ID, adminID, G_fname, G_lname, G_emailAdd, G_password, status, date_created, date_updated)
                    VALUES ('$guidanceID', '$adminId', '$firstname', '$lastname', '$email', '$pass', '0', current_timestamp(), NULL);";
    
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
    
    guidanceFunction();
    importGuidanceRecords();
    if (!isset($_SESSION['adminID'])) {
        header('Location: http://localhost/TES/adminFiles/adminlogin.php');
        exit();
    }     
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <  <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link href="guidance.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    
    <script type="text/javascript" src="../scriptfiles/guidanceAdmin.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    
    <title>Admin - Guidance</title>
</head>
<body>
    <div class="guidance">
        <h2>Guidance Staff</h2>
        <span>Home / Manage Guidance</span>
    </div>
    <div class="left">
        <button id="addGuidance">Add New Guidance</button>
    </div>
    <div class="popup animate-zoom">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Guidance Staff</h2>
            <form method="POST" name="uploadCsv" enctype="multipart/form-data">
                <div class="form-element">
                    <label for="csvfile" class="choose">Choose CSV File</label>
                    <br>
                    <input type="file" class="uploadfile" name="file" accept=".csv">
                    <button type="submit" class="import" name="import">Import</button>
                </div>
                <div class="form-element" id="form-element">
                    <input type="text" placeholder="Guidance ID" id="guidanceID" name="g_ID" >
                </div>
                <div class="form-element" id="form-element">
                    <input type="text" placeholder="First Name" id="firstname" name="fname" >
                </div>
                <div class="form-element" id="form-element">
                    <input type="text" placeholder="Last Name" id="lastname" name="lname" >
                </div>
                <div class="form-element" id="form-element">
                    <input type="text" placeholder="Email Address" id="username" name="email" >
                </div>
                <div class="form-element" id="form-element">
                    <input type="password" placeholder="Password" id="password" name="pass" >
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
                    <th>Guidance ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email Address</th>
                    <th>Password</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
        <?php
            get_Guidance_Records();
        ?>
        </table>
</body>
</form>
</html>