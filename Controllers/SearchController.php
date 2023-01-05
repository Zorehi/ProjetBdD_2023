<?php

namespace App\Controllers;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    public function all($querry) {
        $pageName = "{$querry} : résultat de la recherche | Projet BdD";

        $this->render('/search/all', compact('pageName', 'querry'));
    }

    public function houses($querry) {
        $pageName = "{$querry} : résultat de la recherche | Projet BdD";

        $this->render('/search/houses', compact('pageName', 'querry'));
    }

    public function apartments($querry) {
        $pageName = "{$querry} : résultat de la recherche | Projet BdD";

        $this->render('/search/apartments', compact('pageName', 'querry'));
    }
}