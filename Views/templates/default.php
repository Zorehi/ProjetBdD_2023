<!DOCTYPE html>
<html lang="fr" id="projetbdd" class=<?php echo isset($_COOKIE["color-scheme"]) ? $_COOKIE["color-scheme"] : "__pj-light-mode"; ?>>

<head>
    <base href="/">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $pageName ?></title>
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="reset.css">
    <script src="js.php?file=util.js" defer></script>
    <script src="js.php?file=navTop.js" defer></script>
    <script src="js.php?file=navLeft.js" defer></script>
    <script src="https://kit.fontawesome.com/364f5f0809.js" crossorigin="anonymous"></script>
</head>

<body class="system-fonts--body segoe">

    <?php 
        include ROOT."/Views/navbar/navTop/index.php";
        include ROOT."/Views/navbar/navLeft/index.php";
    ?>

    <?= $contenu ?>

</body>

</html>