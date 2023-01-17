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

        $device = new DeviceModel();
        $nbr_devices = $device->countDeviceApart($id);
        
    
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

        return compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'nbr_devices');
    }

    public function index($id) {
        extract($this->retrieveInfoForPanelManage($id));

        $this->render('/aparts/index', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'nbr_devices'));
    }

    public function edit($id) {
        extract($this->retrieveInfoForPanelManage($id));
        if(Form::validate($_POST, ["num","hab","id_security_degree"]))
        {
            $apart->hydrate($_POST);
            $apart->update();
        }
        $this->render('/aparts/edit', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'nbr_devices'));
    }

    public function apart_rooms($id) {
        extract($this->retrieveInfoForPanelManage($id));

        $room = new RoomModel();
        $tableroom = $room->allRoom($id);

        $this->render('/aparts/apart_rooms', compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'nbr_devices','tableroom'));
    }

    public function apart_devices($id, $order_by = 'ASC', $id_room = false, $id_device_type = false, $search = '', $is_on = false) {
        extract($this->retrieveInfoForPanelManage($id));

        $init = [
            'order_by' => $order_by == 'ASC' ? 0 : 1,
            'id_room' => $id_room ? $id_room : 'false',
            'id_device_type' => $id_device_type ? $id_device_type : 'false',
            'is_on' => $is_on ? $is_on : 'false'
        ];

        $device = new DeviceModel();
        $device_type = new Device_typeModel();
        $substance = new SubstanceModel();
        $ressource = new ResourceModel();
        $room = new RoomModel();

        $donnees = [
            'pageName' => $pageName,
            'apart' => $apart,
            'tenant' => $tenant,
            'house' => $house,
            'nbr_rooms' => $nbr_rooms,
            'apartment_type' => $apartment_type,
            'nbr_devices' => $nbr_devices,
            'room' => $room,
            'device_type' => $device_type,
            'substance' => $substance,
            'ressource' => $ressource,
            'init' => $init,
            'device' => $device,
            'search' => $search,
        ];
            
        $this->render('/aparts/apart_devices', $donnees);
    }

    public function insights($id, $section) {
        extract($this->retrieveInfoForPanelManage($id));

        $datas = [];
        $datas_reorganize = [];
        $datas_date = [];

        if ($section == 'consume') {
            $consume_array = $apart->consume($id);
            foreach($consume_array as $key => $value) {
                if (!isset($datas[$value['id_resource']])) $datas[$value['id_resource']] = [];
                $datas[$value['id_resource']][$value['date']] = $value['consumption'];
            }

            $resource = new ResourceModel();
            $index = 0;
            foreach($datas as $key => $value) {
                $resource_array = $resource->findById(intval($key));
                if ($resource_array) {
                    $datas_reorganize[$index] = ['name' => $resource_array['name'], 'data' => []];
                    
                    for($i = 30; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-$i days"));
                        if ($index == 0) {
                            $datas_date[] = $date;
                        }
    
                        if (isset($value[$date]) && $value[$date] != null) {
                            $datas_reorganize[$index]['data'][] = floatval($value[$date]);
                        } else {
                            $datas_reorganize[$index]['data'][] = 0;
                        }
                    }
                    $index++;
                }
            }
        } else {
            $emit_array = $apart->emit($id);
            foreach($emit_array as $key => $value) {
                if (!isset($datas[$value['id_substance']])) $datas[$value['id_substance']] = [];
                $datas[$value['id_substance']][$value['date']] = $value['emission'];
            }

            $substance = new SubstanceModel();
            $index = 0;
            foreach($datas as $key => $value) {
                $substance_array = $substance->findById(intval($key));
                if ($substance_array) {
                    $datas_reorganize[$index] = ['name' => $substance_array['name'], 'data' => []];
                    
                    for($i = 30; $i >= 0; $i--) {
                        $date = date('Y-m-d', strtotime("-$i days"));
                        if ($index == 0) {
                            $datas_date[] = $date;
                        }

                        if (isset($value[$date]) && $value[$date] != null) {
                            $datas_reorganize[$index]['data'][] = floatval($value[$date]);
                        } else {
                            $datas_reorganize[$index]['data'][] = 0;
                        }
                    }
                    $index++;
                }
            }
        }
            
        $this->render('/aparts/insights/'.$section, compact('pageName', 'apart', 'tenant', 'house', 'nbr_rooms', 'apartment_type', 'nbr_devices', 'datas_date', 'datas_reorganize'), 'analytics');
    }

    public function create($id_house) {
        $pageName = "Créer un appartement | Projet BdD";
        $apart = new ApartmentModel();

        if(Form::validate($_POST, ["num", "citizen_degree","id_security_degree","id_apartment_type","id_room_type","room_name","hab"])){
            $apart->hydrate($_POST);
            $apart->setId_house($id_house);
            if(count($apart->findby(["num" => $apart->getNum(), 'id_house' => $apart->getid_house()])) == 0) {
                $apart->setId_house($id_house);
                $apart->setId_apartment($apart->create());
                $taille = count($_POST["id_room_type"]);
                $id_room = $_POST["id_room_type"];
                $room_name = $_POST["room_name"];
                $piece = new RoomModel();
                for ($i=0 ; $i < $taille ; $i++) {
                    $piece->setId_room_type($id_room[$i]);
                    $piece->setRoom_name($room_name[$i]);
                    $piece->setId_apartment($apart->getId_apartment());
                    $piece->create();
                }
                header('Location: /aparts/'.$apart->getId_apartment());
                exit;
            }
        }
        
        $security_degree = new Security_degreeModel();
        $apartment_type = new Apartment_typeModel();
        $room_type = new Room_typeModel();

        $this->render('/aparts/create', compact('pageName', 'security_degree', 'apartment_type', 'room_type'));
    }

    public function retrieveDevices($id, $order_by = 'ASC',  $id_room = 'false', $id_device_type = 'false', $is_on = 'false', $search = '', $limit = 10, $offset = 0) {
        $device = new DeviceModel();

        $device_array = $device->search($id, $search, $order_by, $id_room, $id_device_type, $is_on, $limit, $offset);
        $device_number = $device->countSearch($id, $search, $order_by, $id_room, $id_device_type, $is_on);

        $this->renderData(['datas' => $device_array, 'search_length' => $device_number]);
    }

    public function make_tenant() {
        if (Form::validate($_POST, ['id_apartment'])) {
            $tenant = new TenantModel();
            $tenant->setId_apartment($_POST['id_apartment']);
            $tenant->setFrom_date(date('Y-m-d'));
            $tenant->setTo_date(null);
            $tenant->setId_users($_SESSION['user']['id']);
            $tenant->create();
            return http_response_code(200);
        }
        http_response_code(404);
    }
}