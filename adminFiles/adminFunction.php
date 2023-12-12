<?php 
    //////////////////////     /////////////////
    ///////        ///////     //////////////////
    ///////        ///////     /////            //
    //////////////////////     /////            ///
    //////////////////////     /////            ////
    ///////         //////     /////           ///
    ///////         //////     //////////////////
    ///////         //////     /////////////////
    function get_Admin_Records(){
        //This is to display all the Admin Records
        include "../connect.php";
            if(!isset($_GET['edit'])){
                $adminEdit = "";
                } 
                else{
                $adminEdit = $_GET['edit'];
                }
            $sqlquery = mysqli_query($con, "SELECT * FROM tbladmin");
           
            while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                  <form method="POST">
                    <?php if($adminEdit == $rows['adminID']){ ?>
                    <td><input type="text" name="adminEditID" value="<?php echo $rows[0] ?>"> </td>
                    <td><input type="text" name="adminEditUsername" value="<?php echo $rows[1] ?>"> </td>
                    <td><input type="text" name="adminEditPassword" value="<?php echo $rows[2] ?>"> </td>
                    <td><input type="submit" name="saveDetails"  value="Save"></td>
                    <?php } 
                    else{ ?>
                    <td><?php echo $rows['adminID']; ?></td>
                    <td><?php echo $rows['username']; ?></td>
                    <td><?php echo $rows['adminpassword']; ?></td>
                    <td> <a id="editbtn" href="?edit=<?php echo $rows[0];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                    </td>
                    <?php } ?>
                </form>
                        </tr>
                
            <?php } ?>
       <?php } ?>
<?php 
    function adminFunction(){
        include "../connect.php";
        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['adminID'])) {
                header('Location: http://localhost/TES/adminFiles/admin.php');
                exit();
            }        
        
    
            $adminID = $_POST['adminID'];
            $username = $_POST['username'];
            $password = $_POST['password'];
            $sql = "INSERT INTO tbladmin (adminID, username, adminpassword, status, date_created, date_updated)
            VALUES ('$adminID', '$username', '$password', '0', current_timestamp(), NULL);";
            mysqli_query($con, $sql);
    
            }
    
            if(isset($_POST['saveDetails']))
            {
                
            if (!isset($_SESSION['adminID'])) {
        
                header('Location: http://localhost/TES/adminFiles/admin.php');
                exit();
            }
      
            $adminID = $_SESSION['adminID'];
    
            $adminEditID = $_POST['adminEditID'];
            $adminEditUsername = $_POST['adminEditUsername'];
            $adminEditPassword = $_POST['adminEditPassword'];
            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tbladmin` SET `adminID` = '$adminEditID', `username` = '$adminEditUsername', `adminpassword` = '$adminEditPassword', 
            `date_updated` =  current_timestamp() WHERE `tbladmin`.`adminID` = $ID";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/adminFiles/admin.php');
        }
        
            if(isset($_GET['del']))
            { 
                $delID = $_GET['del'];
                $sqldelete = "DELETE FROM tbladmin WHERE `tbladmin`.`adminID` = $delID";
                mysqli_query($con, $sqldelete);
               
                header('Location: http://localhost/TES/adminFiles/admin.php');
            }
    
    }
?>

<?php 
        ///////////////////////////     /////////       /////////
        ///////////////////////////     /////////       /////////
        ///////                         /////////       /////////
        ///////                         /////////       /////////
        ///////     ///////////////     /////////       /////////
        ///////     ///////////////     /////////       /////////
        ///////             ///////     /////////       /////////
        ///////             ///////     /////////       /////////
        ///////////////////////////     /////////////////////////
        ///////////////////////////     /////////////////////////

        
    function get_Guidance_Records(){
        //This is to display all the Guidance Records
        include "../connect.php";
            if(!isset($_GET['edit'])){
                $guidanceEdit = "0";
                } 
                else{
                $guidanceEdit = $_GET['edit'];
         
                }

            $sqlquery = mysqli_query($con, "SELECT * FROM tblguidancestaff");
           
            while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                  <form method="POST">
                    <?php if($guidanceEdit == $rows['guidance_ID']){ ?>
                    <td><input type="text" name="guidanceEditID" value="<?php echo $rows[0] ?>"> </td>
                    <td><input type="text" name="guidanceEditfname" value="<?php echo $rows[2] ?>"> </td>
                    <td><input type="text" name="guidanceEditlname" value="<?php echo $rows[3] ?>"> </td>
                    <td><input type="text" name="guidanceEditEmail" value="<?php echo $rows[4] ?>"> </td>
                    <td><input type="text" name="passwordEditPass" value="<?php echo $rows[5] ?>"> </td>
                    <td><input type="submit" name="saveDetails"  value="Save"></td>
                    <?php } 
                    else{ ?>
                    <td><?php echo $rows['guidance_ID']; ?></td>
                    <td><?php echo $rows['G_fname']; ?></td>
                    <td><?php echo $rows['G_lname']; ?></td>
                    <td><?php echo $rows['G_emailAdd']; ?></td>
                    <td><?php echo $rows['G_password']; ?></td>
                    <td> <a id="editbtn" href="?edit=<?php echo $rows[0];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0];?>)">Delete</a>
                    </td>
                    <?php } ?>
                </form>
                        </tr>
                
            <?php } ?>
       <?php } ?>
<?php 
    function guidanceFunction(){
        include "../connect.php";
        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['adminID'])) {
                header('Location: http://localhost/TES/adminFiles/guidance.php');
                exit();
            }
    
         
            $adminId = $_SESSION['adminID'];
    
    
            $guidanceID = $_POST['g_ID'];
        
            $firstname = $_POST['fname'];
            $lastname = $_POST['lname'];
            $email = $_POST['email'];
            $pass = $_POST['pass'];
            $sql = "INSERT INTO tblguidancestaff (guidance_ID, adminID, G_fname, G_lname, G_emailAdd, G_password, status, date_created, date_updated)
            VALUES ('$guidanceID', '$adminId', '$firstname', '$lastname', '$email', '$pass', '0', current_timestamp(), NULL);";
            mysqli_query($con, $sql);
    
            }
    
            if(isset($_POST['saveDetails']))
            {
                
            if (!isset($_SESSION['adminID'])) {
        
                header('Location: http://localhost/TES/adminFiles/guidance.php');
                exit();
            }
    
      
            $adminId = $_SESSION['adminID'];
    
            $guidanceEditID = $_POST['guidanceEditID'];
            $guidanceEditfname = $_POST['guidanceEditfname'];
            $guidanceEdilname = $_POST['guidanceEditlname'];
            $guidanceEditEmail = $_POST['guidanceEditEmail'];
            $passwordEditPass = $_POST['passwordEditPass'];

            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblguidancestaff` SET `guidance_ID` = '$guidanceEditID', `adminID` = '$adminId', `G_fname` = '$guidanceEditfname', `G_lname` = '$guidanceEdilname', `G_emailAdd` = '$guidanceEditEmail', 
            `G_password` = '$passwordEditPass', `date_updated` =  current_timestamp() WHERE `tblguidancestaff`.`guidance_ID` = $ID";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/adminFiles/guidance.php');
        }
        
            if(isset($_GET['del']))
            { 
                $delID = $_GET['del'];
                $firstnameEdit = "";
                $lastnameEdit = "";
                $sqlquery = mysqli_query($con, "SELECT * FROM tblguidancestaff where guidance_ID = $delID  ");
                    while($rows = mysqli_fetch_array($sqlquery))
                        {
                            $firstnameEdit = $rows['G_fname'];
                            $lastnameEdit = $rows['G_lname'];
                        }
                $sqldelete = "DELETE FROM tblguidancestaff WHERE `tblguidancestaff`.`guidance_ID` = $delID";
                mysqli_query($con, $sqldelete);
                echo "<script>alert('$firstnameEdit $lastnameEdit is DELETED!');</script>";
                header('Location: http://localhost/TES/adminFiles/guidance.php');
            }
    
    }
