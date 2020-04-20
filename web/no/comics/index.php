<?php
$comicDataFileName = "comics.json";
$comicFileData = file_get_contents($comicDataFileName);
$files = json_decode($comicFileData);
$file = $_SERVER["DOCUMENT_ROOT"] . "/comics/" . $files[count($files) - 1]->{"file"} . "/index.php";
include($file);
?>
