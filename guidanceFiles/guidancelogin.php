<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href= "guidancelogin.css" rel= "stylesheet">
    <script type="text/javascript" src="../dist/js/jquery.js"></script>
    <title>TES - Guidance Staff Login</title>
</head>
<body>
    <div class="center-line">
        <img src="../img/gclogo.png" alt="logo">
        <h1>Teacher Evaluation System</h1>
    </div>
    <div class="center">
        <h2>Welcome Guidance!</h2>
        <form method="post">
            <div class="txt-field">
                <input type="text" name="g_emailAdd" required>
                <span></span>
                <label>Email Address</label>
            </div>
            <div class="txt-field">
                <input type="password" name="g_password" required id="password">
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