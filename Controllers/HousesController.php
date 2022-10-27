<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class HousesController extends Controller
{
    public function index() {  }

    public function create() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }

    public function search() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }
}