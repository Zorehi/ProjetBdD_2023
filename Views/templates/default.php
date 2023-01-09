<!DOCTYPE html>
<html lang="fr" id="projetbdd" class=<?php echo isset($_COOKIE["color-scheme"]) ? $_COOKIE["color-scheme"] : "__pj-light-mode"; ?>>

<head>
    <base href="/">
    <link rel="shortcut icon" href="/assets/image/logo-projetbdd.png">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://kit.fontawesome.com/364f5f0809.js" crossorigin="anonymous"></script>
    <script src="assets/js/ScrollBar.js"></script>
    <script src="assets/js/util.js"></script>
</head>

<body class="system-fonts--body segoe">
    
    <?php 
        include ROOT."/Views/navbar/navTop/index.php";
        include ROOT."/Views/navbar/navLeft/index.php";
    ?>

    <?= $contenu ?>

    <script src="assets/js/navLeft/navLeft.js"></script>
    <script src="assets/js/navLeft/panelHouse.js"></script>
    <?php if ($_SESSION['user']['is_admin']) { ?>
    <script src="assets/js/navLeft/panelDatabase.js"></script>
    <?php } ?>
    <script src="assets/js/navTop/navTop.js"></script>
</body>

</html>