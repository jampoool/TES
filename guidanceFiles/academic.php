<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/guidancepanel.js"></script>
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.7.0.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.7/js/jquery.dataTables.min.js"></script>
    <link href= "https://cdn.datatables.net/1.13.7/css/jquery.dataTables.min.css" rel= "stylesheet">
    <link href= "academic.css" rel= "stylesheet">
    <title>Guidance - Academic Year</title>
</head>
<body>
    <div class="evaluation-form">
        <h2>Academic Year</h2>
        <span>Home / Manage Academic Year</span>
    </div>
    <div class="left">
        <button id="addAcademicYear">Add New Academic Year</button>
    </div>
    <div class="popup">
    <div class="close-btn">&times;</div>
        <div class="form">
          <form method="POST">
            <h2>Academic Year</h2>
            <div class="form-element">
                <input type="text" id="academicYear" placeholder="Academic Year" name="">
            </div>
            <div class="form-element">
                <input type="text" id="semester" placeholder="Semester" name="">
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
                    <th>Academic Year</th>
                    <th>Semester</th>
                    <th>System Default</th>
                    <th>Evaluation Status</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
              <tr>
                  <td>2023 - 2024</td>
                  <td>1st Semester</td>
                  <td>
                    <section>
                        <button class="showModal">No</button>
                        <span class="overlay"></span>
                    </section>
                  </td>
                  <td>Not yet started</td>
                  <td>
                    <a name="edit" id="editbtn" href="?edit=<?php echo $rows[''];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows[''];?>)">Delete</a>
                  </td>
              </tr>
            </tbody>
        </table>
    <script type="text/javascript" src="../scriptfiles/academic.js"></script>
  </div>
</body>
</html>