?>
<?php 
 function importGuidanceRecords(){
    include "../connect.php";

    if (isset($_POST['import'])) {
        if (!isset($_SESSION['adminID'])) {
            header('Location: http://localhost/TES/adminFiles/guidance.php');
            exit();
        }
    
        $adminId = $_SESSION['adminID'];
    
        $filename = $_FILES["file"]["tmp_name"];
        $timeStamp =  date('Y-m-d H:i:s');
    
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");


            fgetcsv($file, 10000, ",");
    
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                // Use prepared statement
                $sqlCSVinsert = "INSERT INTO tblguidancestaff (guidance_ID, G_fname, G_lname, G_emailAdd, password, date_created, adminID) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
                $stmt = mysqli_prepare($con, $sqlCSVinsert);
    
                // Bind parameters
                mysqli_stmt_bind_param($stmt, 'sssssss', $column[0], $column[1], $column[2], $column[3], $column[4], $timeStamp, $adminId);
    
                // Execute the statement
                $result = mysqli_stmt_execute($stmt);
    
                if ($result) {
                  echo "Data Imported Sucessfully";
                } else {
                   
                    echo "Problem importing data. Error: " . mysqli_error($con);
                    exit();
                }
    
                mysqli_stmt_close($stmt); 
            }
    
            fclose($file); 
        }
    }
}


?>
<?php
    ///////////////////////////////    //////////////////////////            //////////////
    ///////////////////////////////    //////////////////////////         //////////////////
              //////////               ////////                          /////         //////
              //////////               ////////                         //////          //////
              //////////               //////////////////////////      ////////////////////////
              //////////               //////////////////////////      ////////////////////////
              //////////               ////////                       ///////           ////////
              //////////               ////////                       ///////           ////////
              //////////               //////////////////////////     ///////           ////////
              //////////               //////////////////////////     ///////           /////////
?>
<?php 
    function get_teacher_Records(){
        include "../connect.php";
        if(!isset($_GET['edit'])){
            $teacherEdit = "0";
             } 
             else{
             $teacherEdit = $_GET['edit'];
             }
         $sqlquery = mysqli_query($con, "SELECT * FROM tblteacher");

        while ($rows = mysqli_fetch_array($sqlquery)) {
            ?>
            <tr>
            <form method="POST">
            <?php if($teacherEdit == $rows[0]){ ?>
                <td><input type="text" name="teacherEditID" value="<?php echo $rows['teacher_ID'] ?>"> </td>
                <td><input type="text" name="teacherEditfname" value="<?php echo $rows['T_fname'] ?>"> </td>
                <td><input type="text" name="teacherEditlname" value="<?php echo $rows['T_lname'] ?>"> </td>
                <td><input type="text" name="teacherEditEmail" value="<?php echo $rows['T_emailAdd'] ?>"> </td>
                <td><input type="text" name="teacherEditPass" value="<?php echo $rows['password'] ?>"> </td>
                <td><input type="submit" name="saveDetails" id="saveBtn"  value="Save"></td>
                <?php } 
                else{ ?>
                <td><?php echo $rows['teacher_ID']; ?></td>
                <td><?php echo $rows['T_fname']; ?></td>
                <td><?php echo $rows['T_lname']; ?></td>
                <td><?php echo $rows['T_emailAdd']; ?></td>
                <td><?php echo $rows['password']; ?></td>
                <td> <a id="editbtn" href="?edit=<?php echo $rows[0]; ?>">Edit</a>
                <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0]; ?>)">Delete</a>
                </td>
            </form>
             </tr>
            <?php } ?>
        <?php } ?>
    <?php    } ?>

