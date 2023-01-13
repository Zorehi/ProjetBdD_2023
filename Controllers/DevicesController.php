<?php

namespace App\Controllers;

use App\Core\Form;
use App\Controllers\Controller;
use App\Models\Entities\RoomModel;
use App\Models\Entities\HouseModel;
use App\Models\Entities\DeviceModel;
use App\Models\Associations\OwnerModel;
use App\Models\Entities\ApartmentModel;
use App\Models\Associations\TenantModel;
use App\Models\Entities\Device_typeModel;
use App\Models\Entities\Apartment_typeModel;


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
        if(Form::validate($_POST, [ "device_name","description_device","description_place","id_device_type","id_room"])){
        
            $device->hydrate($_POST);
           
            $device->create();
        }
        $device_type = new Device_typeModel();
        $room = new roomModel();
        
        $this->render('/devices/create', compact('pageName', 'room', 'device_type'));
    }

    
    public function edit($id) {
        $pageName = "Modifier un appareil | Projet BdD";
        $device = new DeviceModel();
        $deviceArray = $device -> findById($id);
        $device->hydrate($deviceArray);
        if(Form::validate($_POST, ["device_name","description_device","description_place"]))
        {
            $device->hydrate($_POST);
            $device->update();
        }
        $device_type = new Device_typeModel();
        $this->render('/devices/edit', compact('pageName','device'));
    }

    
    public function delete($id) {
        $device = new DeviceModel();
        $device->delete($id);
    }
}

