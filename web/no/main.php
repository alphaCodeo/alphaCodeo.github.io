<?php
session_start();
if($_SESSION["username"]) {
} else {
    echo("Not logged in");
    exit;
}
?>
<!DOCTYPE html>
<meta charset="utf-8">
<html>
    <head>
        <title>
            Main page
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="main.css">
    </head>
    <body>
        <div class="maintext">
            <h1>Welcome to the login, <?php echo $_SESSION["username"];?></h1>
            <form action="logout.php" id="logout">
                <button type="submit">Logout</button>
            </form>

            You have logged in successfully!<br>
            Work in progress<br>
            Oh, nice.<br>
            <br>

            <div class="projects">
                <h2>Projects:</h2>
                <ul>
                    <li><a href="/pianotest/examples" target="_blank">
                        Automatic Scales Tester
                    </a><br></li>
                    <li><a href="/codextremeapps" target="_blank">
                        Code::XtremeApps::2017 Training
                    </a><br></li>
                    <li><a href="/htmltests" target="_blank">
                        Tests
                    </a><br></li>
                    <li><a href="/CSSZenGarden" target="_blank">
                        CSSZenGarden Project
                    </a><br></li>
                    <li><a href="/datafinal" target="_blank">
                        Data Structures Final Project Submission
                    </a><br></li>
                    <li><a href="/neural" target="_blank">
                        Neural Network in JavaScript
                    </a><br></li>
                    <li><a href="/comics" target="_blank">
                        Comics
                    </a><br></li>
                </ul>
            </div>
            <br>

            Khan Academy accounts:
            <a href="https://www.khanacademy.org/profile/codeo/" target="_blank">owen</a> <a href="https://www.khanacademy.org/profile/Raider1456/" target="_blank">jake</a><br>
        </div>
        <br>

        <div class="owen">
            By Owen Ngeow<br>
        </div>

        <div class="message">
            Leave a comment
            <form action="m.php" method="post">
                <input type="text" name="text">
                <button type="submit">Send</button>
            </form>
        </div>
        </form>
    </body>
</html>
