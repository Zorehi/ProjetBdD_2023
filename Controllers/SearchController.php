<?php

namespace App\Controllers;

use App\Models\Entities\ApartmentModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\RoomModel;
use App\Models\Entities\UsersModel;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    public function all($q) {
        $querry = str_replace('%20', '%', $q);
        $pageName = str_replace('%', ' ', $querry)." : résultat de la recherche | Projet BdD";

        $users = new UsersModel();
        $users_array = $users->search($querry, 5);

        $house = new HouseModel();
        $apartment = new ApartmentModel();
        $house_array = $house->search($querry, 5);

        $apartment_array = $apartment->search($querry, 5);
        $room = new RoomModel();

        $this->render('/search/all', compact('pageName', 'querry', 'house_array', 'apartment', 'users_array', 'apartment_array', 'room'));
    }

    public function people($q) {
        $querry = str_replace('%20', '%', $q);
        $pageName = str_replace('%', ' ', $querry)." : résultat de la recherche | Projet BdD";

        $users = new UsersModel();
        $users_array = $users->search($querry);

        $this->render('/search/people', compact('pageName', 'querry', 'users_array'));
    }

    public function houses($q) {
        $querry = str_replace('%20', '%', $q);
        $pageName = str_replace('%', ' ', $querry)." : résultat de la recherche | Projet BdD";

        $house = new HouseModel();
        $apartment = new ApartmentModel();
        $house_array = $house->search($querry);

        $this->render('/search/houses', compact('pageName', 'querry', 'house_array', 'apartment'));
    }

    public function apartments($q) {
        $querry = str_replace('%20', '%', $q);
        $pageName = str_replace('%', ' ', $querry)." : résultat de la recherche | Projet BdD";

        $apartment = new ApartmentModel();
        $apartment_array = $apartment->search($querry);
        $room = new RoomModel();

        $this->render('/search/apartments', compact('pageName', 'querry', 'apartment_array', 'room'));
    }
}