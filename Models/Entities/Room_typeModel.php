<?php
namespace App\Models\Entities;

use App\Models\Entity;

class Room_typeModel extends Entity
{
    protected $id_room_type;
    protected $description;
    protected $image_url;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_room_type";
    }

    /**
     * Get the value of id_room_type
     */ 
    public function getId_room_type()
    {
        return $this->id_room_type;
    }

    /**
     * Set the value of id_room_type
     *
     * @return  self
     */ 
    public function setId_room_type($id_room_type)
    {
        $this->id_room_type = $id_room_type;

        return $this;
    }

    /**
     * Get the value of description
     */ 
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set the value of description
     *
     * @return  self
     */ 
    public function setDescription($description)
    {
        $this->description = $description;
        
        return $this;
    }
    
    /**
     * Get the value of image_url
     */ 
    public function getImage_url()
    {
        return $this->image_url;
    }

    /**
     * Set the value of image_url
     *
     * @return  self
     */ 
    public function setImage_url($image_url)
    {
        $this->image_url = $image_url;

        return $this;
    }

    static $info_tables = [
        'id_room_type' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'image_url' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'description' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ]
    ];

}