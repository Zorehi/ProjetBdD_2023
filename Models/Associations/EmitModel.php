<?php
namespace App\Models\Associations;

use App\Models\Association;

class EmitModel extends Association
{
    protected $id_device_type;
    protected $id_substance;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_device_type', 'id_substance'];
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
        'id_device_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'type_name'
        ],
        'id_substance' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'name'
        ]
    ];
}