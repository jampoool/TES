<?php 
include "../connect.php";
include "adminFunction.php";
session_start();
studentFunction();     
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Check if the form fields are set and not empty
    if (
        isset($_POST['studentID']) &&
        isset($_POST['firstname']) &&
        isset($_POST['lastname']) &&
        isset($_POST['email']) &&
        isset($_POST['password'])
    ) {
        if (!isset($_SESSION['adminID'])) {
            echo 'error';
            exit();
        }

        $adminId = $_SESSION['adminID'];
        $studentID = $_POST['studentID'];
        $studentFn = $_POST['firstname'];
        $studentLn = $_POST['lastname'];
        $studentEmail = $_POST['email'];
        $pass = $_POST['password'];

        // Additional validation or processing can be done here

        $sql = "INSERT INTO tblstudent (studentID, adminID, stud_fname, stud_lname, stud_emailAdd, password, status, date_created, date_updated)
                VALUES ('$studentID', '$adminId', '$studentFn', '$studentLn', '$studentEmail', '$pass', '0', current_timestamp(), NULL);";

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
importStudentRecords(); 
if (!isset($_SESSION['adminID'])) {
    header('Location: http://localhost/TES/adminFiles/adminlogin.php');
    exit();
}     
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Student</title>
    <link href="student.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    
    <script type="text/javascript" src="../scriptfiles/studentAdmin.js"></script>
</head>

</head>
<body>
    <div class="student">
        <h2>Student</h2>
        <span>Home / Manage Student</span>
    </div>
    <div class="left">
        <button id="addStudent">Add New Student</button>
    </div>
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Student</h2>
            <form method="POST" name="uploadCsv" enctype="multipart/form-data">
            <div class="form-element">
                <label for="firstname" class="choose">Choose CSV File</label>
                <input type="file" class="uploadfile" name="file" accept=".csv">
                <button type="submit" class="import" name="import">Import</button>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Student ID" id="studentID" name="stud_ID" >
            </div>
            <div class="form-element">
                <input type="text" placeholder="First Name" id="firstname" name="fname" >
            </div>
            <div class="form-element">
                <input type="text" placeholder="Last Name" id="lastname" name="lname" >
            </div>
            <div class="form-element">
                <input type="text" placeholder="Email Address" id="email" name="emailAdd" >
            </div>
            <div class="form-element">
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
                        <th>Student ID</th>
                        <th>First Name</th>
                        <th>Last Name</th>
                        <th>Email Address</th>
                        <th>Password</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                <?php 
                    get_student_Records();
                ?>
            </table>
</body>
</html>