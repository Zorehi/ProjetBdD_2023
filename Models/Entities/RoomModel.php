<?php
namespace App\Models\Entities;

use App\Models\Entity;

class RoomModel extends Entity
{
    protected $id_room;
    protected $room_name;
    protected $id_room_type;
    protected $id_apartment;

    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_room";
    }

    public function countRoomApart($idApart) {
        return $this->requete("SELECT COUNT(*) as nbr_rooms FROM {$this->table} WHERE id_apartment = {$idApart}")->fetch()['nbr_rooms'];
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
     * Get the value of room_name
     */ 
    public function getRoom_name()
    {
        return $this->room_name;
    }

    /**
     * Set the value of room_name
     *
     * @return  self
     */ 
    public function setRoom_name($room_name)
    {
        $this->room_name = $room_name;

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

    /**
     * Get the value of id_apartment
     */ 
    public function getId_apartment()
    {
        return $this->id_apartment;
    }

    /**
     * Set the value of id_apartment
     *
     * @return  self
     */ 
    public function setId_apartment($id_apartment)
    {
        $this->id_apartment = $id_apartment;

        return $this;
    }

    static $info_tables = [
        'id_room' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => 'disabled'
        ],
        'room_name' => [
            'elementHTML' => 'input',
            'inputType' => 'text',
            'is_disabled' => ''
        ],
        'id_room_type' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'description'
        ],
        'id_apartment' => [
            'elementHTML' => 'select',
            'inputType' => null,
            'is_disabled' => '',
            'name' => 'num'
        ]
    ];
}