<?php

include "../connect.php";
$teacherId = $_POST['teacher_id'];  // Correct the key name

// Assuming tblteacher has a field named 'teacher_ID' and tblclasses has a field named 'teacher_ID'
$sql = "SELECT tblclass.classCode, tblsubject.subName
        FROM tblclass
        JOIN tblsubject ON tblclass.subID = tblsubject.subject_ID
        WHERE tblclass.teachID = '$teacherId'";
    
$result = $con->query($sql);

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { ?>
        <a href='#' class='class-link'><?php echo $row['classCode'] ?> -- <?php echo $row['subName'] ?></a><br>
    <?php }
} else { ?> 
  <p>No classes found for the selected teacher</p>
<?php }
?>