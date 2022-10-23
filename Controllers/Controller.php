<?php
namespace App\Controllers;

abstract class Controller
{
    public function render(string $fichier, array $donnees = [], string $template = 'default')
    {
        // On extrait le contenu de $donnes
        extract($donnees);

        if (!isset($pageName)) {
            $pageName = "Projet BdD";
        }

        // On démarre le buffer de sortie
        ob_start();
        // A partir de ce point toute sortie est conservée en mémoire

        // On crée le chemin vers la vue
        require_once ROOT.'/Views'.$fichier.'.php';

        $contenu = ob_get_clean();

        require_once ROOT.'/Views/templates/'.$template.'.php';
    }
}