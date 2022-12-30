<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\Associations\OwnerModel;
use App\Models\Entities\CityModel;
use App\Models\Entities\HouseModel;

class HousesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }
    
    public function index($id) {
        $owner = new OwnerModel();
        $owner->hydrate($owner->findByIdHouse($id));

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/index', compact('pageName', 'house', 'owner'));
    }

    public function edit($id) {
        $owner = new OwnerModel();
        $owner->hydrate($owner->findByIdHouse($id));

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $city = new CityModel();
        $city->hydrate($city->findById($house->getId_city()));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/edit', compact('pageName', 'house', 'owner', 'city'));
    }

    public function insights($id, $section) {
        $owner = new OwnerModel();
        $owner->hydrate($owner->findByIdHouse($id));

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/insights/'.$section, compact('pageName', 'house', 'owner'));
    }

    // Permet d'afficher la page house/create
    public function create() {
        $pageName = "Créer une maison | Projet BdD";
        $house = new HouseModel;
        // On appelle la méthode validate de la classe mère pour vérifier que les champs sont bien remplis 
       if (Form::validate($_POST, ["house_name", "isolation_degree", "eval_eco", "citizen_degree", "street", "house_number","city_name","postcode"])) {
            /*if ($houseArray)
            {
                // La maison existe déja on verra la gestion plus tard 
            }*/
            $house_name = $_POST["house_name"];
            $houseArray = $house->findById($house_name);
            $house->hydrate($house->findById($houseArray['house_id']));
            $house->create();
            
        /* 
            $isolation_degree = $_POST["isolation_degree"];
            $eval_eco = $_POST["eval_eco"];
            $citizen_degree = $_POST["citizen_degree"];
            $street = $_POST["street"];
            $house_number = $_POST["house_number"];
            $id_city = $_POST["city_name"]; */


       
       }

        $this->render('/houses/create', compact('pageName'));

    }    
}