<ul id="comics">
    <?php
        $comicDataFileName = "comics.json";
        $comicFileData = file_get_contents($_SERVER["DOCUMENT_ROOT"] . "/comics/" . $comicDataFileName);
        $files = json_decode($comicFileData);
        for ($i = count($files) - 1; $i >= 0; $i--) {
            $f = $files[$i];
            echo "<li><a href=\"/comics/". $f->{"file"} . "/\">" . $f->{"name"} . "</a></li>\n";
        }
    ?>
</ul> 
