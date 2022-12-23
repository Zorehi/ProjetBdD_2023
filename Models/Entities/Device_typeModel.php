<?php
namespace App\Models\Entities;

use App\Models\Entity;

class Device_typeModel extends Entity
{
    protected $id_device_type;
    protected $type_name;
    protected $id_video;
    
    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_device_type";
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
     * Get the value of type_name
     */ 
    public function getType_name()
    {
        return $this->type_name;
    }

    /**
     * Set the value of type_name
     *
     * @return  self
     */ 
    public function setType_name($type_name)
    {
        $this->type_name = $type_name;

        return $this;
    }

    /**
     * Get the value of id_video
     */ 
    public function getId_video()
    {
        return $this->id_video;
    }

    /**
     * Set the value of id_video
     *
     * @return  self
     */ 
    public function setId_video($id_video)
    {
        $this->id_video = $id_video;

        return $this;
    }

    static $info_tables = [
        'id_device_type' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'type_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_video' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => null
        ]
    ];
}