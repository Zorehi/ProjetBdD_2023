<?php
namespace App\Models\Entities;

use App\Models\Entity;

class DeviceModel extends Entity
{
    protected $id_device;
    protected $device_name;
    protected $description_device;
    protected $description_place;
    protected $id_device_type;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_device";
    }

    public function search($q) {
        return $this->requete("SELECT *
                               FROM {$this->table}
                               WHERE device_name LIKE '%{$q}%'")->fetchAll();
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
        'id_device_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'type_name'
        ]
    ];
}