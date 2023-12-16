<?php
     function get_category_Records(){
        //This is to display all the Admin Records
        include "../connect.php";
            if(!isset($_GET['edit'])){
                $guidanceEdit = "";
                } 
                else{
                $guidanceEdit = $_GET['edit'];
                }

            $sqlquery = mysqli_query($con, "SELECT * FROM tblcategory");
           
            while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                  <form method="POST">
                    <?php if($guidanceEdit == $rows['categoryID']){ ?>
                    <td><input type="text" name="categoryEditName" id="categoryEditName" value="<?php echo $rows[2] ?>"> </td>
                    <td><input type="text" name="categoryEditDes" id="categoryEditDes" value="<?php echo $rows[3] ?>"> </td>
                    <td><input type="submit" name="saveDetails" id="savebtn" value="Save"></td>
                    <?php } 
                    else{ ?>
                    <td><?php echo $rows['categoryName']; ?></td>
                    <td><?php echo $rows['description']; ?></td>
                    <td> <a id="editbtn" href="?edit=<?php echo $rows[0];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                    </td>
                    <?php } ?>
                </form>
                        </tr>
                
            <?php } ?>
       <?php } ?>
<?php
     function guidanceCategoryFunction(){
        include "../connect.php";

        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['guidance_ID'])) {
                header('Location: http://localhost/TES/guidanceFiles/index.php');
                exit();
            }        
        
            $guidanceID = $_SESSION['guidance_ID'];

            $categoryName = $_POST['categoryName'];
            $description = $_POST['description'];

            $sql = "INSERT INTO tblcategory (guidanceID, categoryName, description, date_created, date_updated)
            VALUES ('$guidanceID', '$categoryName', '$description', current_timestamp(), NULL);";
            mysqli_query($con, $sql);
    
            }
    
            if(isset($_POST['saveDetails']))
            {
                
            if (!isset($_SESSION['guidance_ID'])) {
        
                header('Location: http://localhost/TES/guidanceFiles/index.php');
                exit();
            }
      
            $guidanceID = $_SESSION['guidance_ID'];
    
            $categoryEditName = $_POST['categoryEditName'];
            $categoryEditDes = $_POST['categoryEditDes'];
            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblcategory` SET `categoryName` = '$categoryEditName', `description` = '$categoryEditDes', 
            `date_updated` =  current_timestamp() WHERE `tblcategory`.`categoryID` = $ID ";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/guidanceFiles/questioncategory.php');
        }
        
                if(isset($_GET['del']))
                { 
                    $delID = $_GET['del'];
                    $sqldelete = "DELETE FROM tblcategory WHERE `tblcategory`.`categoryID` = $delID";
                    mysqli_query($con, $sqldelete);
                    header('Location: http://localhost/TES/guidanceFiles/questioncategory.php');
                }
    
    }
?>

<?php
    function get_academic_Records(){
          //This is to display all the Admin Records
          include "../connect.php";
          if(!isset($_GET['edit'])){
              $academicEdit = "";
              } 
              else{
              $academicEdit = $_GET['edit'];
              }

          $sqlquery = mysqli_query($con, "SELECT * FROM tblacademic");
         
          while ($rows = mysqli_fetch_array($sqlquery)) {
              ?>
              <tr>
                <form method="POST">
                  <?php if($academicEdit == $rows['id']){ ?>
                  <td><input type="text" name="yearEdit" id="yearEdit" value="<?php echo $rows[1] ?>"> </td>
                  <td><input type="text" name="semesterEdit" value="<?php echo $rows[2] ?>"> </td>
                  <td>
                    <?php if($rows['is_Default'] == 0): ?>
								<button type="button" class="make_default" data-id="<?php echo $rows['id'] ?>">No</button>
					<?php else: ?>
								<button type="button" class="default">Yes</button>
					<?php endif; ?>
                  </td>
                  <td>
                        <select name="status" id="status">
                            <option value="0">Pending</option>
                            <option value="1">Started</option>
                            <option value="2">Closed</option>
                        </select>
                </td>
                  <td><input type="submit" name="saveDetails" id="savebtn" value="Save"></td>
                  <?php } 
                  else{ ?>
                  <td><?php echo $rows['year']; ?></td>
                  <td><?php echo $rows['semester']; ?></td>
                  <td>
                        <?php if ($rows['is_Default'] == 0): ?>
                            <button type="button" class="make_default" data-id="<?php echo $rows['id'] ?>">No</button>
                        <?php else: ?>
                            <button type="button" class="default" style="background-color:#16784A;">Yes</button>
                        <?php endif; ?>

                      
                    </td>
                    <script> 
                    $('.make_default').on('click', function () {
                        var academicId = $(this).data('id');
                        if (confirm("Are you sure you want to change the value to 'Yes'?")) {
                            // Make an AJAX request to update the database value
                            $.ajax({
                                url: '../guidanceFiles/update_default.php', // replace with your server-side script
                                type: 'POST',
                                data: { id: academicId },
                                success: function (response) {
                                    // Handle success, e.g., show a success message
                                    alert('Value updated successfully.');
                                    
                                    location.reload();
                                },
                                error: function (error) {
                                    // Handle error
                                    console.error('Error updating value: ', error);
                                }
                            });
                        }
                    });
                    </script>
                  <td>
                        <?php if($rows['status'] == 0): ?>
								<span class="pending">Not yet Started</span>
						<?php elseif($rows['status'] == 1): ?>
								<span class="started">Starting</span>
						<?php elseif($rows['status'] == 2): ?>
								<span class="closed">Closed</span>
						<?php endif; ?>
                    </td>
                  <td> 
                    <a id="editbtn" href="?edit=<?php echo $rows[0];?>">Edit</a>
                  <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                  </td>
                  <?php } ?>
              </form>
                      </tr>
              
          <?php } ?>
     <?php } ?>

<?php 
    function guidanceCrud(){
        include "../connect.php";

        if(isset($_POST['addbtn'])){

            $year = $_POST['year'];
            $sem = $_POST['semester'];

            $sql = "INSERT INTO tblacademic (year, semester)
            VALUES ('$year', '$sem');";
            mysqli_query($con, $sql);
    
            }
    
            if(isset($_POST['saveDetails']))
            {
                
            $yearEdit = $_POST['yearEdit'];
            $semesterEdit = $_POST['semesterEdit'];
            $status = $_POST['status'];
            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblacademic` SET `year` = '$yearEdit', `semester` = '$semesterEdit', `status` = '$status'
             WHERE `tblacademic`.`id` = $ID ";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/guidanceFiles/academic.php');
        }
        
                if(isset($_GET['del']))
                { 
                    $delID = $_GET['del'];
                    $sqldelete = "DELETE FROM tblacademic WHERE `tblacademic`.`id` = $delID";
                    mysqli_query($con, $sqldelete);
                    header('Location: http://localhost/TES/guidanceFiles/academic.php');
                }

              
    }
