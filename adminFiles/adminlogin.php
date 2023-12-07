<?php 
include "connect.php";
session_start();

if (isset($_POST['loginBtn'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT adminID FROM tbladmin WHERE username = ? AND adminpassword = ?";
    
    $stmt = mysqli_prepare($con, $sql);

    mysqli_stmt_bind_param($stmt, 'ss', $username, $password);

    mysqli_stmt_execute($stmt);

    $result = mysqli_stmt_get_result($stmt);

    $rows = mysqli_fetch_assoc($result);

    if ($rows) {
        // Admin authentication successful
        $_SESSION['adminID'] = $rows['adminID'];
        header("Location: http://localhost/TES/adminFiles/adminpanel.php");
        exit();
    } else {
        // Admin authentication failed
        echo "Invalid username or password";
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "adminlogin.css" rel= "stylesheet">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <title>TES - Admin Login</title>
</head>
<body>
    <div class="center-line">
        <img src="../img/gclogo.png" alt="logo">
        <h1>Teacher Evaluation System</h1>
    </div>
    <div class="center">
        <h2>Welcome Admin!</h2>
        <form method="post">
            <div class="txt-field">
                <input type="text" name="username" required>
                <span></span>
                <label>Username</label>
            </div>
            <div class="txt-field">
                <input type="password" name="password" required id="password">
                <span></span>
                <label>Password</label>
            </div>
            <input type="checkbox" onclick="myFunction()">
                <label for="show-pass">Show Password</label><br>
            <input type="submit" name="loginBtn" value="Login">
        </form>
    </div>
    <script>
        function myFunction() {
            var x = document.getElementById("password");
            if (x.type === "password") {
                x.type = "text";
            } else {
                x.type = "password";
            }
        }
    </script>
</body>
</html>