<?php
    header("Content-type: image/png");
    $file_path = dirname(__DIR__) . "\\image\\" . $_GET["file"];
    $image = imagecreatefrompng($file_path);
    imagepng($image);
?>