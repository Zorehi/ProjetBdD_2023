<?php
namespace App\Models\Associations;

use App\Models\Association;

class EmissionModel extends Association
{
    protected $id_device;
    protected $id_substance;
    protected $emission_per_hour;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_device', 'id_substance'];
    }


    /**
     * Get the value of emission_per_hour
     */ 
    public function getEmission_per_hour()
    {
        return $this->emission_per_hour;
    }

    /**
     * Set the value of emission_per_hour
     *
     * @return  self
     */ 
    public function setEmission_per_hour($emission_per_hour)
    {
        $this->emission_per_hour = $emission_per_hour;

        return $this;
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
     * Get the value of id_substance
     */ 
    public function getId_substance()
    {
        return $this->id_substance;
    }

    /**
     * Set the value of id_substance
     *
     * @return  self
     */ 
    public function setId_substance($id_substance)
    {
        $this->id_substance = $id_substance;

        return $this;
    }

    static $info_tables = [
        'id_device' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'device_name'
        ],
        'id_substance' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'name'
        ],
        'emission_per_hour' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];
}