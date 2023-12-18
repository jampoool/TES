<?php

include "../connect.php";
$teacherId = $_POST['teacher_id'];

$sql = "SELECT tblclass.classID, tblclass.classCode, tblsubject.subName, tblteacher.T_fname, tblteacher.T_lname
        FROM tblclass
        JOIN tblsubject ON tblclass.subID = tblsubject.subject_ID
        JOIN tblteacher ON tblclass.teachID = tblteacher.teacher_ID
        WHERE tblclass.teachID = '$teacherId'";
    
$result = $con->query($sql);

if ($result->num_rows > 0) { 
    while ($row = $result->fetch_assoc()) { ?>
    <form method="POST">
       <a name="link"  href="?classID=<?php echo $row['classID']?>" class="class-link" data-class-id="<?php echo $row['classID'] ?>" data-class-code="<?php echo $row['classCode'] ?>" data-subject-name="<?php echo $row['subName'] ?>" data-teacher-name="<?php echo $row['T_fname'].' '.$row['T_lname'] ?>" > <?php echo $row['classCode'] ?> -- <?php echo $row['subName'] ?></a><br>
       </form>
    <?php }
} else { ?> 
    <p>No classes found for the selected teacher</p>
<?php }
?>
