<?php 
    include "../connect.php";
    include "guidanceFunction.php";
    insertRestriction();
    insertQuestion();
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link href= "manageForm.css" rel= "stylesheet">
    <title>Guidance - Manage Evaluation Form</title>
</head>
<body>
    <div class="manage-form">
        <h2>Evaluation Form</h2>
        <span>Home / Manage Evaluation Form</span>
    </div>
    <div class="question-form">
    <form method="POST">
        <h2>Evaluation Form</h2>
        <div class="form-element">
            <select name="category" id="category">
                <option value="value" disabled selected>Select Category</option> 
               <?php 
                $sql =mysqli_query($con,"SELECT * FROM tblcategory");
                while($row2= $sql->fetch_assoc()){?> 
                <option value="<?php echo $row2['categoryID']; ?>"><?php echo $row2['categoryName']; ?></option> 
                 <?php } ?>
            </select>
            <div class="form-element">
                <textarea name="addDescription" id="question" placeholder="Question"></textarea>
            </div>
            <div class="form-element">
               <input type="submit" id="add-btn" name="addQuestion">
            </div>
        </div>
    </form>
    </div>
    <div class="evaluation-questionnaire">
        <div class="header">
            <h4>Evaluation Questionnaire for Academic: 2023-2024 1st</h4>
            <button id="manageForm">Evaluation Restriction</button>
            <script >
            document.querySelector("#manageForm").addEventListener("click", function() {
                document.querySelector(".popup").classList.add("active");
            });
            document.querySelector(".popup .close-btn").addEventListener("click", function() {
                document.querySelector(".popup").classList.remove("active");
            });
            document.querySelector(".popup #add-btn").addEventListener("click", function() {
                document.querySelector(".popup").classList.remove("active");
            });</script>
        </div>
        <div class="popup">
        <div class="close-btn">&times;</div>
            <div class="form">
            <form method="POST">
                <h2>Manage Evaluation Restriction</h2>
                <div class="form-element">
                    <span>Class</span>
                    <select name="classInsert" id="category">
                        <option value="value" disabled selected>Please select here</option> 
                        <?php 
                            $sql =mysqli_query($con,"SELECT * FROM tblclass");
                            while($row1= $sql->fetch_assoc()){?> 
                            <option value="<?php echo $row1['classID']; ?>"><?php echo $row1['classCode']; ?></option> 
                        <?php } ?>   
                    </select>
                </div>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            <table>
                <?php restrictionRecords();?>
            </table>
            <div class="saveDetails">
                <button id="saveBtn">Save</button>
            </div>
            </div>
        </div>
       
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
      
       <?php guidanceQuestionForm(); ?>
     
    </div>
    <script type="text/javascript" src="../scriptfiles/manageForm.js"></script>
</body>
</html>