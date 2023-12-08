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
    <link href= "evaluationform.css" rel= "stylesheet">
    <title>Guidance - Evaluation Form</title>
</head>
<body>
    <div class="evaluation-form">
        <h2>Evaluation Form</h2>
        <span>Home / Manage Evaluation Form</span>
    </div>
    <div class="left">
        <button id="addEvaluationForm">Add New Evaluation Form</button>
    </div>
    <div class="popup">
    <div class="close-btn">&times;</div>
        <div class="form">
            <h2>Evaluation Form</h2>
            <div class="form-element">
                <select name="category" id="category">
                    <option value="">Please select here</option>
                    <option value="">Category 1</option>
                    <option value="">Category 2</option>
                    <option value="">Category 3</option>
                </select>
            </div>
            <div class="form-element">
                <textarea name="" id="question" placeholder="Question"></textarea>
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
                    <th>Category Name</th>
                    <th>1</th>
                    <th>2</th>
                    <th>3</th>
                    <th>4</th>
                    <th>5</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>Question 1</td>
                    <td>
                      <input type="radio" name="optradio1">
                    </td>
                    <td>
                      <input type="radio" name="optradio1">
                    </td>
                    <td>
                      <input type="radio" name="optradio1">
                    </td>
                    <td>
                      <input type="radio" name="optradio1">
                    </td>
                    <td>
                      <input type="radio" name="optradio1">
                    </td>
                </tr>
        </table>
      <script type="text/javascript" src="../scriptfiles/evaluationForm.js"></script>
  </div>
</body>
</html>