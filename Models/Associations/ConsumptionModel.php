<?php
namespace App\Models\Associations;

use App\Models\Association;

class ConsumptionModel extends Association
{
    protected $id_device;
    protected $id_resource;
    protected $consumption_per_hour;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_device', 'id_resource'];
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
     * Get the value of id_resource
     */ 
    public function getId_resource()
    {
        return $this->id_resource;
    }

    /**
     * Set the value of id_resource
     *
     * @return  self
     */ 
    public function setId_resource($id_resource)
    {
        $this->id_resource = $id_resource;

        return $this;
    }

    /**
     * Get the value of consumption_per_hour
     */ 
    public function getConsumption_per_hour()
    {
        return $this->consumption_per_hour;
    }

    /**
     * Set the value of consumption_per_hour
     *
     * @return  self
     */ 
    public function setConsumption_per_hour($consumption_per_hour)
    {
        $this->consumption_per_hour = $consumption_per_hour;

        return $this;
    }

    static $info_tables = [
        'id_device' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'device_name'
        ],
        'id_resource' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'name'
        ],
        'consumption_per_hour' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];
    
}