?>
<?php 
    function restrictionRecords(){
           //This is to display all the Admin Records
           include "../connect.php";

           $query = "SELECT
                    tblrestriction.id,
                    tblacademic.id AS academicID,
                    CONCAT(tblteacher.T_fname, ' ', tblteacher.T_lname) AS teacher_name,
                    tblclass.classCode,
                    tblsubject.subName
                    FROM
                    tblrestriction
                    INNER JOIN tblacademic ON tblacademic.id = tblrestriction.academicID
                    INNER JOIN tblclass ON tblclass.classID = tblrestriction.classID
                    INNER JOIN tblteacher ON tblteacher.teacher_ID = tblclass.teachID  
                    INNER JOIN tblsubject ON tblsubject.subject_ID = tblclass.subID";
           $sqlquery = mysqli_query($con, $query);
          
           ?>
           <table>
               <tr>
                   <th>Teacher Name</th>
                   <th>Class</th>
                   <th>Subject</th>
                   <th>Action</th>
               </tr>
           <?php
           while ($rows = mysqli_fetch_array($sqlquery)) {
           ?>
               <tr>
                   <td><?php echo $rows['teacher_name']; ?></td>
                   <td><?php echo $rows['classCode']; ?></td>
                   <td><?php echo $rows['subName']; ?></td>
                   <td>
                       <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                   </td>
               </tr>
           <?php
           }
           ?>
           </table>
<?php } ?>

