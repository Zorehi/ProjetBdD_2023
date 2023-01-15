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
        $apart = new ApartmentModel();
        $apart->hydrate($apart->findById($id));
        $house = new HouseModel();
        $house->hydrate($house->findById($apart->getId_house()));

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

        return compact('pageName', 'apart', 'tenant', 'house', 'apartment_type', 'nbr_devices');
    }

    public function create($id) {

        $device = new DeviceModel();
        $pageName = "Ajouter un appareil | Projet BdD";
        
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
        }
        $device_type = new Device_typeModel();
        $room = new roomModel();
        
        $this->render('/devices/create', compact('pageName', 'room', 'device_type','id'));
    }

    
    public function edit($id) {
        $pageName = "Modifier un appareil | Projet BdD";
        $device = new DeviceModel();
        $deviceArray = $device -> findById($id);
        $device->hydrate($deviceArray);
        $cons = new ConsumptionModel();

        $emis = new EmissionModel();

        $res = new ResourceModel();
        $sub = new SubstanceModel();
        if(Form::validate($_POST, ["device_name","description_device","description_place","consumption","emission"]))
        {

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
        }
        $device_type = new Device_typeModel();
        $device_type_name = $device_type->findById($device->getId_device_type())['type_name'];
        $array_cons = $cons->getCons($id);
        $array_emis = $emis->getEmis($id);
        $this->render('/devices/edit', compact('pageName','device','device_type_name','array_cons','array_emis','res','sub'));
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

