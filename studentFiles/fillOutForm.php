<?php
    include "../connect.php";
    session_start();
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
 
    <div class="select-teacher">
        <label for="teacher">Select Teacher:</label>
        <select name="teacher" id="teacher">
            <option value="" disabled selected >Select Teacher</option>
            <?php 
            $sql = "SELECT * FROM tblteacher";
            $result = $con->query($sql);

            if ($result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {  ?>
                <option value="<?php echo $row['teacher_ID'] ?>"><?php echo $row['T_fname'].' '.$row['T_lname'] ?></option>
                <?php } }?>
        </select>
    </div>
    

    <div class="list" id="class-list">
    
    </div>

    <div class="evaluation-form">
        <h3>Evaluation Form</h3>
        <div class="teacherinfo">
            <label for="faculty" class="text-left"><b>Faculty: </b><span id="faculty"></span></label><br>
            <label for="class" class="text-left"><b>Class:</b> <span id="class"></span></label><br>
            <label for="academicYear" class="text-left"><b>Academic Year:</b> <span id="academicYear"></span></label><br>
            <label for="subject" class="text-left"><b>Subject:</b> <span id="subject"></span></label>
        </div>
        <form method="POST">
    <fieldset>
        <legend>Rating Legend:</legend>
        <label for="rating1">1 = Strongly Disagree</label>
        <label for="rating2">2 = Disagree</label>
        <label for="rating3">3 = Uncertain</label>
        <label for="rating4">4 = Agree</label>
        <label for="rating5">5 = Strongly Agree</label>
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
            echo '<div style="border-left: 1px solid #000;  margin: 0 ;"></div>';
            echo '<input type="radio" name="rating[' . $questionID . ']" value="2"> 2';
            echo '<div style="border-left: 1px solid #000;  margin: 0 ;"></div>';
            echo '<input type="radio" name="rating[' . $questionID . ']" value="3"> 3';
            echo '<div style="border-left: 1px solid #000;  margin: 0 ;"></div>';
            echo '<input type="radio" name="rating[' . $questionID . ']" value="4"> 4';
            echo '<div style="border-left: 1px solid #000;  margin: 0 ;"></div>';
            echo '<input type="radio" name="rating[' . $questionID . ']" value="5"> 5';

            echo '</td>
                </tr>';
            
            $currentCategory = $category;
        }

       
        if ($currentCategory !== null) {
            echo '</table>';
        }

        echo"<br>";
        echo "<input type='submit' class='submitBtn' name='submit' value='Submit'>";
       
  echo"  </form>";
     
    ?>
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

              
                var teacherName = $(this).data('teacher-name'); // Corrected attribute name
                var classCode = $(this).data('class-code');
                var subjectName = $(this).data('subject-name');
                // Note: There is no data attribute 'academic-year' in the HTML, so remove it from this line.

                // Update teacher information
                
                $('#faculty').text(teacherName);
                $('#class').text(classCode);
                $('#subject').text(subjectName);
              
                
                // Additional logic for updating faculty information can be added here.
            });
    });

</script>
<?php
   if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Check if the 'rating' array is set in the $_POST data
    if (isset($_POST['rating']) && is_array($_POST['rating'])) {
        foreach ($_POST['rating'] as $questionID => $rating) {
            // Process each question ID and its corresponding rating
            echo "Question ID: $questionID, Rating: $rating<br>";
            // You can perform database operations or other logic with the question ID and rating here
        }
    } else {
        echo "No ratings submitted.";
    }
}

?>
</div>
</body>
</html>