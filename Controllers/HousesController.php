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
        $is_admin_or_owner = $this->checkIfOwnerOrAdmin($id);

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/index', compact('pageName', 'house', 'is_admin_or_owner'));
    }

    public function edit($id) {
        $is_admin_or_owner = $this->checkIfOwnerOrAdmin($id);

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $city = new CityModel();
        $city->hydrate($city->findById($house->getId_city()));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/edit', compact('pageName', 'house', 'city', 'is_admin_or_owner'));
    }

    public function insights($id, $section) {
        $is_admin_or_owner = $this->checkIfOwnerOrAdmin($id);

        $house = new HouseModel();
        $house->hydrate($house->findById($id));
        $pageName = "{$house->getHouse_name()} | Projet BdD";
            
        $this->render('/houses/insights/'.$section, compact('pageName', 'house', 'is_admin_or_owner'));
    }

    // Permet d'afficher la page house/create
    public function create() {
        $pageName = "Créer une maison | Projet BdD";

        $this->render('/houses/create', compact('pageName'));
    }

    

    // Damn la première ligne de code en PHP - MDR 

    // C'est Jérémy qui écrit : ce qu'il y a dans cette fonction c'est à mettre dans la fonction create !!!
    // Et les lignes que j'ai commenté c'est parce qu'il y a une erreur dessus donc le site web marchait plus
    public function createHouse() {
        $pageName = "Créer une maison | Projet BdD";
        $house = new HouseModel;
        //$houseArray = $house->findById($house_name);

        // On appelle la méthode validate de la classe mère pour vérifier que les champs sont bien remplis 
       if (Form::validate($_POST, ["house_name", "isolation_degree", "eval_eco", "citizen_degree", "street", "house_number","city_name","postcode"])) {
            /*if ($houseArray)
            {
                // La maison existe déja on verra la gestion plus tard 
            }*/
        // On récupère les infos du formulaires dans des variables 
        $house_name = $_POST["house_name"];
        $isolation_degree = $_POST["isolation_degree"];
        $eval_eco = $_POST["eval_eco"];
        $citizen_degree = $_POST["citizen_degree"];
        $street = $_POST["street"];
        $house_number = $_POST["house_number"];
        $id_city = $_POST["city_name"];
        
        $house->create();
        //$houseArray = $house->findBy('house_Name'); // Celle la à vérifier

        //$userArray = $user->findBy(['email' => $user->getEmail()]);
        //$user->setId_users($userArray['id_users']);

       }

    }

    public function checkIfOwnerOrAdmin($idHouse) {
        if (!$_SESSION['user']['is_admin']) {
            $owner = new OwnerModel();
            $owner_array = $owner->findBy(['id_users' => $_SESSION['user']['id'], 'id_house' => $idHouse]);
            foreach ($owner_array as $owner) {
                $today = date("Y-m-d");
                if ($owner['from_date'] <= $today && ($owner['to_date'] > $today || $owner['to_date'] == "0000-00-00")) return true;
            }
            header("Location: /houses/$idHouse");
            exit;
        }
        return true;
    }
    
}