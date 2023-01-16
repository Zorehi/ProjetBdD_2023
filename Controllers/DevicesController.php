<?php

namespace App\Controllers;

use App\Core\Form;
use App\Controllers\Controller;
use App\Models\Entities\RoomModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\DeviceModel;
use App\Models\Entities\ResourceModel;
use App\Models\Associations\OwnerModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Associations\TenantModel;
use App\Models\Associations\ConsumeModel;
use App\Models\Associations\Turn_onModel;
use App\Models\Entities\Device_typeModel;
use App\Models\Associations\EmissionModel;
use App\Models\Entities\Apartment_typeModel;
use App\Models\Associations\ConsumptionModel;
use App\Models\Entities\SubstanceModel;

class DevicesController extends Controller
{
    public function __construct()
    {
        $this->securityCheck(false);
    }

    private function retrieveInfoForPanelManage($id) {
        $device = new DeviceModel();
        $device->hydrate($device->findById($id));

        $device_type = new Device_typeModel();
        $device_type->hydrate($device_type->findById($device->getId_device_type()));

        $room = new RoomModel();
        $room->hydrate($room->findById($device->getId_room()));

        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($room->getId_apartment()));

        $tenant = new TenantModel();
        $tenant_array = $tenant->findByIdApartment($room->getId_apartment());
        if (!$tenant_array) {
            $tenant = new OwnerModel();
            $tenant_array = $tenant->findByIdHouse($apart->getId_house());
            if ($tenant_array) $tenant->hydrate($tenant_array);
        } else {
            $tenant->hydrate($tenant_array);
        }

        if ($tenant->getId_users() != $_SESSION['user']['id'] && !$_SESSION['user']['is_admin']) {
            header('Location: /');
            exit;
        }

        return compact('device', 'device_type');
    }

    public function create($id) {
        $device = new DeviceModel();
        
        if(Form::validate($_POST, [ "device_name","description_device","description_place","id_device_type","id_room","consumption_resources"])){    
            $device->hydrate($_POST);
            $device->setId_device($device->create());
            foreach ($_POST["consumption_resources"] as $key => $value){
                $consumption = new ConsumptionModel();
                $consumption->setId_device($device->getId_device());
                $consumption->setId_resource($key);
                $consumption->setConsumption_per_hour($value);
                $consumption->create();
            }
            if(isset($_POST["emission_substances"])){
                foreach ($_POST["emission_substances"] as $key => $value){
                    $emission = new EmissionModel();
                    $emission->setId_device($device->getId_device());
                    $emission->setId_substance($key);
                    $emission->setEmission_per_hour($value);
                    $emission->create();
                }
            }
            
            header("Location: devices/{$device->getId_device()}/edit");
            exit;
        }
        $device_type = new Device_typeModel();
        $room = new roomModel();
        
        $pageName = "Ajouter un appareil | Projet BdD";

        $this->render('/devices/create', compact('pageName', 'room', 'device_type','id'));
    }

    
    public function edit($id) {
        
        $cons = new ConsumptionModel();
        $emis = new EmissionModel();
        if(Form::validate($_POST, ["device_name","description_device","description_place","consumption","emission"]))
        {
            $device = new DeviceModel();
            $device->hydrate($_POST);
            $device->update();
            foreach($_POST["consumption"] as $key => $value){
                $cons->setConsumption_per_hour($value);
                $cons->update(['id_resource'=> $key ,'id_device'=>$device->getId_device()]);
            }
            foreach($_POST["emission"] as $key => $value){
                $emis->setEmission_per_hour($value);
                $emis->update(['id_substance'=> $key ,'id_device'=>$device->getId_device()]);
            }
            
            header("Location: /devices/edit/?id=$id");
            exit;
        }
        
        extract($this->retrieveInfoForPanelManage($id));
        
        $res = new ResourceModel();
        $sub = new SubstanceModel();
        
        $array_cons = $cons->getCons($id);
        $array_emis = $emis->getEmis($id);
        
        $pageName = "Modifier un appareil | Projet BdD";

        $this->render('/devices/edit', compact('device', 'device_type', 'pageName', 'array_cons', 'array_emis', 'res', 'sub'));
    }

    public function insights($id, $section) {
        extract($this->retrieveInfoForPanelManage($id));

        $datas = [];
        $datas_reorganize = [];
        $datas_date = [];

        if ($section == 'consume') {
            $consume_array = $device->consume($id);
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
            $emit_array = $device->emit($id);
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
            
        $this->render('/devices/insights/'.$section, compact('device', 'device_type', 'datas_date', 'datas_reorganize'), 'analytics');
    }

    
    public function delete($id) {
        $device = new DeviceModel();
        $device->delete($id);
    }

    
    public function turn_on($id){
        $device = new DeviceModel();
        $TurnOn = new Turn_onModel();
        $verify = $device->TurnVerify($id);
        
        if($verify){
            $verify['to_date']= date("Y-m-d H:i:s"); ;
            $TurnOn->hydrate($verify);
            $TurnOn->update(['id_device' => $TurnOn->getId_device() ,'from_date' =>$TurnOn->getFrom_date()]);
        }
        else {
            $TurnOn->setId_device($id);
            $TurnOn->setFrom_date(date("Y-m-d H:i:s"));
            $TurnOn->setTo_date('0000-00-00 00:00:00');
            $TurnOn->create();
        }
        
    }
    public function retrieveResSub($id_device_type) {
        $device_type = new Device_TypeModel();
        $substances = $device_type->get_name_substance($id_device_type);
        $resources = $device_type->get_name_resource($id_device_type);

        $this->renderData(['resources' => $resources, 'substances' => $substances]);
    }
}

