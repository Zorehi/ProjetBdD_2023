<?php

namespace App\Controllers;

use App\Models\Entities\Apartment_typeModel;
use App\Models\Entities\Room_typeModel;
use App\Models\Entities\Security_degreeModel;

class ApartsController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    public function index() {  }

    public function create($idMaison) {
        $pageName = "Créer un appartement | Projet BdD";

        $security_degree = new Security_degreeModel();
        $apartment_type = new Apartment_typeModel();
        $room_type = new Room_typeModel();

        $this->render('/aparts/create', compact('pageName', 'idMaison', 'security_degree', 'apartment_type', 'room_type'));
    }
}