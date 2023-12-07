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
    <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Student Class</h2>
            <form method="POST" name="uploadCsv" enctype="multipart/form-data">
            <div class="form-element">
                <label for="file" class="choose">Choose CSV File</label>
                <input type="file" class="uploadfile" name="file" accept=".csv">
                <button type="submit" class="import" name="import">Import</button>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Admin ID" id="admin-id" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Student ID" id="student-id" required>
            </div>
            <div class="form-element">
                <input type="text" placeholder="Class ID" id="class-id" required>
            </div>
            <div class="form-element">
                <button id="add-btn">Add</button>
            </div>
        </div>
    </div>
    <center>
        <div class="container">
            <table id="example" class="display" style="width:100%">
                <thead>
                    <tr>
                        <th>Class ID</th>
                        <th>Class Code</th>
                        <th>Class Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Tiger Nixon</td>
                        <td>Edinburgh</td>
                        <td>2011-04-25</td>
                        <td> <a id="editbtn" href="?edit=<?php echo $rows[0]; ?>">Edit</a>
                            <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a> 
                        </td>
                    </tr>
            </table>
    <script>
        document.querySelector("#addStudentClass").addEventListener("click", function(){
            document.querySelector(".popup").classList.add("active");
        });
        document.querySelector(".popup .close-btn").addEventListener("click", function(){
            document.querySelector(".popup").classList.remove("active");
        });
        document.querySelector(".popup #add-btn").addEventListener("click", function(){
            document.querySelector(".popup").classList.remove("active");
        });
        new DataTable('#example');
    </script>
</body>
</html>