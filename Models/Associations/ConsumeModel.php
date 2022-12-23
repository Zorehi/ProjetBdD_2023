<?php
namespace App\Models\Associations;

use App\Models\Association;

class ConsumeModel extends Association
{
    protected $id_device_type;
    protected $id_resource;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idNames = ['id_device_type', 'id_resource'];
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

    static $info_tables = [
        'id_device_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'type_name'
        ],
        'id_resource' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'name'
        ]
    ];
}