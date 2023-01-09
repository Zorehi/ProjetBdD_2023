<?php

namespace App\Controllers;

use App\Core\Form;
use App\Models\Associations\OwnerModel;
use App\Models\Associations\TenantModel;
use App\Models\Entities\Apartment_typeModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Entities\Device_typeModel;
use App\Models\Entities\DeviceModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\ResourceModel;
use App\Models\Entities\Room_typeModel;
use App\Models\Entities\RoomModel;
use App\Models\Entities\Security_degreeModel;
use App\Models\Entities\SubstanceModel;

class ApartsController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    private function retrieveInfoForPanelManage($id) {
        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($id));
        $house = new HouseModel();
        $house->hydrate($house->findById($apart->getId_house()));
    
        $room = new RoomModel();
        $nbr_rooms = $room->countRoomApart($id);
    
        $apartment_type = new Apartment_typeModel();
        $apartment_type->hydrate($apartment_type->findById($apart->getId_apartment_type()));
        
        $tenant = new TenantModel();
        $tenant_array = $tenant->findByIdApartment($id);
        if (!$tenant_array) {
            $tenant = new OwnerModel();
            $tenant_array = $tenant->findByIdHouse($apart->getId_house());
            if ($tenant_array) $tenant->hydrate($tenant_array);
        } else {
            $tenant->hydrate($tenant_array);
        }
    
        $pageName = "N°{$apart->getNum()} | {$house->getHouse_name()} | Projet BdD";

        return compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type');
    }

    public function index($id) {
        extract($this->retrieveInfoForPanelManage($id));

        $this->render('/aparts/index', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type'));
    }

    public function edit($id) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/aparts/edit', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type'));
    }

    public function apart_rooms($id) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/aparts/apart_rooms', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type'));
    }

    public function apart_devices($id, $order_by = 'ASC', $id_room = false) {
        extract($this->retrieveInfoForPanelManage($id));

        $init = [
            'order_by' => $order_by == 'ASC' ? 0 : 1,
            'id_room' => $id_room ? $id_room : 0,
        ];

        $device_type = new Device_typeModel();
        $substance = new SubstanceModel();
        $ressource = new ResourceModel();
        $room = new RoomModel();
            
        $this->render('/aparts/apart_devices', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'room', 'device_type', 'substance', 'ressource', 'init'));
    }

    public function insights($id, $section) {
        extract($this->retrieveInfoForPanelManage($id));
            
        $this->render('/aparts/insights/'.$section, compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type'), 'analytics');
    }

    public function create($id_house) {
        $pageName = "Créer un appartement | Projet BdD";
        $apart = new ApartmentModel();

        if(Form::validate($_POST, ["num", "citizen_degree","id_security_degree","id_apartment_type","id_room_type","room_name","hab"])){
            if(count($apart->findby(["num" => $apart->getNum(), 'id_house' => $apart->getid_house()])) == 0){
                $apart->hydrate($_POST);
                $apart->setId_house($id_house);
                $apart->create();
                $taille =count($_POST["id_room_type"]);
                $id_room = $_POST["id_room_type"];
                $room_name = $_POST["room_name"];
                $apart->hydrate($apart->findBy(["num"=>$apart->getNum(), 'id_house' =>$apart->getid_house()])[0]);
                $piece = new RoomModel();
                for ($i=0 ; $i < $taille ; $i++){
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

        $this->render('/aparts/create', compact('pageName', 'security_degree', 'apartment_type', 'room_type'));
    }

    public function retrieveDevice($id_apart, $id_room = null, $id_substance = true, $id_resource = true) {
        $device = new DeviceModel();

        
    }
}