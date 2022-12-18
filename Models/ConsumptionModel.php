<?php
namespace App\Models;

class ConsumptionModel extends Model
{
    protected $id_device;
    protected $id_ressource;
    protected $consumption_per_hour;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "";
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
     * Get the value of id_ressource
     */ 
    public function getId_ressource()
    {
        return $this->id_ressource;
    }

    /**
     * Set the value of id_ressource
     *
     * @return  self
     */ 
    public function setId_ressource($id_ressource)
    {
        $this->id_ressource = $id_ressource;

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
        'id_ressource' => [
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