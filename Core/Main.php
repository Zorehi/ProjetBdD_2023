<?php
    namespace App\Core;

use App\Controllers\LoginController;
use App\Controllers\MainController;

    class Main
    {
        public function start()
        {
            // On démarre la session
            session_start();

            if (!isset($_COOKIE['color-scheme'])) {
                setcookie(
                    'color-scheme',
                    '__pj-light-mode',
                    [
                        'expires'=> time() + 365*24*60*60
                    ]
                );
            }

            // On retire le "trailing slash" (dernier slash) éventuel de l'URL
            // On récupère l'URL
            $uri = $_SERVER['REQUEST_URI'];

            // On vérifie que uri n'est pas vide et se termine pas un /
            if (!empty($uri) && $uri != '/' && $uri[-1] === '/') {
                // On enlève le /
                $uri = substr($uri, 0, -1);

                // On envoie un code de redirection permanente
                http_response_code(301);

                // On redirige vers l'URL sans /
                header('Location: '. $uri);
                exit;
            }

            $variables = [];
            if (strstr($uri, '?')) {
                $array = explode('&', substr($uri, strpos($uri, '?')+1));
                foreach($array as $i => $value) {
                    $variables[$i] = explode('=', $value)[1];
                }
            }

            // On retire le "trailing slash" (dernier slash) éventuel de $_GET['p']
            if (!empty($_GET['p']) && $_GET['p'][-1] === '/') {
                $_GET['p'] = substr($_GET['p'], 0, -1);
            }

            // On gère les paramètres d'URL
            // p=controlleur/methode
            // On sépare les différents paramètres dans un tableau
            $params = explode('/', $_GET['p']);

            if ($params[0] != '') {
                // On a au moins 1 paramètre
                // On récupère le nom du contrôleur à instancier
                // On met une majuscule en première lettre, on ajoute le namespace complet avant et on ajoute le "Controller" après
                $controller = '\\App\\Controllers\\'.ucfirst(array_shift($params)).'Controller';

                // On instancie le contrôleur
                $controller = new $controller();

                // On récupère le 2ieme paramètre d'URL
                $action = (isset($params[0])) ? array_shift($params) : 'index';

                if (method_exists($controller, $action)) {
                    // Si il y a des variables on les passent à la méthode
                    count($variables) > 0 ? call_user_func_array([$controller, $action], $variables) : $controller->$action();
                } else {
                    http_response_code(404);
                    echo "La page recherchée n'existe pas";
                }

            } else {
                // On n'a pas de paramètres
                // On instancie le contrôleur par défaut
                $controller = new MainController();

                // On appelle la méthode index
                $controller->index();
            }
        }
    }
?>