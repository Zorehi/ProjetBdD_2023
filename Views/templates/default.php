<!DOCTYPE html>
<html lang="fr" id="projetbdd" class=<?php echo isset($_COOKIE["color-scheme"]) ? $_COOKIE["color-scheme"] : ""; ?>>

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <link rel="stylesheet" href="http://projetbdd/style.css">
    <link rel="stylesheet" href="http://projetbdd/reset.css">
    <script src="http://projetbdd/js.php?file=navTop.js"></script>
    <script src="http://projetbdd/js.php?file=navLeft.js"></script>
</head>

<body class="system-fonts--body segoe">

    <?php 
        include ROOT."/Views/navbar/navTop.php";
        include ROOT."/Views/navbar/navLeft.php";
    ?>

    <?= $contenu ?>

</body>

</html>