<?php 
    function teacherFunction(){
        include "../connect.php";
        if(isset($_POST['addbtn'])){
        if (!isset($_SESSION['adminID'])) {

            header('Location: http://localhost/TES/adminFiles/teacher.php');
            exit();
        }

        $adminId = $_SESSION['adminID'];
        $teacherID = $_POST['t_ID'];
        $teacherFn = $_POST['fname'];
        $teacherLn = $_POST['lname'];
        $teacherEmail = $_POST['emailAdd'];
        $pass = $_POST['pass'];
        $sql = "INSERT INTO tblteacher (teacher_ID, adminID, T_fname, T_lname, T_emailAdd, password, status, date_created, date_updated)
        VALUES ('$teacherID', '$adminId', '$teacherFn', '$teacherLn', '$teacherEmail', ' $pass', '0', current_timestamp(), NULL);";
        $result = mysqli_query($con, $sql);

        }

    
        if(isset($_POST['saveDetails']))
        {
            if (!isset($_SESSION['adminID'])) {

                header('Location: http://localhost/TES/adminFiles/teacher.php');
            exit();
        }
        
        $adminId = $_SESSION['adminID'];
        $teacherEditID = $_POST['teacherEditID'];
        $teacherEditfname = $_POST['teacherEditfname'];
        $teacherEditlname = $_POST['teacherEditlname'];
        $teacherEditEmail = $_POST['teacherEditEmail'];
        $teacherEditPass = $_POST['teacherEditPass'];
        $ID = $_GET['edit'];
        $sqledit = "UPDATE `tblteacher` SET `teacher_ID` = '$teacherEditID', `adminID` = '$adminId', `T_fname` = '$teacherEditfname', `T_lname` = '$teacherEditlname', `T_emailAdd` = '$teacherEditEmail',
        `password` = '$teacherEditPass', `date_updated` = current_timestamp() WHERE `tblteacher`.`teacher_ID` = $ID ";
         mysqli_query($con, $sqledit);
         header('Location: http://localhost/TES/adminFiles/teacher.php');
        }

        if(isset($_GET['del']))
        { 
            $delID = $_GET['del'];
            $firstnameEdit = "";
            $lastnameEdit = "";
            $sqlquery = mysqli_query($con, "SELECT * FROM tblteacher where teacher_ID  = $delID  ");
                while($rows = mysqli_fetch_array($sqlquery))
                    {
                        $firstnameEdit = $rows['T_fname'];
                        $lastnameEdit = $rows['T_lname'];
                    }
            $sqldelete = "DELETE FROM tblteacher WHERE `tblteacher`.`teacher_ID` = $delID";
            mysqli_query($con, $sqldelete);
            echo "<script>alert('$firstnameEdit $lastnameEdit is DELETED!');</script>";
            header('Location: http://localhost/TES/adminFiles/teacher.php');
        }
}
    ?>
<?php 
 function importTeacherRecords(){
    include "../connect.php";

    if (isset($_POST['import'])) {
        if (!isset($_SESSION['adminID'])) {
            header('Location: http://localhost/TES/adminFiles/teacher.php');
            exit();
        }
    
        $adminId = $_SESSION['adminID'];
    
        $filename = $_FILES["file"]["tmp_name"];
        $timeStamp =  date('Y-m-d H:i:s');
    
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");

            // Read and discard the first row (headers)
            fgetcsv($file, 10000, ",");
    
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                // Use prepared statement
                $sqlCSVinsert = "INSERT INTO tblteacher (teacher_ID , T_fname, T_lname, T_emailAdd, password, date_created, adminID) VALUES (?, ?, ?, ?, ?, ?, ?)";
    
                $stmt = mysqli_prepare($con, $sqlCSVinsert);
    
                // Bind parameters
                mysqli_stmt_bind_param($stmt, 'sssssss', $column[0], $column[1], $column[2], $column[3], $column[4], $timeStamp, $adminId);
    
                // Execute the statement
                $result = mysqli_stmt_execute($stmt);
    
                if ($result) {
                   echo "Data Imported Successfully";
                } else {
                    // Failure message and exit (outside the loop)
                    echo "Problem importing data. Error: " . mysqli_error($con);
                    exit();
                }
    
                mysqli_stmt_close($stmt); // Close the prepared statement
            }
    
            fclose($file); // Close the file handle after processing
        }
    }
}

