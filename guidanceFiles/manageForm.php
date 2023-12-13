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
        <h2>Evaluation Report</h2>
        <span>Home / Manage Evaluation Form / Manage Questionnaire</span>
    </div>
    <div class="question-form">
    <form method="POST">
        <h2>Evaluation Form</h2>
        <div class="form-element">
            <select name="category" id="category">
                <option value="value" disabled selected>Select Category</option>     
            </select>
            <div class="form-element">
                <textarea name="" id="question" placeholder="Question"></textarea>
            </div>
            <div class="form-element">
                <button id="add-btn" name="addbtn">Save</button>
            </div>
        </div>
    </form>
    </div>
    <div class="evaluation-questionnaire">
        <div class="header">
            <h4>Evaluation Questionnaire for Academic: 2023-2024 1st</h4>
            <button id="manageForm">Evaluation Restriction</button>
        </div>
        <div class="popup">
        <div class="close-btn">&times;</div>
            <div class="form">
            <form method="POST">
                <h2>Manage Evaluation Restriction</h2>
                <div class="form-element">
                    <span>Class</span>
                    <select name="category" id="category">
                        <option value="value" disabled selected>Please select here</option>     
                    </select>
                </div>
                <div class="form-element">
                    <button id="add-btn" name="addbtn">Add</button>
                </div>
            </form>
            <table>
                <tr>
                    <th>Class</th>
                    <th>Teacher</th>
                    <th>Subject</th>
                    <th>Action</th>
                </tr>
                <tr>
                    <td>Question 1</td>
                    <td>Question 1</td>
                    <td>Question 1</td>
                    <td>
                        <a id="deletebtn" href="#" onclick="">Delete</a>
                    </td>
                </tr>
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
        <table class="list">
            <tr>
                <th>Category</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
            <tr>
                <td>Question 1asdasdasdadas</td>
                <td>
                    <input type="radio" name="optradio1" value="1">
                </td>
                <td>
                    <input type="radio" name="optradio1" value="2">
                </td>
                <td>
                    <input type="radio" name="optradio1" value="3">
                </td>
                <td>
                    <input type="radio" name="optradio1" value="4">
                </td>
                <td>
                    <input type="radio" name="optradio1" value="5">
                </td>
            </tr>
        </table>
    </div>
    <script type="text/javascript" src="../scriptfiles/manageForm.js"></script>
</body>
</html>