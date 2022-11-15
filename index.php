<?php
    use App\Autoloader;
    use App\Core\Main;

    define('ROOT', dirname(__FILE__));

    require_once ROOT.'/Autoloader.php';
    Autoloader::register();

    $app = new Main();

    $app->start();
?>