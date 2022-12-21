<?php

namespace App\Controllers;

class HousesController extends Controller
{
    public function index() {  }

    public function create() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }
}