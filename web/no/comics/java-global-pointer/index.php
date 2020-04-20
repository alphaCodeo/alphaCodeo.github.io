<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>A webcomic</title>
        <link rel="stylesheet" type="text/css" href="/comics/style.css">
    </head>
    <body>
        <div id="header">
            <h1>A webcomic</h1>
        </div>

        <div id="comic">
            <a title="it's true"><img src="/comics/java-global-pointer/java-global-pointer.png" alt=""></a>
        </div><br>

        <hr>

        <br>
        <?php
            $file = $_SERVER["DOCUMENT_ROOT"] . "/comics/comics-list-footer.php";
            include($file);
        ?>
        <br>

        <hr>
    </body>
</html>