?>
<?php 
   /////////////////////////    /////////       //////////    /////////////////////
   /////////////////////////    /////////       //////////    ///////////////////////
   ////////                     /////////       //////////    //////            //////
   ////////                     /////////       //////////    //////            //////
   ////////                     /////////       //////////    //////            //////
   /////////////////////////    /////////       //////////    ///////////////////////
   /////////////////////////    /////////       //////////    ////////////////////
                    ////////    /////////       //////////    ////////////////////////
                    ////////    /////////       //////////    ///////            //////
                    ////////    /////////       //////////    ///////           ////////
    ////////////////////////    //////////////////////////    /////////////////////////
    ////////////////////////    //////////////////////////    ///////////////////////
    function get_subject_records(){
        include "../connect.php";
        if(!isset($_GET['edit'])){
            $subjectEdit = "0";
            } 
            else{
            $subjectEdit = $_GET['edit'];
            }
        $sqlquery = mysqli_query($con, "SELECT * FROM tblsubject");

        while ($rows = mysqli_fetch_array($sqlquery)) {
            ?>
            <tr>
            <form method="POST">
            <?php if($subjectEdit == $rows[0]){ ?>
                <td><input type="text" name="subjectEditID" value="<?php echo $rows[0] ?>"> </td>
                <td><input type="text" name="subjectEditCode" value="<?php echo $rows[2] ?>"> </td>
                <td><input type="text" name="subjectEditName" value="<?php echo $rows[3] ?>"> </td>
                <td><input type="submit" name="saveDetails"  value="Save"></td>
                <?php } 
                else{ ?>
                <td><?php echo $rows['subject_ID']; ?></td>
                <td><?php echo $rows['subCode']; ?></td>
                <td><?php echo $rows['subName']; ?></td>
                <td> <a id="editbtn" href="?edit=<?php echo $rows[0]; ?>">Edit</a>
                    <a id="deletebtn" href="?del=<?php echo $rows[0]; ?>" onclick="del(<?php echo $rows[0]; ?>)">Delete</a>
                </td>
            </form>
              </tr>
            <?php } ?>
        <?php } ?>
    <?php } ?>
<?php 
    function subjectFunction(){
        include "../connect.php";
        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['adminID'])) {
    
                header('Location: http://localhost/TES/adminFiles/subject.php');
                exit();
            }
    
            $adminId = $_SESSION['adminID'];
            $subjectID = $_POST['s_ID'];
            $subjectCode = $_POST['code'];
            $subjectName = $_POST['name'];
            $sql = "INSERT INTO tblsubject (subject_ID, adminID, subCode, subName, status, date_created, date_updated)
            VALUES ('$subjectID', '$adminId', '$subjectCode', '$subjectName', '0', current_timestamp(), NULL);";
            $result = mysqli_query($con, $sql);
    
            }
    
            
            if(isset($_POST['saveDetails']))
            {
                if (!isset($_SESSION['adminID'])) {
    
                    header('Location: http://localhost/TES/adminFiles/subject.php');
                    exit();
                }
        
                $adminId = $_SESSION['adminID'];
                $subjectEditID = $_POST['subjectEditID'];
                $subjectEditCode = $_POST['subjectEditCode'];
                $subjectEditName = $_POST['subjectEditName'];
                $ID = $_GET['edit'];
                $sqledit = "UPDATE `tblsubject` SET `subject_ID` = '$subjectEditID', `adminID` = '$adminId', `subCode` = '$subjectEditCode',
                `subName` = '$subjectEditName',`date_updated` =  current_timestamp() WHERE `tblsubject`.`subject_ID` = $ID ";
                mysqli_query($con, $sqledit);
                header('Location: http://localhost/TES/adminFiles/subject.php');
            }
    
            if(isset($_GET['del']))
            { 
                $delID = $_GET['del'];
                $subCodeEdit = "";
                $subNameEdit = "";
                $sqlquery = mysqli_query($con, "SELECT * FROM tblsubject where subject_ID = $delID  ");
                    while($rows = mysqli_fetch_array($sqlquery))
                        {
                            $subCodeEdit = $rows['subCode'];
                            $subNameEdit = $rows['subName'];
                        }
                $sqldelete = "DELETE FROM tblsubject WHERE `tblsubject`.`subject_ID` = $delID";
                mysqli_query($con, $sqldelete);
                header('Location: http://localhost/TES/adminFiles/subject.php');
                echo "<script>alert('$subCodeEdit $subNameEdit is DELETED!');</script>";
            }
    
    }
?>
<?php 
 function importSubjectRecords(){
    include "../connect.php";

    if (isset($_POST['import'])) {
        if (!isset($_SESSION['adminID'])) {
            header('Location: http://localhost/TES/adminFiles/subject.php');
            exit();
        }
    
        $adminId = $_SESSION['adminID'];
    
        $filename = $_FILES["file"]["tmp_name"];
        $timeStamp =  date('Y-m-d H:i:s');
    
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");

            // Read and discard the first row (headers)
            fgetcsv($file, 10000, ",");
    
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                // Use prepared statement
                $sqlCSVinsert = "INSERT INTO tblsubject (subject_ID , subCode, subName, date_created, adminID) VALUES (?, ?, ?, ?, ?)";
    
                $stmt = mysqli_prepare($con, $sqlCSVinsert);
    
                // Bind parameters
                mysqli_stmt_bind_param($stmt, 'sssss', $column[0], $column[1], $column[2], $timeStamp, $adminId);
    
                // Execute the statement
                $result = mysqli_stmt_execute($stmt);
    
                if ($result) {
                   echo "Data Imported Successfully";
                   header('Location: http://localhost/TES/adminFiles/subject.php');
                } else {
                    echo "Problem importing data. Error: " . mysqli_error($con);
                    exit();
                }
    
                mysqli_stmt_close($stmt); // Close the prepared statement
            }
    
            fclose($file); // Close the file handle after processing
        }
    }
}

