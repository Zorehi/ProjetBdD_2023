<?php
namespace App\Models\Entities;

use App\Models\Entity;

class DeviceModel extends Entity
{
    protected $id_device;
    protected $device_name;
    protected $description_device;
    protected $description_place;
    protected $id_room;
    protected $id_device_type;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_device";
    }

    public function countDeviceApart($idApart) {
        return $this->requete("SELECT COUNT(*) as nbr_devices 
                               FROM {$this->table} D NATURAL JOIN room R
                               WHERE R.id_apartment = {$idApart}")->fetch()['nbr_devices'];
    }

    public function search($id, $q, $order_by, $id_room, $id_device_type, $limit, $offset) {
        $where = '';
        if ($id_room != 'false') $where .= " AND D.id_room = $id_room ";
        if ($id_device_type != 'false') $where .= " AND D.id_device_type = $id_device_type ";
        return $this->requete("SELECT D.id_device, D.device_name, D.description_device, D.description_place, DT.type_name, R.room_name
                               FROM {$this->table} D LEFT OUTER JOIN room R ON(D.id_room = R.id_room) LEFT OUTER JOIN device_type DT ON(D.id_device_type = DT.id_device_type)
                               WHERE D.device_name LIKE '%{$q}%'
                                     {$where}
                                     AND R.id_apartment = $id
                               ORDER BY device_name {$order_by}
                               LIMIT $limit OFFSET $offset")->fetchAll();
    }

    public function countSearch($id, $q, $order_by, $id_room, $id_device_type) {
        $where = '';
        if ($id_room != 'false') $where .= " AND D.id_room = $id_room ";
        if ($id_device_type != 'false') $where .= " AND D.id_device_type = $id_device_type ";
        return $this->requete("SELECT COUNT(D.id_device) as nbr_devices
                               FROM {$this->table} D LEFT OUTER JOIN room R ON(D.id_room = R.id_room)
                               WHERE D.device_name LIKE '%{$q}%'
                                     {$where}
                                     AND R.id_apartment = $id
                               ORDER BY device_name {$order_by}")->fetch();
    }

    public function TurnVerify($id){
        return $this->requete("SELECT * FROM Turn_on WHERE id_device = $id AND DATEDIFF(to_date , `0000-00-00 00:00:00`)=0")->fetchAll();
    }

    /**
     * Get the value of id_device
     */ 
    public function getId_device()
    {
        return $this->id_device;
    }

    /**
     * Set the value of id_device
     *
     * @return  self
     */ 
    public function setId_device($id_device)
    {
        $this->id_device = $id_device;

        return $this;
    }

    /**
     * Get the value of device_name
     */ 
    public function getDevice_name()
    {
        return $this->device_name;
    }

    /**
     * Set the value of device_name
     *
     * @return  self
     */ 
    public function setDevice_name($device_name)
    {
        $this->device_name = $device_name;

        return $this;
    }

    /**
     * Get the value of description_device
     */ 
    public function getDescription_device()
    {
        return $this->description_device;
    }

    /**
     * Set the value of description_device
     *
     * @return  self
     */ 
    public function setDescription_device($description_device)
    {
        $this->description_device = $description_device;

        return $this;
    }

    /**
     * Get the value of description_place
     */ 
    public function getDescription_place()
    {
        return $this->description_place;
    }

    /**
     * Set the value of description_place
     *
     * @return  self
     */ 
    public function setDescription_place($description_place)
    {
        $this->description_place = $description_place;

        return $this;
    }
    
    /**
     * Get the value of id_room
     */ 
    public function getId_room()
    {
        return $this->id_room;
    }

    /**
     * Set the value of id_room
     *
     * @return  self
     */ 
    public function setId_room($id_room)
    {
        $this->id_room = $id_room;

        return $this;
    }

    /**
     * Get the value of id_device_type
     */ 
    public function getId_device_type()
    {
        return $this->id_device_type;
    }

    /**
     * Set the value of id_device_type
     *
     * @return  self
     */ 
    public function setId_device_type($id_device_type)
    {
        $this->id_device_type = $id_device_type;

        return $this;
    }

    static $info_tables = [
        'id_device' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'device_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'description_device' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'description_place' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_room' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'room_name'
        ],
        'id_device_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'type_name'
        ]
    ];
}