<?php 
    include "connect.php";
    include "adminFunction.php";
    session_start();
    guidanceFunction();
    importGuidanceRecords();
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/adminpanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "guidance.css" rel= "stylesheet">
    <link href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel="stylesheet">
    
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
    <script type="text/javascript" src="../scriptfiles/guidanceAdmin.js"></script>
</body>
</form>
</html>