?>
<?php
        ////////////////////////    //////////////////////////  /////////      /////////
        ////////////////////////    //////////////////////////  /////////      /////////
        ///////                             ///////////         /////////      /////////
        ///////                             ///////////         /////////      /////////
        ///////////////////////             ///////////         /////////      /////////
        ///////////////////////             ///////////         /////////      /////////
                      /////////             ///////////         /////////      /////////
                      /////////             ///////////         /////////      /////////
        ///////////////////////             ///////////         ////////////////////////
        ///////////////////////             ///////////         ////////////////////////


    function get_student_Records(){
        include "../connect.php";
        if(!isset($_GET['edit'])){
            $studentEdit = "0";
            } 
            else{
            $studentEdit = $_GET['edit'];
            }
        $sqlquery = mysqli_query($con, "SELECT * FROM tblstudent");

        while ($rows = mysqli_fetch_array($sqlquery)) {
            ?>
            <tr>
            <form method="POST">
            <?php if($studentEdit == $rows[0]){ ?>
                
                <td><input type="text" name="studentEditID" value="<?php echo $rows['studentID'] ?>"> </td>
                <td><input type="text" name="studentEditfname" value="<?php echo $rows['stud_fname'] ?>"> </td>
                <td><input type="text" name="studentEditlname" value="<?php echo $rows['stud_lname'] ?>"> </td>
                <td><input type="text" name="studentEditEmail" value="<?php echo $rows['stud_emailAdd'] ?>"> </td>
                <td><input type="text" name="studentEditPass" value="<?php echo $rows['password'] ?>"> </td>
                <td><input type="submit" name="saveDetails" id="saveBtn"  value="Save"></td>
                <?php } 
                else{ ?>
                <td><?php echo $rows['studentID']; ?></td>
                <td><?php echo $rows['stud_fname']; ?></td>
                <td><?php echo $rows['stud_lname']; ?></td>
                <td><?php echo $rows['stud_emailAdd']; ?></td>
                <td><?php echo $rows['password']; ?></td>
                <td> <a id="editbtn" href="?edit=<?php echo $rows[0]; ?>">Edit</a>
                <a id="deletebtn" href="#" onclick="del(<?php echo $rows[0]; ?>)">Delete</a>
                </td>
            </form>
            </tr>
            <?php } ?>
        <?php }
    }
    function studentFunction(){
        include "../connect.php";
        if(isset($_POST['addbtn'])){
            
    
            if (!isset($_SESSION['adminID'])) {
    
                header('Location: http://localhost/TES/adminFiles/student.php');
                exit();
            }
    
            $adminId = $_SESSION['adminID'];
            $studentID = $_POST['stud_ID'];
            $studentFn = $_POST['fname'];
            $studentLn = $_POST['lname'];
            $studentEmail = $_POST['emailAdd'];
            $pass = $_POST['pass'];
            $sql = "INSERT INTO tblstudent (studentID, adminID, stud_fname, stud_lname, stud_emailAdd, password, status, date_created, date_updated)
            VALUES ('$studentID', '$adminId', '$studentFn', '$studentLn', '$studentEmail', ' $pass', '0', current_timestamp(), NULL);";
            $result = mysqli_query($con, $sql);
    
            }
    
        
            if(isset($_POST['saveDetails']))
            {
                if (!isset($_SESSION['adminID'])) {
    
                    header('Location: http://localhost/TES/adminFiles/student.php');
                exit();
            }
            
            $adminId = $_SESSION['adminID'];
            $studentEditID = $_POST['studentEditID'];
            $studentEditfname = $_POST['studentEditfname'];
            $studentEditlname = $_POST['studentEditlname'];
            $studentEditEmail = $_POST['studentEditEmail'];
            $studentEditPass = $_POST['studentEditPass'];
            $ID = $_GET['edit'];
            $sqledit = "UPDATE `tblstudent` SET `studentID` = '$studentEditID', `adminID` = '$adminId', `stud_fname` = '$studentEditfname', `stud_lname` = '$studentEditlname', `stud_emailAdd` = '$studentEditEmail',
            `password` = '$studentEditPass', `date_updated` = current_timestamp() WHERE `tblstudent`.`studentID` = $ID ";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/adminFiles/student.php');
            }
    
            if(isset($_GET['del']))
            { 
                $delID = $_GET['del'];
                $firstnameEdit = "";
                $lastnameEdit = "";
                $sqlquery = mysqli_query($con, "SELECT * FROM tblstudent where studentID  = $delID  ");
                    while($rows = mysqli_fetch_array($sqlquery))
                        {
                            $firstnameEdit = $rows['stud_fname'];
                            $lastnameEdit = $rows['stud_lname'];
                        }
                $sqldelete = "DELETE FROM tblstudent WHERE `tblstudent`.`studentID` = $delID";
                mysqli_query($con, $sqldelete);
                echo "<script>alert('$firstnameEdit $lastnameEdit is DELETED!');</script>";
                header('Location: http://localhost/TES/adminFiles/student.php');
            }
    
    
    }
?>
<?php 
 function importStudentRecords(){
    include "../connect.php";

    if (isset($_POST['import'])) {
        if (!isset($_SESSION['adminID'])) {
            header('Location: http://localhost/TES/adminFiles/student.php');
            exit();
        }
    
        $adminId = $_SESSION['adminID'];
    
        $filename = $_FILES["file"]["tmp_name"];
        $timeStamp =  date('Y-m-d H:i:s');
    
        if ($_FILES["file"]["size"] > 0) {
            $file = fopen($filename, "r");

            // Read and discard the first row (headers)
            fgetcsv($file, 10000, ",");
    
            while (($column = fgetcsv($file, 10000, ",")) !== FALSE) {
                // Use prepared statement
                $sqlCSVinsert = "INSERT INTO tblstudent (studentID ,stud_fname, stud_lname,stud_emailAdd,password, date_created, adminID) VALUES (?, ?, ?, ?, ?,?,?)";
    
                $stmt = mysqli_prepare($con, $sqlCSVinsert);
    
                // Bind parameters
                mysqli_stmt_bind_param($stmt, 'sssssss', $column[0], $column[1], $column[2], $column[3], $column[4],$timeStamp, $adminId);
    
                // Execute the statement
                $result = mysqli_stmt_execute($stmt);
    
                if ($result) {
                   echo "Data Imported Successfully";
                   header('Location: http://localhost/TES/adminFiles/student.php');
                } else {
                    echo "Problem importing data. Error: " . mysqli_error($con);
                    exit();
                }
    
                mysqli_stmt_close($stmt); // Close the prepared statement
            }
    
            fclose($file); // Close the file handle after processing
        }
    }
}

