<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\UsersModel;

class HousesController extends Controller
{
    public function index() {  }

    // Permet de naviguer vers d'autres URL
    public function create() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }

    public function search() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }

    // Damn la première ligne de code en PHP 

    public function createHouse() {
        $pageName = "Créer une maison | Projet BdD";
        $house = new HouseModel;
        $houseArray = $house->findById($house_name);

        // On appelle la méthode validate de la classe mère pour vérifier que les champs sont bien remplis 
       if (Form::validate($_POST, ["house_name", "isolation_degree", "eval_eco", "citizen_degree", "street", "house_number","city_name","postcode"])) {
            if($houseArray)
            {
                // La maison existe déja on verra la gestion plus tard 
            }
        

       }

    }
    
}