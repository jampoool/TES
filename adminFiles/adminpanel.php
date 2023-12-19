<?php
include "../connect.php";
session_start();
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
    <title>TES - Admin Panel</title>

    <!-- External Stylesheets -->
    <link href="https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css" rel="stylesheet">
    <link href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-straight/css/uicons-solid-straight.css" rel="stylesheet">
    <link href="https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css" rel="stylesheet">
    <link href="https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css" rel="stylesheet">
    <link href="https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-straight/css/uicons-bold-straight.css" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css" integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- External Scripts -->
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>

    <!-- Internal Stylesheet -->
    <link href="adminpanel.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
    <div class="logo"></div>
        <ul class="menu">
            <li>
                <a href="#">
                    <i class="fi fi-rs-dashboard"></i>
                    <span onclick="dashboardFunction()">Dashboard</span>
                </a>
            </li>
            <li>
            <a href="#">
                <i class="fi fi-ss-users-alt"></i>
                <span onclick="adminFunction()">Manage Admin</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-sr-users-alt"></i>
                <span onclick="guidanceFunction()">Manage Guidance Staff</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-br-users-alt"></i>
                <span onclick="teacherFunction()">Manage Teacher</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-bs-users-alt"></i>
                <span onclick="studentFunction()">Manage Student</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-br-document"></i>
                <span onclick="subjectFunction()" >Manage Subject</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-br-file-invoice"></i>
                <span onclick="classFunction()">Manage Class</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-br-address-book"></i>
                <span onclick="student_classFunction()">Manage Student Class</span>
            </a>
        </li>
        <li class="logout">
            <a href="logout.php">
                <i class="fi fi-br-exit"></i>
                <span>Log out</span>
            </a>
        </li>
        </ul>
    </div>
    
    <div class="header-output">
        <div class="header">
            <div class="header-title">
                <h4>Teacher Evaluation System</h4>
            </div>
            <?php 
                 $sqlquery = mysqli_query($con, "SELECT * FROM tbladmin");
                 $rows = mysqli_fetch_array($sqlquery)
              ?>
            <div class="dropdown">
               
                <button class="dropbtn" value="<?php echo $rows['username'];?>">Administrator</button>
               
                <div class="dropdown-content">
                    <a href="#">Account Settings</a>
                </div>
            </div>
    
        </div>
        <div class="output">
            <iframe id="myframe" src="../adminFiles/dashboard.php"></iframe>
        </div>
    </div>
</body>
</html>
