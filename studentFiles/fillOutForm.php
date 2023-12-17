<?php
    include "../connect.php";
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
    <div class="right">
        <h3>Evaluation Report</h3>
        <form method="">
            <fieldset>
                <legend>Rating Legend:</legend>
                <label for="rating1">1 = Strongly Disagree</label>
                <label for="rating2">2 = Disagree</label>
                <label for="rating3">3 = Uncertain</label>
                <label for="rating4">4 = Agree</label>
                <label for="rating5">5 = Strongly Agree</label>
            </fieldset>
        </form>
        <center>
        <?php  include "studentFunction.php";
                   studentEvaluationForm(); ?>
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
                    console.error('Error fetching classes:', error);
                }
            });
        });
    });

</script>

</div>
</body>
</html>