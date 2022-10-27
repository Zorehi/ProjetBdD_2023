<?php
    $file_path = dirname(__DIR__) . "\\js\\" . $_GET["file"];
    $ressource = fopen($file_path, 'r');
    echo fread($ressource, filesize($file_path));
?>