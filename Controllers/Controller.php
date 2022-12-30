<?php
namespace App\Controllers;

use App\Models\Associations\OwnerModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\UsersModel;

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

        if ($template == 'default' || $template == 'analytics') {
            $house_array = $this->retrieveInfoForNavLeft($_SESSION['user']['id']);
        }
        require_once ROOT.'/Views/templates/'.$template.'.php';
    }

    /**
     * Undocumented function
     *
     * @param Boolean $admin true si on doit checker s'il est admin
     * @return void
     */
    public function securityCheck($admin) {
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
     * Retrieve information of this user for navLeft
     *
     * @param Number $id
     * @return void
     */
    public function retrieveInfoForNavLeft($id) {
        $owner = new OwnerModel();
        $owner_array = $owner->findByIdUsers($id);

        $house_array = [];
        $house = new HouseModel();
        foreach ($owner_array as $value) {
            $house_array[] = $house->findById($value['id_house']);
        }

        return $house_array;
    }
}