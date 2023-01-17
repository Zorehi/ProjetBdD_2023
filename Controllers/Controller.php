<?php
namespace App\Controllers;

use App\Models\Associations\OwnerModel;
use App\Models\Associations\TenantModel;
use App\Models\Entities\Apartment_typeModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\RoomModel;
use App\Models\Entities\UsersModel;

abstract class Controller
{
    /**
     * Fait le rendu d'une page web
     *
     * @param string $fichier La vue à afficher
     * @param array $donnees Les données pour cette vue
     * @param string $template Le template de la page web
     * @return void
     */
    protected function render(string $fichier, array $donnees = [], string $template = 'default')
    {
        // On extrait le contenu de $donnees
        extract($donnees);

        if (!isset($pageName)) {
            $pageName = "Projet BdD";
        }

        // gère le cookie par rapport au thème sombre ou clair
        if (!isset($_COOKIE['color-scheme'])) {
            setcookie(
                'color-scheme',
                '__pj-light-mode',
                [
                    'expires'=> time() + 365*24*60*60,
                    'path' => '/'
                ]
            );
        } else {
            setcookie(
                'color-scheme',
                $_COOKIE['color-scheme'],
                [
                    'expires'=> time() + 365*24*60*60,
                    'path' => '/'
                ]
            );
        }
        
        // On démarre le buffer de sortie
        ob_start();
        // A partir de ce point toute sortie est conservée en mémoire
        
        // On crée le chemin vers la vue
        require_once ROOT.'/Views'.$fichier.'.php';

        $contenu = ob_get_clean();

        if ($template == 'default' || $template == 'analytics') {
            $temp = $this->retrieveInfoForNavLeft($_SESSION['user']['id']);
            $house_array = $temp['house_array'];
            $apart_array = $temp['apart_array'];
        }

        require_once ROOT.'/Views/templates/'.$template.'.php';
    }

    /**
     * Undocumented function
     *
     * @param Boolean $admin true si on doit checker s'il est admin
     * @return void
     */
    protected function securityCheck($admin) {
        if (isset($_SESSION['user'])) {
            if (!$admin) return;
            $user = new UsersModel();
            $user_array = $user->findById($_SESSION['user']['id']);
            if (!$user_array) {
                header('Location: /');
                exit;
            }
            if (!$user_array['is_admin']) {
                header('Location: /');
                exit;
            }
        } else {
            header('Location: /');
            exit;
        }
    }

    /**
     * Permets d'envoyer des données au format JSON pour les requêtes faites coté client
     * 
     * @param array donnees Les données demandé 
     * @param string erreur Un message d'erreur
     */
    protected function renderData(array $donnees, string $erreur = null) {
        // Headers requis
        header("Access-Control-Allow-Origin: *");
        header("Content-Type: application/json; charset=UTF-8");
        header("Access-Control-Allow-Methods: GET");
        header("Access-Control-Max-Age: 3600");
        header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

        if (!$erreur) {
            // Success
            http_response_code(200);

            echo json_encode($donnees);
        } else {
            // Une erreur lors du traitement des données
            http_response_code(400);
        
            echo json_encode(["message" => $erreur]);
        }

    }

    /**
     * Récupère les informations de l'utilisateur pour afficher correctement navLeft
     *
     * @param Number $id l'id de l'utilisateur
     * @return Array 
     */
    private function retrieveInfoForNavLeft($id) {
        $owner = new OwnerModel();
        $owner_array = $owner->findByIdUsers($id);

        $house_array = [];
        $house = new HouseModel();
        $apartment = new ApartmentModel();
        foreach ($owner_array as $value) {
            $array = $house->findById($value['id_house']);
            $array['nbr_aparts'] = $apartment->countApartFromHouse($value['id_house']);
            $array['nbr_free_aparts'] = $apartment->countFreeApartFromHouse($value['id_house']);
            $house_array[] = $array;
        }

        $tenant = new TenantModel();
        $tenant_array = $tenant->findByIdUsers($id);

        $apart_array = [];
        $room = new RoomModel();
        $apartment_type = new Apartment_typeModel();
        foreach ($tenant_array as $value) {
            $array = $apartment->findById($value['id_apartment']);
            $array['nbr_rooms'] = $room->countRoomApart($array['id_apartment']);
            $array['apartment_type'] = $apartment_type->findById($array['id_apartment_type'])['description'];
            $array['house_name'] = $house->findById($array['id_house'])['house_name'];
            $apart_array[] = $array;
        }

        return ['house_array' => $house_array, 'apart_array' => $apart_array];
    }
}