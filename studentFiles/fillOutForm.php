<?php
include "../connect.php";
session_start();

// Validate and sanitize user inputs
function sanitizeInput($input) {
    return htmlspecialchars(trim($input));
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ensure that the request method is POST and the submit button is set
    $studentID = $_SESSION['studentID'];
    $classID = isset($_GET['classID']) ? sanitizeInput($_GET['classID']) : null;
           

    if (isset($_POST['addBtn'])) {
        if ($classID !== null && isset($_POST['rating']) && is_array($_POST['rating'])) {
            $ratings = $_POST['rating'];

            foreach ($ratings as $questionID => $rating) {
                // Insert the rating into the database using prepared statement
                $insertQuery = $con->prepare("INSERT INTO tblevaluationform (studentID, questionID, rate, classID, academicID) VALUES (?, ?, ?, ?, '1')");
                $insertQuery->bind_param("iiii", $studentID, $questionID, $rating, $classID);

                if ($insertQuery->execute()) {
                    
                } else {
                    // Error in the query
                    echo "Error: " . $insertQuery->error;
                }

                $insertQuery->close(); // Close the prepared statement
            }
        } else {
            echo 'Error: Invalid class ID or no ratings data received.';
        }
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css" integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script type="text/javascript" src="../scriptfiles/studentPanel.js"></script>
    <link href= "fillOutForm.css" rel= "stylesheet">
    <title>Student - Dashboard</title>
</head>
<body>
  
    <div class="title">
        <h4>Evaluation Form</h4>
        <span>Home / Fill Out Evaluation Form</span>
    </div>
    <?php

            if (isset($_SESSION['classID'])) {
                $classIDs = $_SESSION['classID'];
                

                $sql = "SELECT DISTINCT t.teacher_ID, t.T_fname, t.T_lname
                        FROM tblclass c
                        JOIN tblteacher t ON t.teacher_ID = c.teachID
                        JOIN tblstudentclasses sc ON c.classID = sc.classID
                        WHERE sc.classID = $classIDs;";

                $result = $con->query($sql);

                if ($result->num_rows > 0) {
                    ?>
                    <div class="select-teacher">
                        <label for="teacher">Select Teacher:</label>
                        <select name="teacher" id="teacher">
                            <option value="" disabled selected>Select Teacher</option>
                            <?php
                            while ($row = $result->fetch_assoc()) {
                                ?>
                                <option value="<?php echo $row['teacher_ID'] ?>"><?php echo $row['T_fname'].' '.$row['T_lname'] ?></option>
                                <?php
                            }
                            ?>
                        </select>
                    </div>
                    <?php
                } else {
                    // No teachers found for the given classIDs
                    echo "No teachers found for this class.";
                }
            } else {
                // Handle the case when classIDs are not set in the session
                echo "Class IDs not found in the session.";
            }
            ?>

        </select>
    </div>
    

    <div class="list" id="class-list">
    
    </div>

    <div class="evaluation-form">
        <h3>Evaluation Form</h3>
        <div class="teacherinfo">
            <label  class="text-left"><b>Faculty: </b><span id="faculty"></span></label><br>
            <label class="text-left"><b>Class:</b> <span id="class"></span></label><br>
            <label  class="text-left"><b>Academic Year:</b> <span id="academicYear"></span></label><br>
            <label  class="text-left"><b>Subject:</b> <span id="subject"></span></label>
        </div>
        <form method="POST">
            <fieldset>
                <legend>Rating Legend:</legend>
                <label >1 = Strongly Disagree</label>
                <label >2 = Disagree</label>
                <label >3 = Uncertain</label>
                <label >4 = Agree</label>
                <label >5 = Strongly Agree</label>
            </fieldset>

            <table>
                <?php
                $query = "SELECT
                            tblcategory.categoryName,
                            tblquestion.questionID,
                            tblquestion.description
                        FROM
                            tblquestion
                        INNER JOIN tblcategory ON tblcategory.categoryID = tblquestion.categoryID";
                $sqlquery = mysqli_query($con, $query);

                $currentCategory = null; // Track the current category

                while ($rows = mysqli_fetch_array($sqlquery)) {
                    $category = $rows['categoryName'];
                    $questionID = $rows['questionID'];
                    $description = $rows['description'];

                    // Check if the category has changed
                    if ($category != $currentCategory) {
                        // Output the category row for each change
                        echo '<tr>
                                <td>' . $category . '</td>
                              </tr>';
            
                        echo '<tr>
                                <th>Question</th>
                                <th>Rating</th>
                            </tr>';
                    }

                    // Display the question in the current category with a radio button
                    echo '<tr>
                            <td>' . $description . '</td>
                            <td>';

                    // Radio buttons with a divider
                    echo '<input type="radio" name="rating[' . $questionID . ']" value="1"> 1';
                    echo '<div style="border-left: 1px solid #000; margin: 0 ;"></div>';
                    echo '<input type="radio" name="rating[' . $questionID . ']" value="2"> 2';
                    echo '<div style="border-left: 1px solid #000; margin: 0 ;"></div>';
                    echo '<input type="radio" name="rating[' . $questionID . ']" value="3"> 3';
                    echo '<div style="border-left: 1px solid #000; margin: 0 ;"></div>';
                    echo '<input type="radio" name="rating[' . $questionID . ']" value="4"> 4';
                    echo '<div style="border-left: 1px solid #000; margin: 0 ;"></div>';
                    echo '<input type="radio" name="rating[' . $questionID . ']" value="5"> 5';

                    echo '</td>
                        </tr>';
                    
                    $currentCategory = $category;
                }

                if ($currentCategory !== null) {
                    echo '</table>';
                }

                echo "<br>";
                ?>
                <input type="submit" class="submitBtn" name="addBtn" value="Submit">
            </form>
        </div>

        <script>
            $(document).ready(function() {
                $('#teacher').on('change', function() {
                    var teacherId = $(this).val();

                    // Make an AJAX request to fetch classes for the selected teacher
                    $.ajax({
                        type: 'POST',
                        url: 'studentTeacherSelection.php',
                        data: { teacher_id: teacherId },
                        success: function(response) {
                            $('#class-list').html(response);
                            $('.list').show();
                        },
                        error: function(xhr, status, error) {
                            console.error('Error:', error);
                        }
                    });
                });

                // Event delegation for dynamically loaded .class-link elements
                $('#class-list').on('click', '.class-link', function(e) {
                        e.preventDefault();

                        var teacherName = $(this).data('teacher-name');
                        var classCode = $(this).data('class-code');
                        var subjectName = $(this).data('subject-name');
                        var classID = $(this).data('class-id');

                        // Update teacher information
                        $('#faculty').text(teacherName);
                        $('#class').text(classCode);
                        $('#subject').text(subjectName);

                        // Log the classID to the console
                        console.log('Clicked class link. Class ID:', classID);
                        $.ajax({
                        type: 'POST',
                        url: 'dataInsert.php',
                        data: { classID: classID }, // Ensure this is the correct variable
                        success: function(response) {
                            console.log('Class ID sent successfully:', classID);
                            console.log('Server response:', response);
                            var newUrl = '?classID=' + classID;

                        // Update the URL without reloading the page
                        history.pushState({classID: classID}, document.title, newUrl);                
                          },
                        error: function(error) {
                            console.error('Error sending class ID:', error);
                        }
                    });


                    // Additional logic for updating faculty information can be added here.
                });
            });
        </script>

    </body>
</html>
