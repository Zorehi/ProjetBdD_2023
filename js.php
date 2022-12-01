<?php 
    header("Content-type: text/javascript");

    if (isset($_GET["file"])) {
        // Ajoute le fichier demandé
        $file_path = dirname(__FILE__) . "/assets/js/" . $_GET["file"];
        $ressource = fopen($file_path, 'r');
        echo fread($ressource, filesize($file_path));
    } else {
        //  Ajoute tous les fichiers du dossier demandé
        $folder_path = dirname(__FILE__) . "/assets/js/" . $_GET["folder"];
        $data = file_get_contents($folder_path . "/files.json");
        $obj = json_decode($data);
    
        for ($i=0; $i < $obj->nbfiles; $i++) {
            $file_path = $folder_path . "/" . $obj->files[$i];
            $ressource = fopen($file_path, 'r');
            echo fread($ressource, filesize($file_path));
            echo "\n\n";
        }
    }
?>