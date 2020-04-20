<?php
session_start();
if ($_SESSION["username"]) {
	header("Location: main.php");
	exit;
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head>
        <title>
            Login
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <h1>
            Login
        </h1>
        <form action=login.php method="post">
            <input type=text name="user" placeholder="Username"><br>
            <input type=password name="pwd" placeholder="Password"><br>
            <button type=submit>Login</button>
        </form>
        Don't have an account? Register now!<br>
        <button onclick="register()">Sign up</button>
        <script>
function register() {
    alert("Sorry you can't yet haha\nalso why would I let you into my private website?!?");
}
        </script>
    </body>
</html>
