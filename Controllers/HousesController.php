<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\Associations\OwnerModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Entities\CityModel;
use App\Models\Entities\HouseModel;

class HousesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    private function retrieveInfoForPanelManage($id) {
        $owner = new OwnerModel();
        $owner_array = $owner->findByIdHouse($id);
        if ($owner_array) $owner->hydrate($owner_array);
        
        $house = new HouseModel();
        $house->hydrate($house->findById($id));

        $apartment = new ApartmentModel();
        $nbr_aparts = $apartment->countApartFromHouse($id);
        $nbr_free_aparts = $apartment->countFreeApartFromHouse($id);

        $pageName = "{$house->getHouse_name()} | Projet BdD";

        return compact('owner', 'house', 'pageName', 'nbr_aparts', 'nbr_free_aparts');
    }
    
    public function index($id) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/houses/index', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts'));
    }

    public function house_aparts($id) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/houses/house_aparts', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts'));
    }

    public function edit($id) {
        extract($this->retrieveInfoForPanelManage($id));

        $city = new CityModel();
        $city->hydrate($city->findById($house->getId_city()));
            
        $this->render('/houses/edit', compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts', 'city'));
    }

    public function insights($id, $section) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/houses/insights/'.$section, compact('pageName', 'house', 'owner', 'nbr_aparts', 'nbr_free_aparts'), 'analytics');
    }

    // Permet d'afficher la page house/create
    public function create() {
        $pageName = "Créer une maison | Projet BdD";
        $house = new HouseModel();
        $city = new CityModel();
        // On appelle la méthode validate de la classe mère pour vérifier que les champs sont bien remplis 
       if (Form::validate($_POST, ["house_name", "isolation_degree", "eval_eco", "citizen_degree", "street", "house_number","city_name","postcode"])) {
         {
            // Créer la ville si elle existe déjà
            $cityArray = $city->findBy(['city_name'=> $_POST['city_name']]);
            if($cityArray) // Dans la table city on cherche tous les attributs city name égal à ceux du POST
            {
                $city->hydrate($cityArray);
            }
            else
            {
                $city->hydrate($_POST);
                $city->create();
                // IL faut maintenant aller chercher le n° de département avec une requète  
                
            }
            
            $house->create();
            $house->hydrate($_POST);

            
            

         }
         
         

        
       
       }

        $this->render('/houses/create', compact('pageName'));

    }    
}