<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-straight/css/uicons-regular-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-straight/css/uicons-solid-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-solid-rounded/css/uicons-solid-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-rounded/css/uicons-bold-rounded.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-bold-straight/css/uicons-bold-straight.css'>
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/2.0.0/uicons-regular-rounded/css/uicons-regular-rounded.css'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/flat-ui/2.2.2/css/flat-ui.min.css" integrity="sha512-PvB3Q4vTvWD/9aiiELYI3uebup/4mtou3Mc/uGudC/Zl+C9BdKUkAI+5jORfA+fvLK4DpzC5VyEN7P2kK43hjg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <script type="text/javascript" src="../scriptfiles/teacherPanel.js"></script>
    <link href= "teacherPanel.css" rel= "stylesheet">
    <title>TES - Teacher Panel</title>
</head>
<body>
    <div class="sidebar">
    <div class="logo"></div>
    <ul class="menu">
        <li>
            <a href="#">
                <i class="fi fi-rs-dashboard"></i>
                <span onclick="teacherDashboardFunction()">Dashboard</span>
            </a>
        </li>
        <li>
            <a href="#">
                <i class="fi fi-rr-chalkboard-user"></i>
                <span onclick="teacherPerformanceFunction()">Teaching Performance</span>
            </a>
        </li>
        <li class="logout">
            <a href="logout.php">
                <i class="fi fi-br-exit"></i>
                <span>Log out</span>
            </a>
        </li>
    </div>
    <div class="header-output">
        <div class="header">
            <div class="header-title">
                <h4>Teacher Evaluation System</h4>
            </div>
            <div class="dropdown">
               
                <button class="dropbtn" value="username">Teacher</button>
               
                <div class="dropdown-content">
                    <a href="#">Account Settings</a>
                </div>
            </div>
        </div>
         <div class="output">
             <iframe id="myframe" src="../teacherFiles/teacherDashboard.php"></iframe>
         </div>
    </div>
</body>
</html>