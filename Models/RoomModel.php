<?php
namespace App\Models;

class RoomModel extends Model
{
    protected $id_room;


    public function __construct()
    {
        $class = str_replace(__NAMESPACE__.'\\', '', __CLASS__);
        $this->table = strtolower(str_replace('Model', '', $class));
        $this->idName = "id_room";
        foreach($this as $champ => $valeur) {
            if($champ != 'db' && $champ != 'table' && $champ != 'idName' && $champ != 'champs' && $champ != 'password'){
                $this->champs[] = $champ;
            }
        }
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
}