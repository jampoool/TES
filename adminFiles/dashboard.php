<?php 
include "../connect.php";
include "adminFunction.php";
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
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css" integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <link href= "dashboard.css" rel= "stylesheet">
    <title>Admin - Dashboard</title>
</head>
    <body>
        <div class="dashboard">
            <h5>Dashboard</h5>
            <span>Home / Dashboard</span>
        </div>
    <div class="container">
        <div class="row">
            <div class="blue">
                    <div class="card bg-c-blue order-card">
                        <div class="card-block">
                            <span class="m-b-20">Total Admin</span>
                            <h2 class="text-right"><i class="fi fi-rr-user"></i><span>
                                <?php
                         $sql = "SELECT * from tbladmin";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                        </div>
                    </div>
                </div>
            <div class="blue">
                <div class="card bg-c-blue order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Guidance</span>
                        <h2 class="text-right"><i class="fi fi-rr-user"></i><span><?php
                         $sql = "SELECT * from tblguidancestaff";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>           
            <div class="green">
                <div class="card bg-c-green order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Teachers</span>
                        <h2 class="text-right"><i class="fi fi-rr-user"></i><span><?php
                         $sql = "SELECT * from tblteacher";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>           
            <div class="yellow">
                <div class="card bg-c-yellow order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Students</span>
                        <h2 class="text-right"><i class="fi fi-rr-user"></i><span><?php
                         $sql = "SELECT * from tblstudent";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="pink">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Class</span>
                        <h2 class="text-right"><i class="fi fi-rr-id-badge"></i><span><?php
                         $sql = "SELECT * from tblclass";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="pink">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Student in a Class</span>
                        <h2 class="text-right"><i class="fi fi-rr-users-alt"></i><span><?php
                         $sql = "SELECT * from tblstudentclasses";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>
            <div class="pink">
                <div class="card bg-c-pink order-card">
                    <div class="card-block">
                        <span class="m-b-20">Total Subjects</span>
                        <h2 class="text-right"><i class="fi fi-rr-document"></i><span><?php
                         $sql = "SELECT * from tblsubject";
                         if ($result = mysqli_query($con, $sql)) {
                         
                            // Return the number of rows in result set
                            $rowcount = mysqli_num_rows( $result );
                            
                            // Display result
                            printf(" %d\n", $rowcount);
                         }
                            ?></span></h2>
                    </div>
                </div>
            </div>
        </div>
    </body>
</html>