<?php
    function insertRestriction() {
        include "../connect.php";
        session_start();
    
        if (isset($_POST['addbtn'])) {
            if (!isset($_SESSION['defaultAcademicId'])) {
                header('Location: http://localhost/TES/guidanceFiles/index.php');
                exit();
            }
    
            $academicID = $_SESSION['defaultAcademicId'];
            $classID = $_POST['classInsert'];
    
            // Use prepared statement to prevent SQL injection
            $sql = "INSERT INTO tblrestriction (classID, academicID) VALUES (?, ?)";
            $stmt = mysqli_prepare($con, $sql);
    
            if ($stmt) {
                mysqli_stmt_bind_param($stmt, 'ii', $classID, $academicID);
                $result = mysqli_stmt_execute($stmt);
    
                if ($result) {
                    header('Location: http://localhost/TES/guidanceFiles/manageForm.php');
                } else {
                    echo 'Error executing statement: ' . mysqli_error($con);
                }
    
                mysqli_stmt_close($stmt);
            } else {
                echo 'Error preparing statement: ' . mysqli_error($con);
            }
        }
    }
    
?>
<?php
    function guidanceQuestionForm(){
        // This is to display all the Admin Records
        include "../connect.php";
    
        $query = "SELECT
                     tblcategory.categoryName,
                     tblquestion.questionID,
                     tblquestion.description
                 FROM
                     tblquestion
                 INNER JOIN tblcategory ON tblcategory.categoryID = tblquestion.categoryID";
        $sqlquery = mysqli_query($con, $query);
    
        $currentCategory = null; // Track the current category
    
        echo '<form method="post">';
    
        while ($rows = mysqli_fetch_array($sqlquery)) {
            $category = $rows['categoryName'];
            $questionID = $rows['questionID'];
            $description = $rows['description'];
    
            // Check if the category has changed
            if ($category != $currentCategory) {
                // Close the previous table if it exists
                if ($currentCategory !== null) {
                    echo '</table>';
                }
    
                // Start a new table for the current category
                echo '<h3>' . $category . '</h3>';
                echo '<table class="list">
                        <tr>
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
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="2"> 2';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="3"> 3';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="4"> 4';
                echo '<div style="border-left: 1px solid #000; display: inline-block; margin: 0 10px;"></div>';
                echo '<input type="radio" name="rating[' . $questionID . ']" value="5"> 5';
                
                echo '</td>
          </tr>';
            $currentCategory = $category;
        }
    
        // Close the last table if it exists
        if ($currentCategory !== null) {
            echo '</table>';
        }
    
        // Submit button for the form
        echo '<input type="submit" name="submit" value="Submit">';
        echo '</form>';
    
        // Rest of your HTML or PHP code goes here
    }
     ?>
<?php
   function insertQuestion(){
    include "../connect.php";
  
    if (isset($_POST['addQuestion'])) {
        $question = mysqli_real_escape_string($con, $_POST['addDescription']);
        $categoryID = mysqli_real_escape_string($con, $_POST['category']);

        $sql = "INSERT INTO tblquestion (description, categoryID) VALUES ('$question', '$categoryID')";
        
        if (mysqli_query($con, $sql)) {
            header('Location: http://localhost/TES/guidanceFiles/manageForm.php');
        } else {
            echo 'Error: ' . mysqli_error($con);
        }
    }
}

?>