?>

<?php
    function get_class_Records(){
        //This is to display all the Guidance Records
        include "../connect.php";
       
            $sql= "SELECT tblclass.classID, tblclass.classCode, tblclass.className, CONCAT (tblteacher.T_fname,' ', tblteacher.T_lname) AS 'Teacher'
                    ,CONCAT(tblsubject.subCode,': ',tblsubject.subName) AS 'Subject'
                    FROM tblclass
                    INNER JOIN tblteacher ON tblclass.teachID=tblteacher.teacher_ID
                    INNER JOIN tblsubject ON tblclass.subID=tblsubject.subject_ID;";

            $sqlquery = mysqli_query($con, $sql);
             while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                <form method="POST">
                    <td><?php echo $rows['classID']; ?></td>
                    <td><?php echo $rows['classCode']; ?></td>
                    <td><?php echo $rows['className']; ?></td>
                    <td><?php echo $rows['Teacher']; ?></td>
                    <td><?php echo $rows['Subject']; ?></td>
                    <td> <a name="edit" id="editbtn" href="?edit=<?php echo $rows['classID'];?>">Edit</a>
                    <a id="deletebtn" href="#" onclick="del(<?php echo $rows['classID'];?>)">Delete</a>
                    </td>
                    <?php } ?>
                </form>
         </tr>
         <?php } ?>

