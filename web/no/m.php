<?php
session_start();

$txt = $_POST["text"];
$head = "From: " . $_SESSION["username"];

if (mail("codeo@codeo", "Local website notification", $txt, $head)) {
    header("Location: /main.php");
    exit("Sent email");
} else {
    exit("error<br><a href=\"/main.php\"></a>");
}

?>
