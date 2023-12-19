<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script type="text/javascript" src="dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/guidancepanel.js"></script>
    <link href= "evaluationreport.css" rel= "stylesheet">
    <title>Guidance - Evaluation Report</title>
</head>
<body>
    <div class="evaluation-report">
        <h2>Evaluation Report</h2>
        <span>Home / Manage Evaluation Report</span>
    </div>
    <div class="select-teacher">
        <label for="teacher">Select Teacher:</label>
        <select name="teacher" id="teacher">
            <option value="teacher1">None</option>
            <option value="teacher1">Darlene Maglangit</option>
        </select>
    </div>
    <div class="left">
        <a href="first"></a>
        <br>
        <a href="second"></a>
        <br>
        <a href="third"></a>
    </div>
    <div class="right">
        <h3>Evaluation Report</h3>
        <div class="teacherinfo">
            <label for="teacherinfo" class="text-left">Faculty:</label>
            <br>
            <label for="teacherinfo" class="text-left">Class:</label>
            <br>
            <label for="teacherinfo" class="text-left">Total Students Evaluated: </label>
            
            <br>
            <label for="teacherinfo" class="text-left">Subject: </label>
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
        <center>
        <table>
            <tr>
                <th>Category</th>
                <th>1</th>
                <th>2</th>
                <th>3</th>
                <th>4</th>
                <th>5</th>
            </tr>
            <tr>
                <td>Question 1</td>
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
</body>
</html>