<?php
function insertClassRecord()
{
    include "../connect.php";

    if (isset($_POST['addbtn'])) {

        if (!isset($_SESSION['adminID'])) {

            header('Location: http://localhost/TES/adminFiles/class.php');
            exit();
        }

        $adminId = $_SESSION['adminID'];
        $classID = $_POST['classID'];
        $classCode = $_POST['classCode'];
        $className = $_POST['className'];
        $subID = $_POST['subjectID'];
        $teacherID = $_POST['teacherID'];

        $sql = "INSERT INTO tblclass (classID, adminID, subID, teachID, classCode, className, status, date_created, date_updated)
            VALUES ('$classID', '$adminId', '$subID', '$teacherID', '$classCode', '$className', '0', current_timestamp(), NULL);";

        if (mysqli_query($con, $sql)) {
            header('Location: http://localhost/TES/adminFiles/class.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
        if(isset($_GET['del']))
        { 
            $delID = $_GET['del'];
            $sqldelete = "DELETE FROM tblclass WHERE `tblclass`.`classID` = $delID";
            mysqli_query($con, $sqldelete);
            header('Location: http://localhost/TES/adminFiles/class.php');
        }

        if(isset($_POST['saveDetails'])){
            if (!isset($_SESSION['adminID'])) {

                header('Location: http://localhost/TES/adminFiles/class.php');
                exit();
            }
            $adminId = $_SESSION['adminID'];
    
            $classEditID = $_POST['classEditID'];
            $classEditCode = $_POST['classCodeEdit'];
            $classEditName = $_POST['classNameEdit'];
            $teacherEditID = $_POST['teacherEditID'];
            $subjectEditID = $_POST['subjectEditID'];

            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblclass` SET `classID` = '$classEditID', `adminID` = '$adminId', `classCode` = '$classEditCode', 
            `className` = '$classEditName', `subID` = '$subjectEditID', 
            `teachID` = '$teacherEditID', `date_updated` =  current_timestamp() WHERE `tblclass`.`classID` = $ID ";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/adminFiles/class.php');
        }
}
?>

<?php
function myClassFunction(){
include "../connect.php";

if (isset($_GET['edit'])) {
    $editClass = $_GET['edit'];

    $sql= "SELECT tblclass.classID, tblclass.classCode, tblclass.className, CONCAT (tblteacher.T_fname,' ', tblteacher.T_lname) AS 'Teacher'
    ,CONCAT(tblsubject.subCode,': ',tblsubject.subName) AS 'Subject'
    FROM tblclass
    INNER JOIN tblteacher ON tblclass.teachID=tblteacher.teacher_ID
    INNER JOIN tblsubject ON tblclass.subID=tblsubject.subject_ID;";

    $sqlquery = mysqli_query($con, $sql);
    $classFound = false;

    while ($rows = mysqli_fetch_array($sqlquery)) {
        if ($editClass == $rows['classID']) {
            $classFound = true;
            ?>
             <script type="text/javascript" src="../scriptFiles/classAdmin.js">editPopup();</script>
            <div class="left">
                  <button id="editbtn">Update Class</button>
            </div>

            <div class="popup">
               <div class="close-btn">&times;</div>
                    <div class="form">
                    <form method="POST">
                    <h2>Update Class Data</h2>
                    <div class="form-element">
                        <input type="text" id="classEditID" placeholder="Class ID" 
                        value="<?php echo $rows['classID']?>" name="classEditID" >
                    </div>
                    <div class="form-element">
                        <input type="text" id="classCodeEdit" placeholder="Class Code"
                        value="<?php echo $rows['classCode']?>" name="classCodeEdit" >
                    </div>
                    <div class="form-element">
                        <input type="text" id="classNameEdit" placeholder="Class Name"
                        value="<?php echo $rows['className']?>" name="classNameEdit" >
                    </div>
                    <select name="teacherEditID" id="teacherSelect">
                    <option value="value" disabled selected>Select Teacher</option>
                    <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblteacher");
                        while($row1= $sql->fetch_assoc()){?>
                    <option value="<?php echo $row1['teacher_ID']; ?>" ><?php echo $row1['T_fname']." ". $row1['T_lname'];?></option>
                        <?php } ?>
                    </select>
                    <select name="subjectEditID" id="subjectSelect">
                    <option value="value" disabled selected >Select Subject</option>
                     <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblsubject");
                        while($row2= mysqli_fetch_array($sql)){?>
                        <option value="<?php echo $row2['subject_ID']; ?>" ><?php echo $row2['subCode']." ". $row2['subName'];?></option>
                        <?php } ?>
                        </select>
                        <div class="form-element">
                        <button id="save-btn" name="saveDetails">Save Details</button>
                    </div>
                    </form>
                </div>
            </div>
        <?php }
    }

    if (!$classFound) {
        ?>
         
        <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <form method="POST">
                <h2>Class</h2>
                <div class="form-element">
                    <input type="text" id="classID" placeholder="Class ID" name="classID" >
                </div>
                <div class="form-element">
                    <input type="text" id="classCode" placeholder="Class Code" name="classCode" >
                </div>
                <div class="form-element">
                    <input type="text" id="className" placeholder="Class Name" name="className" >
                </div>
                <select name="teacherID" id="teacherSelect">
                <option value="value" disabled selected>Select Teacher</option>
                <?php
                    $sql =mysqli_query($con,"SELECT * FROM tblteacher");
                    while($rows= $sql->fetch_assoc()){?>
                <option value="<?php echo $rows['teacher_ID']; ?>"><?php echo $rows['T_fname']." ". $rows['T_lname'];?></option>
                    <?php } ?>
                </select>
                <select name="subjectID" id="subjectSelect">
                <option value="value" disabled selected>Select Subject</option>
            <?php
                    $sql =mysqli_query($con,"SELECT * FROM tblsubject");
                    while($rows= $sql->fetch_assoc()){?>
                <option value="<?php echo $rows['subject_ID']; ?>"><?php echo $rows['subCode']." ". $rows['subName'];?></option>
                <?php } ?>
            </select>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            </div>
        </div>
    <?php }
} else {
    ?>
    <div class="popup">
    <div class="close-btn">&times;</div>
        <div class="form">
            <form method="POST">
                <h2>Class</h2>
                <div class="form-element">
                    <input type="text" id="classID" placeholder="Class ID" name="classID" >
                </div>
                <div class="form-element">
                    <input type="text" id="classCode" placeholder="Class Code" name="classCode" >
                </div>
                <div class="form-element">
                    <input type="text" id="className" placeholder="Class Name" name="className" >
                </div>
                <select name="teacherID" id="teacherSelect">
                <option value="value" disabled selected>Select Teacher</option>
                <?php
                    $sql =mysqli_query($con,"SELECT * FROM tblteacher");
                    while($rows= $sql->fetch_assoc()){?>
                <option value="<?php echo $rows['teacher_ID']; ?>"><?php echo $rows['T_fname']." ". $rows['T_lname'];?></option>
                    <?php } ?>
                </select>
                <select name="subjectID" id="subjectSelect">
                <option value="value" disabled selected>Select Subject</option>
            <?php
                    $sql =mysqli_query($con,"SELECT * FROM tblsubject");
                    while($rows= $sql->fetch_assoc()){?>
                <option value="<?php echo $rows['subject_ID']; ?>"><?php echo $rows['subCode']." ". $rows['subName'];?></option>
                <?php } ?>
            </select>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            </div>
    </div>
<?php } ?>
<?php } ?>

<?php
    function get_studentClass_Records(){
        //This is to display all the Guidance Records
        include "../connect.php";
       
            $sql= "SELECT tblstudentclasses.studentClassesID, tblclass.classCode AS 'Class Code', tblclass.className AS 'Class Name', CONCAT (tblstudent.stud_fname,' ', tblstudent.stud_lname) AS 'Student'
                    FROM tblstudentclasses
                    INNER JOIN tblclass ON tblclass.classID = tblstudentclasses.classID
                    INNER JOIN tblstudent ON tblstudent.studentID = tblstudentclasses.studID;";

            $sqlquery = mysqli_query($con, $sql);
             while ($rows = mysqli_fetch_array($sqlquery)) {
                ?>
                <tr>
                <form method="POST">
                    <td><?php echo $rows['Class Code']; ?></td>
                    <td><?php echo $rows['Class Name']; ?></td>
                    <td><?php echo $rows['Student']; ?></td>
                    <td> <a name="edit" id="editbtn" href="?edit=<?php echo $rows['studentClassesID'];?>">Edit</a>
                         <a id="deletebtn" href="#" onclick="del(<?php echo $rows['studentClassesID'];?>)">Delete</a>
                    </td>

                    <?php } ?>
                </form>
         </tr>
<?php } ?>

<?php
function crudStudentClasses()
{
    include "../connect.php";

    if (isset($_POST['addbtn'])) {

        if (!isset($_SESSION['adminID'])) {

            header('Location: http://localhost/TES/adminFiles/student-class.php');
            exit();
        }

        $adminId = $_SESSION['adminID'];
        $classID = $_POST['classID'];
        $studentID = $_POST['studentID'];
       

        $sql = "INSERT INTO tblstudentclasses (adminID, studID, classID, date_created, date_updated)
            VALUES ('$adminId', '$studentID', '$classID', current_timestamp(), NULL);";

        if (mysqli_query($con, $sql)) {
            header('Location: http://localhost/TES/adminFiles/student-class.php');
        } else {
            echo "Error: " . $sql . "<br>" . mysqli_error($con);
        }
    }
        if(isset($_GET['del']))
        { 
            $delID = $_GET['del'];
            $sqldelete = "DELETE FROM tblstudentclasses WHERE `tblstudentclasses`.`studentClassesID` = $delID";
            mysqli_query($con, $sqldelete);
            header('Location: http://localhost/TES/adminFiles/student-class.php');
        }

        if(isset($_POST['saveDetails'])){
            if (!isset($_SESSION['adminID'])) {

                header('Location: http://localhost/TES/adminFiles/student-class.php');
                exit();
            }
            $adminId = $_SESSION['adminID'];
    
            $classEditID = $_POST['classEditID'];
            $studentEditID = $_POST['studentEditID'];
           

            $ID = $_GET['edit'];

            $sqledit = "UPDATE `tblstudentclasses` SET `studID` = '$studentEditID', `adminID` = '$adminId',
            `classID` = '$classEditID',`date_updated` =  current_timestamp() WHERE `tblstudentclasses`.`studentClassesID` = $ID";
             mysqli_query($con, $sqledit);
             header('Location: http://localhost/TES/adminFiles/student-class.php');
        }
}
?>

<?php
function myStudentClassesFunction(){
include "../connect.php";

if (isset($_GET['edit'])) {
    $editStudentClass = $_GET['edit'];

    $sql= "SELECT tblstudentclasses.studentClassesID, tblclass.classCode AS 'Class Code', tblclass.className AS 'Class Name', CONCAT (tblstudent.stud_fname,' ', tblstudent.stud_lname) AS 'Student'
                    FROM tblstudentclasses
                    INNER JOIN tblclass ON tblclass.classID = tblstudentclasses.classID
                    INNER JOIN tblstudent ON tblstudent.studentID = tblstudentclasses.studID;";


    $sqlquery = mysqli_query($con, $sql);
    $classFound = false;

    while ($rows = mysqli_fetch_array($sqlquery)) {
        if ($editStudentClass == $rows['studentClassesID']) {
            $classFound = true;
            ?>
             <script type="text/javascript" src="../scriptFiles/studentClasses.js">editPopup();</script>
            <div class="left">
                  <button id="editbtn">Update Classes</button>
            </div>

            <div class="popup">
               <div class="close-btn">&times;</div>
                    <div class="form">
                    <form method="POST">
                    <h2>Update Class Data</h2>
                    <select name="classEditID" id="classSelect">
                    <option value="value" disabled selected>Select Class</option>
                    <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblclass");
                        while($row1= $sql->fetch_assoc()){?>
                    <option value="<?php echo $row1['classID']; ?>" ><?php echo $row1['classCode'];?></option>
                        <?php } ?>
                    </select>
                    <select name="studentEditID" id="studentSelect">
                    <option value="value" disabled selected >Select Student</option>
                     <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblstudent");
                        while($row2= mysqli_fetch_array($sql)){?>
                        <option value="<?php echo $row2['studentID']; ?>" ><?php echo $row2['stud_fname']." ". $row2['stud_lname'];?></option>
                        <?php } ?>
                        </select>
                        <div class="form-element">
                        <button id="save-btn" name="saveDetails">Save Details</button>
                    </div>
                    </form>
                </div>
            </div>
        <?php }
    }

    if (!$classFound) {
        ?>
         
        <div class="popup">
        <div class="close-btn">&times;</div>
        <div class="form">
            <form method="POST">
                <h2>Student Classes</h2>
                <div class="form-element">
                    <label for="file" class="choose">Choose CSV File</label>
                    <input type="file" class="uploadfile" name="file" accept=".csv">
                    <button type="submit" class="import" name="import">Import</button>
                 </div>
                <select name="classID" id="classSelect">
                    <option value="value" disabled selected>Select Class</option>
                    <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblclass");
                        while($row1= $sql->fetch_assoc()){?>
                    <option value="<?php echo $row1['classID']; ?>" ><?php echo $row1['classCode'];?></option>
                        <?php } ?>
                </select>
                <select name="studentID" id="studentSelect">
                    <option value="value" disabled selected >Select Student</option>
                     <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblstudent");
                        while($row2= mysqli_fetch_array($sql)){?>
                        <option value="<?php echo $row2['studentID']; ?>" ><?php echo $row2['stud_fname']." ". $row2['stud_lname'];?></option>
                        <?php } ?>
                </select>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            </div>
        </div>
    <?php }
} else {
    ?>
    <div class="popup">
    <div class="close-btn">&times;</div>
        <div class="form">
            <form method="POST">
                <h2>Class</h2>
                <select name="classID" id="classSelect">
                    <option value="value" disabled selected>Select Class</option>
                    <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblclass");
                        while($row1= $sql->fetch_assoc()){?>
                    <option value="<?php echo $row1['classID']; ?>" ><?php echo $row1['classCode'];?></option>
                        <?php } ?>
                </select>
                <select name="studentID" id="studentSelect">
                    <option value="value" disabled selected >Select Student</option>
                     <?php
                        $sql =mysqli_query($con,"SELECT * FROM tblstudent");
                        while($row2= mysqli_fetch_array($sql)){?>
                        <option value="<?php echo $row2['studentID']; ?>" ><?php echo $row2['stud_fname']." ". $row2['stud_lname'];?></option>
                        <?php } ?>
                </select>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            </div>
    </div>
<?php } ?>
<?php } ?>