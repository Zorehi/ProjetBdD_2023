<?php

namespace App\Controllers;
use App\Core\Form;
use App\Models\Entities\Apartment_typeModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Entities\Room_typeModel;
use App\Models\Entities\RoomModel;
use App\Models\Entities\Security_degreeModel;

class ApartsController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    public function index($id) {
        $is_admin_or_owner = true;

        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($id));
        $pageName = "{} | Projet BdD";
            
        $this->render('/aparts/index', compact('pageName', 'apart', 'is_admin_or_owner'));
    }

    public function edit($id) {
        $is_admin_or_owner = true;

        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($id));
        $pageName = "{} | Projet BdD";
            
        $this->render('/aparts/edit', compact('pageName', 'apart', 'is_admin_or_owner'));
    }

    public function insights($id, $section) {
        $is_admin_or_owner = true;

        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($id));
        $pageName = "{} | Projet BdD";
            
        $this->render('/aparts/insights/'.$section, compact('pageName', 'apart', 'is_admin_or_owner'));
    }

    public function create($idMaison) {
        $pageName = "Créer un appartement | Projet BdD";
        $apart = new ApartmentModel();
        //var_dump($_POST);
        if(Form::validate($_POST, ["num", "citizen_degree","id_security_degree","id_apartment_type","id_room_type","room_name","hab"])){
            if(count($apart->findby(["num"=>$apart->getNum(), 'id_house' =>$apart->getid_house()]))==1){
                $apart->hydrate($_POST);
                $apart->setId_house($idMaison);
                $apart->create();
                $taille =count($_POST["id_room_type"]);
                $id_room = $_POST["id_room_type"];
                $room_name = $_POST["room_name"];
                $apart->hydrate($apart->findBy(["num"=>$apart->getNum(), 'id_house' =>$apart->getid_house()])[0]);
                for ($i=0 ; $i < $taille ; $i++){
                    $piece = new RoomModel();
                    $piece->setId_room_type($id_room[$i]);
                    $piece->setRoom_name($room_name[$i]);
                    $piece->setId_apartment($apart->getId_apartment());
                    $piece->create();
                }
            }

        }
            $security_degree = new Security_degreeModel();
            $apartment_type = new Apartment_typeModel();
            $room_type = new Room_typeModel();
        $this->render('/aparts/create', compact('pageName', 'idMaison', 'security_degree', 'apartment_type', 'room_type'));
    }
}