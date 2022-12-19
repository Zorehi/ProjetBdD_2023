<?php
namespace App\Models;

class Has_room_typeModel extends Model
{
    protected $id_apartment_type;
    protected $id_room_type;
 

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_gender";
    }
    

    /**
     * Get the value of id_apartment_type
     */ 
    public function getId_apartment_type()
    {
        return $this->id_apartment_type;
    }

    /**
     * Set the value of id_apartment_type
     *
     * @return  self
     */ 
    public function setId_apartment_type($id_apartment_type)
    {
        $this->id_apartment_type = $id_apartment_type;

        return $this;
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

    static $info_tables = [
        'id_apartment_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => ''
        ],
        'id_room_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'description'
        ]
    ];
}