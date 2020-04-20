<?php
session_start();
if ($_SESSION["username"]) {
    header("Location: main.php");
    exit;
}

class Database extends SQLite3
{
    function __construct($file)
    {
        $this->open($file);
    }
}

$accounts = new Database("accounts.db");
$loggedIn = false;

if(!$accounts) {
    echo $accounts->lastErrorMsg();
    echo "<br>";
}

$sql = "SELECT * FROM ACCOUNTS WHERE USERNAME = \"".$_POST["user"]."\";";

$ret = $accounts->query($sql);

while($row = $ret->fetchArray(SQLITE3_ASSOC) ){
    if ($_POST["user"] == $row["USERNAME"] && hash("sha256", $_POST["pwd"]) == $row["PASSWORD_HASH"] && $_POST["user"] != "") {
        $loggedIn = true;
        $_SESSION["username"] = $_POST["user"];
        header("Location: main.php");
        break;
    }
}

if (!$loggedIn) {
    echo "Invalid login";
    exit;
}

$accounts->close();
?>
