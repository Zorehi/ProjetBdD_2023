<!DOCTYPE html>
<html lang="fr" id="projetbdd" class=<?php echo isset($_COOKIE["color-scheme"]) ? $_COOKIE["color-scheme"] : "__pj-light-mode"; ?>>

<head>
    <base href="/">
    <link rel="shortcut icon" href="https://static.xx.fbcdn.net/rsrc.php/yD/r/d4ZIVX-5C-b.ico">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/reset.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="js.php?file=ScrollBar.js"></script>
    <script src="js.php?file=util.js"></script>
    <script src="https://kit.fontawesome.com/364f5f0809.js" crossorigin="anonymous"></script>
</head>

<body class="system-fonts--body segoe">
    
    <?php 
        include ROOT."/Views/navbar/navTop/index.php";
        include ROOT."/Views/navbar/navLeft/index.php";
    ?>

    <?= $contenu ?>

    <script src="js.php?folder=navTop"></script>
    <script src="js.php?folder=navLeft"></script>
</body>

</html>