<?php
class Database extends SQLite3
{
    function __construct($file)
    {
        $this->open($file);
    }
}

if ($_POST["username"]) {
    if ($_POST["password"] == $_POST["confpassword"]) {
        $accounts = new Database($_SERVER["DOCUMENT_ROOT"] . "/accounts.db");

        if(!$accounts) {
            echo $accounts->lastErrorMsg();
            echo "<br>";
        }

        $sql = "INSERT INTO ACCOUNTS (USERNAME, PASSWORD_HASH) VALUES (\"" . $_POST["username"] . "\", \"" . hash("sha256", $_POST["password"]) . "\")";

        $ret = $accounts->exec($sql);

        if(!$ret){
            echo $accounts->lastErrorMsg();
            echo "<br>";
        }

        $accounts->close();
        exit("success");
    } else {
        exit("nomatch");
    }
}
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
            Generate password hash to register
        </title>
        <link rel="stylesheet" type="text/css" href="style.css">
        <link rel="stylesheet" type="text/css" href="login.css">
    </head>
    <body>
        <form id="register">
            <input type="text" name="username" placeholder="Username"><br>
            <input type="password" name="password" placeholder="Password"><br>
            <input type="password" name="confpassword" placeholder="Confirm Password"><br>
            <button type="submit">Submit</button><br>
        </form>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
        <script>
$("#register").submit(function(e) {
    e.preventDefault();

    var data = $("#register").serialize();

    $.ajax({
        type: "POST",
        url: "/register.php",
        data: data
    }).done(function(data, textStatus, jqXHR) {
        var body = document.getElementsByTagName("body")[0];

        if (data == "nomatch") {
            body.innerHTML = "Passwords do not match" + body.innerHTML;
        } else {
            if (data == "success") {
                body.innerHTML = "Successfully registered." + body.innerHTML;
            } else {
                body.innerHTML = "There was an error.<br>" + data + body.innerHTML;
            }
        }
    });
});
        </script>
    </body>
</html>
