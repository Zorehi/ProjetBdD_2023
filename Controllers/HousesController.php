<?php

namespace App\Controllers;

use App\Models\HouseModel;

class HousesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }
    
    public function index($id) {
        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $pageName = "{$house->getHouse_name()} | Projet BdD";

        $this->render('/houses/index', compact('pageName', 'house'));
    }

    public function create() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }
}