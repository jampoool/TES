<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css" integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="dist/js/jquery.js"></script>
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
            <option value="teacher1" disabled selected>Please select here</option>
            <option value="teacher1">Darlene Maglangit</option>
        </select>
    </div>
    <div class="list">
        <a href="first">BSIT 1-A -- 101-Programming</a>
        <br>
        <a href="second">BSIT 1-B -- 102-Networking</a>
        <br>
        <a href="third">BSIT 1-C -- 103-Designing</a>
    </div>
    <div class="evaluation-form">
        <h3>Evaluation Form</h3>
        <div class="teacherinfo">
            <label for="teacherinfo" class="text-left">Faculty: Darlene Maglangit</label>
            <br>
            <label for="teacherinfo" class="text-left">Class: BSIT 1-A</label>
            <br>
            <label for="teacherinfo" class="text-left">Total Students Evaluated: 0</label>
            <br>
            <label for="teacherinfo" class="text-left">Academic Year: 2023-2024</label>
            <br>
            <label for="teacherinfo" class="text-left">Subject: 101 - Programming</label>
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